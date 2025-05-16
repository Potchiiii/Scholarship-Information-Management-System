<?php include "./head.php";?>
  <body>
  <?php include "./controls.php"; ?>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <?php include "./sidebar.php";?>
        <div class="layout-page">
          <?php include "./topbar.php";?> 
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <?php if ($roles == 3) {
                if ($fetch_info['account_verifyer'] == 0) { ?>
                   <div class="alert alert-danger">
                      please verify your student details, and wait for admin validation, thank you
                  </div>
                <?php }
              }?>
             <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
             <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    .card {
        border: none;
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        margin-bottom: 1.5rem;
    }

    .card-header {
        background: linear-gradient(135deg, #ffffff 0%, #ddd9d9 100%);
        color: white;
        padding: 1.5rem;
        border: none;
    }

    .card-header h3 {
        margin: 0;
        font-weight: 600;
    }

    .card-body {
        padding: 2rem;
    }

    .profile-image {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid white;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 1.5rem;
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

    .btn-danger {
        background: #800000;
        border: none;
        padding: 0.8rem 1.5rem;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-danger:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(128, 0, 0, 0.2);
    }

    .alert {
        border-radius: 12px;
        padding: 1rem;
        margin-bottom: 1.5rem;
        border: none;
    }

    .alert-danger {
        background: #fee2e2;
        color: #991b1b;
    }

    .file-input-wrapper {
        position: relative;
        margin-bottom: 1.5rem;
    }

    .file-input-wrapper input[type="file"] {
        padding: 0.8rem;
        background: #f8f9fa;
        border-radius: 8px;
        width: 100%;
    }

    .cor-link {
        display: inline-block;
        padding: 0.5rem 1rem;
        background: #f8f9fa;
        border-radius: 8px;
        color: #800000;
        text-decoration: none;
        margin-left: 1rem;
        transition: all 0.3s ease;
    }

    .cor-link:hover {
        background: #800000;
        color: white;
    }
    .profile-wrapper {
  position: relative;
  width: 150px;
  height: 150px;
  margin: 0 auto;
}

.profile-image {
  width: 150px;
  height: 150px;
  border-radius: 50%;
  object-fit: cover;
  border: 4px solid white;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.profile-upload {
  position: absolute;
  bottom: 0;
  right: 0;
  background: #800000;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: all 0.3s ease;
}

.profile-upload i {
  color: white;
  font-size: 1.2rem;
}

.profile-upload:hover {
  transform: scale(1.1);
}

.cor-link {
  display: inline-block;
  padding: 0.4rem 0.8rem;
  background: #f8f9fa;
  border-radius: 6px;
  color: #800000;
  text-decoration: none;
  margin-left: 0.5rem;
  transition: all 0.3s ease;
}

.cor-link:hover {
  background: #800000;
  color: white;
}
</style>

<div class="row">
    <!-- Profile Image & Student Info Card -->
    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <h3><i class="fas fa-user-circle me-2"></i>Profile Image & Details</h3>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="profile-section text-center">
                        <div class="profile-wrapper">
                            <img src="../assets/images/profile/<?php echo $fetch_info['profile']?>" 
                                 alt="" class="profile-image">
                            <div class="profile-upload">
                                <label for="profile-input">
                                    <i class="fas fa-camera"></i>
                                </label>
                                <input type="file" name="profiles" id="profile-input" class="d-none">
                            </div>
                        </div>
                    </div>
                    <?php if ($roles == 3) { ?>
                        <div class="row mt-4">
                            <div class="col-sm-12 mb-3">
                                <label><i class="fas fa-id-card me-2"></i>Student ID</label>
                                <input type="text" name="studentID" class="form-control" 
                                       value="<?php echo $fetch_info['studentID']?>" 
                                       <?php if($fetch_info['account_verifyer'] == 1){ echo "disabled";}?>>
                            </div>
                            <div class="col-sm-12">
                                <label>
                                    <i class="fas fa-file-alt me-2"></i>COR 
                                    <a href="../assets/cor/<?php echo $fetch_info['cor']?>" class="cor-link">
                                        <i class="fas fa-download me-1"></i>View File
                                    </a>
                                </label>
                                <input type="file" name="cor" class="form-control" 
                                       <?php if($fetch_info['account_verifyer'] == 1){ echo "disabled";}?>>
                            </div>
                        </div>
                    <?php }?>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-danger w-100" name="student_profile">
                            <i class="fas fa-save me-2"></i>Save Profile Image
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Personal Information Card -->
    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <h3><i class="fas fa-info-circle me-2"></i>Personal Information</h3>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label><i class="fas fa-user me-2"></i>First Name</label>
                            <input type="text" name="fname" class="form-control" value="<?php echo $fetch_info['first_name']?>">
                        </div>
                        <div class="col-sm-6">
                            <label><i class="fas fa-user me-2"></i>Last Name</label>
                            <input type="text" name="lname" class="form-control" value="<?php echo $fetch_info['last_name']?>">
                        </div>
                        <div class="col-sm-6">
                            <label><i class="fas fa-phone me-2"></i>Contact Number</label>
                            <input type="text" name="number" class="form-control" value="<?php echo $fetch_info['contact']?>">
                        </div>
                        <div class="col-sm-6">
                            <label><i class="fas fa-map-marker-alt me-2"></i>Address</label>
                            <input type="text" name="address" class="form-control" value="<?php echo $fetch_info['address']?>">
                        </div>
                        <div class="col-12">
                            <label><i class="fas fa-envelope me-2"></i>Email</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $fetch_info['email']?>">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-danger w-100" name="profile">
                                <i class="fas fa-save me-2"></i>Save Personal Information
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "./footer.php";?>
