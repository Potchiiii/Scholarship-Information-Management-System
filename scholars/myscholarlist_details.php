<?php include "./head.php";
$a = 5;
?>

<body>
    <?php include "./controls.php"; ?>
    <?php
    if (isset($_POST['submit_document'])) {
        if ($_FILES['document_file']['name'] != '') {
            $document = $_FILES['document_file']['name'];
            $tempname = $_FILES['document_file']['tmp_name'];
            $folder = "../assets/forms/" . $document;

            $doc_name = $_POST['document_name'];

            move_uploaded_file($tempname, $folder);

            $stmt = $pdo->prepare("INSERT INTO scholarshipapplications_docs(applicationsID, document_name, document_file) VALUES(:applicationsID, :document_name, :document_file)");
            $stmt->bindParam(":applicationsID", $view_applications, PDO::PARAM_INT);
            $stmt->bindParam(":document_name", $doc_name, PDO::PARAM_STR);
            $stmt->bindParam(":document_file", $document, PDO::PARAM_STR);

            if ($stmt->execute()) {
                alert('success', 'Document Uploaded', 'Your document has been submitted successfully', "myscholarlist_details.php?view_applications=$view_applications");
            } else {
                alert('error', 'Upload Failed', 'Please try again', "myscholarlist_details.php?view_applications=$view_applications");
            }
        }
    }

    // Modified query to fetch stipend information
    $stmt = $pdo->prepare("
    SELECT 
        scholarship.name, 
        scholarship.scholarshipID, 
        scholarship.scholarID, 
        daily_scholarship.sectioned_date, 
        scholarship_applications.date_apply, 
        scholarship_applications.application_status, 
        scholarship_applications.scholarship_refences,
        scholarship_applications.denial_feedback,
        scholarship_stipends.release_date,
        scholarship_stipends.release_venue,
        scholarship_stipends.amount,
        scholarship_stipends.requirements,
        scholarship_stipends.status as stipend_status
    FROM scholarship_applications 
    JOIN daily_scholarship ON scholarship_applications.dailyscholarshipID = daily_scholarship.dailyscholarshipID 
    JOIN scholarship ON scholarship.scholarshipID = daily_scholarship.scholarshipID
    LEFT JOIN scholarship_stipends ON scholarship_stipends.scholarship_id = scholarship.scholarshipID
    WHERE scholarship_applications.applicationsID = :applicationsID 
    AND scholarship_applications.userID = :userID");

    $stmt->bindParam(":applicationsID", $view_applications, PDO::PARAM_INT);
    $stmt->bindParam(":userID", $id, PDO::PARAM_INT);
    $stmt->execute();
    $details = $stmt->fetch();

    // Rest of your existing document queries...
    ?>

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include "./sidebar.php"; ?>
            <div class="layout-page">
                <?php include "./topbar.php"; ?>
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <link rel="stylesheet"
                            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

                        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
                            rel="stylesheet">
                        <style>
                            body {
                                font-family: 'Poppins', sans-serif;
                            }

                            .card {
                                border: none;
                                border-radius: 16px;
                                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
                                transition: transform 0.3s ease;
                                overflow: hidden;
                            }

                            .card-header {
                                background: #fff;
                                border-bottom: 1px solid #edf2f7;
                                padding: 1.5rem;
                            }

                            .card-header h5 {
                                font-weight: 600;
                                color: #2d3436;
                                margin-bottom: 0.5rem;
                            }

                            .card-body {
                                padding: 1.5rem;
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

                            label {
                                font-weight: 500;
                                color: #4a5568;
                                margin-bottom: 0.5rem;
                            }

                            .btn {
                                font-family: 'Poppins', sans-serif;
                                padding: 0.6rem 1.2rem;
                                border-radius: 8px;
                                transition: all 0.3s ease;
                            }

                            .btn-primary {
                                background: #800000;
                                border: none;
                            }

                            .btn-primary:hover {
                                background: #600000;
                                transform: translateY(-2px);
                            }

                            .table {
                                border-radius: 10px;
                                overflow: hidden;
                            }

                            .table thead th {
                                background: #f8fafc;
                                font-weight: 600;
                                text-transform: uppercase;
                                font-size: 0.85rem;
                                letter-spacing: 0.5px;
                            }

                            .table td,
                            .table th {
                                padding: 1rem;
                                vertical-align: middle;
                            }

                            .text-danger,
                            .text-primary {
                                text-decoration: none;
                                font-weight: 500;
                                transition: opacity 0.3s ease;
                            }

                            .text-danger:hover,
                            .text-primary:hover {
                                opacity: 0.8;
                            }

                            .input-group {
                                display: flex;
                                align-items: stretch;
                                gap: 10px;
                            }

                            .input-group .form-control {
                                flex: 1;
                                margin-bottom: 0;
                            }

                            .input-group .btn {
                                flex-shrink: 0;
                                height: auto;
                                z-index: 1;
                            }

                            .btn-primary {
                                white-space: nowrap;
                                display: inline-flex;
                                align-items: center;
                            }

                            .status-badge {
                                padding: 0.5rem 1rem;
                                border-radius: 20px;
                                font-size: 0.85rem;
                                font-weight: 500;
                            }

                            .status-pending {
                                background: #fff8e1;
                                color: #f59e0b;
                            }

                            .status-approved {
                                background: #dcfce7;
                                color: #16a34a;
                            }

                            .status-denied {
                                background: #fee2e2;
                                color: #dc2626;
                            }
                        </style>
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="mb-1">Scholarship Details</h5>
                                        <div
                                            class="status-badge status-<?php echo $details['application_status'] == 0 ? 'pending' : ($details['application_status'] == 1 ? 'approved' : 'denied') ?>">
                                            <?php echo $details['application_status'] == 0 ? 'Pending' : ($details['application_status'] == 1 ? 'Approved' : 'Denied') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="details-group">
                                            <label>Scholarship Name</label>
                                            <div class="detail-value"><?php echo $details['name'] ?></div>
                                        </div>

                                        <div class="details-group">
                                            <label>Program ID</label>
                                            <div class="detail-value"><?php echo $details['scholarID'] ?></div>
                                        </div>

                                        <div class="details-group">
                                            <label>Application Reference</label>
                                            <div class="detail-value"><?php echo $details['scholarship_refences'] ?>
                                            </div>
                                        </div>

                                        <div class="details-group">
                                            <label>Application Date</label>
                                            <div class="detail-value"><?php echo $details['date_apply'] ?></div>
                                        </div>

                                        <div class="details-group">
                                            <label>Appointment Date</label>
                                            <div class="detail-value"><?php echo $details['sectioned_date'] ?></div>
                                        </div>

                                    </div>

                                    <div class="col-lg-6">
                                        <div class="documents-section">
                                            <h6 class="section-title">Required Documents</h6>
                                            <?php if ($documents_count > 0) { ?>
                                                <div class="document-list">
                                                    <?php foreach ($documents as $files) { ?>
                                                        <div class="document-item">
                                                            <i class="fas fa-file-alt"></i>
                                                            <a href="../assets/forms/<?php echo $files['document'] ?>"
                                                                class="document-link" download>
                                                                <?php echo $files['document_name'] ?>
                                                            </a>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            <?php } else { ?>
                                                <div class="no-documents">No Required Documents</div>
                                            <?php } ?>

                                            <?php if ($mydocuments_count > 0) { ?>
                                                <h6 class="section-title mt-4">My Submitted Documents</h6>
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Document Name</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 1;
                                                            foreach ($mydocuments as $mydocs) { ?>
                                                                <tr>
                                                                    <td><?php echo $i++ ?></td>
                                                                    <td>
                                                                        <a href="../assets/forms/<?php echo $mydocs['document_file']; ?>"
                                                                            class="document-link" download>
                                                                            <?php echo $mydocs['document_name']; ?>
                                                                        </a>
                                                                    </td>
                                                                    <td>
                                                                        <a href="myscholarlist_details.php?delete_mydocs=<?php echo $mydocs['socdocsID'] ?>&detail=<?php echo $view_applications ?>"
                                                                            class="btn btn-sm btn-outline-danger">
                                                                            <i class="fas fa-trash"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <!-- Add this after the Required Documents section -->
                                        <?php if ($details['application_status'] == 0) { ?>
                                            <div class="upload-documents mt-4">
                                                <h6 class="section-title">Submit Application Documents</h6>
                                                <form action="" method="POST" enctype="multipart/form-data">
                                                    <div class="mb-3">
                                                        <label for="documentFile" class="form-label">Upload Document</label>
                                                        <div class="input-group">
                                                            <input type="file" class="form-control" id="documentFile"
                                                                name="document_file" required>
                                                            <button type="submit" name="submit_document"
                                                                class="btn btn-primary">
                                                                <i class="fas fa-upload me-2"></i>Submit
                                                            </button>
                                                        </div>
                                                        <small class="text-muted">Accepted formats: PDF, DOC, DOCX (Max
                                                            size: 5MB)</small>
                                                    </div>
                                                </form>
                                            </div>


                                        <?php } ?>

                                        <!-- Add after Required Documents section -->
                                        <?php if ($details['application_status'] == 2 && !empty($details['denial_feedback'])) { ?>
                                            <div class="denial-feedback-container mt-4">
                                                <h6 class="section-title text-danger">
                                                    <i class="fas fa-info-circle me-2"></i>Application Denial Feedback
                                                </h6>
                                                <div class="feedback-content">
                                                    <p class="mb-0"><?php echo $details['denial_feedback']; ?></p>
                                                </div>
                                            </div>

                                            <style>
                                                .denial-feedback-container {
                                                    background: #fff5f5;
                                                    border: 1px solid #feb2b2;
                                                    border-radius: 8px;
                                                    padding: 1.5rem;
                                                }

                                                .denial-feedback-container .section-title {
                                                    color: #dc2626;
                                                    font-size: 1rem;
                                                    margin-bottom: 1rem;
                                                }

                                                .feedback-content {
                                                    background: white;
                                                    border-radius: 6px;
                                                    padding: 1rem;
                                                    color: #4a5568;
                                                }
                                            </style>
                                        <?php } ?>

                                        <?php if ($details['application_status'] == 1): ?>
                                            <div class="stipend-info mt-4">
                                                <h6 class="section-title">
                                                    <i class="fas fa-money-bill-wave me-2"></i>Stipend Information
                                                </h6>
                                                <div class="stipend-details">
                                                    <?php if (!empty($details['release_date'])): ?>
                                                        <div class="detail-group">
                                                            <label>Release Schedule</label>
                                                            <div class="detail-value">
                                                                <?php echo date('M d, Y h:i A', strtotime($details['release_date'])); ?>
                                                            </div>
                                                        </div>
                                                        <div class="detail-group">
                                                            <label>Venue</label>
                                                            <div class="detail-value"><?php echo $details['release_venue']; ?>
                                                            </div>
                                                        </div>
                                                        <div class="detail-group">
                                                            <label>Amount</label>
                                                            <div class="detail-value">
                                                                ₱<?php echo number_format($details['amount'], 2); ?></div>
                                                        </div>
                                                        <div class="detail-group">
                                                            <label>Requirements</label>
                                                            <div class="detail-value">
                                                                <?php echo $details['requirements'] ?: 'No specific requirements'; ?>
                                                            </div>
                                                        </div>
                                                        <div class="detail-group">
                                                            <label>Status</label>
                                                            <div
                                                                class="status-badge status-<?php echo $details['stipend_status']; ?>">
                                                                <?php echo ucfirst($details['stipend_status']); ?>
                                                            </div>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="no-stipend">
                                                            Stipend schedule has not been set yet.
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <style>
                                                .stipend-info {
                                                    background: #f8fafc;
                                                    padding: 1.5rem;
                                                    border-radius: 12px;
                                                }

                                                .stipend-details {
                                                    display: grid;
                                                    gap: 1rem;
                                                }

                                                .detail-group label {
                                                    font-size: 0.875rem;
                                                    color: #64748b;
                                                    margin-bottom: 0.25rem;
                                                }

                                                .detail-value {
                                                    font-weight: 500;
                                                    color: #1e293b;
                                                }

                                                .no-stipend {
                                                    color: #64748b;
                                                    font-style: italic;
                                                }

                                                .status-pending {
                                                    background: #fff8e1;
                                                    color: #f59e0b;
                                                }

                                                .status-ongoing {
                                                    background: #e0f2fe;
                                                    color: #0284c7;
                                                }

                                                .status-completed {
                                                    background: #dcfce7;
                                                    color: #16a34a;
                                                }
                                            </style>
                                        <?php endif; ?>


                                    </div>
                                </div>
                            </div>
                        </div>

                        <style>
                            .details-group {
                                margin-bottom: 1.5rem;
                            }

                            .details-group label {
                                display: block;
                                color: #64748b;
                                font-size: 0.875rem;
                                margin-bottom: 0.5rem;
                            }

                            .detail-value {
                                background: #f8fafc;
                                padding: 0.75rem 1rem;
                                border-radius: 8px;
                                color: #1e293b;
                                font-weight: 500;
                            }

                            .section-title {
                                color: #1e293b;
                                font-weight: 600;
                                margin-bottom: 1rem;
                            }

                            .document-list {
                                display: flex;
                                flex-direction: column;
                                gap: 0.75rem;
                            }

                            .document-item {
                                display: flex;
                                align-items: center;
                                gap: 0.75rem;
                                padding: 0.75rem;
                                background: #f8fafc;
                                border-radius: 8px;
                                transition: all 0.3s ease;
                            }

                            .document-item:hover {
                                background: #f1f5f9;
                                transform: translateX(5px);
                            }

                            .document-link {
                                color: #800000;
                                text-decoration: none;
                                font-weight: 500;
                                transition: color 0.3s ease;
                            }

                            .document-link:hover {
                                color: #600000;
                            }

                            .status-badge {
                                display: inline-block;
                                padding: 0.5rem 1rem;
                                border-radius: 20px;
                                font-size: 0.875rem;
                                font-weight: 500;
                            }

                            .status-pending {
                                background: #fff8e1;
                                color: #f59e0b;
                            }

                            .status-approved {
                                background: #dcfce7;
                                color: #16a34a;
                            }

                            .status-denied {
                                background: #fee2e2;
                                color: #dc2626;
                            }

                            .table {
                                margin-top: 1rem;
                            }

                            .table th {
                                font-weight: 600;
                                color: #64748b;
                            }

                            .document-item {
                                display: flex;
                                align-items: center;
                                gap: 0.75rem;
                                padding: 0.75rem;
                                background: #f8fafc;
                                border-radius: 8px;
                                transition: all 0.3s ease;
                            }

                            .document-item:hover {
                                background: #f1f5f9;
                                transform: translateX(5px);
                            }

                            .document-link {
                                color: #800000;
                                text-decoration: none;
                                font-weight: 500;
                                transition: color 0.3s ease;
                            }

                            .document-link:hover {
                                color: #600000;
                            }

                            .upload-documents {
                                margin-top: 2rem;
                            }

                            .section-title {
                                font-size: 1.25rem;
                                font-weight: 600;
                                margin-bottom: 1rem;
                            }

                            .form-label {
                                font-weight: 500;
                            }

                            .input-group .btn {
                                border-top-left-radius: 0;
                                border-bottom-left-radius: 0;
                            }

                            .no-documents {
                                color: #64748b;
                                padding: 1rem;
                                text-align: center;
                                background: #f8fafc;
                                border-radius: 8px;
                            }

                            .upload-documents {
                                background: #f8fafc;
                                padding: 1.5rem;
                                border-radius: 12px;
                                margin-top: 2rem;
                            }

                            .document-link .fas {
                                transition: transform 0.3s ease;
                            }

                            .document-link:hover .fas {
                                transform: translateY(2px);
                            }

                            .input-group .btn {
                                z-index: 0;
                            }
                        </style>

                    </div>
                    <?php include "./footer.php"; ?>