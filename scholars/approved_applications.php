<?php include "./head.php";
$a = 6;
?>
  <body>
  <?php include "./controls.php"; 
    if ($roles == 3) {
        echo "<script>window.location.href='index.php'</script>";
    };?>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <?php include "./sidebar.php";?>
        <div class="layout-page">
          <?php include "./topbar.php";?> 
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
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
        display: flex;
        gap: 1rem;
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

    @media (max-width: 768px) {
        .nav-links {
            flex-wrap: wrap;
        }
    }
</style>
  
                
              <div class="card">
                <div class="card-header">
                  <h3>Approved List of Applicants</h3>
                  <div class="">
                    <a href="applications.php" class="text-dark">Admission</a> / <a href="approved_applications.php" class="text-danger">Approved</a> / <a href="non_applications.php" class="text-dark">Denied</a> 
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="printables" class="display" style="width:100%">
                      <thead>
                        <tr>
                          <th>Scholarship Refence #</th>
                          <th>Scholarship</th>
                          <th>Date Appointment</th>
                          <th>Date Apply</th>
                          <th>Application Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($listscholar_approved as $list) { ?>
                        <tr>
                          <td><?php echo $list['scholarship_refences']?></td>
                          <td><?php echo $list['name']?></td>
                          <td><?php echo $list['sectioned_date']?></td>
                          <td><?php echo $list['date_apply']?></td>
                          <td><?php if ($list['application_status'] == 1) {
                                echo "Approved";
                              }elseif ($list['application_status'] == 2) {
                                echo "Denied";
                              }else {
                                echo "waiting";
                              }?> </td>
                              <td>
                                <a href="application_details.php?view_admission=<?php echo $list['scholarship_refences']?>" class="btn btn-sm btn-danger" >View details</a>
                              </td>
                                  
                        </tr>
                      <?php }?>                  
                    </tbody>
                  </table>
                </div>
                <!-- Modal -->


              </div>
            </div> 
          </div>
          
<?php include "./footer.php";?>
