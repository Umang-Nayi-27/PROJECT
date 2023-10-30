<?php
session_start();
    $connection = mysqli_connect("localhost", "root", "", "demo");
    if (!$connection) {
        die("Not connected" . mysqli_connect_error());
    }
    $song_name = $_POST['song_name'];
    $name = $_SESSION['uname'];
        $query = "SELECT * FROM `like_song` WHERE `song_name`='$song_name' AND `user_name`='$name'";
        $result = mysqli_query($connection, $query);

        $songs = array();
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $songs[] = $row;
            }
        }

        echo json_encode($songs);
    
    ?>
