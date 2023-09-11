
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
    $password = $_POST['confirm_password'];

    if($_POST['password']==$_POST['confirm_password']){
    if ( (strlen($password) >= 5 && preg_match('/[0-9]/', $password) && preg_match('/[a-zA-Z]/', $password)))  {
        
        $user = $_SESSION["uname"];

        $updateQuery = "UPDATE `demo_reg` SET `pass`='$password' WHERE `uname`='$user'";
        $updateResult = mysqli_query($connection, $updateQuery);

        if ($updateResult) {
                echo "query workerd";
                echo "<script>alert('Password Changed Successfully !.')</script>";
                session_unset();
                session_destroy();
                echo "<script> window.location.href='login.php'; </script>";
            // echo "<script>alert('password changes successfully !')</script>";
            // // echo "<script> window.location.href='index.php' </script>";

        } else {
            echo "Password update failed: " . mysqli_error($connection);
        }
    }  else {
        // Display SweetAlert error message
        echo "<script>
        swal('Error!', 'Password length atleast 5. Must contain Number and Alphabets', 'error');
        </script>";
    }
}
else{
    echo "<script>
    swal('Error!', 'Incorrect Re-password !', 'error');
    </script>";
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>change password</title>
    <link rel="shortcut icon" type="x-icon" href="img/browser.jpg" style="background-color: white;" >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Include Bootstrap JavaScript (requires jQuery and Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" type="x-icon" href="img/browser.jpg" style="background-color: white;" >
    <link rel="stylesheet" href="login.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<style>
.navbar {
            background-color: white;
            color: black;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        .navbar-logo {
            color: black;
            text-decoration: none;
            font-size: 24px;
        }

        .navbar-links {
            list-style: none;
            display: flex;
            gap: 30px;
        }

        .navbar-links li {
            margin-right: 20px;
            
        }

        .navbar-links a {
            
            font-weight:normal;
            color: black;
            text-decoration: none;
        }

        /* Style for the right corner buttons */
        .navbar-right {
            display: flex;
            align-items: center;
        }

        .navbar-button {
            margin-left: 20px;
            padding: 10px 20px;
            background-color: #d4cfd0;
            color: black;
            border-color: white;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition-delay: 0.2s;
            
            /* Add cursor style for better interaction */
        }

        .navbar-button:hover{
            
            background-color: #666;
            border-color: #222;
        } 
        .detail{color: #666;}
        .input{color: black;}
        /* Responsive adjustments */
        @media screen and (max-width: 768px) {
            .navbar-links {
                display: none;
            }

            .navbar-right {
                margin-left: auto;
            }
        }
        /* Other CSS styles ... */
        /* Responsive adjustments ... */
    </style>
<body>
<div>
<nav class="navbar">
        <div class="navbar-brand">
            <img src="img\log2.png" alt="" style=" width: 100px;height: auto;">
        </div>
        <ul class="navbar-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <div class="navbar-right">
            <form method="post" action="">
                <input type="submit" class="navbar-button" name="logout" value="Logout">
                <a type="" href="#" name="updtpr" style="color:#666; padding:20px ; cursor:pointer" value="">
                <?php echo $_SESSION["uname"];?></a>
            </form>
        </div>
</nav>
</div>
    <div id="page1">
       
                <div class="login-container">
                <a class="navbar-logo" href="#">
                    <img src="img\log2.png" alt="" style="width: 200px;height: auto;">
                </a>
                <hr>
                <h2>Change Password </h2>
                <form action="" method="post">
                    <input type="password" name=" password" placeholder="New Password">
                    <input type="password" name="confirm_password" placeholder="Re-enter Password">
                    <br>
                    <button type="submit" name="submit">Update Password</button>
                </form>
    </div>
    
    </div>
</body>




</html>