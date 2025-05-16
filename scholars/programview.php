<?php include "./head.php";
?>

<body>
  <?php include "./controls.php"; ?>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <?php include "./sidebar.php"; ?>
      <div class="layout-page">
        <?php include "./topbar.php"; ?>
        <!-- Add after topbar include -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
          rel="stylesheet">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style>
          body {
            font-family: 'Poppins', sans-serif;
          }

          .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
            margin-bottom: 1.5rem;
          }

          .card-header {
            background: #fff;
            border-bottom: 1px solid #edf2f7;
            padding: 1.5rem;
          }

          .card-header h2,
          .card-header h4 {
            color: #1e293b;
            font-weight: 600;
            margin: 0;
          }

          .card-body {
            padding: 1.5rem;
          }

          .scholarship-details h6 {
            color: #475569;
            font-weight: 500;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
          }

          .scholarship-details h6 strong {
            color: #1e293b;
          }

          #mydata,
          #mydata1,
          #mydata2 {
            width: 100% !important;
            border-collapse: separate;
            border-spacing: 0;
          }

          .dataTables_wrapper {
            padding: 1rem;
            border-radius: 12px;
          }

          table thead th {
            background: #f8fafc !important;
            font-weight: 600;
            color: #475569;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            padding: 1rem !important;
          }

          table tbody td {
            padding: 1rem !important;
            vertical-align: middle;
            color: #1e293b;
          }

          .btn {
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
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
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
          }

          .status-approved {
            background: #dcfce7;
            color: #16a34a;
          }

          .status-denied {
            background: #fee2e2;
            color: #dc2626;
          }

          .status-waiting {
            background: #fff8e1;
            color: #f59e0b;
          }

          .stats-card {
            background: linear-gradient(145deg, #800000, #600000);
            color: white;
            padding: 1.5rem;
            border-radius: 12px;
            margin-bottom: 1rem;
          }

          .stats-card h6 {
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 0.5rem;
          }

          .stats-card .value {
            font-size: 1.5rem;
            font-weight: 600;
          }

          .stats-card {
            background: linear-gradient(145deg, #800000, #600000);
            color: white;
            padding: 1.5rem;
            border-radius: 12px;
            margin-bottom: 1rem;
          }

          .stat-item {
            text-align: center;
            padding: 1rem;
          }

          .stat-item h6 {
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 0.5rem;
          }

          .stat-item .value {
            font-size: 1.5rem;
            font-weight: 600;
          }

          .action-buttons {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0.5rem;
            width: fit-content;
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

          .btn-view {
            background: #800000;
            color: white;
          }

          .btn-approve {
            background: #2ecc71;
            color: white;
          }

          .btn-deny {
            background: #e74c3c;
            color: white;
          }

          .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
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

          .status-waiting {
            background: #fff8e1;
            color: #f59e0b;
          }
        </style>

        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
              <!-- Stats Cards -->
              <div class="col-sm-12 mb-3">
                <div class="stats-card">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="stat-item">
                        <i class="fas fa-graduation-cap fa-2x"></i>
                        <h6>Program Name</h6>
                        <div class="value"><?php echo $details['name'] ?></div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="stat-item">
                        <i class="fas fa-id-card fa-2x"></i>
                        <h6>Program ID</h6>
                        <div class="value"><?php echo $details['scholarID'] ?></div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="stat-item">
                        <i class="fas fa-calendar-day fa-2x"></i>
                        <h6>Appointment Date</h6>
                        <div class="value"><?php echo date('F d, Y', strtotime($details['sectioned_date'])) ?></div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="stat-item">
                        <i class="fas fa-user-check fa-2x"></i>
                        <h6>Approved Applications</h6>
                        <div class="value"><?php echo $details['limit_counter'] ?></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Applications Table -->
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4><i class="fas fa-list-alt me-2"></i>Admission Applications</h4>
                  </div>
                  <div class="card-body">
                    <table id="mydata2" class="display">
                      <thead>
                        <tr>
                          <th><i class="fas fa-hashtag me-2"></i>Reference #</th>
                          <th><i class="fas fa-calendar-alt me-2"></i>Date Applied</th>
                          <th><i class="fas fa-chart-line me-2"></i>Status</th>
                          <th><i class="fas fa-tools me-2"></i>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($scholar_admission as $list) { ?>
                          <tr>
                            <td>
                              <i class="fas fa-file-alt me-2 text-primary"></i>
                              <?php echo $list['scholarship_refences'] ?>
                            </td>
                            <td>
                              <i class="fas fa-clock me-2 text-info"></i>
                              <?php echo $list['date_apply'] ?>
                            </td>
                            <td>
                              <span class="status-badge <?php
                              if ($list['application_status'] == 1)
                                echo 'status-approved';
                              elseif ($list['application_status'] == 2)
                                echo 'status-denied';
                              else
                                echo 'status-waiting';
                              ?>">
                                <i class="fas <?php
                                if ($list['application_status'] == 1)
                                  echo 'fa-check-circle';
                                elseif ($list['application_status'] == 2)
                                  echo 'fa-times-circle';
                                else
                                  echo 'fa-hourglass';
                                ?> me-2"></i>
                                <?php
                                if ($list['application_status'] == 1)
                                  echo "Approved";
                                elseif ($list['application_status'] == 2)
                                  echo "Denied";
                                else
                                  echo "Waiting";
                                ?>
                              </span>
                            </td>
                            <td>
                              <div class="action-buttons">
                                <a href="application_details.php?view_admission=<?php echo $list['scholarship_refences'] ?>"
                                  class="btn btn-view btn-sm" title="View Details">
                                  <i class="fas fa-eye"></i>
                                </a>
                                <a href="#" class="btn btn-approve btn-sm" title="Approve">
                                  <i class="fas fa-check"></i>
                                </a>
                                <a href="#" class="btn btn-deny btn-sm" title="Deny">
                                  <i class="fas fa-times"></i>
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




            <div class="col-sm-12 mt-3">
              <div class="card">
                <div class="card-header">
                  <h4><i class="fas fa-check-circle me-2 text-success"></i>Approved Applications</h4>
                </div>
                <div class="card-body">
                  <table id="mydata1" class="display">
                    <thead>
                      <tr>
                        <th><i class="fas fa-hashtag me-2"></i>Reference #</th>
                        <th><i class="fas fa-calendar-alt me-2"></i>Date Applied</th>
                        <th><i class="fas fa-info-circle me-2"></i>Status</th>
                        <th><i class="fas fa-cogs me-2"></i>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($scholar_approve as $list) { ?>
                        <tr>
                          <td><i class="fas fa-file-alt me-2 text-success"></i><?php echo $list['scholarship_refences'] ?>
                          </td>
                          <td><i class="fas fa-clock me-2 text-info"></i><?php echo $list['date_apply'] ?></td>
                          <td>
                            <span class="status-badge status-approved">
                              <i class="fas fa-check-circle me-2"></i>Approved
                            </span>
                          </td>
                          <td>
                            <a href="application_details.php?view_admission=<?php echo $list['scholarship_refences'] ?>"
                              class="btn btn-view btn-sm">
                              <i class="fas fa-eye"></i>
                            </a>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="col-sm-12 mt-3">
              <div class="card">
                <div class="card-header">
                  <h4><i class="fas fa-times-circle me-2 text-danger"></i>Denied Applications</h4>
                </div>
                <div class="card-body">
                  <table id="mydata" class="display">
                    <thead>
                      <tr>
                        <th><i class="fas fa-hashtag me-2"></i>Reference #</th>
                        <th><i class="fas fa-calendar-alt me-2"></i>Date Applied</th>
                        <th><i class="fas fa-info-circle me-2"></i>Status</th>
                        <th><i class="fas fa-cogs me-2"></i>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($scholar_non as $list) { ?>
                        <tr>
                          <td><i class="fas fa-file-alt me-2 text-danger"></i><?php echo $list['scholarship_refences'] ?>
                          </td>
                          <td><i class="fas fa-clock me-2 text-info"></i><?php echo $list['date_apply'] ?></td>
                          <td>
                            <span class="status-badge status-denied">
                              <i class="fas fa-times-circle me-2"></i>Denied
                            </span>
                          </td>
                          <td>
                            <a href="application_details.php?view_admission=<?php echo $list['scholarship_refences'] ?>"
                              class="btn btn-view btn-sm">
                              <i class="fas fa-eye"></i>
                            </a>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>



          </div>
          <?php include "./footer.php"; ?>