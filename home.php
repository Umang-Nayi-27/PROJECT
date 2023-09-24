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
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeatBoxify / Home</title>
    <link rel="stylesheet" href="home.css">

    <link rel="shortcut icon" type="x-icon" href="img/browser.jpg" style="background-color: white;">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,300;6..12,400&family=Titillium+Web&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include Bootstrap JavaScript (requires jQuery and Popper.js) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/color-thief/2.3.0/color-thief.umd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>

    <!-- //------------------------------------------------------navbar ------------------------------------------------------------------------------------ -->

    <div id="mainpage">
        <nav class="navbar" id="nav">
            <div class="navbar-brand">
                <!-- <img src="img\HOME_LOGO.png" alt="" style=" width: 100px;height: auto;"> -->
                <span style="font-size: 25px;">BeatBoxify</span>
            </div>
            <ul class="navbar-links">
                <li><a href="home.php" style="color: #777;">Home</a></li>
                <li><a href="aboutus.php">About</a></li>
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
                                <label class="input" style="font-weight: bold;color:white" id="prfname"><?php echo $_SESSION["fname"]; ?></label>
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
                    <div style="flex: 1;display: flex;padding:20px 20px; flex-direction: column; align-items: center;">
                        <div class="form-group">
                            <h4 style="color: crimson; font-weight:bolder;text-align:center">Update Profile</h4>
                            <br>
                            <label for="username" class="detail" style="color: #777;">full-name :</label><br>
                            <input type="text" id="fullname" name="fname" placeholder="Update Full Name" style="width: 100%;">
                        </div>
                        <div class="text-center">
                            <br>
                            <button type="submit" id="updpr" class="btn btn-primary" name="submit">Update Profile</button>
                        </div>
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
        <div id="songuploadform" style="height: 40vh; width: 35vw; position: absolute; top: 10%; left: 30%; z-index: 5; padding: 10px;display:none">
            <button type="submit" class="btn btn-primary" id="closesonguploadform">X</button>
            <div class="container mt-2" id="prcard" style="max-width: 500px; margin: 0 auto; padding: 10px; background-color: #222;color:white; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border-radius: 5px;">
                <div style="display: flex; flex-direction: row; align-items: center;">
                    <!-- Removed Profile Image (left side) -->

                    <div style="flex: 2; display: flex; padding: 10px; flex-direction: row; align-items: center;">
                        <!-- Song Upload Form (right side) -->
                        <form action="upload_song.php" method="post" enctype="multipart/form-data" style="display: flex; flex-direction: column;">
                            <h1 style="font-size: 20px;text-align:center;font-weight:bold; margin-bottom: 10px;">Song Upload Form</h2>
                                <hr>

                                <label for="songTitle" style="margin-bottom: 5px;">Song Title:</label>
                                <input type="text" id="songTitle" name="songTitle" required style="padding: 5px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 3px;">

                                <label for="artistName" style="margin-bottom: 5px;">Artist Name:</label>
                                <input type="text" id="artistName" name="artistName" required style="padding: 5px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 3px;">

                                <label for="songGenre" style="margin-bottom: 5px;">Song Genre:</label>
                                <select id="songGenre" name="songGenre" required style="padding: 5px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 3px;">
                                    <option value="Party">Party Song</option>
                                    <option value="Dance">Dance Song</option>
                                    <option value="Romantic">Romantic Song</option>
                                    <option value="Lofi">Lofi Song</option>
                                    <option value="Bhakti">Bhakti Song</option>
                                    <option value="90s">90's era</option>
                                </select>

                                <label for="songLanguage" style="margin-bottom: 5px;">Song Language:</label>
                                <select id="songLanguage" name="songLanguage" required style="padding: 5px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 3px;">
                                    <option value="English">English</option>
                                    <option value="Hindi">Hindi</option>
                                    <option value="Gujarati">Gujarati</option>
                                    <option value="Korean">Korean</option>
                                    <!-- Add more language options as needed -->
                                </select>

                                <label for="songImage" style="margin-bottom: 5px;">Song Profile Picture:</label>
                                <input type="file" id="songImage" name="songImage" accept="image/*" required style="padding: 2px; margin-bottom: 10px;">

                                <label for="songFile" style="margin-bottom: 5px;">Upload Song (MP3):</label>
                                <input type="file" id="songFile" name="songFile" accept=".mp3" required style="padding: 5px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 3px;">

                                <label for="albumName" style="margin-bottom: 5px;">Album Name:</label>
                                <input type="text" id="albumName" name="albumName" style="padding: 5px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 3px;">

                                <!-- Add additional song details fields here -->
                                <hr>
                                <input type="submit" value="Upload Song" style="background-color:crimson; color: #fff; border: none; padding: 5px 10px; cursor: pointer;">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- //-------------------------------------------------- music player -------------------------------------------------------------------------------------------------------- -->
        <div id="song_player" class="fixed-player">
            <img src="img/song3.png" id="pbimg">

            <center>
                <br>
                <h3 style="color: crimson;" id="song-name">Song Name</h3>
                <p> Singer name</p>
            </center>
            <br>
            <audio id="song">
                <source src="s1.mp3" type="audio/mpeg">
            </audio>
            <input type="range" id="range" style="width: 100%;" value="0">
            <div id="time" class="time-container">
                <span class="right-corner">00:00</span>
                <span class="left-corner" id="song_duration">3:00</span>
            </div>
            <br>
            <div id="playback">

                <div id="previous">
                    <i class="fa-solid fa-backward"></i>
                </div>
                <div id="play">
                    <i class="fa-solid fa-play"></i>
                </div>
                <div id="next">
                    <i class="fa-solid fa-forward"></i>
                </div>
            </div>
            <div id="playback2">

                <div id="repeat">
                    <i class="fa-solid fa-repeat"></i>
                </div>
                <div id="suffle">
                    <i class="fa-solid fa-shuffle"></i>
                </div>

                <div id="like">
                    <i class="fa-regular fa-heart "></i>
                </div>
                <div id="volume">
                    <i class="fa-solid fa-list"></i>
                </div>
            </div>
        </div>

        <!-- -------------------------------------------------------Main Bar----------------------------------------------------------------------->
        <div id="mainhome">

            <div class="links"> <!-- Add the class name here -->
                <a id="all">All</a>
                <a id="search">Search</a>
                <div class="dropdown">
                    <a class="dropbtn">Artist </a>
                    <div class="dropdown-content">
                        <a id="hindi">Top Hindi Artist</a>
                        <a id="eng">Top English Artist</a>
                        <a id="guj">Top Gujarati Artist</a>
                        <a id="kpop">Top K-POP Artist</a>
                    </div>
                </div>
                <div class="dropdown">
                    <a class="dropbtn">Mood & Genre </a>
                    <div class="dropdown-content">
                        <a id="party">Party Song</a>
                        <a id="dance">Dance Song</a>
                        <a id="romantic">Romantic Song</a>
                        <a id="lofi">Lofi SOng</a>
                        <a id="bhakti">Bhakti Song</a>
                        <a id="bollywood">90's era</a>
                    </div>
                </div>
                <a id="plist">Playlist</a>
                <a id="linked">liked Song</a>
                <?php
                if ($_SESSION['role'] == 2) {
                    echo "<a id='your_music' style='color:crimson'>Your Music</a>";
                }
                ?>
            </div>
            <div class="funct">
                <section class="songfunct">
                    <div class="container mt-2" id="slider" style="width: 100;height:auto; margin:0;padding:0;">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width: 100%;margin:0 0;padding:0 0;">
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
                                    <img src="ps4.png" alt="Slide 3" class="d-block w-100">
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
                    <div class="recent">
                        <div class="heading">
                            <h6 style="color: crimson;">Recently played</h6>
                        </div>
                        <br>
                        <div class="recent2">
                            <?php
                            for ($i = 0; $i < 4; $i++) {
                                echo
                                "<div class='recentbox'>
                                <img src='img/song2.jpg' >
                                <br>
                                song name
                                </div>";
                            }
                            ?>
                        </div>
                    </div>
                    <img src="img/banner/h1.jpeg" style="width: 100%;margin-top:20px;" alt="">

                    <div class="recent">
                        <div class="heading">
                            <h6 style="color: crimson;">Latest Trending</h6>
                        </div>
                        <br>
                        <div class="recent2">
                            <?php
                            for ($i = 0; $i < 10; $i++) {
                                echo
                                "<div class='recentbox'>
                                <img src='img/song.jpg' >
                                <br>
                                song name
                                </div>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="recent">
                        <div class="heading">
                            <h6 style="color: crimson;">Top Indian Artist</h6>
                        </div>
                        <br>
                        <div class="recent2">
                            <?php
                            for ($i = 0; $i < 10; $i++) {
                                echo
                                "<div class='art'>
                                <img src='img/artist/yoyo.png'>
                                <br>
                                song name
                                </div>";
                            }
                            ?>
                        </div>
                    </div>

                    <br>
                    <div class="recent">
                        <div class="heading">
                            <h6 style="color: crimson;">Top International Artist</h6>
                        </div>
                        <br>
                        <div class="recent2">
                            <?php
                            for ($i = 0; $i < 10; $i++) {
                                echo
                                "<div class='art'>
                                <img src='img/artist/swift.png'>
                                <br>
                                song name
                                </div>";
                            }
                            ?>
                        </div>
                    </div>
                </section>
                <section class="searchfunct" id="search-container">
                    <input type="text" placeholder="⚲    Search ">
                </section>
                <!-- ------------------------------------------artist---------------------------- -->
                <section class="arthin">
                    <div class="container mt-2" id="slider" style="width: 100;height:auto; margin:0;padding:0;">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width: 100%;margin:0 0;padding:0 0;">
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>

                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="img/banner/arijit.png" alt="Slide 1" class="d-block w-100">
                                    <div class="carousel-caption">

                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="img/banner/darshan.png" alt="Slide 2" class="d-block w-100">
                                    <div class="carousel-caption">

                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="img/banner/yoyo.png" alt="Slide 3" class="d-block w-100">
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
                    <h3>Top Hindi Artist</h3>
                    <div class="" id="search-container" style="width: 100%;display: flex;flex-direction: column;align-items: center;">
                        <input type="text" class="search-input" placeholder="Search Artist">
                    </div>
                    <br>
                    <br>
                    <?php
                    for ($i = 0; $i < 4; $i++) {
                        echo
                        "<div class='biography-container'>
                                <img class='biography-image' src='img/song3.png' alt='Singer Image'>
                                <h2 class='biography-info'> Black Pink</h2>
                                <div class='biography-history'>
                                    &nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id quam vel libero tincidunt tincidunt.
                                    Sed ultricies ligula sed metus faucibus volutpat. In vehicula consectetur elit, nec varius dui dignissim nec.
                                    Integer a mi eget ex semper finibus. Fusce bibendum, urna nec scelerisque fermentum, est felis bibendum nunc,
                                    in rhoncus nisl eros eu quam. Sed at bibendum felis, a tincidunt risus. Fusce vestibulum massa non tellus
                                    fermentum, nec mattis purus luctus. Sed nec arcu bibendum, cursus nunc in, vehicula ex. Quisque bibendum,
                                    erat at bibendum bibendum, ipsum erat bibendum ex, ut laoreet metus nisl quis risus. In sit amet erat auctor,
                                    fringilla ex vel, mattis lectus.
                                </div>
                                </div>";
                    }
                    ?>



                </section>
                <section class="arteng">
                    <div class="container mt-2" id="slider" style="width: 100;height:auto; margin:0;padding:0;">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width: 100%;margin:0 0;padding:0 0;">
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>

                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="img/banner/swift.png" alt="Slide 1" class="d-block w-100">
                                    <div class="carousel-caption">

                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="img/banner/weeknd.png" alt="Slide 2" class="d-block w-100">
                                    <div class="carousel-caption">

                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="img/banner/eng.jpg" alt="Slide 3" class="d-block w-100">
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
                    <h3>Top English Artist</h3>
                    <div class="" id="search-container" style="width: 100%;display: flex;flex-direction: column;align-items: center;">
                        <input type="text" class="search-input" placeholder="Search Artist">
                    </div>
                </section>
                <section class="artguj">
                    <div class="container mt-2" id="slider" style="width: 100;height:auto; margin:0;padding:0;">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width: 100%;margin:0 0;padding:0 0;">
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>

                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="img/banner/guj1.png" alt="Slide 1" class="d-block w-100">
                                    <div class="carousel-caption">

                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="img/banner/guj2.png" alt="Slide 2" class="d-block w-100">
                                    <div class="carousel-caption">

                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="img/banner/guj3.jpeg" alt="Slide 3" class="d-block w-100">
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
                    <h3>Top Gujarati Artist</h3>
                    <div class="" id="search-container" style="width: 100%;display: flex;flex-direction: column;align-items: center;">
                        <input type="text" class="search-input" placeholder="Search Artist">
                    </div>
                </section>
                <section class="artkpop">
                    <div class="container mt-2" id="slider" style="width: 100;height:auto; margin:0;padding:0;">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width: 100%;margin:0 0;padding:0 0;">
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>

                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="img/banner/kpop1.jpeg" alt="Slide 1" class="d-block w-100">
                                    <div class="carousel-caption">

                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="img/banner/kpop2.jpeg" alt="Slide 2" class="d-block w-100">
                                    <div class="carousel-caption">

                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="img/banner/kpop3.png" alt="Slide 3" class="d-block w-100">
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
                    <h3>Top K-POP Artist</h3>
                    <div class="" id="search-container" style="width: 100%;display: flex;flex-direction: column;align-items: center;">
                        <input type="text" class="search-input" placeholder="Search Artist">
                    </div>
                </section>

                <!-- ------------------------------------------------gerne ------------------------- -->
                <section class="genresparty">

                    <h1>this is gernesgernes</h1>
                </section>
                <section class="genresdance">

                    <h1>this is genresdance</h1>
                </section>
                <section class="genresbollywood">

                    <h1>this is genresbollywood</h1>
                </section>
                <section class="genresromantic">

                    <h1>this is genresromantic</h1>
                </section>
                <section class="genresbhakti">

                    <h1>this is genresbhakti</h1>
                </section>
                <section class="genreslofi">

                    <h1>this is genreslofi</h1>
                </section>

                <!-- --------------------------------------------------------------------------------------->
                <section class="playlistfunct">
                    <h1>this is playlist</h1>
                </section>

                <section class="likedfunct">
                    <h1>this is liked song</h1>
                </section>

                <section class="queuefunct">
                    <h1>this is queue</h1>
                </section>
            </div>
        </div>
        <!-- -------------------------------------------------------------- singer info ----------------------------------------------------------- -->
        <div id="lyrics_player">
            <center>
                <h4 style="color: crimson;padding-top: 30px;padding-bottom: 20px;">Lyrics</h4>
            </center>
            <div id="lyrics_area" style="height: 240px; overflow-x: hidden; overflow-y:auto">

                तुम जो आये जिन्दगी में बात बन गयी
                इश्क़ मजहब, इश्क़ मेरी जात बन गयी
                तुम जो आये जिन्दगी में बात बन गयी

                तेरे साथ गुज़रा हर लम्हा
                कुछ भी समझ आया
                क्यूँ कि तुम जो आये
                जिन्दगी में बात बन गयी
                इश्क़ मजहब, इश्क़ मेरी जात बन गयी

                तुम जो आये जिन्दगी में बात बन गयी
                इश्क़ मजहब, इश्क़ मेरी जात बन गयी
                तुम जो आये...

                तुम जो आये जिन्दगी में बात बन गयी
                इश्क़ मजहब, इश्क़ मेरी जात बन गयी

                सारे सपने असर कोई ना पहचाने
                अब तो आके भी वो
                शक्ल है तू जो इनाम है तू
                अब तो आके भी वो
                शक्ल है तू जो इनाम है तू
                क्यूँ कि तुम जो आये
                जिन्दगी में बात बन गयी
                इश्क़ मजहब, इश्क़ मेरी जात बन गयी

                तुम जो आये जिन्दगी में बात बन गयी
                इश्क़ मजहब, इश्क़ मेरी जात बन गयी

                दिल को मेरे हुआ यकीं क़रार
                क्यूँ कि तुम जो आये
                जिन्दगी में बात बन गयी
                इश्क़ मजहब, इश्क़ मेरी जात बन गयी

                तुम जो आये जिन्दगी में बात बन गयी
                इश्क़ मजहब, इश्क़ मेरी जात बन गयी
                तुम जो आये...

            </div>
        </div>


        <!-- // -------------------------------------------------------------song info---------------------------------------------------------------- -->
        <div id="suggested_info">
            <div id="recc">
                <center>
                    <h5 style="color: crimson;">Recommended song</h5>
                </center>
            </div>
            <?php
            for ($i = 0; $i < 10; $i++) {
                echo "<div id='songdiv'>
                            <img src='img/arijit.jpg' >
                            <span>Apna Bana le apna bana le piaya...</span>               
                      </div>";
            }
            ?>
        </div>
    </div>
    <!-- -------------------------------------------------------------------- script --------------------------------------------------------     -->
    <script src="home_main_route.js"></script>
    <script src="gsap.js"></script>
    <script src="profile_picture_click.js"></script>
    <script src="update_profile.js"></script>
    <script src="song_play.js"></script>
</body>

</html>