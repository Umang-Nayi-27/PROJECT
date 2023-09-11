<?php
// Connection established
// Connection established



$connection = mysqli_connect("localhost", "root", "", "demo");

if (!$connection) {
    die("not connected" . mysqli_connect_error());
} else {
    echo "connected";
}





if (isset($_GET['email']) && isset($_GET['fname']) && isset($_GET['uname'])) {
    $email = $_GET['email'];
    $fullName = $_GET['fname'];
    $userName = $_GET['uname'];

    if (isset($_POST['register'])) {
        echo "button set";
        if ($_POST['password'] == $_POST['confirm_password']) {
            echo "pass same";
            $password = $_POST['password'];
            if (strlen($password) >= 5 && preg_match('/[0-9]/', $password) && preg_match('/[a-zA-Z]/', $password)) {
                echo "pass checked";

                if (isset($_FILES["dp"]))     // load selected file... so will load asscoiative array., first temp location per store kere...
                {
                    echo "<script>
                    alert('img get');
                    </script>";
                    $folder = "upload/";
                    $path = $folder . basename($_FILES["dp"]["name"]);
                    echo "<script>
                    alert(".$path.");
                    </script>";
                    if (move_uploaded_file($_FILES["dp"]["tmp_name"], $path)) {
                        $result = mysqli_query($connection, "INSERT INTO `demo_reg`(`fname`, `uname`, `email`, `pass`,`img`) VALUES ('$fullName','$userName','$email','$password','$path')");
                        if ($result) {
                            echo "query run successfully";
                            echo "<script>
                            alert('Registration Completed');
                            </script>";
                            echo "<script> window.location.href='login.php' </script>";
                        } else {
                            echo "this error occurred: " . mysqli_error($connection);
                        }
                    }
                }
            } else {
                echo "repass not same";
                echo "<script>
                     swal('Error!', 'Password length atleast 5. Must contain Number and Alphabets', 'error');
                    </script>";
            }
        } else {
            echo " not same password";
            echo "<script>
            swal('Error!', 'Incorrect Re-password !', 'error');
            </script>";
        }
    }
} else {
    echo "url fetching  problem";
}
// Hash the password using password_hash
// $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register-2 </title>
    <link rel="stylesheet" href="signup.css">
    <link rel="shortcut icon" type="x-icon" href="img/browser.jpg" style="background-color: white;">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <div id="page1">
        <div id="divlg">
            <div class="registration-container">
                <a class="navbar-logo" href="#">
                    <img src="img\log2.png" alt="" style="width: 200px;height: auto;">
                </a>
                <hr>
                <h2>Register-2</h2>
                <form action="#" method="post" enctype="multipart/form-data">
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                    <br>
                    <input type="file" name="dp">
                    <button type="submit" name="register">Register</button>
                </form>
            </div>
        </div>
        <div id="divvid">
            <video autoplay loop muted playsinline>
                <source src="img/p3vid5.mp4" type="video/mp4">
            </video>
        </div>
    </div>
</body>

</html>