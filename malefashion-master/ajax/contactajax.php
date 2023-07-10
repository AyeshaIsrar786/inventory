<?php 
include_once('../include/conn.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$name = mysqli_escape_string( $conn,$_POST['name']);
$email = mysqli_escape_string( $conn,$_POST['email']);
$message = mysqli_escape_string( $conn,$_POST['message']);

$qry="INSERT INTO `contact`(`name`, `email`, `message`) VALUES ('$name','$email','$message')";
$run=mysqli_query($conn,$qry);
        if($run){
            $msg= "run";
        }
        else{
            $msg= "not run";
        }
if($msg= "run"){
require "PHPMailer/PHPMailer.php";
require "PHPMailer/Exception.php";
require "PHPMailer/SMTP.php";
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "ayeshaisrar089@gmail.com";
    $mail->Password = "dbkuopvuwjuxzpnq"; //gmail app psw
    $mail->SMTPSecure = "ssl";
    $mail->Port = 465;

    $mail->setFrom("ayeshaisrar089@gmail.com");
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = ("I need your help");
    $mail->Body = $message;

    $mail->send();

    echo
    "
    <script>
    alert('Sent Successfuly');
    document.location.href= '../contact.php';
    </script>"
    ;
                
}
?>