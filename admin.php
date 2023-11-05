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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/color-thief/2.3.0/color-thief.umd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
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
            <form method="post">
                <input type="submit" class="navbar-button" name="logout" value="Logout">
            </form>
        </div>
    </nav>







    <div id="admin_poster" style="height: 90vh; width: 96vw; background-color: white; overflow: hidden; position: absolute; top: 8%; left: 2%; z-index: 5; display: flex; justify-content: center; align-items: center;">
        <center>
            <h3 id="welc" style="color:black ;font-size:40px; ">Welcome ,</h3>
            <h1 id="bb" style="font-size: 200px;">BeatBoxify</h1>
        </center>
    </div>

    <!-- //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------USER -->
    <div id="User" style="height: 92vh; width: 96vw; background-color: white ;overflow-x: hidden; overflow-y: auto; position:absolute; top:7% ; left:2% ;z-index:1">

        <hr style="background-color:black;">
        <center>
            <h1 style="position:absoulute; color:black"> USER</h1>
        </center>
        <hr style="background-color:black;">
        <input type="submit" value="Add User" style="border-radius: 5px; margin-top: 30px;width:100%; height:50px" onclick="dis_add('add_user')" />

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


    <div id="add_user" style="height: 81vh;font-size:smaller; width: 30vw; background-color:white; overflow-x: hidden;overflow-y:auto;  position: fixed; top: 10%; left: 36%; z-index:1; display: grid; grid-template-columns: 1fr ; grid-template-rows: 0.2fr 1fr;display:none;z-index:999">

        <div>
            <input type="submit" value="X" style="background-color: aliceblue;" onclick="close_add('add_user')">
        </div>

        <div style="background-color:aliceblue;margin-top :5px;padding:10px 0px">
            <center>

                <h2 style="font-weight: bold;">ADD USER :</h2>
                <br>
                <br>
                <label for="uname" style="margin-bottom: 5px; font-weight:bolder">User Name :</label>
                <br>
                <input type="text" id="sname" name="sname" required style="width: 80%; padding: 10px; margin-bottom: 10px;" placeholder="User Name">

                <br>
                <form method="POST" enctype="multipart/form-data">
                    <label for="fname" style="margin-bottom: 5px; font-weight:bolder">Full Name: </label>
                    <br>

                    <input type="text" id="sname" name="sname" required style="width: 80%; padding: 10px; margin-bottom: 10px;" placeholder="Full Name">
                    <br>

                    <label style="color: black; font-size: 16px; font-weight:bolder">Profile Picture :</label>
                    <br>
                    <input type="file" required accept="image/*" style="background-color: white; width:80%; color: black; border: 1px solid #777; padding: 5px; margin-bottom: 10px; font-size: 16px;">
                    <br>


                    <label style="color: black; font-size: 16px; font-weight:bolder">Email :</label>
                    <br>
                    <input type="email" id="sname" name="sname" required style="width: 80%; padding: 10px; margin-bottom: 10px;" placeholder="XYZ@gmail.com">

                    <br>
                    <label style="color: black; font-size: 16px;font-weight:bolder">Password :</label>
                    <br>
                    <input type="password" id="sname" name="sname" required style="width: 80%; padding: 10px; margin-bottom: 10px;" placeholder="Password">
                    <br>
                    <label for="lyrics" style="margin-bottom: 5px; font-weight:bolder">Type :</label>
                    <br>
                    <select name="type" id="usertype" style="width: 80%;">
                        <option value="1">User</option>
                    </select>
                    <br>
                    <br>
                    <input type="submit" value="Submit" style="width:80%;height:40px;font-weight:bold">
                </form>
        </div>
        </center>
    </div>






    <!-- //----SONG ADDDMINNNNNN-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------SONG -->

    <div id="Song" style=" height: 90vh; width: 96vw; background-color: white ;overflow-x: hidden; overflow-y: auto; position:absolute; top:8% ; left:2% ;z-index:1">

        <hr style="background-color:black;">
        <center>
            <h1 style="position:absoulute; color:black;"> SONGS</h1>
        </center>
        <hr style="background-color:black;">


        <input type="submit" value="Add Song" style="border-radius: 5px; margin-top: 30px;width:100%; height:50px" onclick="dis_add('add_song')" />
        <input id="admin_search_song" type="text" placeholder="⚲  Seach Song " style="border-radius: 5px; margin-top: 30px;width:100%; height:40px">
        <br>
        <br>

        <div style="display: grid; grid-template-columns:  0.3fr 1fr 1fr; grid-template-rows: 1fr ;gap:20px">
            <div>
                <h6 style="font-weight: bolder;">
                    <center>Filter : </center>
                </h6>
            </div>
            <div>
                <select name="Genre" id="select_genre" style="width: 90%" onclick="select_genre()">
                    <option value="" disabled selected>Select Genre</option>
                    <option value="english">English</option>
                    <option value="gujarati">Gujarati</option>
                    <option value="hindi">Hindi</option>
                    <option value="korean">Korean</option>
                </select>

            </div>
            <div>
                <select name="" id="select_language" style="width:90%" onclick="select_language()">

                    <option value="" disabled selected>Select Language</option>
                    <option value="bhakti">bhakti</option>

                    <option value="dance">dance</option>

                    <option value="lofi">lofi</option>

                    <option value="party">party</option>

                    <option value="romantic">romantic</option>
                </select>
            </div>
        </div>
        <hr>
        <br>
        <div id="admin_song_div" style="margin-top: 10px; width: 96%;margin-left:2% ;height: 70px; display: grid; grid-template-columns:  2fr 2fr 2fr 2fr 2fr 2fr; grid-template-rows: 1fr; padding: 5px; background-color:white ; border-radius: 5px; cursor: pointer; color: white; ">
            <div class="artist_song_div_manage" id="artist_song_div_songname">
                <lable style="color: black; font-weight: bolder; ">Song Image</lable>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_songname">
                <lable style="color: black; font-weight: bolder;">Song Name</lable>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <lable style="color: black; font-weight: bolder">Singer Name</lable>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <lable style="color: black; font-weight: bolder">Song Genre</lable>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <lable style="color: black; font-weight: bolder">Language</lable>
            </div>
            <div class="artist_song_div_manage" id="artist_song_div_artistname">
                <lable style="color: black; font-weight: bolder">Operation</lable>
            </div>
        </div>
        <div id="admin_songs_div" style="margin-top: 10px; width: 96%;margin-left:2% ;height: 70px; display: grid; grid-template-columns:  2fr 2fr 2fr 2fr 2fr 2fr; grid-template-rows: 1fr; padding: 5px; background-color: white; border-radius: 5px; cursor: pointer; color: white; ">
        </div>


    </div>
    <div id="add_song" style="height: 81vh;font-size:smaller; width: 30vw; background-color:white; overflow-x: hidden;overflow-y:auto;  position: fixed; top: 10%; left: 36%; z-index:1; display: grid; grid-template-columns: 1fr ; grid-template-rows: 0.2fr 1fr;display:none;z-index:999">

        <div>
            <input type="submit" value="X" style="background-color: aliceblue;" onclick="close_add('add_song')">
        </div>

        <div style="background-color:aliceblue;margin-top :5px;padding:10px 0px">
            <center>

                <h2 style="font-weight: bold;">ADD SONG :</h2>
                <br>
                <br>
                <label for="uname" style="margin-bottom: 5px; font-weight:bolder">Song Name</label>
                <br>
                <input type="text" id="sname" name="sname" required style="width: 80%; padding: 10px; margin-bottom: 10px;">

                <br>
                <form method="POST" enctype="multipart/form-data">
                    <label for="fname" style="margin-bottom: 5px; font-weight:bolder">Full Name: </label>
                    <br>
                    <select id="song_language" name="song_language" required style="background-color: white; width:80%; color: black; border: 1px solid #777; padding: 5px; margin-bottom: 10px; font-size: 16px;">
                        <?php

                        $connection = mysqli_connect("localhost", "root", "", "demo");
                        if (!$connection) {
                            die("Not connected" . mysqli_connect_error());
                        }

                        $query = "SELECT * FROM `artist_table`";
                        $result = mysqli_query($connection, $query);

                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $a_name = json_encode($row['a_name']);

                                echo "<option value={$a_name}>{$a_name}</option>";
                            }
                        }
                        ?>
                    </select>
                    <br>

                    <label style="color: black; font-size: 16px; font-weight:bolder">Song File:</label>
                    <br>
                    <input type="file" required accept=".mp3" style="background-color: white; width:80%; color: black; border: 1px solid #777; padding: 5px; margin-bottom: 10px; font-size: 16px;">
                    <br>

                    <label style="color: black; font-size: 16px; font-weight:bolder">Song Image</label>
                    <br>
                    <input type="file" required accept="image/*" style="background-color: white; width:80%; color: black; border: 1px solid #777; padding: 5px; margin-bottom: 10px; font-size: 16px;">
                    <br>


                    <label style="color: black; font-size: 16px; font-weight:bolder">Song Language:</label>
                    <select id="song_language" name="song_language" required style="background-color: white; width:80%; color: black; border: 1px solid #777; padding: 5px; margin-bottom: 10px; font-size: 16px;">
                        <?php

                        $connection = mysqli_connect("localhost", "root", "", "demo");
                        if (!$connection) {
                            die("Not connected" . mysqli_connect_error());
                        }

                        $query = "SELECT `language` FROM `song_language`";
                        $result = mysqli_query($connection, $query);

                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $language = json_encode($row['language']);

                                echo "<option value={$language}>{$language}</option>";
                            }
                        }
                        ?>
                    </select>

                    <br>
                    <label style="color: black; font-size: 16px;font-weight:bolder">Song Genre:</label>
                    <br>
                    <select id="song_genre" name="song_genre" required style="background-color: white; width:80%; color: black; border: 1px solid #777; padding: 5px; margin-bottom: 10px; font-size: 16px;">
                        <?php

                        $query = "SELECT * FROM `song_genre`";
                        $result = mysqli_query($connection, $query);

                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $song_genre_name = json_encode($row['song_genre_name']);

                                echo "<option value={$song_genre_name} >{$song_genre_name}</option>";
                            }
                        }
                        ?>
                    </select>
                    <br>
                    <label for="lyrics" style="margin-bottom: 5px; font-weight:bolder">Lyrics</label>
                    <br>
                    <textarea name="lyrics" id="" rows="4" style="background-color: white; width:80%; color: black; border: 1px solid #777; padding: 5px; margin-bottom: 10px; font-size: 16px;"></textarea>
                    <br>
                    <input type="submit" value="Submit" style="width:80%;height:40px;font-weight:bold">
                </form>
        </div>
        </center>
    </div>




    <!-- //------ARTIST ADDDMINNNN-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ARTIST----------- -->
    <!-- //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ARTIST----------- -->
    <div id="Artist" style=" height: 91vh; width: 96vw; background-color: white ;overflow-x: hidden; overflow-y: auto; position:absolute; top:7% ; left:2% ;z-index:1">

        <hr style="background-color:black;">
        <center>
            <h1 style="position:absoulute; color:black"> ARTIST</h1>
        </center>
        <hr style="background-color:black;">
        <input type="submit" value="Add Artist" style="border-radius: 5px; margin-top: 30px;width:100%; height:50px" onclick="dis_add('add_artist')" />

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
    <div id="add_artist" style="height: 84vh;font-size:smaller; width: 30vw; background-color:white; overflow-x: hidden;overflow-y:auto;  position: fixed; top: 10%; left: 36%; z-index:1; display: grid; grid-template-columns: 1fr ; grid-template-rows: 0.2fr 1fr;display:none;z-index:999">

        <div style="background-color: transparent;">
            <input type="submit" value="X" style="background-color: aliceblue;" onclick="close_add('add_artist')">
        </div>

        <div style="background-color:aliceblue;margin-top :5px;padding:10px 0px; font-size:smaller">
            <center>

                <h2 style="font-weight: bold;">ADD USER :</h2>
                <br>
                <br>
                <label for="uname" style="margin-bottom: 5px; font-weight:bolder">Artist User Name :</label>
                <br>
                <input type="text" id="aname" name="sname" required style="width: 80%; padding: 10px; margin-bottom: 10px;" placeholder="Artist Name">

                <br>
                <form method="POST" enctype="multipart/form-data">
                    <label for="fname" style="margin-bottom: 5px; font-weight:bolder">Artist Full Name: </label>
                    <br>

                    <input type="text" id="afname" name="sname" required style="width: 80%; padding: 10px; margin-bottom: 10px;" placeholder="Full Name">
                    <br>



                    <label style="color: black; font-size: smaller; font-weight:bolder">Profile Picture :</label>
                    <br>
                    <input type="file" id="aimg" accept="image/*" style="background-color: white; width:80%; color: black; border: 1px solid #777; padding: 5px; margin-bottom: 10px; font-size: smaller;">
                    <br>
                    <br>
                    <label style="color: black; font-size: smaller; font-weight:bolder">Artist Language:</label>
                    <br>
                    <select id="a_lang" name="song_language" required style="background-color: white; width:80%; color: black; border: 1px solid #777; padding: 5px; margin-bottom: 10px; font-size: smaller;">
                        <?php

                        $connection = mysqli_connect("localhost", "root", "", "demo");
                        if (!$connection) {
                            die("Not connected" . mysqli_connect_error());
                        }

                        $query = "SELECT `language` FROM `song_language`";
                        $result = mysqli_query($connection, $query);

                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $language = json_encode($row['language']);

                                echo "<option value={$language}>{$language}</option>";
                            }
                        }
                        ?>
                    </select>
                    <br>
                    <label style="color: black; font-size: smaller; font-weight:bolder">Email :</label>
                    <br>
                    <input type="email" id="a_email" name="sname" required style="width: 80%; padding: 10px; margin-bottom: 10px;" placeholder="XYZ@gmail.com">

                    <br>
                    <label style="color: black; font-size: smaller;font-weight:bolder">Password :</label>
                    <br>
                    <input type="password" id="a_pass" name="sname" required style="width: 80%; padding: 10px; margin-bottom: 10px;" placeholder="Password">
                    <br>

                    <label for="lyrics" style="margin-bottom: 5px; font-weight:bolder">Type :</label>
                    <br>
                    <select name="type" id="a_type" style="width: 80%;">
                        <option value="2">Artist</option>
                    </select>
                    <br>
                    <br>
                    <label for="lyrics" style="margin-bottom: 5px; font-weight:bolder">BioGraphy</label>
                    <br>
                    <textarea name="lyrics" id="a_bio" rows="4" style="background-color: white; width:80%; color: black; border: 1px solid #777; padding: 5px; margin-bottom: 10px; font-size: smaller;"></textarea>
                    <br>
                    <br>
                    <br>

                    <button type="button" style="width:80%;height:40px;font-weight:bold" onclick="admin_artist_add('add_artist')">Submit</button>
                </form>
        </div>
        </center>
    </div>

    <!-- //-------GENRE ADDDINNNNN-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------GENRE -->
    <!-- //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------GENRE -->

    <div id="admin_song_play" style="background-color:transparent; height:40vh ; width:20vw ; top:20% ; left:40% ;z-index:999 ;position:fixed ; display:grid ;grid-template-rows:0.5fr 4fr ; grid-template-columns:1fr ; display:none">
        <div style="background-color:transparent; " onclick="admin_song_play_close()">
            <input type="submit" style=" color:crimson ; font-weight:bolder" value="X">
        </div>
        <div style="background-color:#F5F5F5;margin-top:10px;border-radius:10px">
            <center>
                <img id="i_f" src="upload_song/song_poster/Attention(CharliePuth).jpg" style="padding:30px 30px ; width:auto; height:200px" alt="">
                <br>
                <audio id="song" controls style='width: 300px; height:70px ; padding-top:15px;border-width:5px'>
                    <source id="a_f" src='upload_song/song/Attention(CharliePuth).mp3' type='audio/mpeg'>
                </audio>
                <br>
                <br>
                <h4 id="s_n">Song Name</h4>
                <h6 id="a_n">Artist name </h6>
                <br>
            </center>
        </div>


    </div>
    <div id="Genre" style="height: 91vh; width: 96vw; background-color: white ;overflow-x: hidden; overflow-y: auto; position:absolute; top:7% ; left:2% ; z-index:1">

        <hr style="background-color:black;">
        <center>
            <h1 style="position:absoulute; color:black"> GENRE</h1>
        </center>
        <hr style="background-color:black;">
        <input type="submit" value="Add Genre" style="border-radius: 5px; margin-top: 30px;width:100%; height:50px" onclick="dis_add('add_genre')" />

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

        <div id="admin_genre_div" style="margin-top: 10px; width: 96%;margin-left:2% ;height: 70px; display: grid; grid-template-columns: 1.5fr  2fr 2fr 2fr 2fr ; grid-template-rows: 1fr; padding: 30px 5px; background-color: white; border-radius: 5px; cursor: pointer; color: white; ">
        </div>
    </div>



    <div id="add_genre" style="height: 81vh;font-size:smaller; width: 30vw; background-color:white; overflow-x: hidden;overflow-y:auto;  position: fixed; top: 17%; left: 36%; z-index:1; display: grid; grid-template-columns: 1fr ; grid-template-rows: 0.2fr 1fr;display:none;z-index:999">

        <div>
            <input type="submit" value="X" style="background-color: aliceblue;" onclick="close_add('add_genre')">
        </div>

        <div style="background-color:aliceblue;margin-top :5px;padding:10px 0px">
            <center>

                <h2 style="font-weight: bold;">ADD GENRE :</h2>
                <br>
                <br>

                <br>
                <form method="POST" enctype="multipart/form-data">
                    <label for="fname" style="margin-bottom: 5px; font-weight:bolder">Genre Name: </label>
                    <br>
                    <input type="text" id="genre_name" name="" required style="width: 80%; padding: 10px; margin-bottom: 10px;">
                    <br>
                    <br>
                    <button type="button" style="width:80%;height:40px;font-weight:bold" onclick="add_genre_data('add_genre')">Submit</button>
                </form>
        </div>
        </center>
    </div>

    <!-- //-----LANGUAGE ADDDMINNNN------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------LANGUAGE -->
    <!-- //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------LANGUAGE -->

    <div id="Language" style="height: 91vh; width: 96vw; background-color: white ;overflow-x: hidden; overflow-y: auto; position:absolute; top:7% ; left:2% ; z-index:1">

        <hr style="background-color:black;">
        <center>
            <h1 style="position:absoulute; color:black"> LANGUAGE</h1>
        </center>
        <hr style="background-color:black;">
        <input type="submit" value="Add Language" style="border-radius: 5px; margin-top: 30px;width:100%; height:50px" onclick="dis_add('add_language')" />


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

        <div id='admin_language_div' style='margin-top: 10px;width: 96%;margin-left:2%;height: 70px;display: grid;grid-template-columns:1.5fr 2fr 2fr 2fr 2fr;grid-template-rows: 1fr;padding: 5px;background-color: white;border-radius: 5px;cursor: pointer;color: white;margin-left:5'>
        </div>

    </div>

    <div id="add_language" style="height: 81vh;font-size:smaller; width: 30vw; background-color:white; overflow-x: hidden;overflow-y:auto;  position: fixed; top: 17%; left: 36%; z-index:1; display: grid; grid-template-columns: 1fr ; grid-template-rows: 0.2fr 1fr;display:none;z-index:999">

        <div>
            <input type="submit" value="X" style="background-color: aliceblue;" onclick="close_add('add_language')">
        </div>

        <div style="background-color:aliceblue;margin-top :5px;padding:10px 0px">
            <center>

                <h2 style="font-weight: bold;">ADD LANGUAGE:</h2>
                <br>
                <br>

                <br>
                <form method="POST" enctype="multipart/form-data">
                    <label for="fname" style="margin-bottom: 5px; font-weight:bolder">language Name: </label>
                    <br>
                    <input type="text" id="lang_name" name="sname" required style="width: 80%; padding: 10px; margin-bottom: 10px;">
                    <br>
                    <br>
                    <button type="button" style="width:80%;height:40px;font-weight:bold" onclick="add_language_data('add_language')">Submit</button>

                </form>
        </div>
        </center>
    </div>



    <script src="admin_page_route.js"></script>
    <script src="admin_song_search.js"></script>
    <script src="admin_song_filter.js"></script>
    <script>
        function test() {
            alert()
        }

        function admin_artist_add(name) {



            var aname = document.getElementById("aname").value
            var afname = document.getElementById("afname").value
            var a_lang = document.getElementById("a_lang").value
            var a_email = document.getElementById("a_email").value
            var a_pass = document.getElementById("a_pass").value
            var a_type = document.getElementById("a_type").value
            var a_bio = document.getElementById("a_bio").value


            var alphabeticPattern = /^[a-zA-Z]+$/;
            var alphanumericPattern = /^[a-zA-Z0-9]+$/;

            // Check if afname contains at least one space
            var alphabeticPattern = /^[a-zA-Z]+$/;
            var alphanumericPattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$/;

            // Initialize a flag to track whether all conditions are met
            var allConditionsMet = true;

            // Check if aname contains at least one number and one alphabet
            if (!/[0-9]/.test(aname) || !/[a-zA-Z]/.test(aname)) {
                alert("aname must contain at least one number and one alphabet.");
                allConditionsMet = false;
            }

            // Check if afname contains only alphabetic characters


            // Check if afname includes one space
            if (afname.indexOf(' ') === -1) {
                alert("afname must include one space between words.");
                allConditionsMet = false;
            }

            // Check if the password length is at least 6 characters and contains at least one letter and one number
            if (a_pass.length < 6 || !alphanumericPattern.test(a_pass)) {
                alert("Password must be at least 6 characters long and contain both alphabets and numbers.");
                allConditionsMet = false;
            }

            // Check if all conditions are met
            if (allConditionsMet) {
                // All conditions are met, you can proceed with your AJAX request
                $.ajax({
                    type: "POST",
                    url: "admin_artist_add_data.php",
                    data: {
                        artist_name: aname,
                        artist_fullname: afname,
                        language: a_lang,
                        mail: a_email,
                        pass: a_pass,
                        type: a_type,
                        bio: a_bio
                    },
                    dataType: "json",
                    success: function(response_from_php) {
                        if (response_from_php.success === true) {
                            // Code to execute on success
                            console.log(response_from_php.message);
                            Swal.fire({
                                title: 'Artist Uploaded',
                                text: '',
                                icon: 'success'
                            });
                            // Clear form inputs or perform other actions
                        } else {
                            // Code to handle failure
                            console.error(response_from_php.message);
                            alert("Error: " + response_from_php.message);
                        }
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        // Handle error, e.g., show an error message to the user
                        console.error("AJAX Error: " + errorThrown);
                        alert("AJAX Error: " + errorThrown);
                    }
                });
            }

        }


        //     if (song_name.trim() === "" || song_language.trim() === "" || song_genre.trim() === "") {
        //         alert("Fill in all fields.");
        //         return;
        //     }

        //     if (song_file_input.files.length === 0 || song_image_input.files.length === 0) {
        //         alert("Select both a song file and an image file.");
        //         return;
        //     }

        //     // Create a FormData object to send file data
        //     var formData = new FormData();
        //     formData.append("song_name", song_name);
        //     formData.append("song_language", song_language);
        //     formData.append("song_genre", song_genre);
        //     formData.append("song_lyrics", song_lyrics);
        //     formData.append("song_file", song_file_input.files[0]);
        //     formData.append("song_image", song_image_input.files[0]);

        //     // Perform the AJAX request


        // });
    </script>
</body>

</html>