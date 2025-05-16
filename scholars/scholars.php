<?php include "./head.php";
$a = 9;
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
                            }

                            .card-header h4 {
                                margin: 0;
                                font-weight: 600;
                            }

                            .card-body {
                                padding: 2rem;
                            }

                            table#mydata1 {
                                width: 100% !important;
                                border-collapse: separate;
                                border-spacing: 0;
                            }

                            table#mydata1 thead th {
                                background: #f8f9fa;
                                padding: 1rem;
                                font-weight: 600;
                                color: #2d3436;
                                border: none;
                            }

                            table#mydata1 tbody td {
                                padding: 1rem;
                                border-bottom: 1px solid #edf2f7;
                                vertical-align: middle;
                            }

                            .btn-primary {
                                background: #800000;
                                border: none;
                                padding: 0.6rem 1.2rem;
                                border-radius: 8px;
                                font-weight: 500;
                                transition: all 0.3s ease;
                            }

                            .btn-primary:hover {
                                transform: translateY(-2px);
                                box-shadow: 0 4px 12px rgba(128, 0, 0, 0.2);
                            }

                            /* Contact Links Styling */
                            a[href^="mailto:"],
                            a[href^="tel:"] {
                                color: #800000;
                                text-decoration: none;
                                transition: color 0.3s ease;
                                display: inline-block;
                                margin-bottom: 0.2rem;
                            }

                            a[href^="mailto:"]:hover,
                            a[href^="tel:"]:hover {
                                color: #600000;
                                text-decoration: underline;
                            }

                            /* Time Created Styling */
                            td:nth-child(3) {
                                color: #64748b;
                                font-size: 0.9rem;
                            }

                            /* Responsive Table */
                            .table-responsive {
                                border-radius: 12px;
                                background: white;
                                padding: 1rem;
                            }

                            /* Modern DataTable Styling */
                            .scholar-table-container {
                                background: white;
                                border-radius: 16px;
                                padding: 1.5rem;
                                margin-bottom: 2rem;
                            }

                            table#mydata1 {
                                width: 100% !important;
                                border-collapse: separate;
                                border-spacing: 0;
                            }

                            table#mydata1 thead th {
                                background: #f8fafc;
                                padding: 1.2rem 1rem;
                                font-weight: 600;
                                color: #1e293b;
                                text-transform: uppercase;
                                letter-spacing: 0.5px;
                                font-size: 0.9rem;
                            }

                            table#mydata1 tbody td {
                                padding: 1.2rem 1rem;
                                border-bottom: 1px solid #e2e8f0;
                                color: #475569;
                                transition: all 0.2s ease;
                            }

                            table#mydata1 tbody tr:hover {
                                background: #f1f5f9;
                                transform: translateY(-1px);
                            }

                            /* Scholarship Grid Section */
                            .scholarships-grid {
                                display: grid;
                                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                                gap: 1.5rem;
                                padding: 1rem 0;
                            }

                            .scholarship-card {
                                background: white;
                                border-radius: 16px;
                                padding: 1.5rem;
                                transition: all 0.3s ease;
                                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
                            }

                            .scholarship-card:hover {
                                transform: translateY(-5px);
                                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
                            }

                            .scholarship-icon {
                                width: 50px;
                                height: 50px;
                                background: #fee2e2;
                                border-radius: 12px;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                margin-bottom: 1rem;
                            }

                            .scholarship-icon i {
                                color: #800000;
                                font-size: 1.5rem;
                            }

                            .scholarship-title {
                                font-size: 1.1rem;
                                font-weight: 600;
                                color: #1e293b;
                                margin-bottom: 0.5rem;
                            }

                            .scholarship-meta {
                                font-size: 0.9rem;
                                color: #64748b;
                                margin-bottom: 1rem;
                            }

                            .view-details-btn {
                                display: inline-flex;
                                align-items: center;
                                gap: 0.5rem;
                                padding: 0.75rem 1.25rem;
                                background: #800000;
                                color: white;
                                border-radius: 8px;
                                font-weight: 500;
                                transition: all 0.3s ease;
                            }

                            .view-details-btn:hover {
                                background: #600000;
                                transform: translateY(-2px);
                            }
                        </style>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h4>Scholars Accounts</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="table-responsive">
                                                    <table id="mydata1" class="display" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th><i class="fas fa-user-graduate me-2"></i>Scholar
                                                                    Name</th>
                                                                <th><i class="fas fa-address-card me-2"></i>Contact</th>
                                                                <th><i class="fas fa-clock me-2"></i>Time Created</th>
                                                                <th><i class="fas fa-cog me-2"></i>Action</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php foreach ($user_check as $valid_list) { ?>
                                                                <tr>
                                                                    <td><?php echo $valid_list['first_name'] . " " . $valid_list['last_name'] ?>
                                                                    </td>
                                                                    <td><a
                                                                            href="mailto:<?php echo $valid_list['email'] ?>"><?php echo $valid_list['email'] ?></a>
                                                                        <br> <a
                                                                            href="tel:+<?php echo $valid_list['contact'] ?>"><?php echo $valid_list['contact'] ?></a>
                                                                    </td>
                                                                    <td><?php echo $valid_list['created_account'] ?></td>
                                                                    <td>
                                                                        <a href="account_profiles.php?account=<?php echo $valid_list['userID'] ?>"
                                                                            class="btn btn-primary"><i
                                                                                class="fas fa-eye"></i>&nbspView</a>
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
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h4><i class="fas fa-award me-2"></i>Available Scholarships</h4>
                                </div>
                                <div class="card-body">
                                    <div class="scholarships-grid">
                                        <?php foreach ($scholarships as $scholarship) { ?>
                                            <div class="scholarship-card">
                                                <div class="scholarship-icon">
                                                    <i class="fas fa-graduation-cap"></i>
                                                </div>
                                                <h3 class="scholarship-title"><?php echo $scholarship['name']; ?></h3>
                                                <div class="scholarship-meta">
                                                    <i class="fas fa-calendar-alt me-2"></i>
                                                    <?php echo date('M d, Y', strtotime($scholarship['date_start'])); ?> -
                                                    <?php echo date('M d, Y', strtotime($scholarship['date_end'])); ?>
                                                </div>

                                                <a href="applications.php?scholarship_id=<?php echo $scholarship['scholarID']; ?>"
                                                    class="view-details-btn">
                                                    <i class="fas fa-eye"></i>
                                                    View Details
                                                </a>

                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <?php include "./footer.php"; ?>