<?php
$connection = mysqli_connect("localhost", "root", "", "demo");
if (!$connection) {
    die("Not connected" . mysqli_connect_error());
}

if (isset($_POST["song_name"])) {
    $song_name = $_POST["song_name"];
    echo "<script>console.log({$song_name})</script>";
    $query = "DELETE FROM `song` WHERE `id` = $song_name";
    
    if (mysqli_query($connection, $query)) {
        // Query was successful
        echo json_encode(array("status" => "done"));
    } else {
        // Query had an error
        echo json_encode(array("status" => "error", "message" => mysqli_error($connection)));
    }
} else {
    echo json_encode(array("status" => "no_data"));
}
?>