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
    <title>Login - WMSU SIMS</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
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
            min-height: 100vh;
            background: var(--background);
        }

        .page-container {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            min-height: 100vh;
            padding-top: 80px;
        }

        .login-section {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .login-box {
            width: 100%;
            max-width: 400px;
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header img {
            width: 80px;
            margin-bottom: 1rem;
        }

        .login-header h2 {
            font-size: 1.5rem;
            color: var(--text-dark);
            margin: 0.5rem 0;
        }

        .input-group {
            margin-bottom: 1.5rem;
        }

        .input-field {
            width: calc(100% - 40px);
            /* Adjust width to accommodate icon */
            padding: 0.8rem 1.2rem;
            padding-right: 40px;
            /* Add padding for icon space */
            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .position-relative {
            display: flex;
            align-items: center;
            border: 2px solid #edf2f7;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .position-relative:focus-within {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(128, 0, 0, 0.1);
        }

        .position-relative input {
            border: none;
            outline: none;
        }

        .position-relative .fi {
            color: var(--text-light);
            margin-right: 12px;
        }

        .login-btn {
            width: 100%;
            padding: 0.8rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 10px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .login-btn:hover {
            background: #600000;
            transform: translateY(-2px);
        }

        .carousel-section {
            background: linear-gradient(135deg, rgba(128, 0, 0, 0.05) 0%, rgba(128, 0, 0, 0.1) 100%);
            padding: 2rem;
            overflow-y: auto;
            max-height: 90vh;
        }

        .publications-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            padding: 1rem;
        }

        .publication-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            position: relative;
        }

        .publication-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        }

        .publication-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .publication-card:hover .publication-image {
            transform: scale(1.05);
        }

        .publication-content {
            padding: 1.5rem;
            text-align: center;
            background: rgba(255, 255, 255, 0.95);
        }

        .publication-title {
            color: var(--text-dark);
            font-size: 1.1rem;
            margin-bottom: 1rem;
            font-weight: 600;
            line-height: 1.4;
        }

        .view-details-btn {
            display: inline-block;
            padding: 0.6rem 1.2rem;
            background: var(--primary);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .view-details-btn:hover {
            background: #600000;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .publications-grid {
                grid-template-columns: 1fr;
                padding: 0.5rem;
            }
        }

        .forgot-link {
            color: var(--text-light);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
            display: block;
            margin-bottom: 1.5rem;
        }

        .forgot-link:hover {
            color: var(--primary);
        }

        @media (max-width: 968px) {
            .carousel-inner img {
                height: 400px;
            }
        }

        .signup-text {
            text-align: center;
            margin-top: 1.5rem;
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .signup-text a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }

        @media (max-width: 968px) {
            .page-container {
                grid-template-columns: 1fr;
            }

            .carousel-section {
                display: none;
            }

            .login-box {
                margin: 1rem;
            }
        }

        .publications-carousel {
            padding: 2rem 1rem;
        }

        .swiper {
            width: 100%;
            padding: 2rem 1rem;
        }

        .publication-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(128, 0, 0, 0.1);
            transition: all 0.4s ease;
            height: 450px;
        }

        .publication-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(128, 0, 0, 0.15);
        }

        .publication-image-wrapper {
            height: 300px;
            overflow: hidden;
        }

        .publication-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .publication-card:hover .publication-image {
            transform: scale(1.1);
        }

        .swiper-button-prev,
        .swiper-button-next {
            color: #800000;
            background: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .swiper-button-prev:after,
        .swiper-button-next:after {
            font-size: 1.2rem;
        }

        .swiper-pagination-bullet {
            background: #800000;
        }

        .swiper-pagination-bullet-active {
            background: #800000;
            transform: scale(1.2);
        }
    </style>
</head>

<body>
    <?php include 'mainNavbar.php'; ?>

    <div class="page-container">
        <div class="login-section">
            <div class="login-box">
                <div class="login-header">
                    <img src="./assets/images/logo/<?php echo $settings['Logo'] ?>" alt="WMSU Logo">
                    <h2><?php echo $settings['abbreviation'] ?> Login</h2>
                </div>

                <?php if (count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $error): ?>
                            <?php echo $error; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <form action="" method="post">
                    <div class="input-group">
                        <div class="position-relative w-100">
                            <input type="text" name="email" class="input-field" placeholder="Email Address"
                                value="<?php echo $email; ?>" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="position-relative w-100">
                            <input type="password" name="password" id="password" class="input-field"
                                placeholder="Password" required>
                            <span class="position-absolute top-50 end-0 translate-middle-y pe-3"
                                style="cursor: pointer;" onclick="togglePassword()">
                                <i id="toggleIcon" class="fi fi-rr-eye"></i>
                            </span>
                        </div>
                    </div>
                    <a href="forgot-password.php" class="forgot-link">Forgot password?</a>
                    <button type="submit" name="login" class="login-btn">Login</button>
                </form>
                <div class="signup-text">
                    Don't have an account? <a href="signup.php">Sign Up</a>
                </div>
            </div>
        </div>
        <div class="carousel-section">
            <div class="publications-carousel">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($publications as $list) { ?>
                            <div class="swiper-slide">
                                <div class="publication-card">
                                    <div class="publication-image-wrapper">
                                        <img src="./assets/images/pubmat/<?php echo $list['banner'] ?>"
                                            class="publication-image" alt="Publication">
                                    </div>
                                    <div class="publication-content">
                                        <h5 class="publication-title"><?php echo $list['titles'] ?></h5>
                                        <a href="banner_descriptions.php?decription=<?php echo $list['pubID'] ?>"
                                            class="view-details-btn">View Details</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

        <script>
            function togglePassword() {
                const passwordInput = document.getElementById('password');
                const toggleIcon = document.getElementById('toggleIcon');

                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    toggleIcon.classList.remove('fi-rr-eye');
                    toggleIcon.classList.add('fi-rr-eye-crossed');
                } else {
                    passwordInput.type = 'password';
                    toggleIcon.classList.remove('fi-rr-eye-crossed');
                    toggleIcon.classList.add('fi-rr-eye');
                }
            }
            const swiper = new Swiper('.swiper', {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                effect: 'coverflow',
                coverflowEffect: {
                    rotate: 30,
                    stretch: 0,
                    depth: 100,
                    modifier: 1,
                    slideShadows: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                    },
                    768: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 2,
                    },
                }
            });
        </script>
</body>

</html>