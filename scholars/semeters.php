<?php include "./head.php";
$a = 4;
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

                            select.form-control {
                                appearance: none;
                                background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'%3E%3Cpath fill='%232d3436' d='M7 10l5 5 5-5z'/%3E%3C/svg%3E");
                                background-repeat: no-repeat;
                                background-position: right 0.7rem center;
                                background-size: 1.5rem;
                            }

                            .form-label {
                                font-weight: 500;
                                color: #2d3436;
                                margin-bottom: 0.5rem;
                            }

                            .btn {
                                padding: 0.8rem 1.5rem;
                                border-radius: 8px;
                                font-weight: 500;
                                transition: all 0.3s ease;
                            }

                            .btn:hover {
                                transform: translateY(-2px);
                            }

                            .btn-primary {
                                background: #800000;
                                border: none;
                                box-shadow: 0 4px 12px rgba(128, 0, 0, 0.2);
                            }

                            .btn-success {
                                background: #059669;
                                border: none;
                            }

                            .btn-dark {
                                background: #1f2937;
                                border: none;
                            }

                            .btn-info {
                                background: #0ea5e9;
                                border: none;
                                color: white;
                            }

                            .btn-sm {
                                padding: 0.5rem 1rem;
                                font-size: 0.875rem;
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

                            .btn-danger {
                                background: #dc2626;
                                color: white;
                            }

                            .semester-status {
                                display: inline-block;
                                padding: 0.4rem 1rem;
                                border-radius: 20px;
                                font-size: 0.875rem;
                                font-weight: 500;
                            }

                            .active-semester {
                                background: #dcfce7;
                                color: #166534;
                            }

                            .action-buttons {
                                display: flex;
                                gap: 0.5rem;
                            }

                            .btn-sm {
                                width: 32px;
                                height: 32px;
                                padding: 0;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                border-radius: 6px;
                            }

                            .btn-edit {
                                background: #3498db;
                                color: white;
                            }

                            .btn-delete {
                                background: #e74c3c;
                                color: white;
                            }

                            .btn-activate {
                                background: #2ecc71;
                                color: white;
                            }

                            .action-buttons .btn-sm {
                                width: 32px;
                                height: 32px;
                                padding: 0;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                border-radius: 6px;
                            }

                            .btn-activate {
                                background: #2ecc71;
                                color: white;
                                width: auto;
                                padding: 0.25rem 0.75rem;
                            }

                            .badge {
                                padding: 0.5rem 1rem;
                                border-radius: 20px;
                            }

                            .table-responsive {
                                border-radius: 8px;
                                overflow: hidden;
                            }
                        </style>

                        <div class="row">
                            <!-- Semester Form Card -->
                            <div class="col-sm-6 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h4><i class="fas fa-calendar-alt me-2"></i>Semester Section</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-sm-12 mb-3">
                                                    <label><i class="fas fa-graduation-cap me-2"></i>Semester
                                                        Name</label>
                                                    <select name="semname" class="form-control" required>
                                                        <option value="1st Semester">1st Semester</option>
                                                        <option value="2nd Semester">2nd Semester</option>
                                                        <option value="Summer">Summer</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <label><i class="fas fa-hourglass-start me-2"></i>Semester
                                                        Start</label>
                                                    <input type="date" name="semstart" class="form-control" required>
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <label><i class="fas fa-hourglass-end me-2"></i>Semester End</label>
                                                    <input type="date" name="semend" class="form-control" required>
                                                </div>
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-primary"
                                                        name="semestersection">
                                                        <i class="fas fa-save me-2"></i>Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Semester List Card -->
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4><i class="fas fa-list-alt me-2"></i>Semester List</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="mydata" class="display">
                                                <thead>
                                                    <tr>
                                                        <th><i class="fas fa-graduation-cap me-2"></i>Semester</th>
                                                        <th><i class="fas fa-calendar-alt me-2"></i>Duration</th>
                                                        <th><i class="fas fa-check-circle me-2"></i>Status</th>
                                                        <th><i class="fas fa-cogs me-2"></i>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($semesters as $list) { ?>
                                                        <tr>
                                                            <td>
                                                                <i class="fas fa-book me-2 text-primary"></i>
                                                                <?php echo $list['sememestrName'] ?>
                                                            </td>
                                                            <td>
                                                                <i class="fas fa-clock me-2 text-info"></i>
                                                                <?php echo date('M d, Y', strtotime($list['date_start'])) ?>
                                                                -
                                                                <?php echo date('M d, Y', strtotime($list['date_end'])) ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($list['flag'] == 1) { ?>
                                                                    <span class="badge bg-success">
                                                                        <i class="fas fa-check-circle me-1"></i>Active
                                                                    </span>
                                                                <?php } else { ?>
                                                                    <a href="semeters.php?activesemester=<?php echo $list['semesterID'] ?>"
                                                                        class="btn btn-sm btn-activate">
                                                                        <i class="fas fa-toggle-off me-1"></i>Activate
                                                                    </a>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <div class="action-buttons">
                                                                    <a href="semeters.php?edit_semester=<?php echo $list['semesterID'] ?>"
                                                                        class="btn btn-edit btn-sm">
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>
                                                                    <a href="semeters.php?delete_semester=<?php echo $list['semesterID'] ?>"
                                                                        class="btn btn-delete btn-sm">
                                                                        <i class="fas fa-trash"></i>
                                                                    </a>
                                                                </div>
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
                    <?php include "./footer.php"; ?>