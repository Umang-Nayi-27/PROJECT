<?php
    $connection = mysqli_connect("localhost", "root", "", "demo");
    if (!$connection) {
        die("Not connected" . mysqli_connect_error());
    }

    if (isset($_POST["id"])) {
        $id = $_POST["id"];

        $query = "SELECT * FROM `song` WHERE `id`='$id' ";
        $result = mysqli_query($connection, $query);

        $songs = array();
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $songs[] = $row;
            }
        }


        echo json_encode($songs);
    } else {
        echo json_encode(array()); // Return an empty array if artist_name is not set
    }
    ?>
