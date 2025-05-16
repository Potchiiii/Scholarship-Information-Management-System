<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Account - WMSU SIMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
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
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .verification-container {
            width: 100%;
            max-width: 400px;
            margin: 2rem;
            margin-top: 100px;
        }

        .verification-card {
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .verification-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .verification-header h3 {
            color: var(--text-dark);
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .verification-header p {
            color: var(--text-light);
            font-size: 0.95rem;
            margin: 0;
        }

        .otp-input {
            width: 100%;
            padding: 1rem;
            border: 2px solid #edf2f7;
            border-radius: 10px;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            text-align: center;
            letter-spacing: 4px;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
        }

        .otp-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(128, 0, 0, 0.1);
        }

        .submit-btn {
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

        .submit-btn:hover {
            background: #600000;
            transform: translateY(-2px);
        }

        .alert {
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }

        .alert-danger {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }
    </style>
</head>

<body>
    <?php include 'mainNavbar.php'; ?>

    <div class="verification-container">
        <div class="verification-card">
            <div class="verification-header">
                <h3>Account Verification</h3>
                <p>Please check your WMSU email for the verification code</p>
            </div>

            <?php if (count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <?php foreach ($errors as $error): ?>
                        <?php echo $error; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form action="user-otp.php" method="POST" autocomplete="off">
                <input class="otp-input" type="number" name="otp" placeholder="Enter verification code" required>
                <button class="submit-btn" type="submit" name="check">Verify Account</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>