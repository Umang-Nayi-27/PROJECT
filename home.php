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
    <title>Home Page</title>
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
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
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
        <!-- //-------------------------------------------------- music player -------------------------------------------------------------------------------------------------------- -->
        <div id="song_player" class="fixed-player">
            <img src="img/song3.png" id="pbimg">

            <center>
                <br>
                <h3 id="song-name">Song Name</h3>
                <p style="color: #999;"> Singer name</p>
            </center>
            <br>
            <audio>
                <source src="song.mp3" type="audio/mpeg">
            </audio>
            <input type="range" style="width: 100%;" value="0">
            <div id="time" class="time-container">
                <span class="right-corner">00:00</span>
                <span class="left-corner">3:00</span>
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
                <a id="all" >All</a>
                <a id="search" >Search</a>
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
                            <h6>Recently played</h6>
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
                            <h6>Latest Trending</h6>
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
                            <h6>Top Indian Artist</h6>
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
                            <h6>Top International Artist</h6>
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
                <video autoplay loop muted plays-inline id="vid" style="width:100%;height:auto;filter: brightness(80%);">
                    <source src="img/banner/party.mp4" type="video/mp4">
                </video>
                    <h1>this is gernesgernes</h1>
                </section>
                <section class="genresdance">
                <video autoplay loop muted plays-inline id="vid" style="width:100%;height:auto;filter: brightness(80%);">
                    <source src="img/banner/dance.mp4" type="video/mp4">
                </video>
                    <h1>this is genresdance</h1>
                </section>
                <section class="genresbollywood">
                <video autoplay loop muted plays-inline id="vid" style="width:100%;height:auto;filter: brightness(80%);; ">
                    <source src="img/banner/90.mp4" type="video/mp4">
                </video>
                    <h1>this is genresbollywood</h1>
                </section>
                <section class="genresromantic">
                <video autoplay loop muted plays-inline id="vid" style="width:100%;height:auto;filter: brightness(80%);">
                    <source src="img/banner/ro1.mp4" type="video/mp4">
                </video>
                    <h1>this is genresromantic</h1>
                </section>
                <section class="genresbhakti">
                <video autoplay loop muted plays-inline id="vid" style="width:100%;height:auto;filter: brightness(80%);">
                    <source src="img/banner/spiritual.mp4" type="video/mp4">
                </video>
                    <h1>this is genresbhakti</h1>
                </section>
                <section class="genreslofi">
                <video autoplay loop muted plays-inline id="vid" style="width:100%;height:auto;filter: brightness(80%);">
                    <source src="img/banner/lofi.mp4" type="video/mp4">
                </video>
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
        <div id="singer_area" class="singer-player">
            <img src="img/arijit.jpg" id="singerimg">
            <center>
                <br>
                <p>Singer Name</p>
            </center>
        </div>
        <!-- // -------------------------------------------------------------song info---------------------------------------------------------------- -->
        <div id="suggested_info">
            <div id="recc">
                <center>
                    <h5>Recommended song</h5>
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
    <script src="home.js"></script>
</body>

</html>
