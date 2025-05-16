<?php include "./head.php";
$a = 1;
?>

<body>
  <?php include "./controls.php"; ?>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <?php include "./sidebar.php"; ?>
      <div class="layout-page">
        <?php include "./topbar.php"; ?>
        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Add after topbar include -->
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
                margin-bottom: 1.5rem;
              }

              .card-header {
                background: #fff;
                padding: 1.5rem;
                border-bottom: 1px solid #edf2f7;
              }

              .card-header h3 {
                color: #1e293b;
                font-weight: 600;
                margin-bottom: 1rem;
              }

              .card-header h6 {
                color: #64748b;
                font-size: 0.9rem;
                margin: 0.3rem 0;
              }

              .program-info {
                background: #f8fafc;
                padding: 1rem;
                border-radius: 12px;
                margin-top: 1rem;
              }

              #mydata2 {
                width: 100% !important;
                border-collapse: separate;
                border-spacing: 0;
              }

              #mydata2 thead th {
                background: #f8fafc;
                color: #475569;
                font-weight: 600;
                text-transform: uppercase;
                font-size: 0.85rem;
                letter-spacing: 0.5px;
                padding: 1rem;
              }

              #mydata2 tbody td {
                padding: 1rem;
                vertical-align: middle;
                color: #1e293b;
              }

              .btn {
                font-weight: 500;
                padding: 0.5rem 1rem;
                border-radius: 8px;
                transition: all 0.3s ease;
              }

              .btn-sm {
                padding: 0.4rem 0.8rem;
                font-size: 0.875rem;
              }

              .btn-danger {
                background: #800000;
                border: none;
              }

              .btn-danger:hover {
                background: #600000;
                transform: translateY(-2px);
              }

              .status-badge {
                padding: 0.4rem 0.8rem;
                border-radius: 20px;
                font-size: 0.875rem;
                font-weight: 500;
              }

              .status-approved {
                background: #dcfce7;
                color: #16a34a;
              }

              .status-waiting {
                background: #fff8e1;
                color: #f59e0b;
              }

              .status-denied {
                background: #fee2e2;
                color: #dc2626;
              }

              .stats-info {
                display: flex;
                gap: 2rem;
                margin-top: 1rem;
              }

              .stats-item {
                background: #f1f5f9;
                padding: 1rem;
                border-radius: 8px;
                text-align: center;
              }

              .stats-value {
                font-size: 1.5rem;
                font-weight: 600;
                color: #800000;
              }

              .stats-label {
                font-size: 0.875rem;
                color: #64748b;
              }
            </style>


            <div class="card">
              <div class="card-header">
                <h3>Approved List of Applicants</h3>
                <div class="row">
                  <div class="col-sm-6">

                    <h6 class="m-0">Program Name:
                      <?php echo $details['name'] . ", Date Programm : " . $details['date_start'] . " - " . $details['date_end'] ?>
                    </h6>
                    <h6 class="m-0">Program ID: <?php echo $details['scholarID'] ?></h6>
                    <h6 class="m-0">Appointment Date: <?php echo $details['sectioned_date'] ?></h6>
                  </div>
                  <div class="col-sm-6">
                    <h6>Approved Applications: <?php echo $approve_list_count ?></h6>
                    <h6>Approved Limits: <?php echo $details['limits'] ?> applicant(s) only</h6>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="mydata2" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th>Scholarship Refence #</th>
                        <th>Applicant Name</th>
                        <th>Date Appointment</th>
                        <th>Date Apply</th>
                        <th>Application Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($approve_list as $list) { ?>
                        <tr>
                          <td><?php echo $list['scholarship_refences'] ?></td>
                          <td><a
                              href="account_profiles.php?account=<?php echo $list['userID'] ?>"><?php echo $list['username'] ?></a>
                          </td>
                          <td><?php echo $list['sectioned_date'] ?></td>
                          <td><?php echo $list['date_apply'] ?></td>
                          <td><?php if ($list['application_status'] == 1) {
                            echo "Approved";
                          } elseif ($list['application_status'] == 2) {
                            echo "Denied";
                          } else {
                            echo "waiting";
                          } ?> </td>
                          <td>
                            <a href="application_details.php?view_details=<?php echo $list['scholarship_refences'] ?>"
                              class="btn btn-sm btn-danger">View Details</a>
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