<?php include "./head.php";

if (empty($_GET['view_details'])) {
    $a = 6;
} else {
    $a = 1;
}
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
                <!-- Add after topbar include -->
                <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
                    rel="stylesheet">
                <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
                    rel="stylesheet">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

                <style>
                    body {
                        font-family: 'Poppins', sans-serif;
                    }

                    .card {
                        border: none;
                        border-radius: 16px;
                        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
                        overflow: hidden;
                    }

                    .card-header {
                        background: #fff;
                        padding: 1.5rem;
                        border-bottom: 1px solid #edf2f7;
                    }

                    .card-header h4 {
                        color: #1e293b;
                        font-weight: 600;
                        margin-bottom: 0.5rem;
                    }

                    .profile-section {
                        text-align: center;
                        padding: 2rem 0;
                    }

                    .profile-image {
                        width: 120px;
                        height: 120px;
                        border-radius: 50%;
                        object-fit: cover;
                        border: 4px solid white;
                        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                    }

                    .applicant-info {
                        margin-top: 1.5rem;
                    }

                    .applicant-info p {
                        color: #475569;
                        margin-bottom: 0.5rem;
                        font-size: 0.95rem;
                    }

                    .table {
                        margin-top: 1rem;
                    }

                    .table thead th {
                        background: #f8fafc;
                        color: #475569;
                        font-weight: 600;
                        text-transform: uppercase;
                        font-size: 0.85rem;
                        letter-spacing: 0.5px;
                    }

                    .btn {
                        font-weight: 500;
                        padding: 0.7rem 1.5rem;
                        border-radius: 8px;
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

                    .btn-secondary {
                        background: #475569;
                        border: none;
                    }

                    .btn-secondary:hover {
                        background: #334155;
                        transform: translateY(-2px);
                    }

                    .status-badge {
                        display: inline-block;
                        padding: 0.5rem 1rem;
                        border-radius: 20px;
                        font-size: 0.85rem;
                        font-weight: 500;
                    }

                    .status-approved {
                        background: #dcfce7;
                        color: #16a34a;
                    }

                    .status-denied {
                        background: #fee2e2;
                        color: #dc2626;
                    }

                    .status-waiting {
                        background: #fff8e1;
                        color: #f59e0b;
                    }

                    .scholarship-details {
                        background: #f8fafc;
                        border-radius: 12px;
                        padding: 1.5rem;
                        margin-top: 1.5rem;
                    }

                    .scholarship-details h4 {
                        color: #1e293b;
                        font-weight: 600;
                        margin-bottom: 1rem;
                    }

                    .document-section {
                        margin-top: 2rem;
                    }

                    .document-section h6 {
                        color: #475569;
                        font-weight: 600;
                        margin-bottom: 1rem;
                    }

                    .card-footer {
                        background: #fff;
                        padding: 1.5rem;
                        border-top: 1px solid #edf2f7;
                    }
                </style>

                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="card">
                            <div class="card-header">
                                <h4><i class="fas fa-user-graduate me-2"></i>Applicant Details</h4>
                                <span class="status-badge <?php
                                if ($scholar['application_status'] == 1)
                                    echo "status-approved";
                                elseif ($scholar['application_status'] == 2)
                                    echo "status-denied";
                                else
                                    echo "status-waiting";
                                ?>">
                                    <i class="fas <?php
                                    if ($scholar['application_status'] == 1)
                                        echo "fa-check-circle";
                                    elseif ($scholar['application_status'] == 2)
                                        echo "fa-times-circle";
                                    else
                                        echo "fa-clock";
                                    ?> me-2"></i>
                                    <?php
                                    if ($scholar['application_status'] == 1)
                                        echo "Approved";
                                    elseif ($scholar['application_status'] == 2)
                                        echo "Denied";
                                    else
                                        echo "Waiting";
                                    ?>
                                </span>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6 mb-5 border-end">
                                        <div class="profile-section text-center">
                                            <img src="../assets/images/profile/<?php echo $scholar['profile'] ?>"
                                                class="profile-image" alt="Profile Image">
                                            <div class="applicant-info mt-4">
                                                <p><i class="fas fa-user me-2"></i><?php echo $scholar['username'] ?>
                                                </p>
                                                <p><i class="fas fa-envelope me-2"></i><?php echo $scholar['email'] ?>
                                                </p>
                                                <p><i class="fas fa-phone me-2"></i><?php echo $scholar['contact'] ?>
                                                </p>
                                                <p><i
                                                        class="fas fa-map-marker-alt me-2"></i><?php echo $scholar['address'] ?>
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                        <h6>Applicant Uploaded Documents</h6>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col" colspan="2">Documents</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1;
                                                    if ($mydocuments_count > 0) {
                                                        foreach ($mydocuments as $mydocs) { ?>
                                                            <tr>
                                                                <td><?php echo $i++ ?></td>
                                                                <td colspan="2"><?php echo $mydocs['document_name'] ?></td>
                                                                <td>
                                                                    <a href="../assets/forms/<?php echo $mydocs['document_file'] ?>"
                                                                        class="btn btn-sm btn-danger" target="_blank">
                                                                        <i class="fas fa-eye me-2"></i>View
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php }
                                                    } else { ?>
                                                        <tr>
                                                            <td colspan="3">No document upload</td>
                                                            <td></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <h4>Scholarship Details: <?php echo $scholar['name'] ?></h4>
                                        <h6>Scholarship ID: <?php echo $scholar['scholarID'] ?></h6>
                                        <?php echo $scholar['description'] ?>
                                        <hr>
                                        <h6>Scholarship Downloadables</h6>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col" colspan="2">Documents</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1;
                                                    if ($documents_count > 0) {
                                                        foreach ($documents as $docs) { ?>
                                                            <tr>
                                                                <td><?php echo $i++ ?></td>
                                                                <td colspan="2"><?php echo $docs['document_name'] ?></td>
                                                                <td>
                                                                    <a href="../assets/forms/<?php echo $docs['document'] ?>"
                                                                        class="btn btn-sm btn-danger" download>
                                                                        <i class="fas fa-download me-2"></i>Download
                                                                    </a>
                                                                </td>

                                                            </tr>
                                                        <?php }
                                                    } else { ?>
                                                        <tr>
                                                            <td colspan="3">No document upload</td>
                                                            <td></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if (empty($_GET['view_details'])) { ?>
                                <div class="card-footer">
                                    <?php if ($scholar['application_status'] == 0) { ?>
                                        <a href="applications.php?approve_scholar=<?php echo $scholar['applicationsID'] ?>"
                                            class="btn btn-approve">
                                            <i class="fas fa-check-circle me-2"></i>Approve
                                        </a>
                                        <!-- Update the deny button -->
                                        <button type="button" class="btn btn-deny" data-bs-toggle="modal"
                                            data-bs-target="#denyModal">
                                            <i class="fas fa-times-circle me-2"></i>Deny
                                        </button>
                                    <?php } ?>
                                </div>

                                <!-- Deny Feedback Modal -->
                                <div class="modal fade" id="denyModal" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Provide Denial Feedback</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <form action="applications.php" method="POST">
                                                <div class="modal-body">
                                                    <input type="hidden" name="application_id"
                                                        value="<?php echo $scholar['applicationsID'] ?>">
                                                    <div class="mb-3">
                                                        <label class="form-label">Reason for Denial</label>
                                                        <textarea class="form-control" name="denial_feedback" rows="4"
                                                            required></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" name="deny_with_feedback"
                                                        class="btn btn-deny">Submit Denial</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <style>
                            .profile-image {
                                width: 120px;
                                height: 120px;
                                border-radius: 50%;
                                object-fit: cover;
                                border: 4px solid white;
                                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                            }

                            .btn-approve {
                                background: #2ecc71;
                                color: white;
                                padding: 0.7rem 1.5rem;
                                border-radius: 8px;
                                transition: all 0.3s ease;
                                display: inline-flex;
                                align-items: center;
                                gap: 0.5rem;
                            }

                            .btn-deny {
                                background: #e74c3c;
                                color: white;
                                padding: 0.7rem 1.5rem;
                                border-radius: 8px;
                                transition: all 0.3s ease;
                                display: inline-flex;
                                align-items: center;
                                gap: 0.5rem;
                            }

                            .btn-approve:hover {
                                background: #27ae60;
                                color: white;
                                transform: translateY(-2px);
                                box-shadow: 0 4px 12px rgba(46, 204, 113, 0.2);
                            }

                            .btn-deny:hover {
                                background: #c0392b;
                                color: white;
                                transform: translateY(-2px);
                                box-shadow: 0 4px 12px rgba(231, 76, 60, 0.2);
                            }

                            .applicant-info p {
                                margin-bottom: 0.8rem;
                                color: #4a5568;
                            }

                            .status-badge {
                                display: inline-flex;
                                align-items: center;
                                padding: 0.5rem 1rem;
                                border-radius: 20px;
                                font-size: 0.85rem;
                                font-weight: 500;
                            }

                            .status-approved {
                                background: #d1fae5;
                                color: #065f46;
                            }

                            .status-denied {
                                background: #fee2e2;
                                color: #dc2626;
                            }

                            .status-waiting {
                                background: #fff8e1;
                                color: #f59e0b;
                            }

                            /* Enhanced button styles with visible icons */
                            .btn-sm.btn-danger {
                                background: #800000;
                                color: #ffffff;
                                display: inline-flex;
                                align-items: center;
                                gap: 0.5rem;
                                padding: 0.5rem 1rem;
                            }

                            .btn-sm.btn-danger:hover {
                                background: #600000;
                                color: #ffffff;
                            }

                            .btn-sm.btn-danger i {
                                font-size: 14px;
                                color: #ffffff;
                            }

                            .btn-approve i,
                            .btn-deny i {
                                font-size: 16px;
                                color: #ffffff;
                            }

                            /* Ensure icons stay visible */
                            .fas {
                                display: inline-block !important;
                                color: #ffffff !important;
                            }
                        </style>