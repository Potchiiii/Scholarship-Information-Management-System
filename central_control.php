<?php
session_start();
error_reporting(0);
require "connection.php";
$email = "";
$name = "";
$errors = array();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function emails($email, $subject, $message)
{
    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = 0;                    //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'hassandaud470@gmail.com';                     //SMTP username
        $mail->Password = 'dnyi qtng lcjw uwsn';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port = 587;                                         //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->setFrom('from@example.com', $subject);
        $mail->addAddress($email);     //Add a recipient
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = "<fieldset><b> " . $message . "</b></fieldset>";
        if (!$mail->send()) {
            echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
        } else {
            $_SESSION['STATUS'] = "ACC_SUCCESS";
            echo "<script>window.location.href='user-otp.php'</script>";
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


function adminemails($email, $subject, $message)
{
    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = 0;                    //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'daudhassan470@gmail.com';                     //SMTP username
        $mail->Password = 'dnyi qtng lcjw uwsn';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port = 587;                                         //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->setFrom('from@example.com', $subject);
        $mail->addAddress($email);     //Add a recipient
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = "<fieldset><b> " . $message . "</b></fieldset>";
        if (!$mail->send()) {
            echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
        } else {
            alert('success', 'Account Created', 'Account Created Succesfully', "user.php");
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


function sholarapprove($email, $subject, $message)
{
    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = 0;                    //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp-relay.brevo.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'daudhassan470@gmail.com';                     //SMTP username
        $mail->Password = 'dnyi qtng lcjw uwsn';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port = 587;                                         //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->setFrom('from@example.com', $subject);
        $mail->addAddress($email);     //Add a recipient
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = "<fieldset><b> " . $message . "</b></fieldset>";
        if (!$mail->send()) {
            echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
        } else {
            $_SESSION['STATUS'] = "ACC_SUCCESS";
            echo "<script>window.location.href='user-otp.php'</script>";
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function forgot($email, $subject, $message) {
    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = 0;                    
        $mail->isSMTP();                                            
        $mail->Host = 'smtp.gmail.com';                     
        $mail->SMTPAuth = true;                                   
        $mail->Username = 'hassandaud470@gmail.com';                     
        $mail->Password = 'dnyi qtng lcjw uwsn';                               
        $mail->SMTPSecure = 'tls';            
        $mail->Port = 587;                                         
        $mail->setFrom('from@example.com', $subject);
        $mail->addAddress($email);     
        $mail->isHTML(true);                                  
        $mail->Subject = $subject;
        $mail->Body = "<fieldset><b> " . $message . "</b></fieldset>";
        
        if (!$mail->send()) {
            echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
        } else {
            $_SESSION['STATUS'] = "ACC_SUCCESS";
            echo "<script>window.location.href='reset-code.php'</script>";
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


if (isset($_POST['signup'])) {
    try {
        $studentID = $_POST['studentid'];
        $first = $_POST['first'];
        $last = $_POST['last'];
        $number = $_POST['number'];
        $email = $_POST['email'];
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


            $stmt = $pdo->prepare("INSERT INTO users (studentID, email, first_name, last_name, password, code, status) VALUES (:studentID, :email, :first_name, :last_name, :password, :code, :status)");
            $stmt->bindParam(':studentID', $studentID);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':first_name', $first);
            $stmt->bindParam(':last_name', $last);
            $stmt->bindParam(':password', $encpass);
            $stmt->bindParam(':code', $code);
            $stmt->bindParam(':status', $status);

            if ($stmt->execute()) {
                $subject = "Email Verification Code";
                $message = "Dear $email, <br>

                
                OTP Code: <b style='color: orange;'>$code</b>
                <br>
                ";
                if (emails($email, $subject, $message)) {
                    $info = "We've sent a verification code to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    header('location: user-otp.php');
                    exit();
                } else {
                    $errors['otp-error'] = "Failed while sending code!";
                }

            } else {
                $errors['db-error'] = "Failed while inserting data into database!";
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


if (isset($_POST['check'])) {
    $_SESSION['info'] = "";

    try {

        $otp_code = $_POST['otp'];

        $stmt = $pdo->prepare("SELECT * FROM users WHERE code = :otp_code");
        $stmt->bindParam(':otp_code', $otp_code);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $fetch_data = $stmt->fetch(PDO::FETCH_ASSOC);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];

            $stmt = $pdo->prepare("UPDATE users SET code = 0, status = 'verified' WHERE code = :fetch_code");
            $stmt->bindParam(':fetch_code', $fetch_code);

            if ($stmt->execute()) {
                $_SESSION['name'] = $fetch_data['name']; // Assuming 'name' is a column in your 'users' table
                $_SESSION['email'] = $email;

                $roles = $fetch_data['roles'];
                $_SESSION['STATUS'] = "OTP_SUCCESS";
                echo "<script>window.location.href='index.php'</script>";

                exit();
            } else {
                $errors['otp-error'] = "Failed while updating code!";
            }
        } else {
            $errors['otp-error'] = "You've entered incorrect code!";

        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


if (isset($_POST['login'])) {
    try {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email OR studentID=:studentID");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':studentID', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $fetch = $stmt->fetch(PDO::FETCH_ASSOC);
            $fetch_pass = $fetch['password'];

            if (password_verify($password, $fetch_pass)) {
                $_SESSION['email'] = $email;
                $status = $fetch['status'];

                if ($status == 'verified') {
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    $roles = $fetch['roles'];
                    echo "<script>window.location.href='./scholars/index.php'</script>";
                } else {
                    $info = "It's look like you haven't still verify your email - $email";
                    $_SESSION['info'] = $info;
                    header('location: user-otp.php');
                }
            } else {
                $errors['email'] = "Incorrect email or password!";
            }
        } else {
            $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";

        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

if (isset($_POST['check-email'])) {
    try {


        $email = $_POST['email'];

        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $code = rand(999999, 111111);

            $stmt = $pdo->prepare("UPDATE users SET code = :code WHERE email = :email");
            $stmt->bindParam(':code', $code);
            $stmt->bindParam(':email', $email);

            if ($stmt->execute()) {
                $subject = "Password Reset Code";
                $message = "Dear $email, <br>
                        OTP Code: <b style='color: orange;'> $code </b>
                        <br><br>
                        
                        Best regards,<br>
                        
                        -Admin<br>
                        Fayeed Electronics Customer Support";

                if (forgot($email, $subject, $message)) {
                    $info = "We've sent a passwrod reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code.php');
                    exit();
                } else {
                    $errors['otp-error'] = "Failed while sending code!";
                }
            } else {
                $errors['db-error'] = "Something went wrong!";
            }
        } else {
            $errors['email'] = "This email address does not exist!";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

if (isset($_POST['check-reset-otp'])) {
    $_SESSION['info'] = "";

    try {

        $otp_code = $_POST['otp'];

        $stmt = $pdo->prepare("SELECT * FROM users WHERE code = :otp_code");
        $stmt->bindParam(':otp_code', $otp_code);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $fetch_data = $stmt->fetch(PDO::FETCH_ASSOC);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";

            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        } else {
            $errors['otp-error'] = "You've entered incorrect code!";

        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


if (isset($_POST['change-password'])) {
    $_SESSION['info'] = "";

    try {
        // ... (your PDO connection code)

        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        if ($password !== $cpassword) {
            $errors['password'] = "Confirm password not matched!";
        } else {
            $code = 0;
            $email = $_SESSION['email'];
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $pdo->prepare("UPDATE users SET code = :code, password = :password WHERE email = :email");
            $stmt->bindParam(':code', $code);
            $stmt->bindParam(':password', $encpass);
            $stmt->bindParam(':email', $email);

            if ($stmt->execute()) {
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            } else {
                $errors['db-error'] = "Failed to change your password!";

            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

if (isset($_POST['login-now'])) {
    header('Location: login.php');
}
$setting = $pdo->prepare("SELECT * FROM settings WHERE settingsID = 1");
$setting->execute();
$settings = $setting->fetch();

$pub = $pdo->prepare("SELECT * FROM publications");
$pub->execute();
$publications = $pub->fetchAll();

if (isset($_GET['decription'])) {
    $decription = $_GET['decription'];
    $stmt = $pdo->prepare("SELECT * FROM publications WHERE pubID=:pubID");
    $stmt->bindParam(":pubID", $decription, PDO::PARAM_INT);
    $stmt->execute();
    $details = $stmt->fetch();
}

if (isset($_POST['adminlogin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email AND (roles = 1 OR roles = 2)");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $fetch = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $fetch['password'])) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            header('Location: ./scholars/index.php');
            exit();
        } else {
            $errors['password'] = "Invalid admin credentials";
        }
    } else {
        $errors['email'] = "Admin account not found";
    }
}




?>