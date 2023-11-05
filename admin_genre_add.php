<?php
$connection = mysqli_connect("localhost", "root", "", "demo");
if (!$connection) {
    die("Not connected" . mysqli_connect_error());
}

if (isset($_POST["lang_name"])) {
    $lang_name = $_POST["lang_name"];
    $query = "INSERT INTO `song_genre`( `song_genre_name`) VALUES  ('{$lang_name}')";
    
    if (mysqli_query($connection, $query) !== false) {
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