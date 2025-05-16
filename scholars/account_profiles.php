<?php include "./head.php";
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
                                overflow: hidden;
                            }

                            .card-header {
                                background: white;
                                color: #2d3436;
                                padding: 1.5rem;
                                border-bottom: 2px solid #f1f1f1;
                                font-size: 1.25rem;
                                font-weight: 600;
                            }

                            .card-body {
                                padding: 2rem;
                            }

                            .profile-image {
                                width: 200px;
                                height: 200px;
                                object-fit: cover;
                                border-radius: 50%;
                                border: 4px solid white;
                                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                                margin-bottom: 1.5rem;
                            }

                            .form-control {
                                border: 2px solid #edf2f7;
                                border-radius: 10px;
                                padding: 0.8rem 1rem;
                                font-family: 'Poppins', sans-serif;
                                transition: all 0.3s ease;
                                margin-bottom: 1rem;
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

                            .btn-danger {
                                background: #800000;
                                border: none;
                                padding: 0.8rem 1.5rem;
                                border-radius: 8px;
                                font-weight: 500;
                                transition: all 0.3s ease;
                            }

                            .btn-danger:hover {
                                transform: translateY(-2px);
                                box-shadow: 0 4px 12px rgba(128, 0, 0, 0.2);
                            }

                            .cor-link {
                                display: inline-block;
                                padding: 0.5rem 1rem;
                                background: #f8f9fa;
                                border-radius: 8px;
                                color: #800000;
                                text-decoration: none;
                                transition: all 0.3s ease;
                            }

                            .cor-link:hover {
                                background: #800000;
                                color: white;
                            }

                            .border-danger {
                                border-color: #fee2e2 !important;
                                background: #fff5f5;
                            }

                            .text-danger {
                                color: #991b1b !important;
                            }

                            .profile-wrapper {
                                width: 200px;
                                height: 200px;
                                margin: 0 auto;
                                position: relative;
                            }

                            .profile-image {
                                width: 100%;
                                height: 100%;
                                border-radius: 50%;
                                object-fit: cover;
                                border: 4px solid white;
                                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                            }

                            .account-badge {
                                padding: 0.5rem 1rem;
                                border-radius: 20px;
                                font-size: 0.875rem;
                                font-weight: 500;
                            }

                            .account-badge.pending {
                                background: #fee2e2;
                                color: #991b1b;
                            }

                            .account-badge.verified {
                                background: #d1fae5;
                                color: #065f46;
                            }

                            .btn-validate {
                                background: #800000;
                                color: white;
                                padding: 0.8rem 1.5rem;
                                border-radius: 8px;
                                transition: all 0.3s ease;
                            }

                            .btn-validate:hover {
                                background: #600000;
                                color: white;
                                transform: translateY(-2px);
                            }

                            .form-control {
                                border-radius: 8px;
                                border: 2px solid #edf2f7;
                                padding: 0.7rem 1rem;
                            }

                            .form-control:disabled {
                                background: #f8f9fa;
                            }
                        </style>

                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4>
                                    <i class="fas fa-user-circle me-2"></i>
                                    Scholar Profile: <?php echo $details['first_name'] . " " . $details['last_name'] ?>
                                </h4>
                                <div>
                                    <span
                                        class="account-badge <?php echo $details['account_verifyer'] == 0 ? 'pending' : 'verified' ?>">
                                        <i
                                            class="fas <?php echo $details['account_verifyer'] == 0 ? 'fa-clock' : 'fa-check-circle' ?> me-2"></i>
                                        <?php echo $details['account_verifyer'] == 0 ? 'Not Validated' : 'Validated' ?>
                                    </span>
                                    <span
                                        class="account-badge <?php echo $details['status'] == 'verified' ? 'verified' : 'pending' ?> ms-2">
                                        <i
                                            class="fas <?php echo $details['status'] == 'verified' ? 'fa-check' : 'fa-hourglass' ?> me-2"></i>
                                        <?php echo $details['status'] == 'verified' ? 'Email Verified' : 'Email Pending' ?>
                                    </span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4 text-center">
                                        <div class="profile-wrapper">
                                            <img src="../assets/images/profile/<?php echo $details['profile'] ?>"
                                                alt="Scholar Profile" class="profile-image">
                                        </div>
                                        <?php if ($details['cor'] != NULL) { ?>
                                            <a href="../assets/cor/<?php echo $details['cor'] ?>"
                                                class="btn btn-outline-danger mt-3" target="_blank">
                                                <i class="fas fa-file-pdf me-2"></i>View COR
                                            </a>
                                        <?php } ?>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="row g-3">
                                            <div class="col-sm-6">
                                                <label><i class="fas fa-id-card me-2"></i>Student ID</label>
                                                <input type="text" class="form-control"
                                                    value="<?php echo $details['studentID'] ?>" readonly>
                                            </div>
                                            <div class="col-sm-6">
                                                <label><i class="fas fa-user me-2"></i>Full Name</label>
                                                <input type="text" class="form-control"
                                                    value="<?php echo $details['first_name'] . ' ' . $details['last_name'] ?>"
                                                    readonly>
                                            </div>
                                            <div class="col-sm-6">
                                                <label><i class="fas fa-envelope me-2"></i>Email</label>
                                                <input type="text" class="form-control"
                                                    value="<?php echo $details['email'] ?>" readonly>
                                            </div>
                                            <div class="col-sm-6">
                                                <label><i class="fas fa-phone me-2"></i>Contact</label>
                                                <input type="text" class="form-control"
                                                    value="<?php echo $details['contact'] ?>" readonly>
                                            </div>
                                            <div class="col-12">
                                                <label><i class="fas fa-map-marker-alt me-2"></i>Address</label>
                                                <input type="text" class="form-control"
                                                    value="<?php echo $details['address'] ?>" readonly>
                                            </div>
                                            <div class="col-sm-6">
                                                <label><i class="fas fa-calendar-alt me-2"></i>Account Created</label>
                                                <input type="text" class="form-control"
                                                    value="<?php echo date('F d, Y', strtotime($details['created_account'])) ?>"
                                                    readonly>
                                            </div>
                                            <div class="col-sm-6">
                                                <label><i class="fas fa-shield-alt me-2"></i>Account Role</label>
                                                <input type="text" class="form-control"
                                                    value="<?php echo $details['roles'] == 3 ? 'Scholar' : ($details['roles'] == 2 ? 'Moderator' : 'Administrator') ?>"
                                                    readonly>
                                            </div>
                                            <?php if ($details['account_verifyer'] == 0) { ?>
                                                <div class="col-12 mt-3">
                                                    <a href="account_profiles.php?approve_account=<?php echo $details['userID'] ?>"
                                                        class="btn btn-validate">
                                                        <i class="fas fa-user-check me-2"></i>Validate Account
                                                    </a>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <?php include "./footer.php"; ?>