    <?php
    $connection = mysqli_connect("localhost", "root", "", "demo");
    if (!$connection) {
        die("Not connected" . mysqli_connect_error());
    }

    if (isset($_POST["search_key"])) {
        $search_key = $_POST["search_key"];

        $query = "SELECT * FROM `song` WHERE `song_name` LIKE '%$search_key%'";
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
