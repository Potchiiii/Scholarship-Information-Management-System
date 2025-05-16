<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <!-- Include SweetAlert CSS and JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<?php
try {
    // Assume $stmt is your prepared PDO statement
    if (1==1) {
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success Pop up!',
                    text: 'Profile updated successfully',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'profile.php';
                    }
                });
              </script>";
    } else {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Failed',
                    text: 'Please try again',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'profile.php';
                    }
                });
              </script>";
    }
} catch (PDOException $e) {
    // Handle any PDO exceptions
    echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '" . $e->getMessage() . "',
                confirmButtonText: 'OK'
            });
          </script>";
}
?>

</body>
</html>
