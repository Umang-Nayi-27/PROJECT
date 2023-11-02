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
    <link rel="stylesheet" href="home.css">
    <style>
        body {
            background-color: white;
        }
    </style>

</head>

<body>
    <nav class="navbar" id="nav" style="position:fixed;width:100vw;height:60px ;background-color:white; z-index:2">
        <div class="navbar-brand">
            <!-- <img src="img\HOME_LOGO.png" alt="" style=" width: 100px;height: auto;"> -->
            <span style="font-size: 35px;color:black ; font-weight:bold ; ">BeatBoxify</span>
        </div>
        <ul class="navbar-links">
            <li><a href="#User" id="nav_User" onclick="nav_color('nav_User');z_index('User')" style="color: black;">User</a></li>
            <li><a href="#Song" id="nav_Song" style="color: black;" onclick="nav_color('nav_Song');z_index('Song')">Song</a></li>
            <li><a href="#Artist" id="nav_Artist" onclick="nav_color('nav_Artist');z_index('Artist')" style="color: black;">Artist</a></li>
            <li><a href="#Genre" id="nav_Genre" onclick="nav_color('nav_Genre');z_index('Genre')" style="color: black;">Genre</a></li>
            <li><a href="#Language" id="nav_Language" onclick="nav_color('nav_Language');z_index('Language')" style="color: black;">Language</a></li>
        </ul>
        <div class="navbar-right">
            <form method="post" action="">
                <input type="submit" class="navbar-button" name="logout" value="Logout">
            </form>
        </div>
    </nav>







    <div id="admin_poster" style="height: 90vh; width: 96vw; background-color: white; overflow: hidden; position: absolute; top: 8%; left: 2%; z-index: 5; display: flex; justify-content: center; align-items: center;">
    <video autoplay loop muted playsinline style="max-width: 110%; max-height: 110%;">
        <source src="upload/admin.mp4" type="video/mp4">
    </video>
</div>

    <!-- //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------USER -->
    <div id="User" style="height: 92vh; width: 96vw; background-color: white ;overflow-x: hidden; overflow-y: auto; position:absolute; top:7% ; left:2% ;z-index:1">

        <hr style="background-color:black;">
        <center>
            <h1 style="position:absoulute; color:black"> USER</h1>
        </center>
        <hr style="background-color:black;">
        <input type="submit" value="Add User" style="border-radius: 5px; margin-top: 30px;width:100%; height:50px" onclick="z_index('add_user')" />

        <div id="admin_song_div" style="margin-top: 10px;width: 96%;margin-left:2%; height: 70px; display: grid; grid-template-columns: 1.5fr 2fr 2fr 2fr 2fr 2fr; grid-template-rows: 1fr; padding: 5px; background-color: white; border-radius: 5px; cursor: pointer; color: white; ">
            <div class="artist_song_div_manage" id="artist_song_div_songname">
                <h6 style="color: black; font-weight: bolder;">User Image</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_songname">
                <h6 style="color: black; font-weight: bolder;">Full Name</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: black; font-weight: bolder">User Name</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: black; font-weight: bolder">Email</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: black; font-weight: bolder">Password</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: black; font-weight: bolder">Operation</h6>
            </div>
        </div>
        <div id="admin_user_div" style="margin-top: 10px; width: 96%;margin-left:2% ;height: 70px; display: grid; grid-template-columns: 1.5fr 2fr 2fr 2fr 2fr 2fr ; grid-template-rows: 1fr; padding: 5px; background-color: white; border-radius: 5px; cursor: pointer; color: white; ">
        </div>


    </div>


    <div id="add_user" style="height: 90vh; width: 96vw; background-color: white; overflow-x: hidden; overflow-y: auto; position: absolute; top: 8%; left: 2%; z-index: 4; display: grid; grid-template-columns: 1fr 1fr; grid-template-rows: 1fr;">
        <div style="display: grid; align-items: center;">
            <img src="upload/add_user.jpg" style="height:90vh; width:auto" alt="">
        </div>

        <div>
            <br>
            <br>
            <br>
            <h2 style="font-weight: bold;">ADD USER ::</h2>
            <br>
            <br>
            <form action="process_form.php" method="POST" enctype="multipart/form-data">
                <label for="fname" style="margin-bottom: 5px; display: block;">Full Name:
                    <br>
                    <input type="text" id="fname" name="fname" required style="width: 80%; padding: 10px; margin-bottom: 10px;">
                </label>

                <label for="uname" style="margin-bottom: 5px; display: block;">Username:
                    <br>
                    <input type="text" id="uname" name="uname" required style="width: 80%; padding: 10px; margin-bottom: 10px;">
                </label>

                <label for="email" style="margin-bottom: 5px; display: block;">Email:
                    <br>
                    <input type="email" id="email" name="email" required style="width: 80%; padding: 10px; margin-bottom: 10px;">
                </label>

                <label for="pass" style="margin-bottom: 5px; display: block;">Password:
                    <br>
                    <input type="password" id="pass" name="pass" required style="width: 80%; padding: 10px; margin-bottom: 10px;">
                </label>

                <label for="token" style="margin-bottom: 5px; display: block;">Token:
                    <br>
                    <input type="text" id="token" name="token" required style="width: 80%; padding: 10px; margin-bottom: 10px;">
                </label>

                <label for="img" style="margin-bottom: 5px; display: block;">Profile Image:
                    <br>
                    <input type="file" id="img" name="img" accept="image/*">
                </label>

                <label for="role" style="margin-bottom: 5px; display: block;">Role:
                    <br>
                    <select id="role" name="role" required style="width: 80%; padding: 10px; margin-bottom: 10px;">
                        <option value="2">User</option>
                    </select>
                </label>
                <br>

                <input type="submit" value="Submit" style="width:80%;height:40px;font-weight:bold">
            </form>


        </div>
    </div>






    <!-- //----SONG ADDDMINNNNNN-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------SONG -->

    <div id="Song" style=" height: 90vh; width: 96vw; background-color: white ;overflow-x: hidden; overflow-y: auto; position:absolute; top:8% ; left:2% ;z-index:1">

        <hr style="background-color:black;">
        <center>
            <h1 style="position:absoulute; color:black;"> SONGS</h1>
        </center>
        <hr style="background-color:black;">

        <input type="submit" value="Add Artist" style="border-radius: 5px; margin-top: 30px;width:100%; height:50px" onclick="z_index('add_artist')" />
        <br>
        <br>
        <div id="admin_song_div" style="margin-top: 10px; width: 96%;margin-left:2% ;height: 70px; display: grid; grid-template-columns: 1.5fr 2fr 2fr 2fr 2fr 2fr 2fr; grid-template-rows: 1fr; padding: 5px; background-color:white ; border-radius: 5px; cursor: pointer; color: white; ">
            <div class="artist_song_div_manage" id="artist_song_div_songname">
                <h6 style="color: black; font-weight: bolder; ">Song Image</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_songname">
                <h6 style="color: black; font-weight: bolder;">Song</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_songname">
                <h6 style="color: black; font-weight: bolder;">Song Name</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: black; font-weight: bolder">Singer Name</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: black; font-weight: bolder">Song Genre</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: black; font-weight: bolder">Language</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: black; font-weight: bolder">Operation</h6>
            </div>
        </div>
        <div id="admin_songs_div" style="margin-top: 10px; width: 96%;margin-left:2% ;height: 70px; display: grid; grid-template-columns: 1.5fr 2fr 2fr 2fr 2fr 2fr 2fr; grid-template-rows: 1fr; padding: 5px; background-color: white; border-radius: 5px; cursor: pointer; color: white; ">
        </div>


    </div>
    <div id="add_song" style="height: 90vh; width: 96vw; background-color: white; overflow-x: hidden; overflow-y: auto; position: absolute; top: 8%; left: 2%; z-index:1; display: grid; grid-template-columns: 1fr 1fr; grid-template-rows: 1fr;">
        <div style="display: grid; align-items: center;">
            <img src="upload/add_song.jpg" style="height:90vh; width:auto" alt="">
        </div>

        <div>
            <br>
            <br>
            <br>
            <h2 style="font-weight: bold;">ADD USER ::</h2>
            <br>
            <br>
            <form action="process_form.php" method="POST" enctype="multipart/form-data">
                <label for="fname" style="margin-bottom: 5px; display: block;">Full Name:
                    <br>
                    <input type="text" id="fname" name="fname" required style="width: 80%; padding: 10px; margin-bottom: 10px;">
                </label>

                <label for="uname" style="margin-bottom: 5px; display: block;">Username:
                    <br>
                    <input type="text" id="uname" name="uname" required style="width: 80%; padding: 10px; margin-bottom: 10px;">
                </label>

                <label for="email" style="margin-bottom: 5px; display: block;">Email:
                    <br>
                    <input type="email" id="email" name="email" required style="width: 80%; padding: 10px; margin-bottom: 10px;">
                </label>

                <label for="pass" style="margin-bottom: 5px; display: block;">Password:
                    <br>
                    <input type="password" id="pass" name="pass" required style="width: 80%; padding: 10px; margin-bottom: 10px;">
                </label>

                <label for="token" style="margin-bottom: 5px; display: block;">Token:
                    <br>
                    <input type="text" id="token" name="token" required style="width: 80%; padding: 10px; margin-bottom: 10px;">
                </label>

                <label for="img" style="margin-bottom: 5px; display: block;">Profile Image:
                    <br>
                    <input type="file" id="img" name="img" accept="image/*">
                </label>

                <label for="role" style="margin-bottom: 5px; display: block;">Role:
                    <br>
                    <select id="role" name="role" required style="width: 80%; padding: 10px; margin-bottom: 10px;">
                        <option value="2">User</option>
                    </select>
                </label>
                <br>
                <input type="submit" value="Submit" style="width:80%;height:40px;font-weight:bold">
            </form>
        </div>
    </div>




    <!-- //------ARTIST ADDDMINNNN-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ARTIST----------- -->
    <!-- //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ARTIST----------- -->
    <div id="Artist" style=" height: 91vh; width: 96vw; background-color: white ;overflow-x: hidden; overflow-y: auto; position:absolute; top:7% ; left:2% ;z-index:1">

        <hr style="background-color:black;">
        <center>
            <h1 style="position:absoulute; color:black"> ARTIST</h1>
        </center>
        <hr style="background-color:black;">
        <input type="submit" value="Add Artist" style="border-radius: 5px; margin-top: 30px;width:100%; height:50px" onclick="z_index('add_artist')" />

        <div id="admin_song_div" style="margin-top: 10px; width: 96%;margin-left:2%; height: 70px; display: grid; grid-template-columns: 1.5fr 2fr 2fr 2fr 2fr 2fr; grid-template-rows: 1fr; padding: 5px; background-color: white; border-radius: 5px; cursor: pointer; color: white; ">
            <div class="artist_song_div_manage" id="artist_song_div_songname">
                <h6 style="color: black; font-weight: bolder;">Artist Image</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_songname">
                <h6 style="color: black; font-weight: bolder;">Full Name</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: black; font-weight: bolder">User Name</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: black; font-weight: bolder">Email</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: black; font-weight: bolder">Password</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: black; font-weight: bolder">Operation</h6>
            </div>
        </div>
        <div id="admin_artist_div" style="margin-top: 10px; width: 96%;margin-left:2% ;height: 70px; display: grid; grid-template-columns: 1.5fr 2fr 2fr 2fr 2fr 2fr ; grid-template-rows: 1fr; padding: 5px; background-color: white; border-radius: 5px; cursor: pointer; color: white; ">
        </div>


    </div>
    <div id="add_artist" style="height: 90vh; width: 96vw; background-color: white; overflow-x: hidden; overflow-y: auto; position: absolute; top: 8%; left: 2%; z-index: 1; display: grid; grid-template-columns: 1fr 1fr; grid-template-rows: 1fr;">
        <div style="display: grid; align-items: center;">
            <img src="upload/add_artist.jpg" style="height:90vh; width:auto" alt="">
        </div>

        <div>
            <br>
            <br>
            <br>
            <h2 style="font-weight: bold;">ADD Artist ::</h2>
            <br>
            <br>
            <form action="process_form.php" method="POST" enctype="multipart/form-data">
                <label for="fname" style="margin-bottom: 5px; display: block;">Full Name:
                    <br>
                    <input type="text" id="fname" name="fname" required style="width: 80%; padding: 10px; margin-bottom: 10px;">
                </label>

                <label for="uname" style="margin-bottom: 5px; display: block;">Username:
                    <br>
                    <input type="text" id="uname" name="uname" required style="width: 80%; padding: 10px; margin-bottom: 10px;">
                </label>

                <label for="email" style="margin-bottom: 5px; display: block;">Email:
                    <br>
                    <input type="email" id="email" name="email" required style="width: 80%; padding: 10px; margin-bottom: 10px;">
                </label>

                <label for="pass" style="margin-bottom: 5px; display: block;">Password:
                    <br>
                    <input type="password" id="pass" name="pass" required style="width: 80%; padding: 10px; margin-bottom: 10px;">
                </label>

                <label for="token" style="margin-bottom: 5px; display: block;">Token:
                    <br>
                    <input type="text" id="token" name="token" required style="width: 80%; padding: 10px; margin-bottom: 10px;">
                </label>

                <label for="img" style="margin-bottom: 5px; display: block;">Profile Image:
                    <br>
                    <input type="file" id="img" name="img" accept="image/*">
                </label>

                <label for="role" style="margin-bottom: 5px; display: block;">Role:
                    <br>
                    <select id="role" name="role" required style="width: 80%; padding: 10px; margin-bottom: 10px;">
                        <option value="2">User</option>
                    </select>
                </label>
                <br>
                <input type="submit" value="Submit" style="width:80%;height:40px;font-weight:bold">
            </form>
        </div>
    </div>

    <!-- //-------GENRE ADDDINNNNN-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------GENRE -->
    <!-- //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------GENRE -->

    <div id="Genre" style="height: 91vh; width: 96vw; background-color: white ;overflow-x: hidden; overflow-y: auto; position:absolute; top:7% ; left:2% ; z-index:1">

        <hr style="background-color:black;">
        <center>
            <h1 style="position:absoulute; color:black"> GENRE</h1>
        </center>
        <hr style="background-color:black;">

        <div id="admin_song_div" style="margin-top: 10px; width: 96%;margin-left:2%; height: 70px; display: grid; grid-template-columns: 1.5fr 2fr 2fr 2fr 2fr; grid-template-rows: 1fr; padding: 5px; background-color: white; border-radius: 5px; cursor: pointer; color: white; ">
            <div class="artist_song_div_manage" id="artist_song_div_songname">
                <h6 style="color: black; font-weight: bolder;">Genre Name</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: black; font-weight: bolder">Operation</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: black; font-weight: bolder"></h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: black; font-weight: bolder"></h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: black; font-weight: bolder"></h6>
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

                echo "<div id='admin_song_div' style='margin-top: 10px;width: 96%;margin-left:2%;height: 70px;display: grid;grid-template-columns:1.5fr 2fr 2fr 2fr 2fr;grid-template-rows: 1fr;padding: 5px;background-color: #999;border-radius: 5px;cursor: pointer;color: white;position:absoulute'>";
                echo "<div class='artist_song_div_manage' id='artist_song_div_songname''>";
                echo "<h6 style='color: black;font-weight:lighter,'>{$row['song_genre_name']}</h6>";                               //in this { } is used to insert values
                echo "</div>";
                echo "<div class='artist_song_div_manage' id='artist_song_div_artistname'>";
                echo "<input type='submit' value='Delete' style='border-radius:5px ;margin-right:10px ' '>";
                echo "<input type='submit' value='Update' style='border-radius:5px ; ' '>";
                echo "</div>";
                echo "<div class='artist_song_div_manage' id='artist_song_div_artistname' '>";
                echo "<h6 style='color: black; font-weight:lighter'></h6>";                            //in this { } is used to insert values
                echo "</div>";
                echo "<div class='artist_song_div_manage' id='artist_song_div_artistname' '>";
                echo "<h6 style='color: black; font-weight:lighter'></h6>";                            //in this { } is used to insert values
                echo "</div>";
                echo "<div class='artist_song_div_manage' id='artist_song_div_artistname' '>";
                echo "<h6 style='color: black; font-weight:lighter'></h6>";                            //in this { } is used to insert values
                echo "</div>";
                echo "</div>";
            }
            echo "<center>";
            echo "<input type='submit' value='Add Genre' style='border-radius:5px;margin-top:30px;' onclick='z_index(\"add_genre\")' />";
            echo "</center>";
        }
        ?>
    </div>
    <div id="add_genre" style="height: 90vh; width: 96vw; background-color: white; overflow-x: hidden; overflow-y: auto; position: absolute; top: 8%; left: 2%; z-index: 1; display: grid; grid-template-columns: 1fr 1fr; grid-template-rows: 1fr;">
        <div style="display: grid; align-items: center;">
            <img src="upload/add_genre.jpg" style="height:90vh; width:auto" alt="">
        </div>

        <div>
            <br>
            <br>
            <br>
            <h2 style="font-weight: bold;">ADD USER ::</h2>
            <br>
            <br>
            <form action="process_form.php" method="POST" enctype="multipart/form-data">
                <label for="fname" style="margin-bottom: 5px; display: block;">Full Name:
                    <br>
                    <input type="text" id="fname" name="fname" required style="width: 80%; padding: 10px; margin-bottom: 10px;">
                </label>

                <label for="uname" style="margin-bottom: 5px; display: block;">Username:
                    <br>
                    <input type="text" id="uname" name="uname" required style="width: 80%; padding: 10px; margin-bottom: 10px;">
                </label>

                <label for="email" style="margin-bottom: 5px; display: block;">Email:
                    <br>
                    <input type="email" id="email" name="email" required style="width: 80%; padding: 10px; margin-bottom: 10px;">
                </label>

                <label for="pass" style="margin-bottom: 5px; display: block;">Password:
                    <br>
                    <input type="password" id="pass" name="pass" required style="width: 80%; padding: 10px; margin-bottom: 10px;">
                </label>

                <label for="token" style="margin-bottom: 5px; display: block;">Token:
                    <br>
                    <input type="text" id="token" name="token" required style="width: 80%; padding: 10px; margin-bottom: 10px;">
                </label>

                <label for="img" style="margin-bottom: 5px; display: block;">Profile Image:
                    <br>
                    <input type="file" id="img" name="img" accept="image/*">
                </label>

                <label for="role" style="margin-bottom: 5px; display: block;">Role:
                    <br>
                    <select id="role" name="role" required style="width: 80%; padding: 10px; margin-bottom: 10px;">
                        <option value="2">User</option>
                    </select>
                </label>
                <br>
                <input type="submit" value="Submit" style="width:80%;height:40px;font-weight:bold">
            </form>
        </div>
    </div>

    <!-- //-----LANGUAGE ADDDMINNNN------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------LANGUAGE -->
    <!-- //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------LANGUAGE -->

    <div id="Language" style="height: 91vh; width: 96vw; background-color: white ;overflow-x: hidden; overflow-y: auto; position:absolute; top:7% ; left:2% ; z-index:1">

        <hr style="background-color:black;">
        <center>
            <h1 style="position:absoulute; color:black"> LANGUAGE</h1>
        </center>
        <hr style="background-color:black;">

        <div id="admin_song_div" style="margin-top: 10px; width: 96%;margin-left:2%; height: 70px; display: grid; grid-template-columns: 1.5fr 2fr 2fr 2fr 2fr; grid-template-rows: 1fr; padding: 5px; background-color: white; border-radius: 5px; cursor: pointer; color: white; ">
            <div class="artist_song_div_manage" id="artist_song_div_songname">
                <h6 style="color: black; font-weight: bolder;">language</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: black; font-weight: bolder"> Operation</h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: black; font-weight: bolder"></h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: black; font-weight: bolder"></h6>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <h6 style="color: black; font-weight: bolder"></h6>
            </div>
        </div>

        <div id='admin_song_div' style='margin-top: 10px;width: 96%;margin-left:2%;height: 70px;display: grid;grid-template-columns:1.5fr 2fr 2fr 2fr 2fr;grid-template-rows: 1fr;padding: 5px;background-color: #999;border-radius: 5px;cursor: pointer;color: white;margin-left:5'>
        </div>

    </div>
    <div id="add_language" style="height: 90vh; width: 96vw; background-color: white; overflow-x: hidden; overflow-y: auto; position: absolute; top: 8%; left: 2%; z-index: 1; display: grid; grid-template-columns: 1fr 1fr; grid-template-rows: 1fr;">
        <div style="display: grid; align-items: center;">
            <img src="upload/add_language.jpg" style="height:90vh; width:auto" alt="">
        </div>

        <div>
            <br>
            <br>
            <br>
            <h2 style="font-weight: bold;">ADD USER ::</h2>
            <br>
            <br>
            <form action="process_form.php" method="POST" enctype="multipart/form-data">
                <label for="fname" style="margin-bottom: 5px; display: block;">Full Name:
                    <br>
                    <input type="text" id="fname" name="fname" required style="width: 80%; padding: 10px; margin-bottom: 10px;">
                </label>

                <label for="uname" style="margin-bottom: 5px; display: block;">Username:
                    <br>
                    <input type="text" id="uname" name="uname" required style="width: 80%; padding: 10px; margin-bottom: 10px;">
                </label>

                <label for="email" style="margin-bottom: 5px; display: block;">Email:
                    <br>
                    <input type="email" id="email" name="email" required style="width: 80%; padding: 10px; margin-bottom: 10px;">
                </label>

                <label for="pass" style="margin-bottom: 5px; display: block;">Password:
                    <br>
                    <input type="password" id="pass" name="pass" required style="width: 80%; padding: 10px; margin-bottom: 10px;">
                </label>

                <label for="token" style="margin-bottom: 5px; display: block;">Token:
                    <br>
                    <input type="text" id="token" name="token" required style="width: 80%; padding: 10px; margin-bottom: 10px;">
                </label>

                <label for="img" style="margin-bottom: 5px; display: block;">Profile Image:
                    <br>
                    <input type="file" id="img" name="img" accept="image/*">
                </label>

                <label for="role" style="margin-bottom: 5px; display: block;">Role:
                    <br>
                    <select id="role" name="role" required style="width: 80%; padding: 10px; margin-bottom: 10px;">
                        <option value="2">User</option>
                    </select>
                </label>
                <br>
                <input type="submit" value="Submit" style="width:80%;height:40px;font-weight:bold">
            </form>
        </div>
    </div>



    <script src="admin_page_route.js"></script>
    <script>
        function test() {
            alert()
        }
    </script>
</body>

</html>