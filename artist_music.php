<?php
session_start();
    $connection = mysqli_connect("localhost", "root", "", "demo");
    if (!$connection) {
        die("Not connected" . mysqli_connect_error());
    }
     
    $name = $_SESSION['uname'];
        $query = "SELECT song.song_name ,song.song_language ,song.song_genre ,song.song_artist ,song.song_lyrics ,song.song_image , song.song_file FROM like_song JOIN song ON like_song.song_name = song.song_name  WHERE `user_name`='$name'";
        $result = mysqli_query($connection, $query);

        $songs = array();
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $songs[] = $row;
            }
        }

        echo json_encode($songs);
    
    ?>
