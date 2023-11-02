<?php
session_start(); // Start the session

header('Content-Type: application/json'); // Set JSON header

$connection = mysqli_connect("localhost", "root", "", "demo");
if (!$connection) {
    echo json_encode(array("success" => false, "message" => "Database connection error: " . mysqli_connect_error()));
    exit;
}

$artist = $_SESSION["uname"];
$song_name = $_POST["song_name"];

        $query = "DELETE FROM `like_song` WHERE `song_name`='$song_name'   AND `user_name`='$artist'    ";
        $result = mysqli_query($connection, $query);
        

        echo json_encode($result)
?>
