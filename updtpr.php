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

    if (isset($_POST['submit'])) { // Check if the form was submitted
        $fname = $_POST['fname'];
        $uname = $_SESSION["uname"];

        if (preg_match('/^[A-Za-z]+\s+[A-Za-z]+$/', trim($fname)) && !preg_match('/[0-9]/', $fname)) {
            $updateQuery = "UPDATE `demo_reg` SET `fname`='$fname' WHERE `uname`='$uname'";
            $updateResult = mysqli_query($connection, $updateQuery);

            if ($updateResult) {
                $_SESSION["fname"] = $fname;
                echo "<script> 
                        swal('Success!', 'Profile Updated successfully!', 'success').then(function() {
                            window.location.href='home.php';
                        });
                      </script>";
            } else {
                echo "Update failed: " . mysqli_error($connection);
            }
        } else {
            echo "<script>
                swal('Error!', 'Invalid Username', 'error').then(function() {
                    window.location.href='home.php';
                });
                </script>";
        }
    }
    ?>
</body>

</html>
