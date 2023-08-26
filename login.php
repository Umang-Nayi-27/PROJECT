<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "demo");

if ($connection) {
    echo "Connection done!";
} else {
    die("Not connected" . mysqli_connect_error());
}

if(isset($_SESSION["sessionuser"]) && isset($_SESSION["sessionpass"]))
{
    echo "<script> window.location.href='home.php' </script>";
}
else {
    if (isset($_POST['submit'])) { // Check if the login form was submitted
        if($_POST['username']=="admin" && $_POST['password']=="admin") {
            echo "<script> window.location.href='admin.php' </script>";   
        }
        else {
            $username = $_POST['username'];
            $password = $_POST['password'];

            echo $username;
            echo $password;

            // Fetch user data from the database based on the provided username
            $query = "SELECT * FROM `demo_reg` WHERE `uname`='$username'";
            $result = mysqli_query($connection, $query);

            if ($result) {
                $row = mysqli_fetch_assoc($result);

                if ($row) {
                    $fetchedUsername = $row['uname'];
                    $fetchedPassword = $row['pass'];

                    $_SESSION["sessionuser"] = $fetchedUsername; // Store username in session
                    $_SESSION["sessionpass"] = $fetchedPassword; // Store hashed password in session

                    // echo "Fetched Username: " . $fetchedUsername . "<br>";
                    // echo "Fetched Password: " . $fetchedPassword . "<br>";

                    // echo "Session Username: " . $_SESSION["sessionuser"] . "<br>"; 
                    // echo "Session Password: " . $_SESSION["sessionpass"] . "<br>"; 

                    echo "<script> window.location.href='home.php' </script>";
                } else {
                    echo "<script>window.alert('Wrong username or password')</script>";
                }
            } else {
                echo "Query failed: " . mysqli_error($connection);
            }
        }
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
                <h2>Login</h2>
                <form action="" method="post">
                    <p><a href="signup.php" id="aha">Don't have account?</a></p>
                    <input type="text" name="username" placeholder="Username">
                    <input type="password" name="password" placeholder="Password">
                    <button type="submit" name="submit">Login</button>
                </form>
                <p><a href="getmail.php" class="forgot-password">Forgot Password?</a></p>
            </div>
        </div>
    </div>
</body>

</html>