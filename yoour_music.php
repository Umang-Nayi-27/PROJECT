<?php
session_start();
    $connection = mysqli_connect("localhost", "root", "", "demo");
    if (!$connection) {
        die("Not connected" . mysqli_connect_error());
    }
     
    $name = $_SESSION['uname'];
        $query = "SELECT * FROM `song` WHERE `song_artist`='$name'";
        $result = mysqli_query($connection, $query);

        $songs = array();
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $songs[] = $row;
            }
        }

        echo json_encode($songs);
    
    ?>
