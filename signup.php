<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - WMSU SIMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>

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

        .signup-container {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            min-height: 100vh;
            padding-top: 80px;
        }

        /* Update these styles in your existing CSS */

        .signup-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 2rem;
            padding-top: 80px;
        }

        .signup-box {
            width: 100%;
            max-width: 500px;
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .signup-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .signup-header img {
            width: 80px;
            margin-bottom: 1rem;
        }

        .signup-header h2 {
            font-size: 1.5rem;
            color: var(--text-dark);
            margin: 0.5rem 0;
        }

        .input-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .input-group {
            margin-bottom: 1.2rem;
        }

        .input-field {
            width: calc(100% - 40px);
            padding: 0.8rem 1.2rem;
            padding-right: 40px;
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

        .signup-btn {
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
            margin-bottom: 1rem;
        }

        .signup-btn:hover {
            background: #600000;
            transform: translateY(-2px);
        }

        .login-link {
            display: block;
            text-align: center;
            color: var(--text-light);
            text-decoration: none;
            font-size: 0.9rem;
            margin-top: 1rem;
        }

        .login-link:hover {
            color: var(--primary);
        }

        .carousel-section {
            background: linear-gradient(135deg, rgba(128, 0, 0, 0.05) 0%, rgba(128, 0, 0, 0.1) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .carousel-inner img {
            height: 600px;
            object-fit: cover;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 968px) {
            .signup-container {
                grid-template-columns: 1fr;
            }

            .carousel-section {
                display: none;
            }

            .signup-box {
                margin: 1rem;
            }
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
        }

        .dropdown-menu.show {
            display: block;
        }

        .nav-item.dropdown {
            position: relative;
        }
    </style>
</head>

<body>
    <?php include 'mainNavbar.php'; ?>

    <div class="signup-container">
        <div class="form-section">
            <div class="signup-box">
                <div class="signup-header">
                    <img src="./assets/images/logo/<?php echo $settings['Logo'] ?>" alt="WMSU Logo">
                    <h2>Create Account</h2>
                </div>

                <?php if (count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $error): ?>
                            <?php echo $error; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <form action="" method="POST">
                    <div class="position-relative w-100">
                        <div class="input group">
                            <input type="text" name="studentid" class="input-field"
                                placeholder="Student ID (0000-00000)" required>
                        </div>
                    </div>
                    <div class="input-row">
                        <div class="input-group">
                            <div class="position-relative w-100">
                                <input type="text" name="first" class="input-field" placeholder="First Name" required>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="position-relative w-100">
                                <input type="text" name="last" class="input-field" placeholder="Last Name" required>
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="position-relative w-100">
                            <input type="text" name="number" class="input-field" placeholder="Contact Number" required>
                        </div>

                        <div class="input-group">
                            <div class="position-relative w-100">
                                <input type="email" name="email" class="input-field" placeholder="Email Address"
                                    required>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="position-relative w-100">
                                <input type="password" name="password" id="password" class="input-field"
                                    placeholder="Password" required>
                                <span class="position-absolute top-50 end-0 translate-middle-y pe-3"
                                    style="cursor: pointer;" onclick="togglePassword('password', 'toggleIcon1')">
                                    <i id="toggleIcon1" class="fi fi-rr-eye"></i>
                                </span>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="position-relative w-100">
                                <input type="password" name="cpassword" id="cpassword" class="input-field"
                                    placeholder="Confirm Password" required>
                                <span class="position-absolute top-50 end-0 translate-middle-y pe-3"
                                    style="cursor: pointer;" onclick="togglePassword('cpassword', 'toggleIcon2')">
                                    <i id="toggleIcon2" class="fi fi-rr-eye"></i>
                                </span>
                            </div>
                        </div>
                        <button type="submit" name="signup" class="signup-btn">Create Account</button>
                        <a href="login.php" class="login-link">Already have an account? Login</a>
                </form>
            </div>
        </div>
        
        <script>
            function togglePassword(inputId, iconId) {
                const passwordInput = document.getElementById(inputId);
                const toggleIcon = document.getElementById(iconId);

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
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>