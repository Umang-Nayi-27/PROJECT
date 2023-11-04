<?php
    $connection = mysqli_connect("localhost", "root", "", "demo");
    if (!$connection) {
        die("Not connected" . mysqli_connect_error());
    }

    if (isset($_POST["search_key"])) {
        $search_key = $_POST["search_key"];

        $query = "DELETE FROM `song` WHERE `song_name` = $search_key";
        if(mysqli_query($connection, $query)){
            echo json_encode('done');
        }
        else{

        }
        
    } else {
    }
    ?>
