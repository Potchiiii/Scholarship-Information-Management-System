<?php
require_once "central_control.php";
include('./includes/alerts.php');

// Get scholarship ID from URL
$scholarID = isset($_GET['id']) ? $_GET['id'] : '';

// Fetch scholarship details using scholarshipID
$stmt = $pdo->prepare("SELECT s.*, sm.sememestrName 
                      FROM scholarship s 
                      JOIN semester sm ON s.semesterID = sm.semesterID 
                      WHERE s.scholarshipID = ?");
$stmt->execute([$scholarID]);
$scholarship = $stmt->fetch(PDO::FETCH_ASSOC);


// Get scholarship documents/requirements 
$docs = $pdo->prepare("SELECT * FROM scholarship_docs WHERE scholarship = ?");
$docs->execute([$scholarship['scholarshipID']]);
$requirements = $docs->fetchAll();

// Get settings for styling
$settings = $pdo->query("SELECT * FROM settings WHERE settingsID = 1")->fetch();



// Display data in the view
echo $scholarship['name']; // Scholarship name
echo $scholarship['sememestrName']; // Semester
echo $scholarship['date_start'] . ' - ' . $scholarship['date_end']; // Application period
echo $scholarship['reinburment']; // Reimbursement date
echo $scholarship['limitation']; // Available slots
echo $scholarship['description']; // Description

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $scholarship['name']; ?> - <?php echo $settings['Name'] ?></title>
    <link rel="stylesheet" href="./assets/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .scholarship-section {
            padding: 120px 8% 50px;
            background: #f8f9fa;
            min-height: 100vh;
        }
        .scholarship-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.05);
            padding: 40px;
            margin-bottom: 30px;
            transition: transform 0.3s ease;
        }
        .scholarship-card:hover {
            transform: translateY(-5px);
        }
        .scholarship-header {
            color: <?php echo $settings['color'] ?>;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 30px;
            position: relative;
            padding-bottom: 15px;
        }
        .scholarship-header:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 4px;
            background: <?php echo $settings['color'] ?>;
            border-radius: 2px;
        }
        .info-section {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 15px;
            margin: 30px 0;
        }
        .date-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        .date-item {
            padding: 20px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
            transition: all 0.3s ease;
        }
        .date-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.06);
        }
        .date-item strong {
            color: <?php echo $settings['color'] ?>;
            display: block;
            margin-bottom: 8px;
            font-size: 1.1rem;
        }
        .requirements-list {
            list-style: none;
            padding: 0;
            margin-top: 20px;
        }
        .requirements-list li {
            padding: 15px 20px;
            background: #fff;
            border-radius: 10px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 15px;
            transition: all 0.3s ease;
        }
        .requirements-list li:hover {
            transform: translateX(5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
        }
        .requirements-list i {
            color: <?php echo $settings['color'] ?>;
            font-size: 1.2rem;
        }
        .description {
            line-height: 1.8;
            color: #2d3436;
            margin: 30px 0;
            font-size: 1.1rem;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 12px;
        }
        .status-badge {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 20px;
            letter-spacing: 0.5px;
        }
        .status-active {
            background: #e3fcef;
            color: #00b894;
        }
        .status-closed {
            background: #ffeaa7;
            color: #fdcb6e;
        }
        .btn-apply {
            padding: 15px 40px;
            font-size: 1.1rem;
            border-radius: 12px;
            transition: all 0.3s ease;
            background: <?php echo $settings['color'] ?>;
            border: none;
        }
        .btn-apply:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            background: <?php echo $settings['color'] ?>;
            opacity: 0.9;
        }
    </style>
</head>

<body>
    <?php include 'mainNavbar.php'; ?>
      <section class="scholarship-section">
          <div class="container">
              <div class="scholarship-card text-center py-5">
                  <i class="fas fa-lock fa-3x mb-4" style="color: <?php echo $settings['color'] ?>"></i>
                  <h3 class="mb-4">Log In to View Scholarship Details</h3>
                  <p class="text-muted mb-4">Access complete scholarship information and apply for opportunities</p>
                  <a href="login.php" class="btn btn-primary btn-apply">
                      <i class="fas fa-sign-in-alt me-2"></i>Log In Now
                  </a>
              </div>
          </div>
      </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
