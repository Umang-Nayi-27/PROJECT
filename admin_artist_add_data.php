<?php

header('Content-Type: application/json');


$connection = mysqli_connect("localhost", "root", "", "demo");
if (!$connection) {
    die("Not connected" . mysqli_connect_error());
}

if (
    isset($_POST["artist_name"]) &&
    isset($_POST["artist_fullname"]) &&
    isset($_POST["language"]) &&
    isset($_POST["mail"]) &&
    isset($_POST["pass"]) &&
    isset($_POST["type"]) &&
    isset($_POST["bio"])
) {
    $afname = $_POST["artist_name"];
    $aname = $_POST["artist_fullname"];
    $email = $_POST["mail"];
    $pass = $_POST["pass"];
    $role = $_POST["type"];
    $bio = $_POST["bio"];
    $lang =$_POST["language"];

    $query = "INSERT INTO `demo_reg` (`fname`, `uname`, `email`, `pass`, `role`) VALUES ('$afname', '$aname', '$email', '$pass', '$role')";
    $result = mysqli_query($connection,$query);
    if ($result) {
        
        $query1 = "INSERT INTO `artist_table`(`a_name`, `a_detail`, `language`) VALUES ('$aname','$bio','$lang')";
        $result1 = mysqli_query($connection,$query1);
        if($result1){

        echo json_encode(array("success" => true, "message" => "Data inserted successfully"));}
        else{
            $error_message = mysqli_error($connection);
        error_log("MySQL Error: " . $error_message, 3, "error_log.txt");
        echo json_encode(array("success" => false, "message" => $error_message));
    
        }
    } else {
        $error_message = mysqli_error($connection);
        error_log("MySQL Error: " . $error_message, 3, "error_log.txt");
        echo json_encode(array("success" => false, "message" => $error_message));
    }
} else {
    echo json_encode(array("success" => false, "message" => "Missing data"));
}
