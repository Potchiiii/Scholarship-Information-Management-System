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
    <title>Admin Login - <?php echo $settings['abbreviation'] ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary: #1a237e;
            --secondary: #283593;
            --success: #43a047;
            --background: #f5f6fa;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--background);
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .admin-login-container {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
        }

        .admin-card {
            background: white;
            border-radius: 24px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            width: 100%;
        }

        .admin-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .admin-header img {
            width: 80px;
            height: 80px;
            object-fit: contain;
            margin-bottom: 1rem;
        }

        .admin-header h2 {
            color: var(--primary);
            font-size: 1.5rem;
            margin: 0.5rem 0;
        }

        .admin-header p {
            color: #64748b;
            font-size: 0.9rem;
        }

        .input-group {
            margin-bottom: 1.5rem;
            width: 100%;
        }

        .input-group label {
            display: block;
            color: #1e293b;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        .input-wrapper {
            position: relative;
            width: 100%;
        }

        .input-wrapper i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
        }

        .admin-input {
            width: calc(100% - 3.6rem);
            padding: 0.8rem 1rem 0.8rem 2.8rem;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .admin-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(26, 35, 126, 0.1);
            outline: none;
        }

        .admin-btn {
            width: 100%;
            padding: 1rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 12px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .admin-btn:hover {
            background: var(--secondary);
            transform: translateY(-2px);
        }

        .back-to-home {
            text-align: center;
            margin-top: 1.5rem;
        }

        .back-to-home a {
            color: var(--primary);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .back-to-home a:hover {
            color: var(--secondary);
        }
    </style>
</head>

<body>
    <div class="admin-login-container">
        <div class="admin-card">
            <div class="admin-header">
                <img src="./assets/images/logo/<?php echo $settings['Logo'] ?>" alt="Admin Logo">
                <h2>Admin Portal</h2>
                <p>Enter your credentials to access the dashboard</p>
            </div>

            <form action="" method="post">
                <div class="input-group">
                    <label>Email Address</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" class="admin-input" placeholder="admin@example.com" required>
                    </div>
                </div>

                <div class="input-group">
                    <label>Password</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" class="admin-input" placeholder="Enter your password"
                            required>
                    </div>
                </div>

                <button type="submit" name="adminlogin" class="admin-btn">
                    <i class="fas fa-sign-in-alt"></i> Login to Dashboard
                </button>
            </form>
        </div>
    </div>

    <script>
        // Add this to central_control.php for admin login handling
        <?php if (isset($_POST['adminlogin'])): ?>
            if (/* admin credentials verified */) {
                window.location.href = './scholars/index.php';
            }
        <?php endif; ?>
    </script>
</body>

</html>