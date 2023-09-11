<?php


session_start();


if (!isset($_SESSION["sessionuser"])) {
    echo "<script> window.location.href='index.php'; </script>";
} else {
    if (isset($_POST["logout"])) {
        echo "<script>alert('You are Logged Out.')</script>";
        session_unset();
        session_destroy();
        echo "<script> window.location.href='index.php'; </script>";
    }
    if (isset($_POST["cngpass"])) {
        echo "<script> window.location.href='chngpass.php'; </script>";
    }
    if (isset($_POST["updtpr"])) {
        echo "<script> window.location.href='updtpr.php'; </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user profile</title>
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

    <style>
        /* Reset some default styles */
        body,
        h1,
        h2,
        h3,
        p,
        ul,
        li {
            margin: 0;
            padding: 0;
            font-family: 'Viga', sans-serif;
        }

        /* Style for the navigation bar */
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
</head>

<body>
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
    <div class="container mt-4" style="background-color: #f2f2f2; padding:20px">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post">
                    <div class="form-group">
                        <label for="username" class="detail">Username ::</label>
                        <label class="input"><?php 
                                    echo $_SESSION["uname"];                        
                                ?></label>
                        
                    </div>
                    <div class="form-group">
                        <label for="email" class="detail">Email  ::</label>
                        <label class="input"><?php 
                                    echo $_SESSION["email"];                        
                                ?></label>
                    </div>
                    <div class="form-group">
                        <label for="fullname" class="detail">Full Name ::</label>
                        <label  class="input" ><?php 
                                    echo $_SESSION["fname"];                        
                                ?></label>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" name="updtpr" style="background-color: #666; border-color:#222">Update profile ?</button>
                    </div>
                    <div class="text-center">
                        <br>
                        <button type="submit" class="btn btn-primary" name="cngpass" style="background-color: #666; border-color:#222">Change Password ?</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

</body>

</html>
