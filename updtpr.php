<?php
session_start();

$connection = mysqli_connect("localhost", "root", "", "demo");

if ($connection) {
    echo "Connection done!";
} else {
    die("Not connected" . mysqli_connect_error());
}


            
            if (isset($_POST['submit'])) { // Check if the login form was submitted
                $fname = $_POST['fname'];
                $email = $_POST['email'];
                
                
                $user=$_SESSION["sessionuser"];

                $updateQuery = "UPDATE `demo_reg` SET `fname`='$fname',`email`='$email' WHERE `uname`='$user'";
                $updateResult = mysqli_query($connection, $updateQuery);
                
                if($updateResult) {
                    echo "Profile updated successfully!";
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
                <h2>Edit Profile</h2>
                <form action="" method="post">
                    
                    <input type="password" name="fname" placeholder="username">
                    <input type="password" name="email" placeholder="email">
                    <br>
                    <button type="submit" name="submit">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>