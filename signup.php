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
                <h2>Register-1</h2>
                <form action="#" method="post" onsubmit="return validateForm();">
                    <p><a href="login.php" id="aha">Already have an account?</a></p>
                    <input type="text" name="full_name" placeholder="Full Name" required>
                    <input type="text" name="user_name" placeholder="User Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <button type="submit" name="register">Verify Email</button>
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

ini_set('display_errors', 1);
error_reporting(E_ALL);

$connection = mysqli_connect("localhost", "root", "", "demo");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $fullName,$userName)
{
    require('mailer/Exception.php');
    require('mailer/PHPMailer.php');
    require('mailer/SMTP.php');

    $mail = new PHPMailer(true);

    try {
        //Server settings                   //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'vikramkohli277@gmail.com';                     //SMTP username
        $mail->Password   = 'zjysmgkymgaepshq        ';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('vikramkohli277@gmail.com', 'BeatBoxify');
        $mail->addAddress($email);     //Add a recipient
        //Attachments
        //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Password Link For BeatBoxify';
        $mail->Body    = "Response of your forgot Password  <br> <b> Click link below </b>
                            <br>
                            <a href='http://localhost/proj/signup2.php?email=$email&fname=$fullName&uname=$userName'> Reset Password</a>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

if (isset($_POST['register'])) {
    $fullName = $_POST['full_name'];
    $userName = $_POST['user_name'];
    $email = $_POST['email'];

    if (!empty($fullName) && strpos($fullName, ' ') !== false && !preg_match('/[0-9]/', $fullName)) {
        if (strlen($userName) >= 5 && preg_match("/^[a-z0-9]+$/", $userName)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL) && checkdnsrr(substr(strrchr($email, '@'), 1), 'MX')) {


                $result = mysqli_query($connection, "SELECT `fname`, `uname`, `email`, `pass`, `token`, `token_exp` FROM `demo_reg` WHERE `email`='$email'");
                if (mysqli_num_rows($result)>0) {
                    echo "<script>
                    swal(' ERROR', 'Already Have an account with provided Email ', 'Error');
                    </script>";
                }
                else{
                echo "okka so new email address";    
                
                $result = mysqli_query($connection, "SELECT `fname`, `uname`, `email`, `pass`, `token`, `token_exp` FROM `demo_reg` WHERE `uname`='$userName'");
                if (mysqli_num_rows($result)>0) {
                    echo "<script>
                    swal(' ERROR', 'User-name already exist', 'Error');
                    </script>";
                } else {
                   
                    if( sendMail($_POST['email'],$_POST['full_name'],$_POST['user_name']) ) {
                        
                        echo "<script>
                        swal('Done !', 'Email verification link has been sent', 'success');
                        </script>";
                        
                    } else {

                        echo "this error occurred: " . mysqli_error($connection);
                    }
                }
            }
            } else {
                echo "<script>
                swal('Error!', 'Username should be at least 5 characters long and contain only lowercase letters and numbers.', 'error');
                </script>";
            }
        } else {
            echo "<script>
            swal('Error!', 'Username should be at least 5 characters long and contain only lowercase letters and numbers.', 'error');
            </script>";
        }
    } else {
        echo "<script>
        swal('Error!', 'Full Name should contain firstname and lastname       Eg:: Cristiano Ronaldo', 'error');
        </script>";
    }

    // Hash the password using password_hash
    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
}

?>

</html>