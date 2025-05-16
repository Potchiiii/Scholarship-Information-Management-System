<?php include "./head.php";
$a = 8;
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
                        <link rel="stylesheet"
                            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
                                overflow: hidden;
                            }

                            .card-header {
                                background: white;
                                color: #2d3436;
                                padding: 1.5rem;
                                border-bottom: 2px solid #f1f1f1;
                            }

                            .card-header h4 {
                                margin: 0;
                                font-weight: 600;
                            }

                            .card-body {
                                padding: 2rem;
                            }

                            .form-control {
                                border: 2px solid #edf2f7;
                                border-radius: 10px;
                                padding: 0.8rem 1rem;
                                font-family: 'Poppins', sans-serif;
                                transition: all 0.3s ease;
                            }

                            .form-control:focus {
                                border-color: #800000;
                                box-shadow: 0 0 0 4px rgba(128, 0, 0, 0.1);
                            }

                            .form-label {
                                font-weight: 500;
                                color: #2d3436;
                                margin-bottom: 0.5rem;
                            }

                            select.form-control {
                                appearance: none;
                                background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'%3E%3Cpath fill='%232d3436' d='M7 10l5 5 5-5z'/%3E%3C/svg%3E");
                                background-repeat: no-repeat;
                                background-position: right 0.7rem center;
                                background-size: 1.5rem;
                            }

                            .btn {
                                padding: 0.8rem 1.5rem;
                                border-radius: 8px;
                                font-weight: 500;
                                transition: all 0.3s ease;
                                margin-right: 0.5rem;
                            }

                            .btn:hover {
                                transform: translateY(-2px);
                            }

                            .btn-primary {
                                background: #58a1f8;
                                border: none;
                                box-shadow: 0 4px 12px rgba(128, 0, 0, 0.2);
                            }

                            .btn-secondary {
                                background: #f8f9fa;
                                color: #2d3436;
                                border: 2px solid #edf2f7;
                            }

                            .btn-secondary:hover {
                                background: #edf2f7;
                            }

                            .visibility-badge {
                                padding: 0.4rem 1rem;
                                border-radius: 20px;
                                font-size: 0.875rem;
                                font-weight: 500;
                            }

                            .visible {
                                background: #d1fae5;
                                color: #065f46;
                            }

                            .hidden {
                                background: #fee2e2;
                                color: #991b1b;
                            }

                            .bulletin-card {
                                background: white;
                                border-radius: 12px;
                                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
                                transition: transform 0.2s ease;
                                height: 100%;
                                padding: 1.5rem;
                            }

                            .bulletin-card:hover {
                                transform: translateY(-5px);
                            }

                            .bulletin-header {
                                display: flex;
                                justify-content: space-between;
                                align-items: center;
                                margin-bottom: 1rem;
                            }

                            .bulletin-badge {
                                padding: 0.5rem 1rem;
                                border-radius: 20px;
                                font-size: 0.875rem;
                                font-weight: 500;
                            }

                            .bulletin-badge.important {
                                background: #fee2e2;
                                color: #dc2626;
                            }

                            .bulletin-badge.announcement {
                                background: #e0e7ff;
                                color: #4f46e5;
                            }

                            .bulletin-badge.notice {
                                background: #fef3c7;
                                color: #d97706;
                            }

                            .bulletin-body {
                                color: #4b5563;
                                font-size: 0.95rem;
                                line-height: 1.6;
                            }

                            .visibility-badge {
                                font-size: 0.75rem;
                                padding: 0.25rem 0.75rem;
                            }

                            .visible {
                                background: #d1fae5;
                                color: #065f46;
                            }

                            .hidden {
                                background: #fee2e2;
                                color: #991b1b;
                            }

                            .bulletin-footer {
                                margin-top: 1.5rem;
                                padding-top: 1rem;
                                border-top: 1px solid #edf2f7;
                            }

                            .bulletin-date {
                                color: #6b7280;
                                font-size: 0.875rem;
                            }

                            .bulletin-date i {
                                margin-right: 0.5rem;
                            }

                            .bulletin-actions .btn {
                                padding: 0.375rem 0.75rem;
                                font-size: 0.875rem;
                            }

                            .bulletin-actions .btn i {
                                margin-right: 0.25rem;
                            }

                            .bulletin-actions {
                                position: absolute;
                                bottom: 1rem;
                                right: 1rem;
                                display: flex;
                                gap: 0.5rem;
                            }

                            .bulletin-card {
                                position: relative;
                                padding-bottom: 4rem;
                            }

                            .bulletin-footer {
                                position: absolute;
                                bottom: 1rem;
                                left: 1rem;
                                right: 1rem;
                                padding-top: 1rem;
                                border-top: 1px solid #edf2f7;
                                display: flex;
                                justify-content: space-between;
                                align-items: center;
                            }

                            .bulletin-card {
                                position: relative;
                                min-height: 200px;
                                padding-bottom: 4rem;
                            }

                            .bulletin-date {
                                color: #6b7280;
                                font-size: 0.875rem;
                            }

                            .bulletin-actions {
                                display: flex;
                                gap: 0.5rem;
                            }
                        </style>
                        <div class="row">
                            <div class="col-12">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">Create Bulletin</h5>
                                        <form method="POST">
                                            <div class="mb-3">
                                                <label class="form-label">Bulletin Content</label>
                                                <textarea class="form-control" name="buletcontecnt" rows="4"
                                                    required></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Type</label>
                                                <select class="form-select" name="altype" required>
                                                    <option value="Important">Important</option>
                                                    <option value="Announcement">Announcement</option>
                                                    <option value="Notice">Notice</option>
                                                </select>
                                            </div>
                                            <button type="submit" name="buletlet" class="btn btn-primary">Post
                                                Bulletin</button>
                                        </form>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Current Bulletins</h5>
                                        <div class="row g-4">
                                            <?php foreach ($bulletins as $bulletin): ?>
                                                <div class="col-md-6 col-lg-4">
                                                    <div class="bulletin-card">
                                                        <div class="bulletin-header">
                                                            <span
                                                                class="bulletin-badge <?php echo strtolower($bulletin['type']); ?>">
                                                                <?php echo $bulletin['type']; ?>
                                                            </span>
                                                        </div>
                                                        <div class="bulletin-body">
                                                            <?php echo $bulletin['descriptions']; ?>
                                                        </div>
                                                        <div class="bulletin-date">
                                                            <i class="fas fa-calendar-alt"></i>
                                                            <?php echo date('F d, Y', strtotime($bulletin['date_created'])); ?>
                                                        </div>
                                                        <div class="bulletin-actions mt-3">
                                                            <a href="bulletin.php?delete_bulletin=<?php echo $bulletin['buletID']; ?>"
                                                                class="btn btn-sm btn-danger">
                                                                <i class="fas fa-trash"></i> Delete
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "./footer.php"; ?>