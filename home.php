<?php


session_start();


if (!isset($_SESSION["sessionuser"])) {
    echo "<script> window.location.href='index.php'; </script>";
} else {
    echo $_SESSION["path"];
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
    <title>Home Page</title>
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
        .navbar-links a:hover {
            color: #777;            
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
            
            background-color: white;
            border-color: #222;
        } 

        #prpic{
            height: 10vh;
            width: auto;
            object-fit: cover;
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
        /* Other CSS styles ... */
        /* Responsive adjustments ... */
    </style>
</head>

<body>
<nav class="navbar" id="nav">
        <div class="navbar-brand">
            <img src="img\log2.png" alt="" style=" width: 150px;height: auto;">
        </div>
        <ul class="navbar-links">
            <li ><a href="#" style="color: #777;"  >Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <div class="navbar-right">
            <form method="post" action="">
                <input type="submit" class="navbar-button" name="logout" value="Logout">
                <a type=""  name="updtpr" id="name" style="color:#666; padding:20px ; cursor:pointer" value="">
                <?php echo $_SESSION["uname"];?></a>
            </form>
        </div>
    </nav>
        <div id="prof" style="height: 50vh; width:50vw;position:absolute;top:20%;left:20%;z-index:5;background-color:transparent; display:none">
        <div class="container mt-4" style="background-color: #f2f2f2; padding:20px;">
        <button type="submit" class="btn btn-primary" id="close" style="background-color: #666; border-color:#222">X</button>
        <div class="row justify-content-center">
        
        
        
            <div class="col-md-6">
            <img src="<?php echo $_SESSION["path"]; ?>" alt="" id="prpic" >
        
                <form method="post">
                    <div class="form-group">
                        <img src="" alt="">
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
        </div>
    <!-- Bootstrap Carousel -->
    <div class="container mt-4" id="slider" style="width: 100vw;margin:0;padding:0;">
        <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width: 100vw;margin:0 0;padding:0 0;">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="b3.png" alt="Slide 1" class="d-block w-100">
                    <div class="carousel-caption">
                       
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="b2.jpg" alt="Slide 2" class="d-block w-100">
                    <div class="carousel-caption">
                        
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="b1.png" alt="Slide 3" class="d-block w-100">
                    <div class="carousel-caption">
                        
                    </div>
                </div>
            </div>

            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>


    <script>
        var profile=document.getElementById("prof");
        var nav = document.getElementById("nav");
        var slider = document.getElementById("slider");
        var close = document.getElementById("close");
    
        document.getElementById("name").addEventListener("click",function(){
            event.preventDefault();             // default rite a tag link per redirect thay.... to aa default vastu je automatic thay tene prevent kersse che
            profile.style.display="block";
            nav.style.filter="blur(10px)";
            slider.style.filter="blur(10px)";
        })

        document.getElementById("close").addEventListener("click",function(){
            event.preventDefault(); 
            profile.style.display="none";
            nav.style.filter="blur(0px)";
            slider.style.filter="blur(0px)";
        })


    </script>
</body>
</html>
