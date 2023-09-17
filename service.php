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
    <title>BeatBoxify / aboutus</title>
    <link rel="stylesheet" href="home.css">

    <link rel="shortcut icon" type="x-icon" href="img/browser.jpg" style="background-color: white;">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,300;6..12,400&family=Titillium+Web&display=swap" rel="stylesheet">

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Include Bootstrap JavaScript (requires jQuery and Popper.js) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/color-thief/2.3.0/color-thief.umd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <style>
        .services {
            background-color: black;
            padding: 60px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 40px;
        }

        .service-card {
            text-align: center;
            padding: 20px;
            border: 0.1px solid #777;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .service-card i {
            font-size: 48px;
            color: crimson;
            margin-bottom: 20px;
        }

        .site-footer {
            background-color: #222;
            color: #fff;
            padding: 50px 0;
        }

        .site-footer h3 {
            color: #fff;
        }

        .site-footer p {
            color: #ccc;
        }

        .social-icons {
            list-style: none;
            padding: 0;
        }

        .social-icons li {
            display: inline-block;
            margin-right: 10px;
        }

        .social-icons a {
            color: #fff;
            font-size: 24px;
        }

        .newsletter-form input[type="email"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .newsletter-form button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .newsletter-form button:hover {
            background-color: #0056b3;
        }

        .bottom-bar {
            background-color: #111;
            padding: 10px 0;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            display: inline;
            margin-right: 10px;
        }

        .footer-links a {
            color: #777;
        }

        #aboutus,
        #ftr 
        {
            transition: filter 0.5s ease-in-out;
        }
    </style>


</head>

<body>
    <!-- //------------------------------------------------------navbar ------------------------------------------------------------------------------------ -->
    <div id="mainpage" style="overflow-x: hidden;">
        <nav class="navbar" id="nav">
            <div class="navbar-brand">
                <!-- <img src="img\HOME_LOGO.png" alt="" style=" width: 100px;height: auto;"> -->
                <span style="font-size: 25px;">BeatBoxify</span>
            </div>
            <ul class="navbar-links">
                <li><a href="home.php">Home</a></li>
                <li><a href="aboutus.php">About</a></li>
                <li><a href="service.php" style="color: #777;">Services</a></li>
                
            </ul>
            <div class="navbar-right">
                <form method="post" action="">

                    <img src="<?php echo $_SESSION["path"] ?>" alt="" id="name">
                    <input type="submit" class="navbar-button" name="logout" value="Logout">
                </form>
            </div>
        </nav>
        <div id="prof" style="height: 50vh; width: 40vw; position: absolute; top: 20%; left: 30%; z-index: 5; padding: 10px; display: none">
            <button type="submit" class="btn btn-primary" id="close">X</button>
            <div class="container mt-4" id="prcard">

                <div style="display: flex; flex-direction: row; align-items: center;">
                    <div style="flex: 1;">
                        <!-- Profile Image (left side) -->
                        <img src="<?php echo $_SESSION["path"]; ?>" alt="" id="prpic">
                    </div>
                    <div style="flex: 2;display: flex;padding:20px 20px; flex-direction: row; align-items: center;">
                        <!-- User Details (right side) -->
                        <form method="post">
                            <div class="form-group">
                                <label for="username" class="detail" style="color: #777;">user-name :</label><br>
                                <label class="input" style="font-weight: bold;color:white"><?php echo $_SESSION["uname"]; ?></label>
                            </div>
                            <div class="form-group">
                                <label for="fullname" class="detail" style="color: #777;">full-name :</label><br>
                                <label class="input" style="font-weight: bold;color:white"><?php echo $_SESSION["fname"]; ?></label>
                            </div>
                            <div class="form-group">
                                <label for="email" class="detail" style="color: #777;">email :</label><br>
                                <label class="input" style="font-weight: bold;color:white"><?php echo $_SESSION["email"]; ?></label>
                            </div>

                            <div class="text-center">
                                <button type="submit" id="upd" class="btn btn-primary" name="updtpr">Update profile?</button>
                            </div>
                            <div class="text-center">
                                <br>
                                <button type="submit" id="chng" class="btn btn-primary" name="cngpass">Change Password?</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <section class="services">
            <div class="container" id="srvc">
                <h2 class="section-title" style="color: white; font-weight:normal">Our Services</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="service-card">
                            <i class="fas fa-music"></i>
                            <h3 style="color: crimson;">Music Streaming</h3>
                            <p style="color:#999;">Stream your favorite music tracks from a vast library of songs.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service-card">
                            <i class="fas fa-headphones"></i>
                            <h3 style="color: crimson;">High-Quality Audio</h3>
                            <p style="color:#999;">Enjoy high-quality audio with our premium subscription.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service-card">
                            <i class="fas fa-play-circle"></i>
                            <h3 style="color: crimson;">Playlist Creation</h3>
                            <p style="color:#999;">Create and manage your playlists to keep your music organized.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service-card">
                            <i class="fas fa-heart"></i>
                            <h3 style="color: crimson;">Liked Songs</h3>
                            <p style="color:#999;">Save your favorite songs to your Liked Songs for quick access.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service-card">
                            <i class="fas fa-volume-up"></i>
                            <h3 style="color: crimson;">Ad-Free Listening</h3>
                            <p style="color:#999;">Experience uninterrupted music with our ad-free listening feature.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service-card">
                            <i class="fas fa-heart"></i>
                            <h3 style="color: crimson;">Suggestion</h3>
                            <p style="color:#999;">Discover new music with our recommendation system.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- After your existing content (section class="services"), add the footer section below -->

        <footer class="site-footer" >
            <div class="container" id="ftr">
                <div class="row">

                    <div class="col-md-4">
                        <h3>Contact Us</h3>
                        <p style="color: #777;">If you have any questions or feedback, don't hesitate to get in touch with us.</p>
                        <p style="color: #777;">Email: info@beatboxify.com</p>
                    </div>
                    <div class="col-md-4">
                        <h3>Follow Us</h3>
                        <ul class="social-icons">
                            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h3>BeatBoxify Merchandise</h3>
                        <div class="merchandise">
                            <p style="color: #777;">Explore exclusive BeatBoxify merchandise:</p>
                            <p style="color: #777;">Show your love for music with our stylish apparel and accessories.</p>
                        </div>
                    </div>

                </div>
            </div>
        </footer>

        </footer>
    </div>

    <script src="home.js"></script>
    <script>
       var srvc = document.getElementById("srvc");
        var ftr = document.getElementById("ftr");

        document.getElementById("name").addEventListener("click", function(event) {
            event.preventDefault();
            srvc.style.filter = "blur(10px)";
            ftr.style.filter = "blur(10px)";
        });

        document.getElementById("close").addEventListener("click", function(event) {
            event.preventDefault();
            srvc.style.filter = "blur(0px)";
            ftr.style.filter = "blur(0px)";
        });

        gsap.from(".service-card", {
            opacity: 0,
            y: 50,
            stagger: 0.25,
            duration: 1,
            ease: "power4.out",
            scrollTrigger: {
                trigger: ".service-card",
                start: "top 80%",
                end: "bottom 70%",
                toggleActions: "play none none reverse"
            }
        });
    </script>
</body>

</html>
