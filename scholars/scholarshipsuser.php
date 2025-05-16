<?php include "./head.php";
$a = 3;
?>
  <body>
  <?php include "./controls.php"; ?>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <?php include "./sidebar.php";?>
        <div class="layout-page">
          <?php include "./topbar.php";?> 
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
/* Sidebar Styles */
.menu-vertical {
    font-family: 'Poppins', sans-serif;
}

.menu-item {
    margin-bottom: 0.5rem;
}

.menu-link {
    border-radius: 8px;
    transition: all 0.3s ease;
}

.menu-link:hover {
    transform: translateX(5px);
}

/* Topbar Styles */
.layout-navbar {
    font-family: 'Poppins', sans-serif;
    backdrop-filter: blur(10px);
    background: rgba(255, 255, 255, 0.95) !important;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
}

/* Card Styles */
.card {
    border: none;
    border-radius: 16px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease;
    margin-bottom: 1.5rem;
}

.card:hover {
    transform: translateY(-5px);
}

.card-header {
    border-bottom: none;
    background: transparent;
    padding: 1.5rem;
}

.btn-danger {
    font-family: 'Poppins', sans-serif;
    padding: 0.6rem 1.2rem;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.btn-danger:hover {
    transform: translateY(-2px);
}
</style>
<div class="card mb-4">
    <div class="card-header d-flex align-items-center">
        <i class="fas fa-award me-2 text-danger"></i>
        <h5 class="mb-0">Available Scholarship Programs</h5>
    </div>
</div>

<div class="row">
    <?php if ($scholarships_offer_count > 0) { 
        foreach ($scholarships_offer as $list) { ?>
        <div class="col-12 col-md-4 col-lg-3 mb-4">
            <div class="scholarship-card">
                <div class="scholarship-header">
                    <i class="fas fa-graduation-cap scholarship-icon"></i>
                    <h6 class="scholarship-title"><?php echo $list['name']; ?></h6>
                    <span class="scholarship-id">
                        <i class="fas fa-hashtag me-1"></i>
                        <?php echo $list['scholarID']; ?>
                    </span>
                </div>
                <div class="scholarship-body">
                    <a href="scholarships_details.php?view_scholarship=<?php echo $list['scholarID'];?>" 
                       class="btn btn-view">
                        <i class="fas fa-info-circle me-2"></i>View Details
                    </a>
                </div>
            </div>
        </div>
    <?php }
    } else { ?>
        <div class="col-12">
            <div class="empty-state">
                <i class="fas fa-folder-open empty-icon"></i>
                <p>No Scholarship programs available at the moment</p>
            </div>
        </div>
    <?php } ?>
</div>

<style>
.scholarship-card {
    background: white;
    border-radius: 16px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    overflow: hidden;
}

.scholarship-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
}

.scholarship-header {
    padding: 1.5rem;
    background: linear-gradient(45deg, #f8f9fa, #ffffff);
    border-bottom: 2px solid #f1f1f1;
}

.scholarship-icon {
    font-size: 2rem;
    color: #800000;
    margin-bottom: 1rem;
}

.scholarship-title {
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: #2d3436;
}

.scholarship-id {
    font-size: 0.85rem;
    color: #666;
    display: block;
}

.scholarship-body {
    padding: 1.2rem;
}

.btn-view {
    width: 100%;
    background: #800000;
    color: white;
    padding: 0.8rem;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    border: none;
    font-weight: 500;
}

.btn-view:hover {
    background: #600000;
    color: white;
    transform: translateY(-2px);
}

.empty-state {
    text-align: center;
    padding: 3rem;
    background: #f8f9fa;
    border-radius: 16px;
}

.empty-icon {
    font-size: 3rem;
    color: #800000;
    margin-bottom: 1rem;
}
</style>
              
            </div>
<?php include "./footer.php";?>
