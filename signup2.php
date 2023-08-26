<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="signup.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <div id="page1">
        <div id="divlg">
            <div class="registration-container">
                <h2>Register-2</h2>
                <form action="#" method="post" onsubmit="return validateForm();">
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                    <button type="submit" name="register">Register</button>
                </form>
            </div>
        </div>
        <div id="divvid">
            <video autoplay loop muted playsinline>
                <source src="img/p3vid5.mp4" type="video/mp4">
            </video>
        </div>
    </div>
</body>
<?php
// Connection established
// Connection established



$connection = mysqli_connect("localhost", "root", "", "demo");

if (!$connection) {
    die("not connected" . mysqli_connect_error());
} else {
    echo "connected";
}





if(isset($_GET['email']) && isset($_GET['fname']) && isset($_GET['uname'])){
    $email =$_GET['email'];
    $fullName=$_GET['fname'];
    $userName=$_GET['uname'];

    if (isset($_POST['register'])) {
        $password = $_POST['password'];
                    if (strlen($password) >= 5) {
    
                        $result = mysqli_query($connection, "INSERT INTO `demo_reg`(`fname`, `uname`, `email`, `pass`) VALUES ('$fullName','$userName','$email','$password')");
    
                        if ($result) {
                            echo "query run successfully";
                            echo "<script>
                            swal('Done !', 'Registration completed', 'success');
                            </script>";
                            // echo "<script> window.location.href='login.php' </script>";
                            
                        } else {
    
                            echo "this error occurred: " . mysqli_error($connection);
                        }
                    } else {
                        echo "<script>
                        swal('Error!', 'Username should be at least 5 characters long and contain only lowercase letters and numbers.', 'error');
                        </script>";
                    }
                } 
    

}
else{
    echo "url fetching  problem";
}
    // Hash the password using password_hash
    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


?>

</html>