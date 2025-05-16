<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publication Details - WMSU SIMS</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #800000;
            --secondary: #ffffff;
            --text-dark: #2d3436;
            --text-light: #636e72;
            --background: #f8f9fa;
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: var(--background);
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            padding-top: 100px;
        }

        .publication-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary) 0%, #600000 100%);
            padding: 1.5rem 2rem;
            color: white;
        }

        .card-header h3 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .card-body {
            padding: 2rem;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 2rem;
            align-items: start;
        }

        .publication-image {
            width: 100%;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .publication-content {
            font-size: 1rem;
            line-height: 1.8;
            color: var(--text-dark);
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            padding: 0.8rem 1.5rem;
            background: var(--primary);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            margin-top: 1.5rem;
            transition: all 0.3s ease;
        }

        .back-button:hover {
            background: #600000;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .content-grid {
                grid-template-columns: 1fr;
            }

            .container {
                padding: 1rem;
                padding-top: 80px;
            }
        }
    </style>
</head>

<body>
    <?php include 'mainNavbar.php'; ?>

    <div class="container">
        <div class="publication-card">
            <div class="card-header">
                <h3><?php echo $details['titles'] ?></h3>
            </div>
            <div class="card-body">
                <div class="content-grid">
                    <div>
                        <img src="./assets/images/pubmat/<?php echo $details['banner'] ?>" alt="Publication Image"
                            class="publication-image">
                    </div>
                    <div class="publication-content">
                        <?php echo $details['description'] ?>
                    </div>
                </div>
                <a href="login.php" class="back-button">Back to Login</a>
            </div>
        </div>
    </div>
</body>

</html>