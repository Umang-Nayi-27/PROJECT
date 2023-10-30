<?php
session_start();
if (isset($_POST["logout"])) {
    echo "<script>alert('You are Logged Out.')</script>";
    session_unset();
    session_destroy();
    echo "<script> window.location.href='index.php'; </script>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="shortcut icon" type="x-icon" href="img/browser.jpg" style="background-color: white;">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
        }

        /* Style for the navigation bar */
    </style>
    <link rel="stylesheet" href="home.css">
</head>

<body>
    <nav class="navbar" id="nav" style="position:fixed;width:100vw; background-color:black; z-index:2">
        <div class="navbar-brand">
            <!-- <img src="img\HOME_LOGO.png" alt="" style=" width: 100px;height: auto;"> -->
            <span style="font-size: 25px;">BeatBoxify</span>
        </div>
        <ul class="navbar-links">
            <li><a href="#Song" id="nav_Song" style="color: crimson;" onclick="nav_color('nav_Song')">Song</a></li>
            <li><a href="#User" id="nav_User" onclick="nav_color('nav_User')">User</a></li>
            <li><a href="#Artist" id="nav_Artist" onclick="nav_color('nav_Artist')">Artist</a></li>
            <li><a href="#Genre" id="nav_Genre" onclick="nav_color('nav_Genre')">Genre</a></li>
            <li><a href="#Language" id="nav_Language" onclick="nav_color('nav_Language')">Language</a></li>
        </ul>
        <div class="navbar-right">
            <form method="post" action="">
                <input type="submit" class="navbar-button" name="logout" value="Logout">
            </form>
        </div>
    </nav>

    <div id="Song" style=" height: 100vh; width: 100vw; background-color: black;overflow-x: hidden; overflow-y: auto;  ">

        <br>
        <br>
        <hr style="background-color:crimson;">
        <center>
            <h1 style="position:absoulute; color:crimson"> SONGS</h1>
        </center>
        <hr style="background-color:crimson;">
        <div id="admin_song_div" style="margin-top: 10px; width: 99%; height: 70px; display: grid; grid-template-columns: 1.5fr 2fr 2fr 2fr 2fr; grid-template-rows: 1fr; padding: 5px; background-color: #010101; border-radius: 20px; cursor: pointer; color: white; ">
            <div class="artist_song_div_manage" id="artist_song_div_songname">
                <h6 style="color: crimson; font-weight: lighter;">Song Name</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: crimson; font-weight: lighter">Singer Name</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: crimson; font-weight: lighter">Song Genre</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: crimson; font-weight: lighter">Language</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: crimson; font-weight: lighter">Operation</h6>
            </div>
        </div>

        <?php
        $connection = mysqli_connect("localhost", "root", "", "demo");
        if (!$connection) {
            die("Not connected" . mysqli_connect_error());
        }

        $query = "SELECT * FROM `song` ";
        $result = mysqli_query($connection, $query);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $songFile = json_encode($row['song_file']);
                $songImage = json_encode($row['song_image']);
                $songName = json_encode($row['song_name']);
                $songLyrics = json_encode($row['song_lyrics']);
                $songArtist = json_encode($row['song_artist']);
                $song_genre = json_encode($row['song_genre']);
                $song_language = json_encode($row['song_language']);

                echo "<div id='admin_song_div' style='margin-top: 10px;width: 99%;height: 70px;display: grid;grid-template-columns:1.5fr 2fr 2fr 2fr 2fr;grid-template-rows: 1fr;padding: 5px;background-color: #0a0a0a;border-radius: 20px;cursor: pointer;color: white;position:absoulute'>";
                echo "<div class='artist_song_div_manage' id='artist_song_div_songname''>";
                echo "<h6 style='color: white;font-weight:lighter,'>{$row['song_name']}</h6>";                               //in this { } is used to insert values
                echo "</div>";
                echo "<div class='artist_song_div_manage' id='artist_song_div_artistname' '>";
                echo "<h6 style='color: white; font-weight:lighter'>{$row['song_artist']}</h6>";                            //in this { } is used to insert values
                echo "</div>";
                echo "<div class='artist_song_div_manage' id='artist_song_div_artistname' '>";
                echo "<h6 style='color: white; font-weight:lighter'>{$row['song_genre']}</h6>";                            //in this { } is used to insert values
                echo "</div>";
                echo "<div class='artist_song_div_manage' id='artist_song_div_artistname' '>";
                echo "<h6 style='color: white; font-weight:lighter'>{$row['song_language']}</h6>";                            //in this { } is used to insert values
                echo "</div>";
                echo "<div class='artist_song_div_manage' id='artist_song_div_artistname'>";
                echo "<input type='submit' value='Delete' style='border-radius:5px ; ' '>";
                echo "</div>";

                echo "</div>";
            }
        }
        ?>
    </div>
    <div id="User" style=" height: 100vh; width: 100vw; background-color: black; overflow-x: hidden; overflow-y: auto;">

        <br>
        <br>
        <hr style="background-color:#CF1264;">
        <center>
            <h1 style="position:absoulute; color:#CF1264"> USER</h1>
        </center>
        <hr style="background-color:#CF1264;">

        <div id="admin_song_div" style="margin-top: 10px; width: 99%; height: 70px; display: grid; grid-template-columns: 1.5fr 2fr 2fr 2fr 2fr; grid-template-rows: 1fr; padding: 5px; background-color: #010101; border-radius: 20px; cursor: pointer; color: white; ">
            <div class="artist_song_div_manage" id="artist_song_div_songname">
                <h6 style="color: #CF1264; font-weight: lighter;">Full Name</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: #CF1264; font-weight: lighter">User Name</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: #CF1264; font-weight: lighter">Email</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: #CF1264; font-weight: lighter">Password</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: #CF1264; font-weight: lighter">Operation</h6>
            </div>
        </div>

        <?php
        $connection = mysqli_connect("localhost", "root", "", "demo");
        if (!$connection) {
            die("Not connected" . mysqli_connect_error());
        }

        $query = "SELECT * FROM `demo_reg` WHERE `role`='1' ";
        $result = mysqli_query($connection, $query);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {

                echo "<div id='admin_song_div' style='margin-top: 10px;width: 99%;height: 70px;display: grid;grid-template-columns:1.5fr 2fr 2fr 2fr 2fr;grid-template-rows: 1fr;padding: 5px;background-color: #0a0a0a;border-radius: 20px;cursor: pointer;color: white;position:absoulute'>";
                echo "<div class='artist_song_div_manage' id='artist_song_div_songname''>";
                echo "<h6 style='color: white;font-weight:lighter,'>{$row['fname']}</h6>";                               //in this { } is used to insert values
                echo "</div>";
                echo "<div class='artist_song_div_manage' id='artist_song_div_artistname' '>";
                echo "<h6 style='color: white; font-weight:lighter'>{$row['uname']}</h6>";                            //in this { } is used to insert values
                echo "</div>";
                echo "<div class='artist_song_div_manage' id='artist_song_div_artistname' '>";
                echo "<h6 style='color: white; font-weight:lighter'>{$row['email']}</h6>";                            //in this { } is used to insert values
                echo "</div>";
                echo "<div class='artist_song_div_manage' id='artist_song_div_artistname' '>";
                echo "<h6 style='color: white; font-weight:lighter'>{$row['pass']}</h6>";                            //in this { } is used to insert values
                echo "</div>";
                echo "<div class='artist_song_div_manage' id='artist_song_div_artistname'>";
                echo "<input type='submit' value='Delete' style='border-radius:5px ; ' '>";
                echo "</div>";

                echo "</div>";
            }
        }
        ?>

    </div>


    <div id="Artist" style=" height: 100vh; width: 100vw; background-color: black; overflow-x: hidden; overflow-y: auto;">

        <br>
        <br>
        <hr style="background-color:#CF129D;">
        <center>
            <h1 style="position:absoulute; color:#CF129D"> ARTIST</h1>
        </center>
        <hr style="background-color:#CF129D;">
        <div id="admin_song_div" style="margin-top: 10px; width: 99%; height: 70px; display: grid; grid-template-columns: 1.5fr 2fr 2fr 2fr 2fr; grid-template-rows: 1fr; padding: 5px; background-color: #010101; border-radius: 20px; cursor: pointer; color: white; ">
            <div class="artist_song_div_manage" id="artist_song_div_songname">
                <h6 style="color: #CF129D; font-weight: lighter;">Full Name</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: #CF129D; font-weight: lighter">User Name</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: #CF129D; font-weight: lighter">Email</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: #CF129D; font-weight: lighter">Password</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: #CF129D; font-weight: lighter">Operation</h6>
            </div>
        </div>

        <?php
        $connection = mysqli_connect("localhost", "root", "", "demo");
        if (!$connection) {
            die("Not connected" . mysqli_connect_error());
        }

        $query = "SELECT * FROM `demo_reg` WHERE `role`='2' ";
        $result = mysqli_query($connection, $query);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {

                echo "<div id='admin_song_div' style='margin-top: 10px;width: 99%;height: 70px;display: grid;grid-template-columns:1.5fr 2fr 2fr 2fr 2fr;grid-template-rows: 1fr;padding: 5px;background-color: #0a0a0a;border-radius: 20px;cursor: pointer;color: white;position:absoulute'>";
                echo "<div class='artist_song_div_manage' id='artist_song_div_songname''>";
                echo "<h6 style='color: white;font-weight:lighter,'>{$row['fname']}</h6>";                               //in this { } is used to insert values
                echo "</div>";
                echo "<div class='artist_song_div_manage' id='artist_song_div_artistname' '>";
                echo "<h6 style='color: white; font-weight:lighter'>{$row['uname']}</h6>";                            //in this { } is used to insert values
                echo "</div>";
                echo "<div class='artist_song_div_manage' id='artist_song_div_artistname' '>";
                echo "<h6 style='color: white; font-weight:lighter'>{$row['email']}</h6>";                            //in this { } is used to insert values
                echo "</div>";
                echo "<div class='artist_song_div_manage' id='artist_song_div_artistname' '>";
                echo "<h6 style='color: white; font-weight:lighter'>{$row['pass']}</h6>";                            //in this { } is used to insert values
                echo "</div>";
                echo "<div class='artist_song_div_manage' id='artist_song_div_artistname'>";
                echo "<input type='submit' value='Delete' style='border-radius:5px ; ' '>";
                echo "</div>";

                echo "</div>";
            }
        }
        ?>
    </div>



    <div id="Genre" style=" height: 100vh; width: 100vw; background-color: black; overflow-x: hidden; overflow-y: auto;">

        <br>
        <br>
        <hr style="background-color:#A712CF;">
        <center>
            <h1 style="position:absoulute; color:#A712CF"> GENRE</h1>
        </center>
        <hr style="background-color:#A712CF;">

        <div id="admin_song_div" style="margin-top: 10px; width: 99%; height: 70px; display: grid; grid-template-columns: 1.5fr 2fr 2fr 2fr 2fr; grid-template-rows: 1fr; padding: 5px; background-color: #010101; border-radius: 20px; cursor: pointer; color: white; ">
            <div class="artist_song_div_manage" id="artist_song_div_songname">
                <h6 style="color: #CF129D; font-weight: lighter;">Genre Name</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: #CF129D; font-weight: lighter">Operation</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: #CF129D; font-weight: lighter"></h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: #CF129D; font-weight: lighter"></h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: #CF129D; font-weight: lighter"></h6>
            </div>
        </div>

        <?php
        $connection = mysqli_connect("localhost", "root", "", "demo");
        if (!$connection) {
            die("Not connected" . mysqli_connect_error());
        }

        $query = "SELECT * FROM `song_genre`  ";
        $result = mysqli_query($connection, $query);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {

                echo "<div id='admin_song_div' style='margin-top: 10px;width: 99%;height: 70px;display: grid;grid-template-columns:1.5fr 2fr 2fr 2fr 2fr;grid-template-rows: 1fr;padding: 5px;background-color: #0a0a0a;border-radius: 20px;cursor: pointer;color: white;position:absoulute'>";
                echo "<div class='artist_song_div_manage' id='artist_song_div_songname''>";
                echo "<h6 style='color: white;font-weight:lighter,'>{$row['song_genre_name']}</h6>";                               //in this { } is used to insert values
                echo "</div>";
                echo "<div class='artist_song_div_manage' id='artist_song_div_artistname'>";
                echo "<input type='submit' value='Delete' style='border-radius:5px ; ' '>";
                echo "</div>";
                echo "<div class='artist_song_div_manage' id='artist_song_div_artistname' '>";
                echo "<h6 style='color: white; font-weight:lighter'></h6>";                            //in this { } is used to insert values
                echo "</div>";
                echo "<div class='artist_song_div_manage' id='artist_song_div_artistname' '>";
                echo "<h6 style='color: white; font-weight:lighter'></h6>";                            //in this { } is used to insert values
                echo "</div>";
                echo "<div class='artist_song_div_manage' id='artist_song_div_artistname' '>";
                echo "<h6 style='color: white; font-weight:lighter'></h6>";                            //in this { } is used to insert values
                echo "</div>";
                

                echo "</div>";
            }
        }
        ?>


    </div>


    <div id="Language" style=" height: 100vh; width: 100vw; background-color: black;overflow-x: hidden; overflow-y: auto;">

        <br>
        <br>
        <hr style="background-color:#CF1273;">
        <center>
            <h1 style="position:absoulute; color:#CF1273"> LANGUAGE</h1>
        </center>
        <hr style="background-color:#CF1273;">

        <div id="admin_song_div" style="margin-top: 10px; width: 99%; height: 70px; display: grid; grid-template-columns: 1.5fr 2fr 2fr 2fr 2fr; grid-template-rows: 1fr; padding: 5px; background-color: #010101; border-radius: 20px; cursor: pointer; color: white; ">
            <div class="artist_song_div_manage" id="artist_song_div_songname">
                <h6 style="color: #CF1273; font-weight: lighter;">language</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: #CF1273; font-weight: lighter"> Operation</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: #CF1273; font-weight: lighter"></h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: #CF1273; font-weight: lighter"></h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: #CF1273; font-weight: lighter"></h6>
            </div>
        </div>

        <?php
        $connection = mysqli_connect("localhost", "root", "", "demo");
        if (!$connection) {
            die("Not connected" . mysqli_connect_error());
        }

        $query = "SELECT * FROM `song_language` ";
        $result = mysqli_query($connection, $query);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {

                echo "<div id='admin_song_div' style='margin-top: 10px;width: 99%;height: 70px;display: grid;grid-template-columns:1.5fr 2fr 2fr 2fr 2fr;grid-template-rows: 1fr;padding: 5px;background-color: #0a0a0a;border-radius: 20px;cursor: pointer;color: white;position:absoulute'>";
                echo "<div class='artist_song_div_manage' id='artist_song_div_songname''>";
                echo "<h6 style='color: white;font-weight:lighter,'>{$row['language']}</h6>";                               //in this { } is used to insert values
                echo "</div>";
                echo "<div class='artist_song_div_manage' id='artist_song_div_artistname'>";
                echo "<input type='submit' value='Delete' style='border-radius:5px ; ' '>";
                echo "</div>";
                echo "<div class='artist_song_div_manage' id='artist_song_div_artistname' '>";
                echo "<h6 style='color: white; font-weight:lighter'></h6>";                            //in this { } is used to insert values
                echo "</div>";
                echo "<div class='artist_song_div_manage' id='artist_song_div_artistname' '>";
                echo "<h6 style='color: white; font-weight:lighter'></h6>";                            //in this { } is used to insert values
                echo "</div>";
                echo "<div class='artist_song_div_manage' id='artist_song_div_artistname' '>";
                echo "<h6 style='color: white; font-weight:lighter'></h6>";                            //in this { } is used to insert values
                echo "</div>";
                

                echo "</div>";
            }
        }
        ?>


    </div>


    <script>
        function nav_color(name) {
            document.getElementById('nav_Song').style.color = 'white';
            document.getElementById('nav_User').style.color = 'white'
            document.getElementById('nav_Artist').style.color = 'white'
            document.getElementById('nav_Genre').style.color = 'white'
            document.getElementById('nav_Language').style.color = 'white'

            document.getElementById(name).style.color = 'crimson'
        }
    </script>
</body>

</html>