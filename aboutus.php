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
        .about-us-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        .about-us {
            text-align: justify;
        }

        .about-us h2 {
            color: #007bff;
            font-size: 24px;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .about-us p {
            margin-bottom: 20px;
            line-height: 1.5;
        }

        /* Styled footer styles */
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
                <li><a href="aboutus.php" style="color: #777;">About</a></li>
                <li><a href="service.php">Services</a></li>
                
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
        <div id="profupd" style="height: 50vh; width: 20vw;z-index:999 ; position: absolute; top: 20%; left: 71%; z-index: 5; padding: 10px;display:none">
            <button type="submit" class="btn btn-primary" id="closeupd">X</button>
            <div class="container mt-4" id="prcard">

                <div style="display: flex; flex-direction: row; align-items: center;">

                    <div style="flex: 1;display: flex;padding:20px 20px; flex-direction: row; align-items: center;">
                        <form action="updtpr.php" method="post">
                            <div class="form-group">
                            <h4 style="color: crimson; font-weight:bolder;text-align:center">Update Profile</h4>
                            <br>
                            
                                <label for="username" class="detail" style="color: #777;">full-name :</label><br>
                                <input type="text" name="fname" placeholder="Update Full Name" style="width: 100%;">
                            </div>
                            <div class="text-center">
                                <br>
                                <button type="submit" id="updpr" class="btn btn-primary" name="submit">Update Profile</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <div id="profchng" style="height: 50vh; width: 20vw;z-index:999 ; position: absolute; top: 20%; left: 71%; z-index: 5; padding: 10px;display:none">
            <button type="submit" class="btn btn-primary" id="closechng">X</button>
            <div class="container mt-4" id="prcard">

                <div style="display: flex; flex-direction: row; align-items: center;">

                    <div style="flex: 1;display: flex;padding:20px 20px; flex-direction: row; align-items: center;">
                        <form action="chngpass.php" method="post">
                            <div class="form-group">
                                <h4 style="color: crimson; font-weight:bolder">Change Password</h4>
                                <br>
                                <label for="username" class="detail" style="color: #777;">Enter New Password :</label><br>
                                <input type="password" name=" password" placeholder="New Password" style="width: 100%;">
                                <br>
                                <br>
                                <label for="username" class="detail" style="color: #777;">Enter New password Again :</label><br>
                                <input type="password" name="confirm_password" placeholder="Re-enter Password" style="width: 100%;">
                            </div>
                            <div class="text-center">
                                <br>
                                <button type="submit" id="updpr" class="btn btn-primary" name="submit">Change Password</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <div class="about-us-container" id="aboutus">

            <section class="about-us">
                <h1 style="color: #ccc;">About Beat Boxify</h1>
                <p style="color: #555;">
                    Welcome to the world of music, where rhythm and melody blend to create emotions and experiences. At Beat Boxify, we are passionate about music, and we want to share that passion with you.
                </p>
                <p style="color: #555;">
                    Beat Boxify started as a dream among a group of music enthusiasts. We envisioned a platform where music lovers could come together to explore, discover, and connect with the art form that transcends boundaries and unites hearts.
                </p>
                <video muted autoplay loop style="width: 100%;height:auto">
                    <source src="img/banner/abt.mp4" type="video/mp4">
                </video>
                <h2 style="color:#C70039;">Our Mission</h2>
                <p style="color: #555;">
                    Our mission is to bring music to your fingertips, whether you're a devoted fan or an aspiring artist. We offer a diverse library of tracks across genres, curated playlists for every mood, and a space for artists to showcase their talent.
                </p>
                <h2 style="color:#C70039;">Community & Connection</h2>
                <p style="color: #555;">
                    But Beat Boxify is more than just a music platform; it's a community. It's a place where you can express yourself through music, where you can find solace in a melancholic tune or dance to the beats of your favorite songs.
                </p>
                <h2 style="color:#C70039;">Discover & Create</h2>
                <p style="color: #555;">
                    Our team of music experts curates playlists that cater to every taste and occasion. Whether you need the perfect playlist for a road trip, a romantic evening, or a workout session, we've got you covered.
                </p>
                <p style="color: #555;">
                    Stay up-to-date with the latest happenings in the music industry. From artist interviews to in-depth music analysis, our blog section provides valuable insights for music aficionados.
                </p>
                <h2 style="color:#C70039;">Join Our Community</h2>
                <p style="color: #555;">
                    Join our vibrant community of music lovers, share your thoughts, and connect with like-minded individuals. Discuss your favorite tracks, discover hidden gems, and be part of the musical conversation.
                </p>
                <h2 style="color:#C70039;">Personalize Your Experience</h2>
                <p style="color: #555;">
                    Tailor your music experience to your preferences. Create and share your playlists, personalize your homepage, and let us recommend music that suits your unique taste.
                </p>

            </section>
        </div>

        <!-- Your styled footer here -->
        <footer class="site-footer" id="ftr">
            <div class="container">
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
    </div>

    <script src="home.js"></script>
    <script>
        var aboutus = document.getElementById("aboutus");
        var ftr = document.getElementById("ftr");
        var nav = document.getElementById("nav");

        document.getElementById("name").addEventListener("click", function(event) {
            event.preventDefault();
            aboutus.style.filter = "blur(10px)";
            ftr.style.filter = "blur(10px)";
            nav.style.filter = "blur(10px)";
        });

        document.getElementById("close").addEventListener("click", function(event) {
            event.preventDefault();
            aboutus.style.filter = "blur(0px)";
            ftr.style.filter = "blur(0px)";
            nav.style.filter = "blur(0px)";
        });

        gsap.from(".about-us h1, .about-us p", {
            opacity: 0,
            y: 50,
            stagger: 0.3,
            duration: 1,
            ease: "power4.out"  
        });

    gsap.from(".about-us video", {
        opacity: 0,
            x: -50,
            stagger: 0.2,
            duration: 2,
            ease: "power4.out",
            scrollTrigger: {
                trigger: ".feature",
                start: "top 80%",
                end: "bottom 70%",
                toggleActions: "play none none reverse"
            }
        });

        document.getElementById("upd").addEventListener("click", function(event) {
            event.preventDefault();
            
            profchng.style.display = "none";
            profupd.style.display = "block";
        });

        document.getElementById("chng").addEventListener("click", function(event) {
            event.preventDefault();
            profupd.style.display = "none";
            profchng.style.display = "block";
        });
// ---------------------------------------------------------------------------------------------- close click
        document.getElementById("closeupd").addEventListener("click", function(event) {
            event.preventDefault();
            profupd.style.display = "none";
        });

        document.getElementById("closechng").addEventListener("click", function(event) {
            event.preventDefault();
            profchng.style.display = "none";
        });

        document.getElementById("close").addEventListener("click", function(event) {
            event.preventDefault();
            profupd.style.display = "none";
            profchng.style.display = "none";
        }); 
    </script>
</body>

</html>