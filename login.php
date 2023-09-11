<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="shortcut icon" type="x-icon" href="img/browser.jpg" style="background-color: white;">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <div id="page1">
        <div id="divvid">
            <video autoplay loop muted playsinline>
                <source src="img/wp3.mp4" type="video/mp4">
            </video>
        </div>
        <div id="divlg">
            <!-- Sidebar -->
            <div class="login-container">
                <a class="navbar-logo" href="#">
                    <img src="img\log2.png" alt="" style="width: 200px;height: auto;">
                </a>
                <hr>
                <h2 style="font-weight: lighter;">Login</h2>
                <form action="" method="post">
                    <p><a href="signup.php" id="aha">Don't have account?</a></p>
                    <input type="text" name="mailoruser" placeholder=" Email or Username">
                    <input type="password" name="password" placeholder="Password">
                    <button type="submit" name="submit">Login</button>
                </form>
                <p><a href="getmail.php" class="forgot-password">Forgot Password?</a></p>
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

if (isset($_SESSION["sessionuser"]) && isset($_SESSION["sessionpass"])) {
    echo "<script> window.location.href='home.php' </script>";
} else {
    if (isset($_POST['submit'])) { // Check if the login form was submitted
        if ($_POST['mailoruser'] == "admin" && $_POST['password'] == "admin") {
            echo "<script> window.location.href='admin.php' </script>";
        } else {
            $mailoruser = $_POST['mailoruser'];
            $password = $_POST['password'];

            echo $mailoruser;
            echo $password . "<br>";

            // Fetch user data from the database based on the provided username
            $query = "SELECT `pass`,`fname`,`uname`,`email`,`img` FROM `demo_reg` WHERE `email`='$mailoruser'";
            $result = mysqli_query($connection, $query);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                echo " query worked.....result got" . "<br>";

                if ($row) {
                    $pass = $row['pass'];
                    $user = $row['uname'];
                    $email = $row['email'];
                    $fname = $row['fname'];
                    $path = $row['img'];
                    echo "getting rows...." . "<br>";
                    if ($pass == $password) {
                        $_SESSION["sessionuser"] = $email; // Store username in session
                        $_SESSION["sessionpass"] = $pass;
                        $_SESSION["uname"] = $user;
                        $_SESSION["email"] = $email;
                        $_SESSION["fname"] = $fname;
                        $_SESSION["path"]  = $path;

                        echo "password correct";
                        // Store hashed password in session
                        echo "<script> window.location.href='home.php' </script>";
                    } else {
                        echo "<script>
                                    swal('Error!', 'Wrong Password', 'error');
                                  </script>";
                    }
                } else {
                    echo "<script>
                    swal('Error!', 'Invalid Username ', 'error');
                    </script>";
                }
            } else {
                $query = "SELECT `pass`,`fname`,`uname`,`email`,`img` FROM `demo_reg` WHERE `uname`='$mailoruser'";
                $result = mysqli_query($connection, $query);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);

                    if ($row) {
                        $pass = $row['pass'];
                        $user = $row['uname'];
                        $email = $row['email'];
                        $fname = $row['fname'];
                        $path = $row['img'];
                        if ($pass == $password) {
                            $_SESSION["sessionuser"] = $user; // Store username in session
                            $_SESSION["sessionpass"] = $pass;
                            $_SESSION["email"] = $email;
                            $_SESSION["uname"] = $user;
                            $_SESSION["fname"] = $fname;
                            $_SESSION["path"]  = $path;
                            // Store hashed password in session
                            echo "<script> window.location.href='home.php' </script>";
                        } else {
                            echo "<script>
                                    swal('Error!', 'Wrong Password', 'error');
                                  </script>";
                        }
                    } else {
                        echo "never execute";
                    }
                } else {
                    echo "<script>
                        swal('Error!', 'Invalid Username ', 'error');
                        </script>";
                }
            }
        }
    }
}
?>

</html>