<?php
session_start();
    $connection = mysqli_connect("localhost", "root", "", "demo");
    if (!$connection) {
        die("Not connected" . mysqli_connect_error());
    }
     
        $query = " SELECT * FROM `demo_reg` WHERE `role`=2";
        $result = mysqli_query($connection, $query);

        $songs = array();
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $songs[] = $row;
            }
        }

        echo json_encode($songs);
    
    ?>
