<?php
$connection = mysqli_connect("localhost", "root", "", "demo");
if (!$connection) {
    die("Not connected" . mysqli_connect_error());
}

if (isset($_POST["song_genre"])) {
    $song_genre = $_POST["song_genre"];

    $query = "SELECT * FROM `song` WHERE `song_genre` = '$song_genre'";
    $result = mysqli_query($connection, $query);

    $songs = array();
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $songs[] = $row;
        }
    }

    echo json_encode($songs);
} 
else 
{
    echo json_encode(array()); 
}
