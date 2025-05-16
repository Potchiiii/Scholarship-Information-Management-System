<?php include "./head.php";
$a = 7;
?>

<body>
  <?php include "./controls.php"; ?>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <?php include "./sidebar.php"; ?>
      <div class="layout-page">
        <?php include "./topbar.php"; ?>
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
            background: #57b785;
            border: none;
            box-shadow: 0 4px 12px rgba(128, 0, 0, 0.2);
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

          #summernote {
            border-radius: 10px;
            margin-bottom: 1.5rem;
          }

          input[type="file"] {
            padding: 0.8rem;
            background: #f8f9fa;
            border-radius: 8px;
          }
        </style>

        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
              <div class="card-header">
                <h4>Publications</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-6 mb-5">
                    <form action="" method="POST" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-sm-6">
                          <label for="">Banner</label>
                          <input type="file" name="pubbanner" id="" class="form-control">
                        </div>
                        <div class="col-sm-6">
                          <label for="">Title</label>
                          <input type="text" name="pubtitle" id="" class="form-control"
                            value="<?php echo $details['titles'] ?>">
                        </div>
                        <div class="col-sm-12">
                          <label for="">Description</label>
                          <textarea name="pubdesc" id="summernote"
                            class="form-control"><?php echo $details['description'] ?></textarea>
                        </div>
                        <div class="col-sm-4 mt-3">
                          <button type="submit" class="btn btn-primary" name="publications">Save</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="col-sm-6">
                    <div class="table-responsive">
                      <table id="mydata" class="display" style="width:100%">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Action</th>

                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1;
                          foreach ($publications as $list) { ?>
                            <tr>
                              <td><?php echo $i++ ?></td>
                              <td><?php echo $list['titles'] ?></td>
                              <td>
                                <a href="publications.php?editpub=<?php echo $list['pubID'] ?>"
                                  class="btn btn-sm btn-primary">Edit</a>
                                <a href="publications.php?delpub=<?php echo $list['pubID'] ?>"
                                  class="btn btn-sm btn-danger">Delete</a>
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