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

        $query = "INSERT INTO `like_song`(`song_name`, `user_name`) VALUES ('$song_name','$artist')";
        $result = mysqli_query($connection, $query);
        
?>
