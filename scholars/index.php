<?php include "./head.php";
$a = 1; ?>

<body>
  <?php include "./controls.php"; ?>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <?php include "./sidebar.php"; ?>
      <div class="layout-page">
        <?php include "./topbar.php"; ?>
        <!-- Add to head section -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
          rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

        <!-- Before closing body tag, after other scripts -->
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
          document.addEventListener('DOMContentLoaded', function () {
            flatpickr("#scholarship-calendar", {
              inline: true,
              dateFormat: 'Y-m-d',
              defaultDate: 'today',
              minDate: 'today',
              enable: [
                <?php
                foreach ($scholarship_latest as $scholarship) {
                  echo "'" . $scholarship['sectioned_date'] . "',";
                }
                ?>
              ]
            });
          });
        </script>

        <style>
          .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
          }

          .card:hover {
            transform: translateY(-5px);
          }

          .card-title {
            font-weight: 600;
            font-size: 1.5rem;
          }

          .table {
            font-family: 'Poppins', sans-serif;
          }

          .btn {
            font-family: 'Poppins', sans-serif;
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            transition: all 0.3s ease;
          }

          .btn:hover {
            transform: translateY(-2px);
          }

          .alert {
            border-radius: 12px;
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
          }

          .card canvas {
            max-height: 300px;
            width: 100% !important;
            margin: 0 auto;
          }

          .chart-container {
            position: relative;
            height: 300px;
            width: 100%;
          }

          .scholarship-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 1rem;
            padding: 0.5rem;
          }

          .scholarship-card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            height: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
          }

          .scholarship-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
          }

          .scholarship-header {
            text-align: center;
            margin-bottom: 1rem;
          }

          .scholarship-icon {
            width: 60px;
            height: 60px;
            background: #fff0f0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            color: #ff3e1d;
            font-size: 1.5rem;
          }

          .scholarship-title {
            font-weight: 600;
            color: #2d3436;
            margin-bottom: 1rem;
            line-height: 1.4;
          }

          .scholarship-details {
            margin-bottom: 1.5rem;
          }

          .detail-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 0.5rem;
            color: #64748b;
            font-size: 0.9rem;
          }

          .featured-card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
          }

          .featured-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
          }

          .featured-icon {
            width: 50px;
            height: 50px;
            background: #fee2e2;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            color: #dc2626;
            font-size: 1.25rem;
          }

          .featured-content {
            width: 100%;
          }

          .featured-content h6 {
            margin-bottom: 1rem;
            color: #1e293b;
            font-weight: 600;
          }

          .calendar-wrapper {
            padding: 1rem;
            height: 70%;
            min-height: 10px;
          }

          .flatpickr-calendar {
            width: 100% !important;
            box-shadow: none !important;
            background: transparent;
          }

          .flatpickr-day.selected {
            background: #ff6b6b !important;
            border-color: #ff6b6b !important;
          }

          .flatpickr-day.today {
            border-color: #ff6b6b !important;
            color: #ff6b6b !important;
          }

          .flatpickr-day:hover {
            background: #fff0f0 !important;
            color: #ff6b6b !important;
          }

          .flatpickr-day {
            color: #566a7f !important;
          }

          .flatpickr-weekday,
          .flatpickr-monthDropdown-months,
          .flatpickr-current-month {
            color: #1e293b !important;
          }

          .flatpickr-months .flatpickr-prev-month,
          .flatpickr-months .flatpickr-next-month {
            fill: #566a7f !important;
          }

          /* Enhanced DataTables Styling */
          table#printables {
            width: 100% !important;
            border-collapse: separate;
            border-spacing: 0;
            font-family: 'Poppins', sans-serif;
          }

          table#printables thead th {
            background: #f8fafc;
            padding: 1.2rem 1rem;
            font-weight: 600;
            color: #1e293b;
            border: none;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
          }

          table#printables tbody td {
            padding: 1.2rem 1rem;
            border-bottom: 1px solid #e2e8f0;
            vertical-align: middle;
            font-size: 0.9rem;
            color: #475569;
            transition: background-color 0.2s ease;
          }

          table#printables tbody tr:hover td {
            background-color: #f1f5f9;
          }

          /* Status Badge Styling */
          .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
          }

          .status-available {
            background: #dcfce7;
            color: #166534;
          }

          .status-full {
            background: #fee2e2;
            color: #991b1b;
          }

          /* Action Buttons */
          .btn-action {
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
          }

          .btn-action i {
            font-size: 1rem;
          }

          /* Scholarship ID styling */
          .scholarship-id {
            font-size: 0.8rem;
            color: #94a3b8;
            margin-top: 0.25rem;
          }

          /* Table Header Icons */
          th i {
            margin-right: 0.5rem;
            color: #64748b;
          }
        </style>

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Welcome Card -->
            <div class="row">
              <div class="col-lg-12 mb-4 order-0">
                <?php if ($roles == 3) {
                  if ($buletin['visiblity'] == 1) { ?>
                    <div class="alert alert-<?php echo $buletin['type'] ?>" role="alert">
                      <?php echo $buletin['descriptions'] ?>
                    </div>
                  <?php }
                } ?>
                <div class="card">
                  <div class="d-flex align-items-end row">
                    <div class="col-sm-8">
                      <div class="card-body">
                        <h5 class="card-title text-primary">Nice to meet you again
                          <?php echo $fetch_info['first_name'] . ' ' . $fetch_info['last_name'] ?>! 🎉
                        </h5>
                        <p class="mb-4">
                          <?php if ($roles == 3) {
                            echo "We have a wide range of scholarship programs that offer numerous opportunities for students to pursue their academic goals.";
                          } else {
                            echo "Thank you for giving us the incredible opportunity to offer scholarships that empower students to achieve their dreams.";
                          } ?>
                        </p>
                        <a href="javascript:;" class="btn btn-outline-danger">
                          <i class="fas fa-calendar">&nbsp</i> Date : <?php echo $current_date ?>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php if ($roles == 3) { ?>
              <!-- Replace the existing row structure with this -->
              <div class="row">
                <div class="col-lg-6">
                  <!-- Available Scholarships Today -->
                  <div class="card h-100">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0"><i class="fas fa-star text-warning me-2"></i>Available Scholarships Today</h5>
                      <span class="badge bg-primary"><?php echo count($scholarship_latest); ?> Active</span>
                    </div>
                    <div class="card-body">
                      <div class="row g-3">
                        <?php foreach ($scholarship_latest as $latest) { ?>
                          <div class="col-md-6">
                            <div class="scholarship-card">
                              <div class="scholarship-header">
                                <div class="scholarship-icon">
                                  <i class="fas fa-graduation-cap"></i>
                                </div>
                                <h6 class="scholarship-title"><?php echo $latest['name'] ?></h6>
                              </div>
                              <div class="scholarship-details">
                                <div class="detail-item">
                                  <i class="fas fa-calendar-alt text-muted"></i>
                                  <span><?php echo $latest['sectioned_date'] ?></span>
                                </div>
                                <div class="detail-item">
                                  <i class="fas fa-users text-muted"></i>
                                  <span><?php echo $latest['limit_counter'] ?>/<?php echo $latest['limits'] ?> Slots</span>
                                </div>
                              </div>
                              <?php if ($latest['limit_counter'] >= $latest['limits']) { ?>
                                <button class="btn btn-outline-secondary w-100" disabled>
                                  <i class="fas fa-ban"></i> Fully Booked
                                </button>
                              <?php } else { ?>
                                <a href="scholarships_details.php?apply=<?php echo $latest['dailyscholarshipID'] ?>"
                                  class="btn btn-primary w-100">
                                  <i class="fas fa-paper-plane"></i> Save Now
                                </a>
                              <?php } ?>
                            </div>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6">
                  <!-- Featured Scholarships -->
                  <div class="card h-100">
                    <div class="card-header">
                      <h5 class="mb-0"><i class="fas fa-award text-danger me-2"></i>Featured Scholarships</h5>
                    </div>
                    <div class="card-body">
                      <div class="row g-3">
                        <?php foreach ($scholarships_offer as $scholarship) { ?>
                          <div class="col-md-6">
                            <div class="featured-card">
                              <div class="featured-icon">
                                <i class="fas fa-award"></i>
                              </div>
                              <div class="featured-content">
                                <h6><?php echo $scholarship['name'] ?></h6>
                                <a href="scholarships_details.php?view_scholarship=<?php echo $scholarship['scholarID']; ?>"
                                  class="btn btn-outline-danger btn-sm w-100">
                                  View Details <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                              </div>
                            </div>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php } else { ?>
              <?php if ($semester_scholar_count > 0) { ?>
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="printables" class="display" style="width:100%">
                        <thead>
                          <tr>
                            <th><i class="fas fa-graduation-cap"></i>Scholarship</th>
                            <th class="text-start"><i class="fas fa-calendar-alt"></i>Date</th>
                            <th class="text-start"><i class="fas fa-users"></i>Capacity</th>
                            <th><i class="fas fa-info-circle"></i>Status</th>
                            <th><i class="fas fa-cog"></i>Action</th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php foreach ($semester_scholar as $data) { ?>
                            <tr class="">
                              <td><?php echo $data['name'] ?> <br>
                                <p><?php echo $data['scholarID'] ?></p>
                              </td>
                              <td class="text-start"><?php echo $data['sectioned_date'] ?></td>
                              <td class="text-start"><?php echo $data['limit_counter'] . "/" . $data['limits'] ?></td>
                              <td><?php if ($data['full_status'] == 0) {
                                echo "Available";
                              } else {
                                echo "Fully Registered";
                              } ?>
                              </td>
                              <td>
                                <a href="approve_details.php?approved_scholar=<?php echo $data['dailyscholarshipID'] ?>"
                                  class="
                            btn btn-sm btn-primary">
                                  <i class="fas fa-info-circle">&nbsp</i> Details
                                </a>
                              </td>
                            </tr>
                          <?php } ?>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              <?php } else { ?>
                <div class="card">
                  <div class="card-body">
                    No Scholarship registered in this system, <a href="scholarships.php">
                      <i class="fas fa-plus-circle">&nbsp</i> Create Here
                    </a>
                  </div>
                </div>
              <?php } ?>
            <?php } ?>
            <br>
            <!-- / Chart analytics -->
            <?php if ($roles == 1) { ?>
              <div class="row mb-4">
                <div class="col-md-6">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="card-title mb-0">Scholarship Applications</h5>
                      <div class="dropdown">
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="chartOptions"
                          data-bs-toggle="dropdown">
                          This Year
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Last 30 Days</a></li>
                          <li><a class="dropdown-item" href="#">This Year</a></li>
                          <li><a class="dropdown-item" href="#">Last Year</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="chart-container">
                      <canvas id="applicationsChart"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card h-100">
                    <div class="card-header">
                      <h5 class="card-title mb-0">Scholarship Distribution</h5>
                    </div>
                    <div class="card-body">
                      <canvas id="distributionChart"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>

          <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
          <script>
            const applicationsCtx = document.getElementById('applicationsChart');
            new Chart(applicationsCtx, {
              type: 'line',
              data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                  label: 'Applications',
                  data: [
                    <?php
                    $data = array_fill(0, 12, 0);
                    foreach ($monthly_applications as $app) {
                      $data[$app['month'] - 1] = intval($app['application_count']);
                    }
                    echo implode(',', $data);
                    ?>
                  ],
                  borderColor: '#ff3e1d',
                  tension: 0.4,
                  fill: true,
                  backgroundColor: 'rgba(255, 62, 29, 0.1)'
                }]
              },
              options: {
                responsive: true,
                plugins: {
                  legend: {
                    position: 'top',
                  }
                },
                scales: {
                  y: {
                    ticks: {
                      stepSize: 1,
                      precision: 0
                    }
                  }
                }
              }
            });


            const distributionCtx = document.getElementById('distributionChart');
            new Chart(distributionCtx, {
              type: 'doughnut',
              data: {
                labels: ['Approved', 'Pending', 'Rejected'],
                datasets: [{
                  data: [
                    <?php
                    $approved = $pending = $rejected = 0;
                    foreach ($status_distribution as $dist) {
                      if ($dist['application_status'] == 1)
                        $approved = $dist['status_count'];
                      elseif ($dist['application_status'] == 2)
                        $rejected = $dist['status_count'];
                      else
                        $pending = $dist['status_count'];
                    }
                    echo "$approved,$pending,$rejected";
                    ?>
                  ],
                  backgroundColor: [
                    '#28a745',
                    '#ffc107',
                    '#dc3545'
                  ]
                }]
              },
              options: {
                responsive: true,
                plugins: {
                  legend: {
                    position: 'bottom'
                  }
                },
                cutout: '70%'
              }
            });

          </script>

          <?php include "./footer.php"; ?>