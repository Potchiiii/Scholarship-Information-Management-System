<?php
$pass = 0;
require_once "../central_control.php";
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if ($email != false && $password != false) {
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    if ($stmt->execute()) {
        $fetch_info = $stmt->fetch(PDO::FETCH_ASSOC);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        $roles = $fetch_info['roles'];
        $id = $fetch_info['userID'];
        if ($status == "verified") {
            if ($code != 0) {
                header('Location: ../reset-code.php');
            }
        } else {
            header('Location: ../user-otp.php');
        }

    }
} else {
    header('Location: ../login.php');
}
date_default_timezone_set('Asia/Manila');
$current_date = date("Y-m-d");
function alert($param, $param2, $param3, $param4)
{
    ?>
    <script>
        Swal.fire({
            icon: '<?php echo $param ?>',
            title: '<?php echo $param2 ?>',
            text: '<?php echo $param3 ?>',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?php echo $param4 ?>';
            }
        });
    </script>
    <?php
}
if (isset($_POST['profile'])) {


    if (empty($_POST['fname'])) {
        $errors['fname'] = "Please provide your First Name";
    } else {
        $fname = $_POST['fname'];
    }

    if (empty($_POST['lname'])) {
        $errors['lname'] = "Please provide your Last Name";
    } else {
        $lname = $_POST['lname'];
    }

    if (empty($_POST['email'])) {
        $errors['email'] = "Please provide your Email";
    } else {
        $email = $_POST['email'];
    }

    if (empty($_POST['number'])) {
        $errors['number'] = "Please provide your Contact Number";
    } else {
        $contact = $_POST['number'];
    }

    if (empty($_POST['address'])) {
        $errors['address'] = "Please provide your Address";
    } else {
        $address = $_POST['address'];
    }

    if (count($errors) === 0) {
        $stmt = $pdo->prepare("UPDATE users SET first_name = :fname, last_name = :lname, email = :email, contact = :contact, address = :address WHERE userID = :userID");
        $stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
        $stmt->bindParam(':lname', $lname, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':contact', $contact, PDO::PARAM_STR);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        $stmt->bindParam(':userID', $id, PDO::PARAM_INT);

        try {
            if ($stmt->execute()) {
                alert('success', 'Profile Updated', 'please try again', 'profile.php');
            } else {
                alert('error', 'Failed Processes', 'please try again', 'profile.php');
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


}


if (isset($_POST['student_profile'])) {
    if ($roles == 3) {
        if ($_FILES['cor']['name'] != '') {
            $cor = $_FILES['cor']['name'];
        } else {
            $cor = $fetch_info['cor'];
        }
        $tempname1 = $_FILES['cor']['tmp_name'];
        $folder1 = "../assets/cor/" . $cor;

        if ($fetch_info['account_verifyer'] == 1) {
            $studentID = $fetch_info['studentID'];
        } else {
            if (empty($_POST['studentID'])) {
                $errors['studentID'] = "Please provide Student ID";
            } else {
                $studentID = $_POST['studentID'];
            }
        }

    }

    if ($_FILES['profiles']['name'] != '') {
        $profile = $_FILES['profiles']['name'];
    } else {
        $profile = $fetch_info['profile'];
    }
    $tempname2 = $_FILES['profiles']['tmp_name'];
    $folder2 = "../assets/images/profile/" . $profile;





    if (count($errors) === 0) {
        if ($roles == 3) {
            if ($fetch_info['account_verifyer'] == 1) {
                move_uploaded_file($tempname2, $folder2);
                $stmt = $pdo->prepare("UPDATE users SET profile=:profile WHERE userID = :userID");
                $stmt->bindParam(':profile', $profile, PDO::PARAM_STR);
                $stmt->bindParam(':userID', $id, PDO::PARAM_INT);
            } else {
                move_uploaded_file($tempname1, $folder1);
                move_uploaded_file($tempname2, $folder2);
                $stmt = $pdo->prepare("UPDATE users SET studentID=:studentID, profile=:profile, cor=:cor  WHERE userID = :userID");
                $stmt->bindParam(':studentID', $studentID, PDO::PARAM_STR);
                $stmt->bindParam(':profile', $profile, PDO::PARAM_STR);
                $stmt->bindParam(':cor', $cor, PDO::PARAM_STR);
                $stmt->bindParam(':userID', $id, PDO::PARAM_INT);
            }

        } else {
            move_uploaded_file($tempname2, $folder2);
            $stmt = $pdo->prepare("UPDATE users SET profile=:profile WHERE userID = :userID");
            $stmt->bindParam(':profile', $profile, PDO::PARAM_STR);
            $stmt->bindParam(':userID', $id, PDO::PARAM_INT);
        }


        try {
            if ($stmt->execute()) {
                alert('success', 'Student Profile Updated', 'please try again', 'profile.php');
            } else {
                alert('error', 'Failed Processes', 'please try again', 'profile.php');
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

if (isset($_GET['account'])) {
    $account = $_GET['account'];
    $stmt = $pdo->prepare("SELECT * FROM users WHERE userID =:userID");
    $stmt->bindParam(":userID", $account, PDO::PARAM_INT);
    $stmt->execute();
    $details = $stmt->fetch();

}


if (isset($_GET['approve_account'])) {
    $approve_account = $_GET['approve_account'];
    $stmt = $pdo->prepare("UPDATE users SET account_verifyer = 1 WHERE userID =:userID");
    $stmt->bindParam(":userID", $approve_account, PDO::PARAM_INT);
    if ($stmt->execute()) {
        alert('success', 'Approved Scholarship Account', '', 'scholars.php');
    } else {
        alert('error', 'Failed Processes', 'please try again', 'scholars.php');
    }

}
if (isset($_GET['edit_scholar'])) {
    $edit_scholar = $_GET['edit_scholar'];
    $stmt = $pdo->prepare("SELECT * FROM scholarship WHERE scholarshipID=:scholarshipID");
    $stmt->bindParam(":scholarshipID", $edit_scholar, PDO::PARAM_INT);
    $stmt->execute();
    $details = $stmt->fetch();
}

if (isset($_GET['delete_scholar'])) {
    $delete_scholar = $_GET['delete_scholar'];
    
    try {
        $pdo->beginTransaction();
        
        // Delete related records first
        $stmt1 = $pdo->prepare("DELETE FROM daily_scholarship WHERE scholarshipID = :scholarshipID");
        $stmt1->bindParam(":scholarshipID", $delete_scholar);
        $stmt1->execute();
        
        // Delete scholarship documents
        $stmt2 = $pdo->prepare("DELETE FROM scholarship_docs WHERE scholarship = :scholarshipID");
        $stmt2->bindParam(":scholarshipID", $delete_scholar);
        $stmt2->execute();
        
        // Finally delete the scholarship
        $stmt3 = $pdo->prepare("DELETE FROM scholarship WHERE scholarshipID = :scholarshipID");
        $stmt3->bindParam(":scholarshipID", $delete_scholar);
        $stmt3->execute();
        
        $pdo->commit();
        alert('success', 'Scholarship Deleted', '', 'scholarships.php');
        
    } catch (PDOException $e) {
        $pdo->rollBack();
        alert('error', 'Failed Process', 'Please try again', 'scholarships.php');
    }
}


if (isset($_GET['delete_bulletin'])) {
    $bulletin_id = $_GET['delete_bulletin'];
    $stmt = $pdo->prepare("DELETE FROM buletin WHERE buletID = :buletID");
    $stmt->bindParam(":buletID", $bulletin_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        alert('success', 'Bulletin Deleted Successfully', '', 'bulletin.php');
    } else {
        alert('error', 'Failed to Delete Bulletin', '', 'bulletin.php');
    }
}

if (isset($_GET['edit_bulletin'])) {
    $bulletin_id = $_GET['edit_bulletin'];
    $stmt = $pdo->prepare("SELECT * FROM buletin WHERE buletID = :buletID");
    $stmt->bindParam(":buletID", $bulletin_id, PDO::PARAM_INT);
    $stmt->execute();
    $bulletin_details = $stmt->fetch();
}

if (isset($_POST['update_bulletin'])) {
    $bulletin_id = $_POST['bulletin_id'];
    $content = $_POST['buletcontecnt'];
    $type = $_POST['altype'];

    $stmt = $pdo->prepare("UPDATE buletin SET descriptions = :descriptions, type = :type WHERE buletID = :buletID");
    $stmt->bindParam(":descriptions", $content, PDO::PARAM_STR);
    $stmt->bindParam(":type", $type, PDO::PARAM_STR);
    $stmt->bindParam(":buletID", $bulletin_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        alert('success', 'Bulletin Updated Successfully', '', 'bulletin.php');
    } else {
        alert('error', 'Failed to Update Bulletin', '', 'bulletin.php');
    }
}

if (isset($_POST['scholar'])) {
    // Get form data
    $name = $_POST['name'];
    $limit = $_POST['limit'];
    $semester = $_POST['semester'];
    $sector = $_POST['sector'];
    $date_start = $_POST['date_start'];
    $date_end = $_POST['date_end'];
    $description = $_POST['description'];
    $validity_period = $_POST['validity_period'];
    
    // Generate a unique scholarship ID if this is a new scholarship
    if (empty($edit_scholar)) {
        do {
            $scholid = "PROG" . rand(1000, 9999) . "GRAM" . rand(1000, 9999);
            $check = $pdo->prepare("SELECT scholarID FROM scholarship WHERE scholarID = :scholarID");
            $check->bindParam(':scholarID', $scholid);
            $check->execute();
        } while ($check->rowCount() > 0);
        
        // Insert new scholarship
        $stmt = $pdo->prepare("INSERT INTO scholarship(semesterID, name, sector, date_start, date_end, description, scholarID, limitation, validity_period) 
                              VALUES(:semesterID, :name, :sector, :date_start, :date_end, :description, :scholarID, :limitation, :validity_period)");
        $stmt->bindParam(":semesterID", $semester, PDO::PARAM_INT);
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->bindParam(":sector", $sector, PDO::PARAM_STR);
        $stmt->bindParam(":date_start", $date_start, PDO::PARAM_STR);
        $stmt->bindParam(":date_end", $date_end, PDO::PARAM_STR);
        $stmt->bindParam(':scholarID', $scholid, PDO::PARAM_STR);
        $stmt->bindParam(':limitation', $limit, PDO::PARAM_INT);
        $stmt->bindParam(":description", $description, PDO::PARAM_STR);
        $stmt->bindParam(":validity_period", $validity_period);
        
        if ($stmt->execute()) {
            // Get the ID of the newly created scholarship
            $new_scholarship_id = $pdo->lastInsertId();
            
            // Send notification for new scholarship
            send_scholarship_notification('new_scholarship', $new_scholarship_id);
            
            alert('success', 'Scholarship added successfully', '', 'scholarships.php');
        } else {
            alert('error', 'Failed to add scholarship', 'Database error occurred', 'scholarships.php');
        }
    } else {
        // Update existing scholarship
        $stmt = $pdo->prepare("UPDATE scholarship SET 
                              semesterID = :semesterID, 
                              name = :name,
                              sector = :sector,
                              date_start = :date_start, 
                              date_end = :date_end,
                              description = :description, 
                              limitation = :limitation,
                              validity_period = :validity_period 
                              WHERE scholarshipID = :scholarshipID");
        
        $stmt->bindParam(":semesterID", $semester, PDO::PARAM_INT);
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->bindParam(":sector", $sector, PDO::PARAM_STR);
        $stmt->bindParam(":date_start", $date_start, PDO::PARAM_STR);
        $stmt->bindParam(":date_end", $date_end, PDO::PARAM_STR);
        $stmt->bindParam(':limitation', $limit, PDO::PARAM_INT);
        $stmt->bindParam(":description", $description, PDO::PARAM_STR);
        $stmt->bindParam(":validity_period", $validity_period);
        $stmt->bindParam(":scholarshipID", $edit_scholar, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            // Send notification for scholarship update
            send_scholarship_notification('update', $edit_scholar, 'The scholarship details have been updated. Please check the new information.');
            
            alert('success', 'Scholarship updated successfully', '', 'scholarships.php');
        } else {
            alert('error', 'Failed to update scholarship', 'Database error occurred', 'scholarships.php');
        }
    }
}


if (isset($_GET['daily_details'])) {
    $daily_details = $_GET['daily_details'];
    $stmt = $pdo->prepare("SELECT * FROM scholarship WHERE scholarshipID =:scholarshipID");
    $stmt->bindParam(":scholarshipID", $daily_details, PDO::PARAM_INT);
    $stmt->execute();
    $details = $stmt->fetch();

    $split = $pdo->prepare("SELECT ds.dailyscholarshipID, s.scholarID, ds.sectioned_date, ds.full_status, s.limitation, ds.limit_counter, ds.limits from daily_scholarship ds join scholarship s on s.scholarshipID = ds.scholarshipID WHERE ds.scholarshipID =:daily_details");
    $split->bindParam(":daily_details", $daily_details, PDO::PARAM_INT);
    $split->execute();
    $splitings = $split->fetchAll();


    $docs = $pdo->prepare(" SELECT * FROM scholarship_docs WHERE scholarship = :scholarship");
    $docs->bindParam(":scholarship", $daily_details, PDO::PARAM_INT);
    $docs->execute();
    $documents = $docs->fetchAll();
    $documents_count = $docs->rowCount();


}


if (isset($_POST['scholar_documents'])) {

    if ($_FILES['docs_files']['name'] != '') {
        $forms = $_FILES['docs_files']['name'];
    } else {
        $forms = $details['documents'];
    }
    $tempname1 = $_FILES['docs_files']['tmp_name'];
    $folder1 = "../assets/forms/" . $forms;

    $docs_name = $_POST['docs_name'];
    move_uploaded_file($tempname1, $folder1);
    $stmt = $pdo->prepare("INSERT INTO scholarship_docs(scholarship,document_name,document) VALUES(:scholarship, :document_name, :document)");
    $stmt->bindParam(":scholarship", $daily_details, PDO::PARAM_INT);
    $stmt->bindParam(":document_name", $docs_name, PDO::PARAM_STR);
    $stmt->bindParam(":document", $forms, PDO::PARAM_STR);
    if ($stmt->execute()) {
        alert('success', 'Document Added', '', "daily_scholarships.php?daily_details=$daily_details");
    } else {
        alert('error', 'Failed Processes', 'please try again', "daily_scholarships.php?daily_details=$daily_details");
    }
}



if (isset($_GET['delete_docs'])) {
    $deleteID = $_GET['delete_docs'];
    $retrive = $_GET['retrive'];
    $stmt = $pdo->prepare("DELETE FROM scholarship_docs WHERE docsID=:docsID");
    $stmt->bindParam(":docsID", $deleteID, PDO::PARAM_INT);
    if ($stmt->execute()) {
        alert('success', 'Document Deleted', 'scholarship deleted succesfully', "daily_scholarships.php?daily_details=$retrive");
    } else {
        alert('error', 'Failed Processes', 'please try again', "daily_scholarships.php?daily_details=$retrive");
    }
}


if (isset($_GET['split'])) {
    $split = $_GET['split'];

    // First, check if documents exist for this scholarship
    $checkDocs = $pdo->prepare("SELECT COUNT(*) as doc_count FROM scholarship_docs WHERE scholarship = :scholarshipID");
    $checkDocs->bindParam(":scholarshipID", $split, PDO::PARAM_INT);
    $checkDocs->execute();
    $docResult = $checkDocs->fetch();

    if ($docResult['doc_count'] == 0) {
        // No documents uploaded - show error and redirect back
        alert('error', 'Documents Required', 'Please upload at least one document requirement before deploying this scholarship', "daily_scholarships.php?daily_details=$split");
        exit;
    }

    // If documents exist, proceed with the deployment
    $stmt = $pdo->prepare("SELECT * FROM scholarship WHERE scholarshipID =:scholarshipID");
    $stmt->bindParam(":scholarshipID", $split, PDO::PARAM_INT);
    $stmt->execute();
    $details = $stmt->fetch();
    $date_start = $details['date_start'];
    $date_end = $details['date_end'];
    $limit = $details['limitation'];

    $start = new DateTime($date_start);
    $end = new DateTime($date_end);
    $end->modify('+1 day');
    $i = 0;
    while ($start < $end) {
        $i++;
        $current_date = $start->format('Y-m-d');
        $insert = $pdo->prepare("INSERT INTO daily_scholarship(scholarshipID,sectioned_date) VALUES(:scholarshipID,:sectioned_date)");
        $insert->bindParam(":scholarshipID", $split, PDO::PARAM_INT);
        $insert->bindParam(":sectioned_date", $current_date, PDO::PARAM_STR);
        $insert->execute();
        $start->modify('+1 day');
    }

    if ($stmt->execute()) {
        if ($i > $limit) {
            $limit_counter = $i / $limit;
        } else {
            $limit_counter = $limit / $i;
        }

        $update = $pdo->prepare("UPDATE daily_scholarship SET limits =:value WHERE scholarshipID =:scholarshipID");
        $update->bindParam(":scholarshipID", $split, PDO::PARAM_INT);
        $update->bindParam(":value", $limit_counter, PDO::PARAM_INT);
        if ($update->execute()) {
            $update1 = $pdo->prepare("UPDATE scholarship SET ctrl_status = 1 WHERE scholarshipID =:scholarshipID");
            $update1->bindParam(":scholarshipID", $split, PDO::PARAM_INT);
            if ($update1->execute()) {
                alert("success", "Deployed Successfully!! ", "", "daily_scholarships.php?daily_details=$split");
            } else {
                alert("error", "Failed Processes", "please try again", "daily_scholarships.php?daily_details=$split");
            }
        } else {
            alert("error", "Failed Processes", "please try again", "daily_scholarships.php?daily_details=$split");
        }
    } else {
        alert('error', 'Failed Processes', 'please try again', 'scholarships.php');
    }
}



if (isset($_GET['edit_semester'])) {
    $edit_semester = $_GET['edit_semester'];
    $stmt = $pdo->prepare("SELECT * FROM semester WHERE semesterID=:semesterID");
    $stmt->bindParam(":semesterID", $edit_semester, PDO::PARAM_INT);
    $stmt->execute();
    $details = $stmt->fetch();
}




if (isset($_POST['semestersection'])) {
    $semname = $_POST['semname'];
    $semstart = $_POST['semstart'];
    $semend = $_POST['semend'];
    if ($edit_semester == '') {
        $stmt = $pdo->prepare("INSERT INTO semester(sememestrName,date_start,date_end) VALUES(:sememestrName,:date_start,:date_end)");
        $stmt->bindParam(":sememestrName", $semname, PDO::PARAM_STR);
        $stmt->bindParam(":date_start", $semstart, PDO::PARAM_STR);
        $stmt->bindParam(":date_end", $semend, PDO::PARAM_STR);
        if ($stmt->execute()) {
            alert('success', 'Added Semester Successfully', '', 'semeters.php');
        } else {
            alert('error', 'Failed Processes', 'please try again', 'semeters.php');
        }
    } else {
        $stmt = $pdo->prepare("UPDATE semester SET sememestrName=:sememestrName, date_start=:date_start, date_end=:date_end WHERE semesterID=:semesterID");
        $stmt->bindParam(":sememestrName", $semname, PDO::PARAM_STR);
        $stmt->bindParam(":date_start", $semstart, PDO::PARAM_STR);
        $stmt->bindParam(":date_end", $semend, PDO::PARAM_STR);
        $stmt->bindParam(":semesterID", $edit_semester, PDO::PARAM_STR);
        if ($stmt->execute()) {
            alert('success', 'Updated Semester Successfully', '', 'semeters.php');
        } else {
            alert('error', 'Failed Processes', 'please try again', 'semeters.php');
        }
    }

}


if (isset($_GET['delete_semester'])) {
    $delete_semester = $_GET['delete_semester'];
    $detail = $_GET['detail'];
    $stmt = $pdo->prepare("DELETE FROM semester WHERE semesterID=:semesterID");
    $stmt->bindParam(":semesterID", $delete_semester, PDO::PARAM_INT);
    if ($stmt->execute()) {
        alert('success', 'Semeter Deleted Succesfully', '', "semeters.php");
    } else {
        alert('error', 'Failed Processes', 'please try again', "semeters.php");
    }
}

$setting = $pdo->prepare("SELECT * FROM settings WHERE settingsID = 1");
$setting->execute();
$settings = $setting->fetch();


$semdetail = $pdo->prepare("SELECT * FROM semester WHERE flag = 1");
$semdetail->execute();
$semdetails = $semdetail->fetch();


if (isset($_GET['activesemester'])) {
    $sem = $_GET['activesemester'];
    $stmt = $pdo->prepare("SELECT * FROM semester WHERE flag = 1");
    if ($stmt->execute()) {
        if ($stmt->rowCount() > 0) {
            $stmt2 = $pdo->prepare("UPDATE semester SET flag = 0 WHERE flag = 1");
            if ($stmt2->execute()) {
                $stmt3 = $pdo->prepare("UPDATE semester SET flag = 1 WHERE semesterID=:semesterID");
                $stmt3->bindParam(":semesterID", $sem, PDO::PARAM_INT);
                if ($stmt3->execute()) {
                    alert('success', 'Set Active semester', '', 'semeters.php');
                } else {
                    alert('error', 'Failed Processes', 'please try again', 'semeters.php');
                }
            }
        } else {
            $stmt3 = $pdo->prepare("UPDATE semester SET flag = 1 WHERE semesterID=:semesterID");
            $stmt3->bindParam(":semesterID", $sem, PDO::PARAM_INT);
            if ($stmt3->execute()) {
                alert('success', 'Set Active semester', '', 'semeters.php');
            } else {
                alert('error', 'Failed Processes', 'please try again', 'semeters.php');
            }
        }
    }

}


if (isset($_POST['syssetting'])) {

    if ($_FILES['logos']['name'] != '') {
        $logos = $_FILES['logos']['name'];
    } else {
        $logos = $settings['Logo'];
    }
    $tempname1 = $_FILES['logos']['tmp_name'];
    $folder1 = "../assets/images/logo/" . $logos;


    if (empty($_POST['sysname'])) {
        $errors['sysname'] = "Please provide system name";
    } else {
        $sysname = $_POST['sysname'];
    }
    if (empty($_POST['sysemail'])) {
        $errors['sysemail'] = "Please provide system email";
    } else {
        $sysemail = $_POST['sysemail'];
    }
    if (empty($_POST['sysnumber'])) {
        $errors['sysnumber'] = "Please provide system name";
    } else {
        $sysnumber = $_POST['sysnumber'];
    }
    if (empty($_POST['sysaddress'])) {
        $errors['sysaddress'] = "Please provide system address";
    } else {
        $sysaddress = $_POST['sysaddress'];
    }

    if (empty($_POST['syscolor'])) {
        $errors['syscolor'] = "Please provide system color";
    } else {
        $syscolor = $_POST['syscolor'];
    }
    if (empty($_POST['textcolor'])) {
        $errors['textcolor'] = "Please provide text color";
    } else {
        $textcolor = $_POST['textcolor'];
    }

    if (empty($_POST['sysdescription'])) {
        $errors['sysdescription'] = "Please provide system description";
    } else {
        $sysdescription = $_POST['sysdescription'];
    }

    if (empty($_POST['sysabbre'])) {
        $errors['sysabbre'] = "Please provide Abbreviation";
    } else {
        $sysabbre = $_POST['sysabbre'];
    }

    if (empty($_POST['hero_title'])) {
        $errors['hero_title'] = "Please provide hero title";
    } else {
        $hero_title = $_POST['hero_title'];
    }

    if (empty($_POST['hero_subtitle'])) {
        $errors['hero_subtitle'] = "Please provide hero subtitle";
    } else {
        $hero_subtitle = $_POST['hero_subtitle'];
    }

    if (empty($_POST['navbar_color'])) {
        $errors['navbar_color'] = "Please provide navbar color";
    } else {
        $navbar_color = $_POST['navbar_color'];
    }

    if (empty($_POST['navbar_font_color'])) {
        $errors['navbar_font_color'] = "Please provide navbar font color";
    } else {
        $navbar_font_color = $_POST['navbar_font_color'];
    }


    if (count($errors) === 0) {
        move_uploaded_file($tempname1, $folder1);
        $stmt = $pdo->prepare("UPDATE settings SET Logo=:Logo, Name=:Name, email=:email, contact=:contact, address=:address, color=:color, description=:description, text_color=:text_color, abbreviation=:abbreviation, hero_title=:hero_title, hero_subtitle=:hero_subtitle, navbar_color=:navbar_color, navbar_font_color=:navbar_font_color WHERE settingsID = 1");

        $stmt->bindParam(":Logo", $logos, PDO::PARAM_STR);
        $stmt->bindParam(":Name", $sysname, PDO::PARAM_STR);
        $stmt->bindParam(":email", $sysemail, PDO::PARAM_STR);
        $stmt->bindParam(":contact", $sysnumber, PDO::PARAM_STR);
        $stmt->bindParam(":description", $sysdescription, PDO::PARAM_STR);
        $stmt->bindParam(":address", $sysaddress, PDO::PARAM_STR);
        $stmt->bindParam(":color", $syscolor, PDO::PARAM_STR);
        $stmt->bindParam(":text_color", $textcolor, PDO::PARAM_STR);
        $stmt->bindParam(":abbreviation", $sysabbre, PDO::PARAM_STR);
        $stmt->bindParam(":hero_title", $hero_title, PDO::PARAM_STR);
        $stmt->bindParam(":hero_subtitle", $hero_subtitle, PDO::PARAM_STR);
        $stmt->bindParam(":navbar_color", $navbar_color, PDO::PARAM_STR);
        $stmt->bindParam(":navbar_font_color", $navbar_font_color, PDO::PARAM_STR);


        if ($stmt->execute()) {
            alert('success', 'Updated System Successfully', 'The system details is now updated in all parts of the system', 'settings.php');
        } else {
            alert('error', 'Failed Processes', 'please try again', 'settings.php');
        }

    }

}

if (isset($_GET['view_scholarship'])) {
    $view_scholarship = $_GET['view_scholarship'];
    $list = $pdo->prepare("SELECT sc.name, sc.date_start, sc.reinburment, sc.scholarshipID, sc.date_end, sc.description, sc.limitation, sc.scholarID,sm.sememestrName FROM scholarship sc JOIN semester sm ON sm.semesterID = sc.semesterID WHERE sc.scholarID =:scholarID ");
    $list->bindParam(":scholarID", $view_scholarship, PDO::PARAM_STR);
    $list->execute();
    $scholar_list = $list->fetch();
    $scholar_id = $scholar_list['scholarshipID'];

    $dailylist = $pdo->prepare("SELECT * FROm daily_scholarship WHERE scholarshipID=:scholarshipID AND sectioned_date >='$current_date'");
    $dailylist->bindParam(":scholarshipID", $scholar_id, PDO::PARAM_INT);
    $dailylist->execute();
    $dailylists = $dailylist->fetchAll();

    $docs = $pdo->prepare(" SELECT * FROM scholarship_docs WHERE scholarship = :scholarship");
    $docs->bindParam(":scholarship", $scholar_id, PDO::PARAM_INT);
    $docs->execute();
    $documents = $docs->fetchAll();
    $documents_count = $docs->rowCount();

}


if (isset($_GET['apply'])) {
    $apply = $_GET['apply'];
    
    // First check if already applied for this specific scholarship
    $stmt = $pdo->prepare("SELECT * FROM scholarship_applications WHERE dailyscholarshipID=:dailyscholarshipID AND userID=:userID");
    $stmt->bindParam(":dailyscholarshipID", $apply, PDO::PARAM_INT);
    $stmt->bindParam(":userID", $id, PDO::PARAM_INT);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        alert('error', 'Application already saved', 'You can only apply once for this scholarship', "index.php");
    } else {
        // Get the sector of the scholarship being applied for
        $sectorCheck = $pdo->prepare("
            SELECT s.sector 
            FROM daily_scholarship ds
            JOIN scholarship s ON s.scholarshipID = ds.scholarshipID 
            WHERE ds.dailyscholarshipID = :dailyscholarshipID
        ");
        $sectorCheck->bindParam(":dailyscholarshipID", $apply, PDO::PARAM_INT);
        $sectorCheck->execute();
        $scholarshipSector = $sectorCheck->fetch()['sector'];

        // Check if already approved for any scholarship in this sector
        $sectorApprovalCheck = $pdo->prepare("
            SELECT sa.* 
            FROM scholarship_applications sa
            JOIN daily_scholarship ds ON ds.dailyscholarshipID = sa.dailyscholarshipID
            JOIN scholarship s ON s.scholarshipID = ds.scholarshipID
            WHERE sa.userID = :userID 
            AND s.sector = :sector 
            AND sa.application_status = 1
        ");
        $sectorApprovalCheck->bindParam(":userID", $id, PDO::PARAM_INT);
        $sectorApprovalCheck->bindParam(":sector", $scholarshipSector, PDO::PARAM_STR);
        $sectorApprovalCheck->execute();

        if ($sectorApprovalCheck->rowCount() > 0) {
            alert('error', 'Sector Restriction', 'You already have an approved scholarship in the ' . $scholarshipSector . ' sector', "index.php");
        } else {
            // Proceed with existing application logic
            do {
                $ref_id = "SCHOLAR" . rand(1111, 9999) . "REF" . rand(1111, 9999);
                $scholar_refid = $pdo->prepare("SELECT scholarship_refences FROM scholarship_applications WHERE scholarship_refences=:scholarship_refences");
                $scholar_refid->bindParam(':scholarship_refences', $ref_id, PDO::PARAM_STR);
                $scholar_refid->execute();
            } while ($scholar_refid->rowCount() > 0);

            $stmt3 = $pdo->prepare("INSERT INTO scholarship_applications(dailyscholarshipID,userID,scholarship_refences) VALUE(:dailyscholarshipID,:userID,:scholarship_refences)");
            $stmt3->bindParam(":dailyscholarshipID", $apply, PDO::PARAM_INT);
            $stmt3->bindParam(':scholarship_refences', $ref_id, PDO::PARAM_STR);
            $stmt3->bindParam(":userID", $id, PDO::PARAM_INT);
            
            if ($stmt3->execute()) {
                alert('success', 'Application Saved', 'Please add your scholarship requirements', "myscholarlist.php");
            } else {
                alert('error', 'Failed Process', 'Please try again', 'index.php');
            }
        }
    }
}




if (isset($_GET['approve_scholar'])) {
    $approve_scholar = $_GET['approve_scholar'];

    try {
        $pdo->beginTransaction();

        // Get application and user details
        $stmt = $pdo->prepare("
            SELECT sa.userID, sa.dailyscholarshipID, ds.limits, ds.limit_counter, u.email 
            FROM scholarship_applications sa
            JOIN daily_scholarship ds ON sa.dailyscholarshipID = ds.dailyscholarshipID
            JOIN users u ON sa.userID = u.userID
            WHERE sa.applicationsID = :applicationsID
        ");
        $stmt->bindParam(":applicationsID", $approve_scholar, PDO::PARAM_INT);
        $stmt->execute();
        $application = $stmt->fetch();

        // Check if slots are full
        if ($application['limit_counter'] >= $application['limits']) {
            // Mark application as denied
            $stmt = $pdo->prepare("UPDATE scholarship_applications SET application_status = 2 WHERE applicationsID = :applicationsID");
            $stmt->bindParam(":applicationsID", $approve_scholar, PDO::PARAM_INT);
            $stmt->execute();

            // Update scholarship status to full
            $stmt = $pdo->prepare("UPDATE daily_scholarship SET full_status = 1 WHERE dailyscholarshipID = :dailyscholarshipID");
            $stmt->bindParam(":dailyscholarshipID", $application['dailyscholarshipID'], PDO::PARAM_INT);
            $stmt->execute();

            $pdo->commit();
            alert('error', 'Scholarship is on Limit', 'please be advice to apply for another appointment', "non_applications.php");

        } else {
            // Approve application
            $stmt = $pdo->prepare("UPDATE scholarship_applications SET application_status = 1 WHERE applicationsID = :applicationsID");
            $stmt->bindParam(":applicationsID", $approve_scholar, PDO::PARAM_INT);
            $stmt->execute();

            // Increment counter
            $stmt = $pdo->prepare("UPDATE daily_scholarship SET limit_counter = limit_counter + 1 WHERE dailyscholarshipID = :dailyscholarshipID");
            $stmt->bindParam(":dailyscholarshipID", $application['dailyscholarshipID'], PDO::PARAM_INT);
            $stmt->execute();

            // Check if this approval fills the slots
            if ($application['limit_counter'] + 1 >= $application['limits']) {
                $stmt = $pdo->prepare("UPDATE daily_scholarship SET full_status = 1 WHERE dailyscholarshipID = :dailyscholarshipID");
                $stmt->bindParam(":dailyscholarshipID", $application['dailyscholarshipID'], PDO::PARAM_INT);
                $stmt->execute();

                $pdo->commit();
                alert('success', 'Application Approved', 'This will be the last application for this day.', "approved_applications.php");
            } else {
                $pdo->commit();
                alert('success', 'Application Approved', '', "approved_applications.php");
            }
        }


    } catch (Exception $e) {
        $pdo->rollBack();
        alert('error', 'Failed Processes', 'please try again', 'applications.php');
    }
}




if (isset($_GET['denied_scholar'])) {
    $denied_scholar = $_GET['denied_scholar'];
    $getacc = $pdo->prepare("SELECT userID FROM scholarship_applications WHERE applicationsID =:applicationsID");
    $getacc->bindParam(":applicationsID", $denied_scholar, PDO::PARAM_INT);
    if ($getacc->execute()) {
        $account_details = $getacc->fetch();
        $userid = $account_details['userID'];
        $user_detail = $pdo->prepare("SELECT email FROM users WHERE userID=:userID");
        $user_detail->bindParam(":userID", $userid, PDO::PARAM_INT);
        $user_detail->execute();
        $account_email = $user_detail->fetch();
        //email sends
        $stmt = $pdo->prepare("UPDATE scholarship_applications SET application_status = 2 WHERE applicationsID =:applicationsID");
        $stmt->bindParam(":applicationsID", $denied_scholar, PDO::PARAM_INT);
        if ($stmt->execute()) {
            alert('success', 'Application Denied', '', "non_applications.php");
        } else {
            alert('error', 'Failed Processes', 'please try again', 'applications.php');
        }
    } else {
        alert('error', 'Failed Processes', 'please try again', 'applications.php');
    }

}

if (isset($_GET['view_applications'])) {
    $view_applications = $_GET['view_applications'];
    $stmt = $pdo->prepare("SELECT scholarship.name, scholarship.scholarshipID, scholarship.scholarID, daily_scholarship.sectioned_date, scholarship_applications.date_apply, scholarship_applications.application_status, scholarship_applications.scholarship_refences, scholarship_applications.denial_feedback FROM scholarship_applications JOIN daily_scholarship ON scholarship_applications.dailyscholarshipID = daily_scholarship.dailyscholarshipID JOIN scholarship ON scholarship.scholarshipID = daily_scholarship.scholarshipID WHERE scholarship_applications.applicationsID =:applicationsID AND scholarship_applications.userID =:userID");
    $stmt->bindParam(":applicationsID", $view_applications, PDO::PARAM_INT);
    $stmt->bindParam(":userID", $id, PDO::PARAM_INT);
    $stmt->execute();
    $details = $stmt->fetch();

    $daily_details = $details['scholarshipID'];
    $applicationsID = $details['applicationsID'];
    $docs = $pdo->prepare(" SELECT * FROM scholarship_docs WHERE scholarship = :scholarship");
    $docs->bindParam(":scholarship", $daily_details, PDO::PARAM_INT);
    $docs->execute();
    $documents = $docs->fetchAll();
    $documents_count = $docs->rowCount();


    $mydocs = $pdo->prepare("SELECT * FROM scholarshipapplications_docs WHERE applicationsID =:applicationsID");
    $mydocs->bindParam(":applicationsID", $view_applications, PDO::PARAM_INT);
    $mydocs->execute();
    $mydocuments = $mydocs->fetchAll();
    $mydocuments_count = $mydocs->rowCount();






}



if (isset($_POST['submit_document'])) {
    if ($_FILES['document_file']['name'] != '') {
        $document = $_FILES['document_file']['name'];
        $tempname = $_FILES['document_file']['tmp_name'];
        $folder = "../assets/forms/" . $document;
        
        move_uploaded_file($tempname, $folder);
        
        $stmt = $pdo->prepare("INSERT INTO scholarshipapplications_docs(applicationsID, document_name, document_file) VALUES(:applicationsID, :document_name, :document_file)");
        $stmt->bindParam(":applicationsID", $view_applications, PDO::PARAM_INT);
        $stmt->bindParam(":document_name", $document, PDO::PARAM_STR);
        $stmt->bindParam(":document_file", $document, PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            alert('success', 'Document Uploaded', 'Your document has been submitted successfully', "myscholarlist_details.php?view_applications=$view_applications");
        } else {
            alert('error', 'Upload Failed', 'Please try again', "myscholarlist_details.php?view_applications=$view_applications");
        }
    }
}







if (isset($_GET['delete_mydocs'])) {
    $delete_mydocs = $_GET['delete_mydocs'];
    $detail = $_GET['detail'];
    $stmt = $pdo->prepare("DELETE FROM scholarshipapplications_docs WHERE socdocsID=:socdocsID");
    $stmt->bindParam(":socdocsID", $delete_mydocs, PDO::PARAM_INT);
    if ($stmt->execute()) {
        alert('success', 'Document Deleted', 'scholarship deleted succesfully', "myscholarlist_details.php?view_applications=$detail");
    } else {
        alert('error', 'Failed Processes', 'please try again', "myscholarlist_details.php?view_applications=$detail");
    }
}


if (isset($_GET['view_admission'])) {
    $view_admission = $_GET['view_admission'];
    $stmt = $pdo->prepare("SELECT CONCAT(users.first_name,' ',users.last_name) username, users.email, users.profile, users.contact, users.studentID, users.cor, users.address, scholarship.name, scholarship.scholarID,scholarship.scholarshipID, scholarship.description, daily_scholarship.sectioned_date, scholarship_applications.date_apply,scholarship_applications.applicationsID, scholarship_applications.scholarship_refences, scholarship_applications.application_status FROM  scholarship_applications JOIN daily_scholarship ON daily_scholarship.dailyscholarshipID = scholarship_applications.dailyscholarshipID JOIN scholarship ON scholarship.scholarshipID = daily_scholarship.scholarshipID JOIN users on scholarship_applications.userID = users.userID WHERE scholarship_applications.scholarship_refences =:scholarship_refences");
    $stmt->bindParam(":scholarship_refences", $view_admission, PDO::PARAM_STR);
    $stmt->execute();
    $scholar = $stmt->fetch();

    $daily_details = $scholar['scholarshipID'];
    $applicationsID = $scholar['applicationsID'];
    $docs = $pdo->prepare(" SELECT * FROM scholarship_docs WHERE scholarship = :scholarship");
    $docs->bindParam(":scholarship", $daily_details, PDO::PARAM_INT);
    $docs->execute();
    $documents = $docs->fetchAll();
    $documents_count = $docs->rowCount();


    $mydocs = $pdo->prepare("SELECT * FROM scholarshipapplications_docs WHERE applicationsID =:applicationsID");
    $mydocs->bindParam(":applicationsID", $applicationsID, PDO::PARAM_INT);
    $mydocs->execute();
    $mydocuments = $mydocs->fetchAll();
    $mydocuments_count = $mydocs->rowCount();

}




if (isset($_GET['view_details'])) {
    $view_admission = $_GET['view_details'];
    $stmt = $pdo->prepare("SELECT CONCAT(users.first_name,' ',users.last_name) username, users.email, users.profile, users.contact, users.studentID, users.cor, users.address, scholarship.name, scholarship.scholarID,scholarship.scholarshipID, scholarship.description, daily_scholarship.sectioned_date, scholarship_applications.date_apply,scholarship_applications.applicationsID, scholarship_applications.scholarship_refences, scholarship_applications.application_status FROM  scholarship_applications JOIN daily_scholarship ON daily_scholarship.dailyscholarshipID = scholarship_applications.dailyscholarshipID JOIN scholarship ON scholarship.scholarshipID = daily_scholarship.scholarshipID JOIN users on scholarship_applications.userID = users.userID WHERE scholarship_applications.scholarship_refences =:scholarship_refences");
    $stmt->bindParam(":scholarship_refences", $view_admission, PDO::PARAM_STR);
    $stmt->execute();
    $scholar = $stmt->fetch();

    $daily_details = $scholar['scholarshipID'];
    $applicationsID = $scholar['applicationsID'];
    $docs = $pdo->prepare(" SELECT * FROM scholarship_docs WHERE scholarship = :scholarship");
    $docs->bindParam(":scholarship", $daily_details, PDO::PARAM_INT);
    $docs->execute();
    $documents = $docs->fetchAll();
    $documents_count = $docs->rowCount();


    $mydocs = $pdo->prepare("SELECT * FROM scholarshipapplications_docs WHERE applicationsID =:applicationsID");
    $mydocs->bindParam(":applicationsID", $applicationsID, PDO::PARAM_INT);
    $mydocs->execute();
    $mydocuments = $mydocs->fetchAll();
    $mydocuments_count = $mydocs->rowCount();

}




if (isset($_GET['approved_scholar'])) {
    $approved_scholar = $_GET['approved_scholar'];
    $stmt = $pdo->prepare("SELECT scholarship.name, scholarship.scholarID, CONCAT(users.first_name,' ',users.last_name) as username, users.userID, daily_scholarship.sectioned_date, scholarship_applications.date_apply, scholarship_applications.application_status, scholarship_applications.scholarship_refences FROM scholarship_applications JOIN users ON scholarship_applications.userID = users.userID JOIN daily_scholarship ON daily_scholarship.dailyscholarshipID = scholarship_applications.dailyscholarshipID JOIN scholarship ON scholarship.scholarshipID = daily_scholarship.scholarshipID WHERE daily_scholarship.dailyscholarshipID = :approved_scholar AND scholarship_applications.application_status = 1");
    $stmt->bindParam(":approved_scholar", $approved_scholar, PDO::PARAM_INT);
    $stmt->execute();
    $approve_list = $stmt->fetchAll();
    $approve_list_count = $stmt->rowCount();

    $stmt2 = $pdo->prepare("SELECT s.name, s.scholarID, s.date_start, s.date_end, ds.sectioned_date, ds.limits FROM daily_scholarship ds JOIN scholarship s ON s.scholarshipID = ds.scholarshipID WHERE ds.dailyscholarshipID =:dailyscholarshipID ;");
    $stmt2->bindParam(":dailyscholarshipID", $approved_scholar, PDO::PARAM_INT);
    $stmt2->execute();
    $details = $stmt2->fetch();


}




if (isset($_POST['adminsignup'])) {
    try {
        $studentID = $_POST['studentid'];
        $first = $_POST['first'];
        $last = $_POST['last'];
        $number = $_POST['number'];
        $email = $_POST['email'];
        $admintype = $_POST['admintype'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        if ($password !== $cpassword) {
            $errors['password'] = "Confirm password not matched!";
        }

        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email OR studentID =:studentID");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':studentID', $studentID);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $errors['email'] = "Email or Student ID is used already, please try again";
        }




        if (count($errors) === 0) {
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $code = rand(999999, 111111);
            $status = "notverified";


            $stmt = $pdo->prepare("INSERT INTO users (studentID, email, first_name, last_name, password, code, status,roles) VALUES (:studentID, :email, :first_name, :last_name, :password, :code, :status,:roles)");
            $stmt->bindParam(':studentID', $studentID);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':first_name', $first);
            $stmt->bindParam(':last_name', $last);
            $stmt->bindParam(':password', $encpass);
            $stmt->bindParam(':code', $code);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':roles', $admintype);

            if ($stmt->execute()) {
                $subject = "Account Registration";
                $message = "Hi Good Day " . $fname . " " . $lname . ". Your account has been created by the Master administrator and
                here is your credentials.<br><br>

                OTP:  " . $code . "<br>
              
                Email: " . $email . ".<br>Password: " . $password . "<br> For More information , please log in <a href='http://localhost/Barangay/login.php'>Here</a>.";

                adminemails($email, $subject, $message);

            } else {
                $errors['db-error'] = "Failed while inserting data into database!";
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

if (isset($_GET['editpub'])) {
    $editpub = $_GET['editpub'];
    $stmt = $pdo->prepare("SELECT * FROM publications WHERE pubID=:pubID");
    $stmt->bindParam(":pubID", $editpub, PDO::PARAM_INT);
    $stmt->execute();
    $details = $stmt->fetch();
}

if (isset($_POST['publications'])) {

    if ($_FILES['pubbanner']['name'] != '') {
        $pubbanner = $_FILES['pubbanner']['name'];
    } else {
        $pubbanner = $details['banner'];
    }
    $tempname1 = $_FILES['pubbanner']['tmp_name'];
    $folder1 = "../assets/images/pubmat/" . $pubbanner;


    if (empty($_POST['pubtitle'])) {
        $errors['pubtitle'] = "Please provide title";
    } else {
        $pubtitle = $_POST['pubtitle'];
    }

    if (empty($_POST['pubdesc'])) {
        $errors['pubdesc'] = "Please provide description";
    } else {
        $pubdesc = $_POST['pubdesc'];
    }

    if (count($errors) === 0) {
        if ($editpub == "") {
            move_uploaded_file($tempname1, $folder1);
            $stmt = $pdo->prepare("INSERT INTO publications(banner, titles, description) VALUES(:banner, :titles, :description)");
            $stmt->bindParam(":banner", $pubbanner, PDO::PARAM_STR);
            $stmt->bindParam(":titles", $pubtitle, PDO::PARAM_STR);
            $stmt->bindParam(":description", $pubdesc, PDO::PARAM_STR);
            if ($stmt->execute()) {
                alert('success', 'Publications Added Succesfully', '', "publications.php");
            } else {
                alert('error', 'Failed Processes', 'please try again', "publications.php");
            }
        } else {
            move_uploaded_file($tempname1, $folder1);
            $stmt1 = $pdo->prepare("UPDATE publications SET banner=:banner, titles=:titles, description=:description WHERE pubID=:pubID");
            $stmt1->bindParam(":banner", $pubbanner, PDO::PARAM_STR);
            $stmt1->bindParam(":titles", $pubtitle, PDO::PARAM_STR);
            $stmt1->bindParam(":description", $pubdesc, PDO::PARAM_STR);
            $stmt1->bindParam(":pubID", $editpub, PDO::PARAM_INT);
            if ($stmt1->execute()) {
                alert('success', 'Publications Edited Succesfully', '', "publications.php");
            } else {
                alert('error', 'Failed Processes', 'please try again', "publications.php");
            }
        }
    }
}


if (isset($_GET['delpub'])) {
    $delpub = $_GET['delpub'];
    $stmt = $pdo->prepare("DELETE FROM publications WHERE pubID=:pubID");
    $stmt->bindParam(":pubID", $delpub, PDO::PARAM_INT);
    if ($stmt->execute()) {
        alert('success', 'Publications Deleted Succesfully', '', "publications.php");
    } else {
        alert('error', 'Failed Processes', 'please try again', "publications.php");
    }
}

if (isset($_GET['vsi'])) {
    $stmt = $pdo->prepare("SELECT * FROM buletin WHERE buletID =1");
    $stmt->execute();
    $det = $stmt->fetch();
    $bol = $det['visiblity'];
    if ($bol == 1) {
        $stmt1 = $pdo->prepare("UPDATE buletin SET visiblity = 0 WHERE buletID = 1");
        if ($stmt1->execute()) {
            alert('success', 'Hide Alert', '', "bulletin.php");
        } else {
            alert('error', 'Failed Processes', 'please try again', "bulletin.php");
        }
    } else {
        $stmt2 = $pdo->prepare("UPDATE buletin SET visiblity = 1 WHERE buletID = 1");
        if ($stmt2->execute()) {
            alert('success', 'Published Alert', '', "bulletin.php");
        } else {
            alert('error', 'Failed Processes', 'please try again', "bulletin.php");
        }
    }

}


if (isset($_POST['buletlet'])) {
    $buletcontecnt = $_POST['buletcontecnt'];
    $altype = $_POST['altype'];

    $stmt = $pdo->prepare("INSERT INTO buletin (descriptions, type, visiblity) VALUES (:descriptions, :type, 1)");
    $stmt->bindParam(":descriptions", $buletcontecnt, PDO::PARAM_STR);
    $stmt->bindParam(":type", $altype, PDO::PARAM_STR);

    if ($stmt->execute()) {
        alert('success', 'Bulletin Posted Successfully', '', "bulletin.php");
    } else {
        alert('error', 'Failed to Post', 'please try again', "bulletin.php");
    }
}


$unverifyed = $pdo->prepare("SELECT * FROM users WHERE roles = 3 AND account_verifyer = 0 AND status = 'verified'");
$unverifyed->execute();
$user_uncheck = $unverifyed->fetchAll();
$user_uncheck_count = $unverifyed->rowCount();

$pub = $pdo->prepare("SELECT * FROM publications");
$pub->execute();
$publications = $pub->fetchAll();


$bul = $pdo->prepare("SELECT * FROM buletin ORDER BY buletID DESC");
$bul->execute();
$bulletins = $bul->fetchAll();




$verified = $pdo->prepare("SELECT * FROM users WHERE roles = 3 AND status = 'verified'");
$verified->execute();
$user_check = $verified->fetchAll();
$user_check_count = $verified->rowCount();


$activesem = $semdetails['semesterID'];
$schol = $pdo->prepare("SELECT s.scholarshipID,s.semesterID, s.ctrl_status,  s.name, s.scholarID, s.date_start, s.date_end FROM scholarship s join semester sm on sm.semesterID = s.semesterID ORDER BY sm.flag DESC");
$schol->execute();
$scholarships = $schol->fetchAll();
$scholarships_count = $schol->rowCount();


$latest = $pdo->prepare("SELECT ds.dailyscholarshipID, s.name,  s.scholarID, ds.sectioned_date, s.limitation, ds.limit_counter, ds.limits FROM daily_scholarship ds JOIN scholarship s ON s.scholarshipID = ds.scholarshipID join semester sm on s.semesterID = sm.semesterID WHERE sm.flag= 1 AND ds.sectioned_date LIKE :datenow");
$date_with_wildcard = "%$current_date%";
$latest->bindParam(":datenow", $date_with_wildcard, PDO::PARAM_STR);
$latest->execute();
$scholarship_latest = $latest->fetchAll();
$scholarshipss_count = $latest->rowCount();


$sem = $pdo->prepare("SELECT * FROM semester");
$sem->execute();
$semesters = $sem->fetchAll();
$semesters_count = $sem->rowCount();


$scholarz = $pdo->prepare("SELECT s.name, s.scholarID FROM scholarship s join semester sm on sm.semesterID = s.semesterID WHERE sm.flag =1 AND s.ctrl_status = 1");
$scholarz->execute();
$scholarships_offer = $scholarz->fetchAll();
$scholarships_offer_count = $scholarz->rowCount();


$mylist = $pdo->prepare("
    SELECT 
        s.name,
        s.scholarID,
        s.validity_period,
        ds.sectioned_date,
        sa.date_apply,
        sa.applicationsID,
        sa.application_status,
        sa.scholarship_refences,
        sa.claimed
    FROM scholarship_applications sa
    JOIN daily_scholarship ds ON ds.dailyscholarshipID = sa.dailyscholarshipID 
    JOIN scholarship s ON s.scholarshipID = ds.scholarshipID
    WHERE sa.userID = :userID
    ORDER BY sa.date_apply DESC
");




$mylist->bindParam(':userID', $fetch_info['userID']);
$mylist->execute();
$mylist = $mylist->fetchAll();




if (isset($_GET['scholars'])) {
    $scholars = $_GET['scholars'];



    $scdet = $pdo->prepare("SELECT s.name, s.scholarID, ds.sectioned_date, ds.limit_counter, ds.full_status, ds.limits from daily_scholarship ds join scholarship s on ds.scholarshipID = s.scholarshipID WHERE ds.dailyscholarshipID =:dailyscholarshipID ");
    $scdet->bindParam(":dailyscholarshipID", $scholars, PDO::PARAM_INT);
    $scdet->execute();
    $details = $scdet->fetch();


    $list_scholar = $pdo->prepare("SELECT CONCAT(users.first_name,' ',users.last_name) username, users.email, users.profile, users.contact, users.studentID, users.cor, users.address, scholarship.name, scholarship.scholarID, scholarship.description, daily_scholarship.sectioned_date, scholarship_applications.date_apply,scholarship_applications.applicationsID, scholarship_applications.scholarship_refences, scholarship_applications.application_status FROM  scholarship_applications JOIN daily_scholarship ON daily_scholarship.dailyscholarshipID = scholarship_applications.dailyscholarshipID JOIN scholarship ON scholarship.scholarshipID = daily_scholarship.scholarshipID JOIN users on scholarship_applications.userID = users.userID WHERE scholarship_applications.application_status = 0 AND daily_scholarship.dailyscholarshipID=:dailyscholarshipID");
    $list_scholar->bindParam(":dailyscholarshipID", $scholars, PDO::PARAM_INT);
    $list_scholar->execute();
    $scholar_admission = $list_scholar->fetchAll();


    $list_scholar_approved = $pdo->prepare("SELECT CONCAT(users.first_name,' ',users.last_name) username, users.email, users.profile, users.contact, users.studentID, users.cor, users.address, scholarship.name, scholarship.scholarID, scholarship.description, daily_scholarship.sectioned_date, scholarship_applications.date_apply,scholarship_applications.applicationsID, scholarship_applications.scholarship_refences, scholarship_applications.application_status FROM  scholarship_applications JOIN daily_scholarship ON daily_scholarship.dailyscholarshipID = scholarship_applications.dailyscholarshipID JOIN scholarship ON scholarship.scholarshipID = daily_scholarship.scholarshipID JOIN users on scholarship_applications.userID = users.userID WHERE scholarship_applications.application_status = 1 AND daily_scholarship.dailyscholarshipID=:dailyscholarshipID");
    $list_scholar_approved->bindParam(":dailyscholarshipID", $scholars, PDO::PARAM_INT);
    $list_scholar_approved->execute();
    $scholar_approve = $list_scholar_approved->fetchAll();

    $list_scholar_non = $pdo->prepare("SELECT CONCAT(users.first_name,' ',users.last_name) username, users.email, users.profile, users.contact, users.studentID, users.cor, users.address, scholarship.name, scholarship.scholarID, scholarship.description, daily_scholarship.sectioned_date, scholarship_applications.date_apply,scholarship_applications.applicationsID, scholarship_applications.scholarship_refences, scholarship_applications.application_status FROM  scholarship_applications JOIN daily_scholarship ON daily_scholarship.dailyscholarshipID = scholarship_applications.dailyscholarshipID JOIN scholarship ON scholarship.scholarshipID = daily_scholarship.scholarshipID JOIN users on scholarship_applications.userID = users.userID WHERE scholarship_applications.application_status = 2 AND daily_scholarship.dailyscholarshipID=:dailyscholarshipID");
    $list_scholar_non->bindParam(":dailyscholarshipID", $scholars, PDO::PARAM_INT);
    $list_scholar_non->execute();
    $scholar_non = $list_scholar_non->fetchAll();

}



$list_scholar = $pdo->prepare("SELECT CONCAT(users.first_name,' ',users.last_name) username, users.email, users.profile, users.contact, users.studentID, users.cor, users.address, scholarship.name, scholarship.scholarID, scholarship.description, daily_scholarship.sectioned_date, scholarship_applications.date_apply,scholarship_applications.applicationsID, scholarship_applications.scholarship_refences, scholarship_applications.application_status FROM  scholarship_applications JOIN daily_scholarship ON daily_scholarship.dailyscholarshipID = scholarship_applications.dailyscholarshipID JOIN scholarship ON scholarship.scholarshipID = daily_scholarship.scholarshipID JOIN users on scholarship_applications.userID = users.userID WHERE scholarship_applications.application_status = 0");
$list_scholar->execute();
$listscholar = $list_scholar->fetchAll();


$list_scholar_approved = $pdo->prepare("SELECT CONCAT(users.first_name,' ',users.last_name) username, users.email, users.profile, users.contact, users.studentID, users.cor, users.address, scholarship.name, scholarship.scholarID, scholarship.description, daily_scholarship.sectioned_date, scholarship_applications.date_apply,scholarship_applications.applicationsID, scholarship_applications.scholarship_refences, scholarship_applications.application_status FROM  scholarship_applications JOIN daily_scholarship ON daily_scholarship.dailyscholarshipID = scholarship_applications.dailyscholarshipID JOIN scholarship ON scholarship.scholarshipID = daily_scholarship.scholarshipID JOIN users on scholarship_applications.userID = users.userID WHERE scholarship_applications.application_status = 1");
$list_scholar_approved->execute();
$listscholar_approved = $list_scholar_approved->fetchAll();

$list_scholar_non = $pdo->prepare("SELECT CONCAT(users.first_name,' ',users.last_name) username, users.email, users.profile, users.contact, users.studentID, users.cor, users.address, scholarship.name, scholarship.scholarID, scholarship.description, daily_scholarship.sectioned_date, scholarship_applications.date_apply,scholarship_applications.applicationsID, scholarship_applications.scholarship_refences, scholarship_applications.application_status FROM  scholarship_applications JOIN daily_scholarship ON daily_scholarship.dailyscholarshipID = scholarship_applications.dailyscholarshipID JOIN scholarship ON scholarship.scholarshipID = daily_scholarship.scholarshipID JOIN users on scholarship_applications.userID = users.userID WHERE scholarship_applications.application_status = 2");
$list_scholar_non->execute();
$listscholar_non = $list_scholar_non->fetchAll();

$list_sem_scho = $pdo->prepare("SELECT s.name, s.scholarID, ds.dailyscholarshipID, ds.sectioned_date, ds.limit_counter, ds.full_status, ds.limits from daily_scholarship ds join scholarship s on s.scholarshipID = ds.scholarshipID WHERE s.semesterID =:semesterID AND ds.sectioned_date = '$current_date'");
$list_sem_scho->bindParam(":semesterID", $activesem, PDO::PARAM_INT);
$list_sem_scho->execute();
$semester_scholar = $list_sem_scho->fetchAll();
$semester_scholar_count = $list_sem_scho->rowCount();


$admin_list = $pdo->prepare("SELECT * FROM users WHERE roles = 1 OR roles = 2");
$admin_list->execute();
$administators_list = $admin_list->fetchAll();

$applications_chart = $pdo->prepare("SELECT 
    MONTH(date_apply) as month,
    COUNT(*) as application_count 
    FROM scholarship_applications 
    WHERE YEAR(date_apply) = YEAR(CURRENT_DATE)
    GROUP BY MONTH(date_apply)");
$applications_chart->execute();
$monthly_applications = $applications_chart->fetchAll();

$distribution_chart = $pdo->prepare("SELECT 
    application_status,
    COUNT(*) as status_count 
    FROM scholarship_applications 
    GROUP BY application_status");
$distribution_chart->execute();
$status_distribution = $distribution_chart->fetchAll();

if (isset($_POST['deny_with_feedback'])) {
    $application_id = $_POST['application_id'];
    $feedback = $_POST['denial_feedback'];

    $stmt = $pdo->prepare("UPDATE scholarship_applications SET application_status = 2, denial_feedback = :feedback WHERE applicationsID = :applicationsID");
    $stmt->bindParam(":feedback", $feedback);
    $stmt->bindParam(":applicationsID", $application_id);

    if ($stmt->execute()) {
        alert('success', 'Application Denied', 'Feedback has been recorded', "non_applications.php");
    } else {
        alert('error', 'Failed Process', 'Please try again', 'applications.php');
    }
}

if (isset($_POST['update_reimbursement'])) {
    $reinburment = $_POST['reinburment'];
    $reimbursement_time = $_POST['reimbursement_time'];
    $scholarshipID = $details['scholarshipID'];

    $stmt = $pdo->prepare("UPDATE scholarship SET reinburment = :reinburment, reimbursement_time = :reimbursement_time WHERE scholarshipID = :scholarshipID");
    $stmt->bindParam(":reinburment", $reinburment);
    $stmt->bindParam(":reimbursement_time", $reimbursement_time);
    $stmt->bindParam(":scholarshipID", $scholarshipID);

    if ($stmt->execute()) {
        alert('success', 'Reimbursement Schedule Updated', '', "daily_scholarships.php?daily_details=$scholarshipID");
    } else {
        alert('error', 'Failed to Update Schedule', '', "daily_scholarships.php?daily_details=$scholarshipID");
    }
}


if (isset($_POST['set_stipend'])) {
    $scholarship_id = $_POST['scholarship_id'];
    $release_date = $_POST['release_date'];
    $venue = $_POST['venue'];
    $amount = $_POST['amount'];
    $requirements = $_POST['requirements'];

    $stmt = $pdo->prepare("INSERT INTO scholarship_stipends (scholarship_id, release_date, release_venue, amount, requirements) VALUES (:scholarship_id, :release_date, :release_venue, :amount, :requirements)");

    $stmt->bindParam(':scholarship_id', $scholarship_id);
    $stmt->bindParam(':release_date', $release_date);
    $stmt->bindParam(':release_venue', $venue);
    $stmt->bindParam(':amount', $amount);
    $stmt->bindParam(':requirements', $requirements);

    if ($stmt->execute()) {
        // Send notification about stipend release
        $custom_message = "A new stipend release has been scheduled for " . date('F j, Y', strtotime($release_date)) . 
                         " at " . $venue . ". Amount: PHP " . number_format($amount, 2) . 
                         ". Required documents: " . $requirements;
        
        send_scholarship_notification('update', $scholarship_id, $custom_message);
        
        alert('success', 'Stipend Schedule Set', 'Schedule has been saved successfully', 'stipend_management.php');
    } else {
        alert('error', 'Failed to Set Schedule', 'Please try again', 'stipend_management.php');
    }
}

$stipends = $pdo->prepare("
    SELECT ss.*, s.name as scholarship_name 
    FROM scholarship_stipends ss
    JOIN scholarship s ON ss.scholarship_id = s.scholarshipID
    ORDER BY ss.release_date DESC");
$stipends->execute();
$stipend_list = $stipends->fetchAll();

// Edit stipend
if (isset($_POST['edit_stipend'])) {
    $stipend_id = $_POST['stipend_id'];
    $scholarship_id = $_POST['scholarship_id'];
    $release_date = $_POST['release_date'];
    $venue = $_POST['venue'];
    $amount = $_POST['amount'];
    $requirements = $_POST['requirements'];
    $status = $_POST['status'];

    $stmt = $pdo->prepare("UPDATE scholarship_stipends SET 
        scholarship_id = :scholarship_id,
        release_date = :release_date,
        release_venue = :venue,
        amount = :amount,
        requirements = :requirements,
        status = :status
        WHERE stipend_id = :stipend_id");

    $stmt->bindParam(':stipend_id', $stipend_id);
    $stmt->bindParam(':scholarship_id', $scholarship_id);
    $stmt->bindParam(':release_date', $release_date);
    $stmt->bindParam(':venue', $venue);
    $stmt->bindParam(':amount', $amount);
    $stmt->bindParam(':requirements', $requirements);
    $stmt->bindParam(':status', $status);

    if ($stmt->execute()) {
        alert('success', 'Stipend Updated', 'Schedule has been updated successfully', 'stipend_management.php');
    } else {
        alert('error', 'Failed to Update', 'Please try again', 'stipend_management.php');
    }
}

// Delete stipend
if (isset($_GET['delete_stipend'])) {
    $stipend_id = $_GET['delete_stipend'];

    $stmt = $pdo->prepare("DELETE FROM scholarship_stipends WHERE stipend_id = :stipend_id");
    $stmt->bindParam(':stipend_id', $stipend_id);

    if ($stmt->execute()) {
        alert('success', 'Stipend Deleted', 'Schedule has been removed', 'stipend_management.php');
    } else {
        alert('error', 'Failed to Delete', 'Please try again', 'stipend_management.php');
    }
}

if (isset($_POST['stipend_id'])) {
    $stipend_id = $_POST['stipend_id'];

    $stmt = $pdo->prepare("SELECT * FROM scholarship_stipends WHERE stipend_id = :stipend_id");
    $stmt->bindParam(':stipend_id', $stipend_id);
    $stmt->execute();

    $stipend = $stmt->fetch(PDO::FETCH_ASSOC);
    $stipend['release_date'] = date('Y-m-d\TH:i', strtotime($stipend['release_date']));

    echo json_encode($stipend);
    exit;
}


if (isset($_GET['verify_admin'])) {
    $admin_id = $_GET['verify_admin'];
    $stmt = $pdo->prepare("UPDATE users SET status = 'verified', code = 0 WHERE userID = :userID");
    $stmt->bindParam(':userID', $admin_id);
    
    if ($stmt->execute()) {
        header('Location: user.php');
        exit();
    } else {
        header('Location: user.php');
        exit();
    }
}

/**
 * Sends scholarship notification emails to eligible users
 * 
 * @param string $type The type of notification ('new_scholarship' or 'update')
 * @param int $scholarshipID The ID of the scholarship
 * @param string $custom_message Optional custom message to include
 * @return bool Whether the emails were sent successfully
 */
function send_scholarship_notification($type, $scholarshipID, $custom_message = '') {
    global $pdo;
    
    // Get scholarship details
    $stmt = $pdo->prepare("SELECT name, date_start, date_end, description, scholarID, sector FROM scholarship WHERE scholarshipID = :scholarshipID");
    $stmt->bindParam(':scholarshipID', $scholarshipID, PDO::PARAM_INT);
    $stmt->execute();
    $scholarship = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$scholarship) {
        return false;
    }
    
    // Get system settings for email sender info
    $settings_stmt = $pdo->prepare("SELECT Name, email FROM settings WHERE settingsID = 1");
    $settings_stmt->execute();
    $settings = $settings_stmt->fetch(PDO::FETCH_ASSOC);
    
    // Get all verified student users
    $users_stmt = $pdo->prepare("SELECT email, first_name, last_name FROM users WHERE roles = 3 AND status = 'verified' AND account_verifyer = 1");
    $users_stmt->execute();
    $users = $users_stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Set up email subject and base message
    if ($type == 'new_scholarship') {
        $subject = "New Scholarship Opportunity: " . $scholarship['name'];
        $base_message = "
            <h2>New Scholarship Opportunity</h2>
            <p>Dear {FIRST_NAME} {LAST_NAME},</p>
            <p>We are pleased to inform you about a new scholarship opportunity that you may be eligible for:</p>
        ";
    } else {
        $subject = "Scholarship Update: " . $scholarship['name'];
        $base_message = "
            <h2>Scholarship Update</h2>
            <p>Dear {FIRST_NAME} {LAST_NAME},</p>
            <p>There has been an update to the following scholarship:</p>
        ";
    }
    
    // Scholarship details to include in all emails
    $scholarship_details = "
        <div style='background-color: #f9f9f9; border-left: 4px solid #800000; padding: 15px; margin: 20px 0;'>
            <h3 style='color: #800000; margin-top: 0;'>{$scholarship['name']}</h3>
            <p><strong>Scholarship ID:</strong> {$scholarship['scholarID']}</p>
            <p><strong>Sector:</strong> {$scholarship['sector']}</p>
            <p><strong>Application Period:</strong> {$scholarship['date_start']} to {$scholarship['date_end']}</p>
            <p><strong>Description:</strong><br>{$scholarship['description']}</p>
        </div>
    ";
    
    // Add custom message if provided
    $custom_content = '';
    if (!empty($custom_message)) {
        $custom_content = "
            <div style='background-color: #fff3cd; border-left: 4px solid #ffc107; padding: 15px; margin: 20px 0;'>
                <p><strong>Important Note:</strong><br>{$custom_message}</p>
            </div>
        ";
    }
    
    // Call to action and footer
    $cta = "
        <p style='margin: 25px 0;'>
            <a href='http://{$_SERVER['HTTP_HOST']}/scholars/index.php?view_scholarship={$scholarship['scholarID']}' 
               style='background-color: #800000; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>
               View Scholarship Details
            </a>
        </p>
        <p>For more information, please log in to your scholarship portal account.</p>
        <p>Best regards,<br>The {$settings['Name']} Scholarship Team</p>
    ";
    
    // Send emails to all users
    $success_count = 0;
    foreach ($users as $user) {
        // Personalize message for each user
        $personalized_message = str_replace(
            ['{FIRST_NAME}', '{LAST_NAME}'],
            [$user['first_name'], $user['last_name']],
            $base_message
        );
        
        // Complete email message
        $message = $personalized_message . $scholarship_details . $custom_content . $cta;
        
        // Send email using existing function
        if (adminemails($user['email'], $subject, $message)) {
            $success_count++;
        }
    }
    
    // Log notification in database
    $log_stmt = $pdo->prepare("INSERT INTO notification_logs (notification_type, scholarship_id, recipients_count, date_sent) 
                              VALUES (:type, :scholarship_id, :count, NOW())");
    $log_stmt->bindParam(':type', $type);
    $log_stmt->bindParam(':scholarship_id', $scholarshipID);
    $log_stmt->bindParam(':count', $success_count);
    $log_stmt->execute();
    
    return ($success_count > 0);
}

?>