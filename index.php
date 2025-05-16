<?php
require_once "central_control.php";
echo "<p style='display:none;'>" . $_SESSION['STATUS'] . "</p>";
include('./includes/alerts.php')

    ?>


<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>WMSU SIMS - Scholarship Information Management System</title>
      <link rel="stylesheet" href="./assets/styles.css">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
      <?php include 'mainNavbar.php'; ?>

      <section class="hero">
          <div class="hero-content">
              <h1 class="hero-title"><?php echo $settings['hero_title'] ?></h1>
              <p class="hero-subtitle"><?php echo $settings['hero_subtitle'] ?></p>
              <a href="login.php" class="cta-button">Log In</a>
          </div>

          <div class="hero-image">
              <img src="./assets/images/logo/<?php echo $settings['Logo'] ?>" alt="WMSU LOGO" class="logo">
          </div>
      </section>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>

</html>