<?php
session_start();

$connection = mysqli_connect("localhost", "root", "", "demo");

if ($connection) {
    echo "Connection done!";
} else {
    die("Not connected" . mysqli_connect_error());
}


            
            if (isset($_POST['submit'])) { // Check if the login form was submitted
                $password = $_POST['password'];
                echo $password;
                
                $user=$_SESSION["sessionuser"];

                $updateQuery = "UPDATE `demo_reg` SET `pass`='$password' WHERE `uname`='$user'";
                $updateResult = mysqli_query($connection, $updateQuery);
                
                if($updateResult) {
                    echo "Password updated successfully!";
                    echo "<script> window.location.href='home.php' </script>";
                } 
                else {
                    echo "Password update failed: " . mysqli_error($connection);
                }

            }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN PAGE</title>
    <link rel="stylesheet" href="login.css">
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
                <h2>Change Password </h2>
                <form action="" method="post">
                    
                    <input type="password" name=" password" placeholder="New Password">
                    <input type="password" name="rpassword" placeholder="Re-enter Password">
                    <br>
                    <button type="submit" name="submit">Update Password</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>