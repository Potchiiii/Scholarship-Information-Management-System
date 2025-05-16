<?php require_once "central_control.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mission & Vision - <?php echo $settings['Name'] ?></title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .hero-section {
            background: <?php echo $settings['color'] ?>;
            min-height: 40vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 8rem 2rem 4rem;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .hero-title {
            color: <?php echo $settings['text_color'] ?>;
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            letter-spacing: -1px;
        }

        .content-wrapper {
            max-width: 1200px;
            margin: -100px auto 4rem;
            padding: 0 2rem;
            position: relative;
            z-index: 3;
        }

        .mission-card {
            background: white;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            padding: 3rem;
            margin-bottom: 2rem;
            transition: transform 0.3s ease;
        }

        .mission-card:hover {
            transform: translateY(-5px);
        }

        .section-title {
            color: #800000;
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 1rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 4px;
            background: #800000;
            border-radius: 2px;
        }

        .section-content {
            color: #475569;
            line-height: 1.8;
            font-size: 1.1rem;
            text-align: justify;
        }

        .decorative-shape {
            position: absolute;
            bottom: -50px;
            left: 0;
            width: 100%;
            height: 100px;
            background: white;
            clip-path: polygon(0 50%, 100% 0, 100% 100%, 0% 100%);
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .content-wrapper {
                margin-top: -50px;
            }
            
            .mission-card {
                padding: 2rem;
            }
        }
    </style>
</head>
<body>
    <?php include 'mainNavbar.php'; ?>

    <section class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">Mission & Vision</h1>
        </div>
        <div class="decorative-shape"></div>
    </section>

    <div class="content-wrapper">
        <div class="mission-card">
            <h2 class="section-title">Mission & Vision</h2>
            <p class="section-content"><?php echo $settings['description'] ?></p>
        </div>
    </div>
</body>
</html>
