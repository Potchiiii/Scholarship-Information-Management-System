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

                            table#printables {
                                width: 100% !important;
                                border-collapse: separate;
                                border-spacing: 0;
                            }

                            table#printables thead th {
                                background: #f8f9fa;
                                padding: 1rem;
                                font-weight: 600;
                                color: #2d3436;
                                border: none;
                            }

                            table#printables tbody td {
                                padding: 1rem;
                                border-bottom: 1px solid #edf2f7;
                                vertical-align: middle;
                            }

                            .scholarship-id {
                                font-size: 0.875rem;
                                color: #800000;
                                font-weight: 500;
                            }

                            .status-badge {
                                display: inline-block;
                                padding: 0.4rem 1rem;
                                border-radius: 20px;
                                font-size: 0.875rem;
                                font-weight: 500;
                            }

                            .status-available {
                                background: #dcfce7;
                                color: #166534;
                            }

                            .status-hidden {
                                background: #f3f4f6;
                                color: #4b5563;
                            }

                            #summernote {
                                margin-top: 1rem;
                                border-radius: 10px;
                            }

                            .card {
                                border: none;
                                border-radius: 16px;
                                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
                                margin-bottom: 2rem;
                            }

                            .card-header {
                                background: white;
                                color: #2d3436;
                                padding: 1.5rem;
                                border-bottom: 2px solid #f1f1f1;
                                font-weight: 600;
                            }

                            .form-control {
                                border: 2px solid #edf2f7;
                                border-radius: 10px;
                                padding: 0.8rem 1rem;
                                margin-bottom: 1rem;
                                transition: all 0.3s ease;
                            }

                            .form-control:focus {
                                border-color: #800000;
                                box-shadow: 0 0 0 4px rgba(128, 0, 0, 0.1);
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

                            .btn-edit {
                                background: #3498db;
                                color: white;
                            }

                            .btn-delete {
                                background: #e74c3c;
                                color: white;
                            }

                            .btn-view {
                                background: #2ecc71;
                                color: white;
                            }

                            .status-badge {
                                padding: 0.4rem 1rem;
                                border-radius: 20px;
                                font-size: 0.875rem;
                                font-weight: 500;
                            }

                            .status-available {
                                background: #d1fae5;
                                color: #065f46;
                            }

                            .status-hidden {
                                background: #f3f4f6;
                                color: #4b5563;
                            }

                            .scholarship-id {
                                font-size: 0.875rem;
                                color: #800000;
                            }

                            .active-sem {
                                color: #2ecc71;
                                font-weight: 600;
                            }

                            .action-buttons {
                                display: grid;
                                grid-template-columns: repeat(3, 1fr);
                                gap: 0.5rem;
                                width: fit-content;
                            }

                            .btn-sm {
                                padding: 0.4rem;
                                font-size: 0.875rem;
                                width: 32px;
                                height: 32px;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                border-radius: 6px;
                            }

                            /* Add these styles to your existing <style> section */

                            .scholarship-form-card {
                                background: #ffffff;
                                border-radius: 16px;
                                box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
                            }

                            .scholarship-form-card .card-header {
                                padding: 1.8rem 2rem;
                                font-size: 1.25rem;
                            }

                            .scholarship-form-card .card-body {
                                padding: 2rem 2.5rem;
                            }

                            .form-section {
                                margin-bottom: 2.5rem;
                            }

                            .form-group {
                                margin-bottom: 1.5rem;
                            }

                            .form-group label {
                                font-size: 1rem;
                                font-weight: 500;
                                margin-bottom: 0.75rem;
                                color: #2d3436;
                                display: block;
                            }

                            .form-control,
                            .form-select {
                                font-size: 1rem;
                                padding: 0.8rem 1.2rem;
                                line-height: 1.5;
                                margin-bottom: 1.5rem;
                            }

                            .text-helper {
                                display: block;
                                margin-top: 0.5rem;
                                color: #64748b;
                                font-size: 0.9rem;
                            }

                            #summernote {
                                min-height: 250px;
                            }

                            .btn-primary {
                                padding: 1rem 2rem;
                                font-size: 1rem;
                                letter-spacing: 0.5px;
                            }

                            /* Update the column width */
                            .row {
                                display: flex;
                                flex-wrap: wrap;
                            }

                            .col-sm-5 {
                                width: 45%;
                                /* Increase width */
                            }

                            .col-sm-7 {
                                width: 55%;
                            }
                        </style>
                        <div class="row">
                            <!-- Create Scholarship Program - Full Width -->
                            <div class="col-12">
                                <div class="card scholarship-form-card">
                                    <div class="card-header">
                                        <i class="fas fa-graduation-cap me-2"></i>
                                        Create Scholarship Program
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="form-section mb-4">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label><i
                                                                    class="fas fa-calendar-alt me-2"></i>Semester</label>
                                                            <select name="semester" class="form-select">
                                                                <option value="<?php echo $semdetails['semesterID'] ?>">
                                                                    Active Semester</option>
                                                                <?php foreach ($semesters as $list) { ?>
                                                                    <option value="<?php echo $list['semesterID'] ?>">
                                                                        <?php echo $list['sememestrName'] . " [ " . $list['date_start'] . " - " . $list['date_end'] . " ]" ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label><i class="fas fa-users me-2"></i>Slot Limit</label>
                                                            <input type="number" name="limit" class="form-control"
                                                                value="<?php echo $details['limitation'] ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-section mb-4">
                                                <div class="form-group">
                                                    <label><i class="fas fa-award me-2"></i>Program Name</label>
                                                    <input type="text" name="name" class="form-control"
                                                        value="<?php echo $details['name'] ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-section mb-4">
                                                <div class="form-group">
                                                    <label><i class="fas fa-building me-2"></i>Scholarship
                                                        Sector</label>
                                                    <select name="sector" class="form-select" required>
                                                        <option value="Government">Government (CHED, DSWD, etc.)
                                                        </option>
                                                        <option value="Private">Private Sector</option>
                                                        <option value="NGO">Non-Government Organization</option>
                                                        <option value="LGU">Local Government Unit</option>
                                                        <option value="International">International Organization
                                                        </option>
                                                    </select>
                                                    <small class="text-helper">Select the sector/organization providing
                                                        this scholarship</small>
                                                </div>
                                            </div>
                                            <div class="form-section mb-4">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label><i class="fas fa-calendar-check me-2"></i>Program
                                                                Validity</label>
                                                            <input type="date" name="validity_period"
                                                                class="form-control"
                                                                value="<?php echo $details['validity_period'] ?>"
                                                                required>
                                                            <small class="text-helper">Set how long scholars remain
                                                                eligible for this program</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-section mb-4">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label><i class="fas fa-hourglass-start me-2"></i>Start
                                                                Date</label>
                                                            <input type="date" name="date_start" class="form-control"
                                                                value="<?php echo $details['date_start'] ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label><i class="fas fa-hourglass-end me-2"></i>End
                                                                Date</label>
                                                            <input type="date" name="date_end" class="form-control"
                                                                value="<?php echo $details['date_end'] ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-section mb-4">
                                                <div class="form-group">
                                                    <label><i class="fas fa-file-alt me-2"></i>Program
                                                        Description</label>
                                                    <textarea name="description" id="summernote" class="form-control"
                                                        required><?php echo $details['description'] ?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-primary" name="scholar">
                                                    <i class="fas fa-save me-2"></i>Save Scholarship
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fas fa-list-alt me-2"></i>
                                        List of Scholarship Programs
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="printables" class="display">
                                                <thead>
                                                    <tr>
                                                        <th><i class="fas fa-graduation-cap me-2"></i>Scholarship</th>
                                                        <th><i class="fas fa-calendar-alt me-2"></i>Date Range</th>
                                                        <th><i class="fas fa-info-circle me-2"></i>Status</th>
                                                        <th><i class="fas fa-cogs me-2"></i>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($scholarships as $data) { ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $data['name'] ?>
                                                                <span class="scholarship-id <?php if ($data['semesterID'] == $activesem) {
                                                                    echo "active-sem";
                                                                } ?>">
                                                                    <i
                                                                        class="fas fa-hashtag me-1"></i><?php echo $data['scholarID'] ?>
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <i class="far fa-calendar-alt me-2"></i>
                                                                <?php echo $data['date_start'] . " - " . $data['date_end'] ?>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="status-badge <?php echo $data['ctrl_status'] == 0 ? 'status-hidden' : 'status-available'; ?>">
                                                                    <i
                                                                        class="fas <?php echo $data['ctrl_status'] == 0 ? 'fa-eye-slash' : 'fa-eye'; ?> me-2"></i>
                                                                    <?php echo $data['ctrl_status'] == 0 ? 'Hidden' : 'Available'; ?>
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <div class="action-buttons">
                                                                    <?php if ($data['ctrl_status'] == 0) { ?>
                                                                        <a href="scholarships.php?edit_scholar=<?php echo $data['scholarshipID'] ?>"
                                                                            class="btn btn-edit btn-sm">
                                                                            <i class="fas fa-edit"></i>
                                                                        </a>
                                                                    <?php } ?>
                                                                    <a href="scholarships.php?delete_scholar=<?php echo $data['scholarshipID'] ?>"
                                                                        class="btn btn-delete btn-sm">
                                                                        <i class="fas fa-trash-alt"></i>
                                                                    </a>
                                                                    <a href="daily_scholarships.php?daily_details=<?php echo $data['scholarshipID'] ?>"
                                                                        class="btn btn-view btn-sm">
                                                                        <i class="fas fa-eye"></i>
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