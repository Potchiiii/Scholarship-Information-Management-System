<?php
include "./head.php";
include "./controls.php";  // Include controls.php first

$a = 6;
$scholarship_id = isset($_GET['scholarship_id']) ? $_GET['scholarship_id'] : null;
$type = isset($_GET['type']) ? $_GET['type'] : 'admission';

// Now we can use the query results
if ($type == 'admission') {
  $listscholar = $listscholar;
} else if ($type == 'approved') {
  $listscholar = $listscholar_approved;
} else if ($type == 'denied') {
  $listscholar = $listscholar_non;
}
?>

<body>
  <?php
  if ($roles == 3) {
    echo "<script>window.location.href='index.php'</script>";
  }
  ?>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <?php include "./sidebar.php"; ?>
      <div class="layout-page">
        <?php include "./topbar.php"; ?>
        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
            <link rel="stylesheet" type="text/css"
              href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
              rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

              .card-header h3 {
                margin: 0;
                font-weight: 600;
              }

              .nav-links {
                margin-top: 1rem;
              }

              .nav-links a {
                text-decoration: none;
                padding: 0.5rem 1rem;
                border-radius: 8px;
                transition: all 0.3s ease;
                font-weight: 500;
              }

              .nav-links a.text-danger {
                color: #800000 !important;
                background: #fee2e2;
              }

              .nav-links a.text-dark {
                color: #2d3436;
              }

              .nav-links a:hover {
                background: #f3f4f6;
              }

              table#mydata2 {
                width: 100% !important;
                border-collapse: separate;
                border-spacing: 0;
              }

              table#mydata2 thead th {
                background: #f8f9fa;
                padding: 1rem;
                font-weight: 600;
                color: #2d3436;
                border: none;
              }

              table#mydata2 tbody td {
                padding: 1rem;
                border-bottom: 1px solid #edf2f7;
                vertical-align: middle;
              }

              .reference-number {
                font-family: 'Roboto Mono', monospace;
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

              .status-approved {
                background: #dcfce7;
                color: #166534;
              }

              .status-denied {
                background: #fee2e2;
                color: #991b1b;
              }

              .status-pending {
                background: #fef3c7;
                color: #92400e;
              }

              .btn-danger {
                background: #800000;
                border: none;
                padding: 0.6rem 1.2rem;
                border-radius: 8px;
                font-weight: 500;
                transition: all 0.3s ease;
              }

              .btn-danger:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(128, 0, 0, 0.2);
              }

              .table-responsive {
                border-radius: 12px;
                background: white;
                padding: 1rem;
              }

              table#mydata2 {
                width: 100% !important;
                border-collapse: separate;
                border-spacing: 0;
              }

              table#mydata2 thead th {
                background: #f8fafc;
                padding: 1.2rem 1rem;
                font-weight: 600;
                color: #1e293b;
                text-transform: uppercase;
                letter-spacing: 0.5px;
              }

              table#mydata2 tbody td {
                padding: 1.2rem 1rem;
                border-bottom: 1px solid #e2e8f0;
                transition: background 0.2s ease;
              }

              .status-badge {
                padding: 0.5rem 1rem;
                border-radius: 20px;
                font-size: 0.85rem;
                font-weight: 500;
              }

              .status-approved {
                background: #dcfce7;
                color: #166534;
              }

              .status-pending {
                background: #fef3c7;
                color: #92400e;
              }

              .status-denied {
                background: #fee2e2;
                color: #991b1b;
              }

              @media print {

                /* Hide everything except the list */
                .layout-navbar,
                .layout-menu,
                .btn,
                .nav-links,
                footer,
                .table-responsive,
                .dataTables_filter,
                .dataTables_length,
                .dataTables_paginate,
                .dataTables_info {
                  display: none !important;
                }

                /* Show only if approved or denied type */
                <?php if ($type == 'approved' || $type == 'denied'): ?>
                  .table-responsive {
                    display: block !important;
                  }

                <?php endif; ?>

                .card {
                  box-shadow: none !important;
                  border: none !important;
                }

                body {
                  padding: 0;
                  margin: 0;
                }

                .content-wrapper {
                  padding: 0 !important;
                }
              }
            </style>


            <div class="card">
              <div class="card-header">
                <h3>
                  <?php
                  if ($scholarship_id) {
                    echo "Applications for " . $scholarship['name'];
                  } else {
                    echo "All Applications";
                  }
                  ?>
                </h3>
                <div class="">
                  <a href="?scholarship_id=<?php echo $scholarship_id ?>&type=admission"
                    class="<?php echo $type == 'admission' ? 'text-danger' : 'text-dark' ?>">Admission</a> /
                  <a href="?scholarship_id=<?php echo $scholarship_id ?>&type=approved"
                    class="<?php echo $type == 'approved' ? 'text-danger' : 'text-dark' ?>">Approved</a> /
                  <a href="?scholarship_id=<?php echo $scholarship_id ?>&type=denied"
                    class="<?php echo $type == 'denied' ? 'text-danger' : 'text-dark' ?>">Denied</a>
                </div>
              </div>

              <div class="card-body">

                <div class="table-responsive">
                  <div class="mb-3">
                    <button onclick="window.print()" class="btn btn-danger">
                      <i class="fas fa-print me-2"></i>Print <?php echo ucfirst($type) ?> Applications
                    </button>
                  </div>

                  <table id="mydata2" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th><i class="fas fa-hashtag me-2"></i>Reference #</th>
                        <th><i class="fas fa-graduation-cap me-2"></i>Scholarship</th>
                        <th><i class="fas fa-calendar-check me-2"></i>Appointment</th>
                        <th><i class="fas fa-calendar-plus me-2"></i>Date Applied</th>
                        <th><i class="fas fa-info-circle me-2"></i>Status</th>
                        <th><i class="fas fa-cog me-2"></i>Action</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php foreach ($listscholar as $list) { ?>
                        <tr>
                          <td><?php echo $list['scholarship_refences'] ?></td>
                          <td><?php echo $list['name'] ?></td>
                          <td><?php echo $list['sectioned_date'] ?></td>
                          <td><?php echo $list['date_apply'] ?></td>
                          <td><?php if ($list['application_status'] == 1) {
                            echo "Approved";
                          } elseif ($list['application_status'] == 2) {
                            echo "Denied";
                          } else {
                            echo "Pending";
                          } ?> </td>
                          <td>
                            <a href="application_details.php?view_admission=<?php echo $list['scholarship_refences'] ?>"
                              class="btn btn-sm btn-danger">View details</a>
                          </td>

                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <!-- Modal -->
              </div>
            </div>
          </div>

          <?php include "./footer.php"; ?>
          <?php if (isset($_GET['approve_scholar'])): ?>
            <script>
              Swal.fire({
                icon: 'success',
                title: 'Application Approved',
                confirmButtonColor: '#800000'
              }).then((result) => {
                window.location.href = 'approved_applications.php';
              });
            </script>
          <?php endif; ?>

          <?php if (isset($_GET['deny_scholar'])): ?>
            <script>
              Swal.fire({
                icon: 'info',
                title: 'Application Denied',
                confirmButtonColor: '#800000'
              }).then((result) => {
                window.location.href = 'non_applications.php';
              });
            </script>
          <?php endif; ?>

          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
          <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
          <script type="text/javascript"
            src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>