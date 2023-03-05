<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'users');
if($conn->connect_error){
    die('Connection Failed: '.$conn->connect_error);
}

require 'PHPMailer/src/PHPMailer.php';  
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

//function to use php mailer to send email
function send_password_reset($get_name, $get_email,$token)
{
    $mail = new PHPMailer(TRUE);
    //SMTP DEBUG
    $mail->isSMTP();
    $mail->SMTPAuth = true;

    //user email and host
    $mail->Host = "smtp.gmail.com";
    $mail->Username = "gilbertmaina001@gmail.com";
    $mail->Password = "qekiiwxcpvqomjbc";

    $mail->SMTPSecure = "tls";
    $mail->Port = 587;

    //sender and receiver defined
    $mail->SetFrom("gilbertmaina001@gmail.com",$get_name);
    $mail->addAddress($get_email);

    $mail->isHTML(true);
    $mail->Subject = "Reset Password Notification";

    $email_template="
        <h2>Hello</h2>
        <h3>You are receiving this email because we received a password reset request for your account. \n
        Please click the link below to reset. If it was not you, ignore this email</h3>
        <br/><br/>
        <a href = 'http://localhost/web/password-changehtml.php?token=$token&email=$get_email'>Click me</a>
    ";

    $mail->Body = $email_template;
    $mail->send();    


}



if(isset($_POST['forgot']))
{
    $email = $_POST['forgotpas'];

    $query = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($conn,$query);
    $token = md5(rand()); //random numbers and alphabets

    if(mysqli_num_rows($result)>0)
    {
        //fetching the email obtained on query
        $row = mysqli_fetch_array($result);
        $get_name = $row['firstname'];
        $get_email = $row['email'];

        $update_token = "UPDATE user SET verify_token='$token' WHERE email='$get_email' LIMIT 1";
        $update_token_run = mysqli_query($conn,$update_token);

        //email the reset link
        if($update_token_run)
        {
            send_password_reset($get_name, $get_email,$token);
            $_SESSION['status'] = 'If email is correct, we have sent an email with a password reset link';
            header("Location: forgotpashtml.php");
            exit(0);
        }
        else
        {
            $_SESSION['status'] = 'Something went wrong. #1';
            header("Location: forgotpashtml.php");
            exit(0);
        }

    // else
    // {
    //     $_SESSION['status'] = 'No email found';
    //     header("Location: forgotpashtml.php");
    //     exit(0);
        
    }
}

?>