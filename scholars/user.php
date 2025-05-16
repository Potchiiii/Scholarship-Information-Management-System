<?php include "./head.php";
$a = 2;
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
                                margin-bottom: 2rem;
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
                                margin-bottom: 1rem;
                            }

                            .form-control:focus {
                                border-color: #800000;
                                box-shadow: 0 0 0 4px rgba(128, 0, 0, 0.1);
                            }

                            select.form-control {
                                appearance: none;
                                background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'%3E%3Cpath fill='%232d3436' d='M7 10l5 5 5-5z'/%3E%3C/svg%3E");
                                background-repeat: no-repeat;
                                background-position: right 0.7rem center;
                                background-size: 1.5rem;
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

                            table.display {
                                width: 100% !important;
                                border-collapse: separate;
                                border-spacing: 0;
                            }

                            table.display thead th {
                                background: #f8f9fa;
                                padding: 1rem;
                                font-weight: 600;
                                color: #2d3436;
                                border: none;
                            }

                            table.display tbody td {
                                padding: 1rem;
                                border-bottom: 1px solid #edf2f7;
                                vertical-align: middle;
                            }

                            .admin-role {
                                display: inline-block;
                                padding: 0.3rem 0.8rem;
                                border-radius: 20px;
                                font-size: 0.875rem;
                                font-weight: 500;
                                background: #f8f9fa;
                                color: #2d3436;
                            }

                            .alert {
                                border-radius: 12px;
                                padding: 1rem;
                                margin-bottom: 1.5rem;
                                border: none;
                            }

                            .alert-danger {
                                background: #fee2e2;
                                color: #991b1b;
                            }

                            .status-badge {
                                padding: 0.4rem 0.8rem;
                                border-radius: 20px;
                                font-size: 0.875rem;
                                font-weight: 500;
                            }

                            .status-active {
                                background: #d1fae5;
                                color: #065f46;
                            }

                            .status-pending {
                                background: #fff8e1;
                                color: #f59e0b;
                            }

                            .btn-primary {
                                background: #800000;
                                border: none;
                            }

                            .btn-primary:hover {
                                background: #600000;
                                transform: translateY(-2px);
                            }

                            .form-control {
                                border-radius: 8px;
                                border: 2px solid #edf2f7;
                                padding: 0.6rem 1rem;
                                margin-bottom: 1rem;
                            }

                            .form-control:focus {
                                border-color: #800000;
                                box-shadow: 0 0 0 3px rgba(128, 0, 0, 0.1);
                            }
                        </style>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h4><i class="fas fa-users-cog me-2"></i>Administrative Accounts</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <!-- Admin Creation Form -->
                                            <div class="col-sm-4">
                                                <form action="" method="POST" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <label><i class="fas fa-id-badge me-2"></i>Administrative
                                                                ID</label>
                                                            <input type="text" name="studentid" class="form-control">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label><i class="fas fa-user-shield me-2"></i>Admin
                                                                Type</label>
                                                            <select name="admintype" class="form-control">
                                                                <option value="1">Master Administrator</option>
                                                                <option value="2">Moderator</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label><i class="fas fa-user me-2"></i>First Name</label>
                                                            <input type="text" name="first" class="form-control">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label><i class="fas fa-user me-2"></i>Last Name</label>
                                                            <input type="text" name="last" class="form-control">
                                                        </div>
                                                        <div class="col-12">
                                                            <label><i class="fas fa-envelope me-2"></i>Email</label>
                                                            <input type="email" name="email" class="form-control">
                                                        </div>
                                                        <div class="col-12">
                                                            <label><i class="fas fa-phone me-2"></i>Contact
                                                                Number</label>
                                                            <input type="text" name="number" class="form-control">
                                                        </div>
                                                        <div class="col-12">
                                                            <label><i class="fas fa-lock me-2"></i>Password</label>
                                                            <input type="password" name="password" class="form-control">
                                                        </div>
                                                        <div class="col-12">
                                                            <label><i class="fas fa-lock me-2"></i>Confirm
                                                                Password</label>
                                                            <input type="password" name="cpassword"
                                                                class="form-control">
                                                        </div>
                                                        <div class="col-12 mt-3">
                                                            <button type="submit" class="btn btn-primary w-100"
                                                                name="adminsignup">
                                                                <i class="fas fa-user-plus me-2"></i>Create Account
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- Admin List Table -->
                                            <div class="col-sm-8">
                                                <div class="table-responsive">
                                                    <table id="mydata" class="display">
                                                        <thead>
                                                            <tr>
                                                                <th><i class="fas fa-user me-2"></i>Admin Name</th>
                                                                <th><i class="fas fa-address-card me-2"></i>Contacts
                                                                </th>
                                                                <th><i class="fas fa-clock me-2"></i>Time Created</th>
                                                                <th><i class="fas fa-info-circle me-2"></i>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($administators_list as $list) { ?>
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <i
                                                                                class="fas <?php echo $list['roles'] == 1 ? 'fa-user-shield' : 'fa-user-tie'; ?> me-2"></i>
                                                                            <div>
                                                                                <?php echo $list['first_name'] . " " . $list['last_name'] ?><br>
                                                                                <small class="text-muted">
                                                                                    <?php echo $list['roles'] == 1 ? 'Administrator' : 'Moderator'; ?>
                                                                                </small>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <i
                                                                            class="fas fa-envelope me-2"></i><?php echo $list['email'] ?><br>
                                                                        <i
                                                                            class="fas fa-phone me-2"></i><?php echo $list['contact'] ?>
                                                                    </td>
                                                                    <td>
                                                                        <i class="fas fa-calendar-alt me-2"></i>
                                                                        <?php echo date('M d, Y', strtotime($list['created_account'])) ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php if ($list['status'] == 'notverified'): ?>
                                                                            <a href="#"
                                                                                onclick="confirmActivation(<?php echo $list['userID']; ?>)"
                                                                                class="btn btn-sm btn-success">
                                                                                <i class="fas fa-check-circle me-2"></i>Activate
                                                                                Account
                                                                            </a>
                                                                        <?php else: ?>
                                                                            <span class="status-badge status-active">
                                                                                <i class="fas fa-check-circle me-2"></i>Verified
                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <script>
                        function confirmActivation(userId) {
                            Swal.fire({
                                title: 'Activate Admin Account?',
                                text: 'This will grant full access to the administrator',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#28a745',
                                cancelButtonColor: '#dc3545',
                                confirmButtonText: 'Yes, activate it!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Use AJAX instead of direct window.location
                                    $.ajax({
                                        url: 'controls.php',
                                        method: 'GET',
                                        data: { verify_admin: userId },
                                        success: function () {
                                            window.location.reload();
                                        }
                                    });
                                }
                            });
                        }

                    </script>

                    <?php include "./footer.php"; ?>