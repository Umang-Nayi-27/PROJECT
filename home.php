<?php


session_start();

echo $_SESSION["sessionuser"];
if (!isset($_SESSION["sessionuser"])) {
    echo "<script> window.location.href='index.php'; </script>";
} else {
    if (isset($_POST["logout"])) {
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
    <title>Home Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        /* Reset some default styles */
        body, h1, h2, h3, p, ul, li {
            margin: 0;
            padding: 0;
        }

        /* Style for the navigation bar */
        .navbar {
            background-color: #f2c9d3;
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
        }

        .navbar-links li {
            margin-right: 20px;
        }

        .navbar-links a {
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
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer; /* Add cursor style for better interaction */
        }

        /* Responsive adjustments */
        @media screen and (max-width: 768px) {
            .navbar-links {
                display: none;
            }

            .navbar-right {
                margin-left: auto;
            }
        }

    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">
            <a href="#" class="navbar-logo"><b>BeatBoxify</b></a>
        </div>
        <ul class="navbar-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <div class="navbar-right">
            <form method="post" action="">
                <input type="submit" class="navbar-button" name="logout" value="Logout">
                <input type="submit" class="navbar-button" name="cngpass" value="Change Password">
                <input type="submit" class="navbar-button" name="updtpr" value="Update Profile">
            </form>
        </div>
    </nav>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <!-- ... (carousel content) ... -->
        <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" style="height: 80vh;width:100vw;overflow:hidden; background-color:grey">
    <div class="carousel-item active">
      <img class="d-block w-100" src="/b1.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/b2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/b3.png" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
    </div>
</body>
</html>



  