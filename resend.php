<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();

$EmailSanitized = $_SESSION['email'];
$UserNameSanitized = $_SESSION['userName'];
$numLog = $_SESSION['num'];
$passLog = $_SESSION['pass'];

$codeInviteSanitized = $_SESSION['invite_code'];


   require ("PHPMailer/PHPMailer.php");
   require ("PHPMailer/SMTP.php");
   require ("PHPMailer/Exception.php");
 //Mail sending

 $mail = new PHPMailer(true);

 try{
   // $mail->SMTPDebug = 0;
   $mail->isSMTP();
   $mail->Host = 'smtp.gmail.Com';
   $mail->SMTPAuth = true;
   $mail->Username = 'dondivin89@gmail.com';
   $mail->Password = 'jxuw sutc olul ilws';
   $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
   $mail->Port = 587;
   $mail->setFrom('dondivin89@gmail.com','LuckyDay');
   $mail->addAddress($EmailSanitized,$UserNameSanitized);
   $mail->isHTML(true);

   //Random number for 1 to 6

   $otp = substr(number_format(time() * rand(), 0, '',''),0,6);


   $mail->Subject = 'Email verification';
   //$mail->Body = '<p>Your verification code is : <b style"font-size:25px;color:#ff3c00;">'.$otp.'</b></p>';
   $mail->Body = '
       <p style="font-size: 100%;
       font-family: sans-serif;
       ">You must activate your account by click here : </p>
    
       <a href="http://localhost/lucky/activate.php?email='.$EmailSanitized.'&code='.$codeInviteSanitized.'" style="
              width:fit-content;
              cursor:pointer;
              text-align:center;
              font-size: 80%;
              padding:5px;
      border-radius: 1px;
      background-color: orangered;
      color: aliceblue;
      font-weight: 700;
      font-family: sans-serif;
      text-decoration: non;
      display: flex;
      justify-content: center;
      align-items: center;">Activate account</a>
<p style="font-size: 100%;
font-family: sans-serif;
">and start claim and invite your freind to earn more.</p>';
   $mail->send();

   header('location:verify.php');

} catch (Exception $e){
     echo "Message could not be sent.Mailer Error: {$mail->ErrorInfo}";
   //  echo"<script>alert('Check your internet connection and try again')</script>";
    // header('location:register.php');
};

   ?>