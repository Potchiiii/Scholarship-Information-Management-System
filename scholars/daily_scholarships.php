<?php include "./head.php";
$a = 3;
?>

<body>
    <?php include "./controls.php";
    if ($roles == 3) {
        echo "<script>window.location.href='index.php'</script>";
    }
    ; ?>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include "./sidebar.php"; ?>
            <div class="layout-page">
                <?php include "./topbar.php"; ?>
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- Add after topbar include -->
                        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
                            rel="stylesheet">
                        <link rel="stylesheet"
                            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
                        <style>
                            body {
                                font-family: 'Poppins', sans-serif;
                            }

                            .card {
                                border: none;
                                border-radius: 16px;
                                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
                                transition: transform 0.3s ease;
                            }

                            .card-body {
                                padding: 2rem;
                            }

                            .scholarship-header {
                                margin-bottom: 1.5rem;
                            }

                            .scholarship-header h5 {
                                font-weight: 600;
                                color: #2d3436;
                                line-height: 1.6;
                            }

                            .scholarship-header p {
                                color: #64748b;
                                margin-top: 1rem;
                            }

                            .form-control {
                                border: 2px solid #edf2f7;
                                border-radius: 10px;
                                padding: 0.8rem 1rem;
                                transition: all 0.3s ease;
                                margin-bottom: 1rem;
                            }

                            .form-control:focus {
                                border-color: #800000;
                                box-shadow: 0 0 0 4px rgba(128, 0, 0, 0.1);
                            }

                            .btn {
                                font-weight: 500;
                                padding: 0.7rem 1.5rem;
                                border-radius: 10px;
                                transition: all 0.3s ease;
                            }

                            .btn-danger {
                                background: #800000;
                                border: none;
                            }

                            .btn-danger:hover {
                                background: #600000;
                                transform: translateY(-2px);
                            }

                            .btn-dark {
                                background: #1e293b;
                                border: none;
                            }

                            .btn-dark:hover {
                                background: #0f172a;
                                transform: translateY(-2px);
                            }

                            #mydata2 {
                                border-radius: 12px;
                                overflow: hidden;
                                border: 1px solid #edf2f7;
                            }

                            #mydata2 thead th {
                                background: #f8fafc;
                                font-weight: 600;
                                text-transform: uppercase;
                                font-size: 0.85rem;
                                letter-spacing: 0.5px;
                                padding: 1rem;
                            }

                            #mydata2 tbody td {
                                padding: 1rem;
                                vertical-align: middle;
                            }

                            .table-responsive {
                                border-radius: 12px;
                                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
                            }

                            .requirements-section {
                                background: #f8fafc;
                                border-radius: 12px;
                                padding: 1.5rem;
                                margin-top: 2rem;
                            }

                            .requirements-section h5 {
                                color: #2d3436;
                                font-weight: 600;
                                margin-bottom: 1rem;
                            }

                            .document-list {
                                background: white;
                                border-radius: 10px;
                                padding: 1rem;
                            }

                            .stats-badge {
                                padding: 0.5rem 1rem;
                                border-radius: 20px;
                                font-size: 0.85rem;
                                font-weight: 500;
                                background: #f1f5f9;
                                color: #475569;
                            }

                            #mydata2 {
                                border-radius: 12px;
                                overflow: hidden;
                                border: none;
                                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
                            }

                            #mydata2 thead th {
                                background: #f8f9fa;
                                font-weight: 600;
                                text-transform: uppercase;
                                font-size: 0.85rem;
                                letter-spacing: 0.5px;
                                padding: 1.2rem 1rem;
                                color: #2d3436;
                            }

                            #mydata2 tbody td {
                                padding: 1rem;
                                vertical-align: middle;
                                font-size: 0.9rem;
                            }

                            .slot-badge,
                            .counter-badge,
                            .approve-badge {
                                padding: 0.5rem 1rem;
                                border-radius: 20px;
                                font-size: 0.85rem;
                                font-weight: 500;
                            }

                            .slot-badge {
                                background: #e0e7ff;
                                color: #3730a3;
                            }

                            .counter-badge {
                                background: #fee2e2;
                                color: #991b1b;
                            }

                            .approve-badge {
                                background: #d1fae5;
                                color: #065f46;
                            }

                            .btn-view {
                                background: #800000;
                                color: white;
                                padding: 0.5rem 1rem;
                                border-radius: 8px;
                                transition: all 0.3s ease;
                                text-decoration: none;
                                display: inline-flex;
                                align-items: center;
                            }

                            .btn-view:hover {
                                background: #600000;
                                color: white;
                                transform: translateY(-2px);
                                box-shadow: 0 4px 12px rgba(128, 0, 0, 0.15);
                            }

                            #mydata2 tbody tr {
                                transition: all 0.3s ease;
                            }

                            #mydata2 tbody tr:hover {
                                background-color: #f8f9fa;
                            }
                        </style>

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <div class="">
                                            <h5><?php echo "<b>" . $details['scholarID'] . "</b> : " . $details['name'] . " <br> " . $details['date_start'] . " to " . $details['date_end'] ?>
                                            </h5>
                                            <h5>Reinbursment Date: <?php echo $details['reinburment'] ?></h5>
                                            <p><?php echo $details['description'] ?></p>
                                            <hr>
                                            <h5>Scholarship requirements</h5>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <form action="" method="POST" enctype="multipart/form-data">
                                                        <label for="">File Name</label>
                                                        <input type="text" name="docs_name" id="" class="form-control">
                                                        <label for="">File Documents</label>
                                                        <input type="file" name="docs_files" id=""
                                                            class="form-control ">
                                                        <button type="submit" class="btn btn-primary mt-3"
                                                            name="scholar_documents">Submit</button>
                                                    </form>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col" colspan="2">Uploaded Documents</th>
                                                                    <th scope="col"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php

                                                                if ($documents_count > 0) {
                                                                    $i = 1;
                                                                    foreach ($documents as $files) { ?>
                                                                        <tr>
                                                                            <td><?php echo $i++ ?></td>
                                                                            <td><?php echo $files['document_name'] ?></td>
                                                                            <td><a href="../assets/forms/<?php echo $files['document'] ?>"
                                                                                    clas    s="text-danger" download>Download
                                                                                    Here</a></td>
                                                                            <td><a href="daily_scholarships.php?delete_docs=<?php echo $files['docsID'] ?>&retrive=<?php echo $daily_details ?>"
                                                                                    class="btn btn-sm btn-dark">Delete</a></td>
                                                                        </tr>
                                                                    <?php }
                                                                } else { ?>
                                                                    <tr>
                                                                        <td colspan="2">No Document Found</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 text-end">
                                        <div class="">
                                            <?php if ($details['ctrl_status'] == 1) { ?>
                                                <a href="scholarships.php" class="btn btn-dark mt-3">Back</a>
                                            <?php } else {
                                                $checkDocs = $pdo->prepare("SELECT COUNT(*) as doc_count FROM scholarship_docs WHERE scholarship = :scholarshipID");
                                                $checkDocs->bindParam(":scholarshipID", $details['scholarshipID'], PDO::PARAM_INT);
                                                $checkDocs->execute();
                                                $docResult = $checkDocs->fetch();
                                                $hasDocuments = ($docResult['doc_count'] > 0);
                                                ?>
                                                <a href="daily_scholarships.php?split=<?php echo $details['scholarshipID'] ?>"
                                                    class="btn <?php echo $hasDocuments ? 'btn-danger' : 'btn-secondary'; ?>"
                                                    <?php if (!$hasDocuments)
                                                        echo 'disabled'; ?>>
                                                    <?php if (!$hasDocuments): ?>
                                                        <i class="fas fa-exclamation-triangle me-2"></i>Upload Documents First
                                                    <?php else: ?>
                                                        Deploy Scholarship
                                                    <?php endif; ?>
                                                </a>
                                                <?php if (!$hasDocuments): ?>
                                                    <div class="text-danger mt-2 small">
                                                        <i class="fas fa-info-circle"></i> You must upload at least one document
                                                        requirement before deploying
                                                    </div>
                                                <?php endif; ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">


                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table id="mydata2" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center"><i class="fas fa-calendar-alt me-2"></i>Dates
                                                </th>
                                                <th class="text-center"><i class="fas fa-users me-2"></i>Slots</th>
                                                <th class="text-center"><i class="fas fa-user-plus me-2"></i>Applying
                                                </th>
                                                <th class="text-center"><i class="fas fa-check-circle me-2"></i>Approve
                                                </th>
                                                <th class="text-center"><i class="fas fa-cogs me-2"></i>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($splitings as $list) {
                                                $idget = $list['dailyscholarshipID'];
                                                $cnts = $pdo->prepare("SELECT COUNT(application_status) as application_status_count FROM scholarship_applications WHERE dailyscholarshipID=:dailyscholarshipID AND application_status = 0");
                                                $cnts->bindParam(":dailyscholarshipID", $idget, PDO::PARAM_INT);
                                                $cnts->execute();
                                                $count = $cnts->fetch();
                                                $count_list = $count['application_status_count']; ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <i class="far fa-calendar me-2 text-primary"></i>
                                                        <?php echo date('F d, Y', strtotime($list['sectioned_date'])); ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="slot-badge">
                                                            <i class="fas fa-chair me-1"></i>
                                                            <?php echo $list['limits']; ?>
                                                        </span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="counter-badge">
                                                            <i class="fas fa-user-clock me-1"></i>
                                                            <?php echo $list['limit_counter']; ?>
                                                        </span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="approve-badge">
                                                            <i class="fas fa-thumbs-up me-1"></i>
                                                            <?php echo $count_list; ?>
                                                        </span>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="programview.php?scholars=<?php echo $list['dailyscholarshipID'] ?>"
                                                            class="btn btn-view">
                                                            <i class="fas fa-eye me-2"></i>View Details
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>


                    </div>
                    <?php include "./footer.php"; ?>