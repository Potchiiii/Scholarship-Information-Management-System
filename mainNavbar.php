<?php
require_once "central_control.php";
$errors = [];
$email = isset($_POST['email']) ? $_POST['email'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .navbar,
        .nav-link,
        .dropdown-item {
            font-family: 'Poppins', sans-serif;
        }

        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background:
                <?php echo $settings['navbar_color'] ?>
            ;
            backdrop-filter: blur(10px);
            padding: 1.2rem 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.05);
            z-index: 1000;
            box-sizing: border-box;
        }

        .nav-group {
            display: flex;
            align-items: center;
            padding-right: 2rem;
        }

        .nav-link {
            color:
                <?php echo $settings['navbar_font_color'] ?>
            ;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            white-space: nowrap;
        }

        .contact-info {
            color:
                <?php echo $settings['navbar_font_color'] ?>
            ;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }



        .nav-link:hover {
            color: #800000;
            background: rgba(128, 0, 0, 0.05);
        }

        .contact-info {
            color:
                <?php echo $settings['navbar_font_color'] ?>
            ;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 1rem 5%;
            }

            .nav-group {
                gap: 1rem;
            }

            .contact-info {
                display: none;
            }
        }

        .nav-logo {
            height: 40px;
            width: auto;
            margin-right: 1rem;
        }

        @media (max-width: 768px) {
            .nav-logo {
                height: 30px;
            }
        }

        .dropdown-menu {
            background:
                <?php echo $settings['navbar_color'] ?>
            ;
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 0.5rem;
        }

        .dropdown-item {
            color:
                <?php echo $settings['navbar_font_color'] ?>
            ;
            padding: 0.5rem 1rem;
            border-radius: 6px;
        }

        .dropdown-item:hover {
            background: rgba(128, 0, 0, 0.05);
            color: #800000;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="nav-group">
            <img src="./assets/images/logo/<?php echo $settings['Logo'] ?>" alt="Logo" class="nav-logo">
            <a href="index.php" class="nav-link"><?php echo $settings['Name'] ?></a>
        </div>
        <div class="nav-group">
            <div class="dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="scholarshipDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Scholarship Programs
                </a>
                <ul class="dropdown-menu" aria-labelledby="scholarshipDropdown">
                    <?php
                    $scholarz = $pdo->prepare("SELECT s.name, s.scholarshipID FROM scholarship s join semester sm on sm.semesterID = s.semesterID WHERE sm.flag =1 AND s.ctrl_status = 1");
                    $scholarz->execute();
                    $scholarships = $scholarz->fetchAll();

                    foreach ($scholarships as $scholarship) {
                        echo "<li><a class='dropdown-item' href='scholarship_view.php?id={$scholarship['scholarshipID']}'>{$scholarship['name']}</a></li>";

                    }
                    ?>
                </ul>
            </div>
            <div class="nav-group">
                <a href="mission-vision.php" class="nav-link">Mission & Vision</a>
            </div>
            <a href="mailto:<?php echo $settings['email'] ?>" class="nav-link">
                📧 <?php echo $settings['email'] ?>
            </a>
            <div class="contact-info">
                <span>📞 <a href="tel:<?php echo preg_replace('/\D/', '', $settings['contact']); ?>">
                        <?php echo $settings['contact'] ?>
                    </a></span>
            </div>

        </div>
    </nav>

</body>

</html>

<?php
require_once "central_control.php";
?>