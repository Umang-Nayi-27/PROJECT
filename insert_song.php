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
$song_language = $_POST["song_language"];
$song_genre = $_POST["song_genre"];
$song_lyrics = $_POST["song_lyrics"];

$img_path = "upload_song/song_poster/" . basename($_FILES['song_image']['name']);
$song_path = "upload_song/song/" . basename($_FILES['song_file']['name']);

try {
    
    if (move_uploaded_file($_FILES['song_image']['tmp_name'], $img_path) && move_uploaded_file($_FILES['song_file']['tmp_name'], $song_path)) {
        $query = "INSERT INTO `song`(`song_name`, `song_language`, `song_genre`, `song_artist`, `song_lyrics`, `song_image`, `song_file`) VALUES ('$song_name','$song_language','$song_genre','$artist','$song_lyrics','$img_path','$song_path')";
        $result = mysqli_query($connection, $query);

        if ($result) {
            echo json_encode(array("success" => true, "message" => "Song data inserted successfully."));
        } else {
            echo json_encode(array("success" => false, "message" => "Database error: " . mysqli_error($connection)));
        }
    } else {
        echo json_encode(array("success" => false, "message" => "File upload failed."));
    }
} catch (Exception $e) {
    echo json_encode(array("success" => false, "message" => "Error: " . $e->getMessage()));
}

mysqli_close($connection);
?>
