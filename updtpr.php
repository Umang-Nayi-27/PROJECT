<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update Profile</title>
    <link rel="shortcut icon" type="x-icon" href="img/browser.jpg" style="background-color: white;" >
    <link rel="stylesheet" href="login.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <div id="page1">
        <div id="divvid">
            <video autoplay loop muted playsinline>
                <source src="img/p3vid4.mp4" type="video/mp4">
            </video>
        </div>
        <div id="divlg">
            <div class="login-container">
            <a class="navbar-logo" href="#">
                    <img src="img\log2.png" alt="" style="width: 200px;height: auto;">
                </a>
                <hr>
                <h2>Edit Profile</h2>
                <form action="" method="post">
                    <input type="text" name="fname" placeholder="Full Name">
                    <!-- <input type="email" name="email" placeholder="Email"> -->
                    <br>
                    <button type="submit" name="submit">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
</body>

<?php
session_start();

$connection = mysqli_connect("localhost", "root", "", "demo");

if ($connection) {
    echo "Connection done!";
} else {
    die("Not connected" . mysqli_connect_error());
}

if (isset($_POST['submit'])) { // Check if the form was submitted
    $fname = $_POST['fname'];
    // $email = $_POST['email'];
    $uname = $_SESSION["uname"];

    if (preg_match('/^[A-Za-z]+\s+[A-Za-z]+$/', trim($fname)) && !preg_match('/[0-9]/', $fname)) {
        echo "passed";
        // $localPart = substr($email, 0, strpos($email, '@'));
        // if (strlen($localPart) > 4 && filter_var($email, FILTER_VALIDATE_EMAIL) && checkdnsrr(substr(strrchr($email, '@'), 1), 'MX')) {

                    $updateQuery = "UPDATE `demo_reg` SET `fname`='$fname' WHERE `uname`='$uname'";
                    $updateResult = mysqli_query($connection, $updateQuery);

                    if ($updateResult) {
                        
                        $_SESSION["fname"]=$fname;  

                        echo $_SESSION["fname"];
                        echo "<script> alert('Profile Updated successfully !'); </script>";
                        echo "<script> window.location.href='home.php' </script>";
                    } else {
                        echo "Update failed: " . mysqli_error($connection);
                    }
        } 
        //else {
        //     echo "<script>
        //         swal('Invalid Email Address !!', '', 'error');
        //     </script>";
        // }
        //}
        else {
        echo "<script>
            swal('Invalid Fullname!', 'Full Name should contain firstname and lastname (e.g. Cristiano Ronaldo)', 'error');
        </script>";
    }
}
?>

</html>
