<?php
include "./head.php";
$_SESSION['scholarship_viewed'] = true; // Mark as viewed when accessing the page
$a = 5;
?>



<body>
    <?php include "./controls.php"; ?>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include "./sidebar.php"; ?>
            <div class="layout-page">
                <?php include "./topbar.php"; ?>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
                <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
                    rel="stylesheet">
                <style>
                    body {
                        font-family: 'Poppins', sans-serif;
                    }

                    .container-xxl {
                        padding: 2rem;
                    }

                    .card {
                        border: none;
                        border-radius: 16px;
                        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
                        overflow: hidden;
                        transition: transform 0.3s ease;
                    }

                    .card:hover {
                        transform: translateY(-5px);
                    }

                    table.display {
                        width: 100% !important;
                        border-collapse: separate;
                        border-spacing: 0;
                        font-family: 'Poppins', sans-serif;
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
                        padding: 0.5rem 1rem;
                        border-radius: 8px;
                        font-weight: 500;
                        transition: all 0.3s ease;
                    }

                    .btn-danger:hover {
                        transform: translateY(-2px);
                        box-shadow: 0 4px 12px rgba(220, 53, 69, 0.2);
                    }

                    /* Status Badges */
                    .status-badge {
                        padding: 0.5rem 1rem;
                        border-radius: 20px;
                        font-size: 0.875rem;
                        font-weight: 500;
                    }

                    .status-approved {
                        background: #d1fae5;
                        color: #065f46;
                    }

                    .status-denied {
                        background: #fee2e2;
                        color: #991b1b;
                    }

                    .status-pending {
                        background: #fef3c7;
                        color: #92400e;
                    }

                    /* Enhanced table styles */
                    #mydata2 {
                        border-radius: 8px;
                        overflow: hidden;
                        border: none;
                    }

                    #mydata2 thead th {
                        background: #f8f9fa;
                        font-weight: 600;
                        text-transform: uppercase;
                        font-size: 0.85rem;
                        letter-spacing: 0.5px;
                        padding: 1.2rem 1rem;
                    }

                    #mydata2 tbody td {
                        padding: 1rem;
                        vertical-align: middle;
                        font-size: 0.9rem;
                    }

                    /* Status badge enhancements */
                    .status-badge {
                        display: inline-flex;
                        align-items: center;
                        padding: 0.5rem 1rem;
                        border-radius: 30px;
                        font-weight: 500;
                        font-size: 0.85rem;
                    }

                    /* Action button enhancement */
                    .btn-danger {
                        display: inline-flex;
                        align-items: center;
                        gap: 0.5rem;
                        padding: 0.5rem 1rem;
                        border-radius: 6px;
                        transition: all 0.3s ease;
                    }

                    .btn-danger:hover {
                        transform: translateY(-2px);
                        box-shadow: 0 4px 12px rgba(220, 53, 69, 0.2);
                    }

                    /* Row hover effect */
                    #mydata2 tbody tr {
                        transition: all 0.3s ease;
                    }

                    #mydata2 tbody tr:hover {
                        background-color: #f8f9fa;
                    }
                </style>
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table id="mydata2" class="display">
                                        <thead>
                                            <tr>
                                                <th><i class="fas fa-book-open me-2"></i>Name</th>
                                                <th><i class="fas fa-calendar-alt me-2"></i>Appointment Date</th>
                                                <th><i class="fas fa-clock me-2"></i>Date Applied</th>
                                                <th><i class="fas fa-calendar-check me-2"></i>Valid Until</th>
                                                <th><i class="fas fa-info-circle me-2"></i>Status</th>
                                                <th><i class="fas fa-hand-holding-usd me-2"></i>Claim Status</th>
                                                <th><i class="fas fa-cogs me-2"></i>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($mylist as $list): ?>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <i class="fas fa-graduation-cap me-2 text-danger"></i>
                                                            <span><?php echo $list['name'] ?></span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <i class="fas fa-calendar-check me-2 text-primary"></i>
                                                            <span><?php echo date('F d, Y', strtotime($list['sectioned_date'])) ?></span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <i class="fas fa-hourglass-half me-2 text-warning"></i>
                                                            <span><?php echo date('F d, Y', strtotime($list['date_apply'])) ?></span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <i class="fas fa-calendar-alt me-2 text-success"></i>
                                                            <span><?php echo date('F d, Y', strtotime($list['validity_period'])) ?></span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $statusIcon = '';
                                                        $statusClass = '';
                                                        if ($list['application_status'] == 1) {
                                                            $statusIcon = 'fas fa-check-circle';
                                                            $statusClass = 'status-approved';
                                                            $statusText = 'Approved';
                                                        } elseif ($list['application_status'] == 2) {
                                                            $statusIcon = 'fas fa-times-circle';
                                                            $statusClass = 'status-denied';
                                                            $statusText = 'Denied';
                                                        } else {
                                                            $statusIcon = 'fas fa-clock';
                                                            $statusClass = 'status-pending';
                                                            $statusText = 'Pending';
                                                        }
                                                        ?>
                                                        <span class="status-badge <?php echo $statusClass ?>">
                                                            <i class="<?php echo $statusIcon ?> me-2"></i>
                                                            <?php echo $statusText ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <?php if ($list['application_status'] == 1): ?>
                                                            <?php if ($list['claimed'] == 1): ?>
                                                                <span class="status-badge status-approved">
                                                                    <i class="fas fa-check-circle me-2"></i>Claimed
                                                                </span>
                                                            <?php else: ?>
                                                                <button
                                                                    onclick="claimScholarship(<?php echo $list['applicationsID']; ?>)"
                                                                    class="btn btn-success btn-sm">
                                                                    <i class="fas fa-money-bill-wave me-2"></i>Claim Scholarship
                                                                </button>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <a href="myscholarlist_details.php?view_applications=<?php echo $list['applicationsID'] ?>"
                                                            class="btn btn-danger">
                                                            <i class="fas fa-eye me-2"></i>View Details
                                                        </a>
                                                    </td>
                                                </tr> <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <script>
                                        function claimScholarship(applicationId) {
                                            Swal.fire({
                                                title: 'Confirm Scholarship Claim',
                                                text: 'By clicking confirm, you acknowledge that you have received your scholarship money.',
                                                icon: 'info',
                                                showCancelButton: true,
                                                confirmButtonText: 'Yes, I received it',
                                                cancelButtonText: 'Cancel'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    $.ajax({
                                                        url: 'process_claim.php',
                                                        type: 'POST',
                                                        data: {
                                                            application_id: applicationId
                                                        },
                                                        success: function (response) {
                                                            console.log('Response:', response); // Debug
                                                            try {
                                                                const data = JSON.parse(response);
                                                                if (data.success) {
                                                                    Swal.fire(
                                                                        'Claimed!',
                                                                        'Your scholarship claim has been recorded.',
                                                                        'success'
                                                                    ).then(() => {
                                                                        location.reload();
                                                                    });
                                                                } else {
                                                                    Swal.fire(
                                                                        'Error',
                                                                        'Failed to record claim: ' + (data.error || 'Unknown error'),
                                                                        'error'
                                                                    );
                                                                }
                                                            } catch (e) {
                                                                console.error('Error parsing response:', e);
                                                                Swal.fire(
                                                                    'Error',
                                                                    'Invalid response from server',
                                                                    'error'
                                                                );
                                                            }
                                                        },
                                                        error: function (xhr, status, error) {
                                                            console.error('AJAX error:', error);
                                                            Swal.fire(
                                                                'Error',
                                                                'Failed to communicate with server',
                                                                'error'
                                                            );
                                                        }
                                                    });
                                                }
                                            });
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "./footer.php"; ?>