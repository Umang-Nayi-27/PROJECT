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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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

                    <img src="<?php echo $_SESSION["path"] ?>" alt="" id="name" for="Profile">
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
                                <label class="detail" style="color: #777;">user-name :</label><br>
                                <label class="input" style="font-weight: bold;color:white"><?php echo $_SESSION["uname"]; ?></label>
                            </div>
                            <div class="form-group">
                                <label class="detail" style="color: #777;">full-name :</label><br>
                                <label class="input" style="font-weight: bold;color:white" id="prfname"><?php echo $_SESSION["fname"]; ?></label>
                            </div>
                            <div class="form-group">
                                <label class="detail" style="color: #777;">email :</label><br>
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
                            <label class="detail" style="color: #777;">full-name :</label><br>
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
                                <label class="detail" style="color: #777;">Enter New Password :</label><br>
                                <input type="password" name=" password" placeholder="New Password" style="width: 100%;">
                                <br>
                                <br>
                                <label class="detail" style="color: #777;">Enter New password Again :</label><br>
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

                                <label style="margin-bottom: 5px;">Song Title:</label>
                                <input type="text" id="songTitle" name="songTitle" required style="padding: 5px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 3px;">

                                <label style="margin-bottom: 5px;">Artist Name:</label>
                                <input type="text" id="artistName" name="artistName" required style="padding: 5px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 3px;">

                                <label style="margin-bottom: 5px;">Song Genre:</label>
                                <select id="songGenre" name="songGenre" required style="padding: 5px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 3px;">
                                    <option value="Party">Party Song</option>
                                    <option value="Dance">Dance Song</option>
                                    <option value="Romantic">Romantic Song</option>
                                    <option value="Lofi">Lofi Song</option>
                                    <option value="Bhakti">Bhakti Song</option>

                                </select>

                                <label style="margin-bottom: 5px;">Song Language:</label>
                                <select id="songLanguage" name="songLanguage" required style="padding: 5px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 3px;">
                                    <option value="English">English</option>
                                    <option value="Hindi">Hindi</option>
                                    <option value="Gujarati">Gujarati</option>
                                    <option value="Korean">Korean</option>
                                    <!-- Add more language options as needed -->
                                </select>

                                <label style="margin-bottom: 5px;">Song Profile Picture:</label>
                                <input type="file" id="songImage" name="songImage" accept="image/*" required style="padding: 2px; margin-bottom: 10px;">

                                <label style="margin-bottom: 5px;">Upload Song (MP3):</label>
                                <input type="file" id="songFile" name="songFile" accept=".mp3" required style="padding: 5px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 3px;">

                                <label style="margin-bottom: 5px;">Album Name:</label>
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
                <a id="all" onclick="show('songfunct')">All</a>
                <a id="search" onclick="show('searchfunct')">Search</a>
                <div class="dropdown">
                    <a class="dropbtn">Artist </a>
                    <div class="dropdown-content">
                        <a id="hindi" onclick=" show('arthin')">Top Hindi Artist</a>
                        <a id="eng" onclick="show('arteng')">Top English Artist</a>
                        <a id="guj" onclick="show('artguj')">Top Gujarati Artist</a>
                        <a id="kpop" onclick="show('artkpop')">Top K-POP Artist</a>
                    </div>
                </div>
                <div class="dropdown">
                    <a class="dropbtn">Mood & Genre </a>
                    <div class="dropdown-content">
                        <a id="party" onclick="show('genresparty')">Party Song</a>
                        <a id="dance" onclick="show('genresdance')">Dance Song</a>
                        <a id="romantic" onclick="show('genresromantic')">Romantic Song</a>
                        <a id="lofi" onclick="show('genreslofi')">Lofi SOng</a>
                        <a id="bhakti" onclick="show('genresbhakti')">Bhakti Song</a>
                    </div>
                </div>
                <a id="plist" onclick="show('playlistfunct')">Playlist</a>
                <a id="linked" onclick="show('likedfunct')">liked Song</a>
                <?php
                if ($_SESSION['role'] == 2) {
                    echo "<a id='your_music' style='color:crimson;font-weight:bold' onclick='show(\"your_music_class\")'>Your Music</a>";
                    echo "<a id='music_upload' style='color:crimson;font-weight:bold' onclick='show(\"upload_song_class\")'>Upload Song</a>";
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
                    <br>
                    <?php
                    $connection = mysqli_connect("localhost", "root", "", "demo");

                    if ($connection) {
                    } else {
                        die("Not connected" . mysqli_connect_error());
                    }
                    $query = "SELECT demo_reg.uname, demo_reg.img, artist_table.a_detail
                                FROM demo_reg
                                INNER JOIN artist_table ON demo_reg.uname = artist_table.a_name
                                WHERE demo_reg.role = 2 AND artist_table.language = 'hindi' ";

                    $updateResult = mysqli_query($connection, $query);

                    if ($updateResult) {

                        while ($row = mysqli_fetch_assoc($updateResult)) {
                            echo "<div class='biography-container' onclick='singer_click(\"" . $row['uname'] . "\" , \"" . $row['img'] . "\")'>";    //   "" ni andar pachu  "" use kerva ---------->      \"   "xyz"   "\
                            echo "<img class='biography-image' src='" . $row['img'] . "' alt='Singer Image'>";
                            echo "<h2 class='biography-info'>" . $row['uname'] . "</h2>";
                            echo "<div class='biography-history'>";
                            echo $row['a_detail'];
                            echo "</div>";
                            echo "</div>";
                        }
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
                    <?php
                    $connection = mysqli_connect("localhost", "root", "", "demo");

                    if ($connection) {
                    } else {
                        die("Not connected" . mysqli_connect_error());
                    }
                    $query = "SELECT demo_reg.uname, demo_reg.img, artist_table.a_detail
                                FROM demo_reg
                                INNER JOIN artist_table ON demo_reg.uname = artist_table.a_name
                                WHERE demo_reg.role = 2 AND artist_table.language = 'english' ";

                    $updateResult = mysqli_query($connection, $query);

                    if ($updateResult) {
                        while ($row = mysqli_fetch_assoc($updateResult)) {
                            echo "<div class='biography-container' onclick='singer_click(\"" . $row['uname'] . "\" , \"" . $row['img'] . "\")    '>";
                            echo "<img class='biography-image' src='" . $row['img'] . "' alt='Singer Image'>";
                            echo "<h2 class='biography-info'>" . $row['uname'] . "</h2>";
                            echo "<div class='biography-history'>";
                            echo $row['a_detail'];
                            echo "</div>";
                            echo "</div>";
                        }
                    }
                    ?>
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
                    <?php
                    $connection = mysqli_connect("localhost", "root", "", "demo");

                    if ($connection) {
                    } else {
                        die("Not connected" . mysqli_connect_error());
                    }
                    $query = "SELECT demo_reg.uname, demo_reg.img, artist_table.a_detail
                                FROM demo_reg
                                INNER JOIN artist_table ON demo_reg.uname = artist_table.a_name
                                WHERE demo_reg.role = 2 AND artist_table.language = 'gujarati' ";

                    $updateResult = mysqli_query($connection, $query);

                    if ($updateResult) {
                        while ($row = mysqli_fetch_assoc($updateResult)) {
                            echo "<div class='biography-container' onclick='singer_click(\"" . $row['uname'] . "\" , \"" . $row['img'] . "\")    '>";
                            echo "<img class='biography-image' src='" . $row['img'] . "' alt='Singer Image'>";
                            echo "<h2 class='biography-info'>" . $row['uname'] . "</h2>";
                            echo "<div class='biography-history'>";
                            echo $row['a_detail'];
                            echo "</div>";
                            echo "</div>";
                        }
                    }
                    ?>

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
                    <?php
                    $connection = mysqli_connect("localhost", "root", "", "demo");

                    if ($connection) {
                    } else {
                        die("Not connected" . mysqli_connect_error());
                    }
                    $query = "SELECT demo_reg.uname, demo_reg.img, artist_table.a_detail
                                FROM demo_reg
                                INNER JOIN artist_table ON demo_reg.uname = artist_table.a_name
                                WHERE demo_reg.role = 2 AND artist_table.language = 'korean' ";

                    $updateResult = mysqli_query($connection, $query);

                    if ($updateResult) {
                        while ($row = mysqli_fetch_assoc($updateResult)) {
                            echo "<div class='biography-container' onclick='singer_click(\"" . $row['uname'] . "\" , \"" . $row['img'] . "\")    '>";
                            echo "<img class='biography-image' src='" . $row['img'] . "' alt='Singer Image'>";
                            echo "<h2 class='biography-info'>" . $row['uname'] . "</h2>";
                            echo "<div class='biography-history'>";
                            echo $row['a_detail'];
                            echo "</div>";
                            echo "</div>";
                        }
                    }
                    ?>
                </section>

                <!-- ------------------------------------------------gerne ------------------------- -->
                <section class="genresparty">
                    <img src="img/banner/party.jpg" style="height:auto; width:100% ;overflow:0">
                </section>

                <section class="genresdance">
                    <img src="img/banner/dance.jpg" style="height:auto; width:100% ;overflow:0">
                </section>


                <section class="genresromantic">
                    <img src="img/banner/romantic.jpg" style="height:auto; width:100% ;overflow:0">
                    <?php
                    $connection = mysqli_connect("localhost", "root", "", "demo");
                    if (!$connection) {
                        die("Not connected" . mysqli_connect_error());
                    }
                    // if (isset($_POST["artist_name"])); {
                    //     $artist_name = $_POST["artist_name"]);
                    $query = "SELECT * FROM `song` WHERE 	`song_genre`='romantic' ";
                    $result = mysqli_query($connection, $query);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $songFile = json_encode($row['song_file']);
                            $songImage = json_encode($row['song_image']);
                            $songName = json_encode($row['song_name']);
                            $songLyrics = json_encode($row['song_lyrics']);
                        }
                    }
                    ?>
                </section>

                <section class="genresbhakti">
                    <img src="img/banner/bhakti.jpg" style="height:auto; width:100% ;overflow:0">
                </section>

                <section class="genreslofi">
                    <img src="img/banner/lofi.jpg" style="height:auto; width:100% ;overflow:0">
                </section>

                <!-- --------------------------------------------------------------------------------------->
                <section class="playlistfunct">
                    <h1>this is playlist</h1>
                </section>

                <section class="likedfunct">
                    <h1>this is liked song</h1>
                </section>

                <section class="your_music_class">

                    <h1>this is Your Music</h1>
                </section>

                <section class="artist_section">
                    <img src="upload/art_bg_banner.jpg" style="height: auto; width: 100%; z-index: 2; position: absolute;"></img>
                    <img src="" alt="" id="artist_img" style="z-index: 3;">
                    <br>
                    <h6 style="z-index:3" id="artist_click_name"> Artist Name </h6>

                    <br>
                    <br>
                    <div id="songList" style="width: 100%; padding:10px 10px"></div>
                </section>

                <section class="upload_song_class" style="background-color: #0a0a0a;  color: white;">
                    <h1 style="font-weight: bold; color: crimson; font-size: 24px; padding-top: 20px;">Upload song</h1>
                    <form style="display: flex; flex-direction: column; padding: 20px; width: 600px;">
                        <!-- Song Name -->
                        <label style="color: white; font-size: 16px;">Song Name:</label>
                        <input type="text" id="song_name" name="song_name" required style="background-color: #222; color: #777; border: 1px solid #777; padding: 5px; margin-bottom: 10px; font-size: 16px;">

                        <label style="color: white; font-size: 16px;">mp3 File:</label>
                        <input type="file" id="song_file" name="song_file" accept="image/*" required style="background-color: #222; color: #777; border: 1px solid #777; padding: 5px; margin-bottom: 10px; font-size: 16px;">

                        <!-- Song Image -->
                        <label style="color: white; font-size: 16px;">Song Image:</label>
                        <input type="file" id="song_image" name="song_image" accept="image/*" required style="background-color: #222; color: #777; border: 1px solid #777; padding: 5px; margin-bottom: 10px; font-size: 16px;">

                        <!-- Song Language Dropdown -->
                        <label style="color: white; font-size: 16px;">Song Language:</label>
                        <select id="song_language" name="song_language" required style="background-color: #222; color: #777; border: 1px solid #777; padding: 5px; margin-bottom: 10px; font-size: 16px;">
                            <option value="hindi">Hindi</option>
                            <option value="english">English</option>
                            <option value="gujarati">Gujarati</option>
                            <option value="korean">Korean</option>
                        </select>

                        <!-- Song Genre Dropdown -->
                        <label style="color: white; font-size: 16px;">Song Genre:</label>
                        <select id="song_genre" name="song_genre" required style="background-color: #222; color: #777; border: 1px solid #777; padding: 5px; margin-bottom: 10px; font-size: 16px;">
                            <option value="party">Party</option>
                            <option value="dance">Dance</option>
                            <option value="romantic">Romantic</option>
                            <option value="bhakti">Bhakti</option>
                            <option value="lofi">Lofi</option>
                            <option value="other">Other</option>
                        </select>

                        <!-- Song Description -->
                        <label style="color: white; font-size: 16px;">Song Description:</label>
                        <textarea id="song_description" name="song_description" rows="4" style="background-color: #222; color: #777; border: 1px solid #777; padding: 5px; margin-bottom: 10px; font-size: 16px;"></textarea>

                        <!-- Song Lyrics -->
                        <label style="color: white; font-size: 16px;">Song Lyrics:</label>
                        <textarea id="song_lyrics" name="song_lyrics" rows="6" style="background-color: #222; color: #777; border: 1px solid #777; padding: 5px; margin-bottom: 10px; font-size: 16px;"></textarea>

                        <!-- Submit Button -->
                        <input type="submit" value="Upload Song" style="background-color: crimson; color: white; font-weight: bold; padding: 10px; border: none; cursor: pointer;">
                    </form>
                </section>

            </div>
        </div>
        <!-- -------------------------------------------------------------- singer info ----------------------------------------------------------- -->
        <div id="lyrics_player">
            <center>
                <h4 style="color: crimson;padding-top: 30px;padding-bottom: 20px;">Lyrics</h4>
            </center>
            <div id="lyrics_area" style="height: 240px; overflow-x: hidden; overflow-y:auto">
                NO SONG PLAYING
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
    <script src="singer_area_click.js"></script>
    <script>
        function singer_click(name, path) {
            $(".artist_section").css("zIndex", "99");
            $("#artist_img").attr("src", path);
            $("#artist_click_name").html(name);

            event.preventDefault(); // Prevent the default link behavior
            $.ajax({
                type: "POST",
                url: "get_songs.php", // Replace with your server-side script
                data: {
                    artist_name: name
                },
                dataType: "json",
                success: function(response_from_php) {
                    var songList = $("#songList");
                    songList.empty(); // Clear existing songs

                    $.each(response_from_php, function(index, song) {
                        var songFile = song.song_file;
                        var songImage = song.song_image;
                        var songName = song.song_name;
                        var songLyrics = song.song_lyrics;

                        // Create HTML elements for each song using jQuery
                        var songDiv = $("<div id='artist_song_div'></div>");
                        songDiv.click(function() {
                            singer_song_click(songFile, songImage, songName, songLyrics);
                        });

                        var imgDiv = $("<div class='artist_song_div_manage' id='artist_song_div_img'></div>");
                        imgDiv.append("<img style='height:100%' src='" + songImage + "'>");

                        var nameDiv = $("<div class='artist_song_div_manage' id='artist_song_div_songname'></div>");
                        nameDiv.append("<h4 style='color: white;font-weight:lighter'>" + songName + "</h4>");

                        var artistDiv = $("<div class='artist_song_div_manage' id='artist_song_div_artistname'></div>");
                        artistDiv.append("<h5 style='color: white; font-weight:lighter'>" + name + "</h5>");

                        // Append the inner divs to the outer div
                        songDiv.append(imgDiv);
                        songDiv.append(nameDiv);
                        songDiv.append(artistDiv);

                        // Append the entire song container to the songList div
                        songList.append(songDiv);
                    });
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.error("Error: " + errorThrown);
                }
            });


        }


        function singer_song_click(song, poster, name, lyrics) {
            document.getElementById("song").src = song;
            document.getElementById("pbimg").src = poster;
            document.getElementById("song-name").innerHTML = name;
            document.getElementById("lyrics_area").innerHTML = lyrics;
            document.getElementById("song").play();
            document.getElementById("play").innerHTML = '<i class="fa-solid fa-pause"></i>';

        }
    </script>
</body>

</html>