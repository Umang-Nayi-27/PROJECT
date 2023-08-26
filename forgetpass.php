<?php
$connection = mysqli_connect("localhost", "root", "", "demo");

if ($connection) {
    echo "Connection done!";
} else {
    die("Not connected" . mysqli_connect_error());
}
if(isset($_GET['email']) && isset($_GET['token'])){
    echo "//data get from link";
    date_default_timezone_set('Asia/Kolkata');
    $date = date("Y-m-d");
    $query = "SELECT * FROM `demo_reg` WHERE `email`='$_GET[email]' ";
    $result= mysqli_query($connection,$query);

    if($result){
        echo " no error generateed";
        if(mysqli_num_rows($result)>0){
            echo "user found";
            
            if (isset($_POST['submit'])) { // Check if the login form was submitted
                $password = $_POST['password'];
                echo $password;

                $updateQuery = "UPDATE `demo_reg` SET `pass`='$password' WHERE `email`='$_GET[email]'";
                $updateResult = mysqli_query($connection, $updateQuery);
                
                if($updateResult) {
                    echo "Password updated successfully!";
                    echo "<script> window.location.href='login.php' </script>";
                } else {
                    echo "Password update failed: " . mysqli_error($connection);
                }

            }

        }
        else{
            echo "no user found";
        }
    }
    else{
        echo "error somewhere";
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
                <h2>Forgot Password </h2>
                <form action="" method="post">
                    
                    <input type="password" name=" password" placeholder="New Password">
                    <input type="password" name="rpassword" placeholder="Re-enter Password">
                    <br>
                    <button type="submit" name="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>