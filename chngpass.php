<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <?php
    session_start();

    $connection = mysqli_connect("localhost", "root", "", "demo");

    if ($connection) {
    } else {
        die("Not connected" . mysqli_connect_error());
    }



    if (isset($_POST['submit'])) { // Check if the login form was submitted
        $password = $_POST['password'];
        $password = $_POST['confirm_password'];

        if ($_POST['password'] == $_POST['confirm_password']) {
            if ((strlen($password) >= 5 && preg_match('/[0-9]/', $password) && preg_match('/[a-zA-Z]/', $password))) {

                $user = $_SESSION["uname"];

                $updateQuery = "UPDATE `demo_reg` SET `pass`='$password' WHERE `uname`='$user'";
                $updateResult = mysqli_query($connection, $updateQuery);

                if ($updateResult) {
                    session_unset();
                    session_destroy();
                    echo "<script>
                            swal('Password Changed!', 'Now, login with new password.', 'success').then(function() {
                            window.location.href='login.php';
                            });
                        </script>";
                    // echo "<script>alert('password changes successfully !')</script>";
                    // // echo "<script> window.location.href='index.php' </script>";

                } else {
                    echo "Password update failed: " . mysqli_error($connection);
                }
            } else {
                // Display SweetAlert error message
                echo "<script>
                swal('Error!', 'Password length atleast 5 & Must contain Number and Alphabets.', 'error').then(function() {
                    window.location.href='home.php';
                });
                </script>";
            }
        } else {
            echo "<script>
    swal('Error!', 'Passwords are not same', 'error').then(function() {
        window.location.href='home.php';
    });
    </script>";
        }
    }

    ?>

</body>

</html>