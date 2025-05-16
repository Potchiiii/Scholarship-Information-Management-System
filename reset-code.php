<?php require_once "central_control.php"; ?>
<?php
$email = $_SESSION['email'];
if($email == false){
  header('Location: login.php');
}
echo "<p style='display:none;'>".$_SESSION['STATUS']."</p>";
include('./includes/alerts.php')


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 300px;
        }
        .login-container h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: calc(100% - 8px); 
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* Ensures padding is included in the width */
        }
        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: maroon;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .login-container button:hover {
            background-color: #45a049;
        }
        .login-container a {
            display: block;
            text-align: center;
            margin-top: 10px; /* Added spacing between buttons */
            color: maroon;
            text-decoration: none;
        }
        .login-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php include 'mainNavbar.php'; ?>
    <div class="container">
        <div class="login-container">
            <h3>OTP </h3>
            <p>Please insert your wmsu gmail</p>
           
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
            <form action="" method="POST" autocomplete="off">
                <input class="form-control mb-3" type="number" name="otp" placeholder="Enter code" required>
                <button class="form-control button" type="submit" name="check-reset-otp" value="Submit">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
