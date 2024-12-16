
<?php

session_start();
include("conn.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if(isset($_POST['reg'])){

  $otp1 = substr(str_shuffle("0123456789"),0,5);

 $ipClient = $_SERVER['REMOTE_ADDR'];



  $codeInvite = $_POST['code'];
  $regNum = $_POST['regNum'];
$Iduser = $_POST['iduser'];
$UserName = $_POST['regName'];
$Password = $_POST['regPass'];
$Email = $_POST['regEmail'];

/*$_SESSION['userId'] = $Iduser;
echo $_SESSION['userId'];*/

  
  $regNumSanitized = mysqli_real_escape_string($conn,$regNum);
  $IduserSanitized =  mysqli_real_escape_string($conn,$Iduser);
  $codeInviteSanitized = mysqli_real_escape_string($conn,$codeInvite);
  $UserNameSanitized = mysqli_real_escape_string($conn,$UserName);
  $PassSanitized = mysqli_real_escape_string($conn,$Password);
  $EmailSanitized = mysqli_real_escape_string($conn,$Email);

  $_SESSION['userName'] = $UserNameSanitized;
  $_SESSION['email'] = $EmailSanitized;
  $_SESSION['num'] = $regNumSanitized;
  $_SESSION['pass'] = $PassSanitized;

  $_SESSION['invite_code'] = $codeInviteSanitized;

  $sql = "select * from accounttbl where numbers = '$regNumSanitized'";
  $res = mysqli_query($conn,$sql);


if(mysqli_num_rows($res)>0){
  

?>

<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <style>
                 @font-face {
      font-family: "poppin";
      src: url('Poppins/Poppins-Light.ttf')  format('truetype');
    }
    @font-face {
      font-family: "poppinBold";
      src: url('Poppins/Poppins-ExtraBold.ttf')  format('truetype');
    }
      </style>
      <link rel="stylesheet" href="css/respo.css">
      <link rel="stylesheet" href="css/wait.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Register</title>
      <link rel="website icon" href="icon/luckyDay.png">
  </head>
  <body>
      <div class="claim">
          <div class="logo">
  <img src="icon/luckyDay.png" alt="">
          </div>
          <div class="txt">
          <h1>The number is already registered</h1>
          </div>
          <div class="bottom">
             <a href="register.php">OK</a>
          </div>
      </div>
  </body>
  </html>


<?php

}else{

  $req = "select * from accounttbl where Email = '$EmailSanitized'";
  $search = mysqli_query($conn,$req);
  if(mysqli_num_rows($search)>0){
  

    
    ?>

    <!DOCTYPE html>
      <html lang="en">
      <head>
          <meta charset="UTF-8">
          <style>
                     @font-face {
          font-family: "poppin";
          src: url('Poppins/Poppins-Light.ttf')  format('truetype');
        }
        @font-face {
          font-family: "poppinBold";
          src: url('Poppins/Poppins-ExtraBold.ttf')  format('truetype');
        }
          </style>
          <link rel="stylesheet" href="css/respo.css">
          <link rel="stylesheet" href="css/wait.css">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Register</title>
          <link rel="website icon" href="icon/luckyDay.png">
      </head>
      <body>
          <div class="claim">
              <div class="logo">
      <img src="icon/luckyDay.png" alt="">
              </div>
              <div class="txt">
              <h1>Email is already registered</h1>
              </div>
              <div class="bottom">
                 <a href="register.php">OK</a>
              </div>
          </div>
      </body>
      </html>
    
    
    <?php

  }else{

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
    




  $sql = 'insert into accounttbl(UserName,numbers,Password,Id_user,InvitedBy,IpClient,Email,OTP) value(?,?,?,?,?,?,?,?)';
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssssssi",$UserNameSanitized ,$regNumSanitized ,$PassSanitized,$IduserSanitized,$codeInvite,$ipClient,$EmailSanitized,$otp);
  $stmt->execute();
  //echo"<script>alert('registered'+$regNumSanitized)";
  header("location:verify.php");
  $stmt->close();
  $conn->close();
    

exit();
    } catch (Exception $e){
     // echo "Message could not be sent.Mailer Error: {$mail->ErrorInfo}";
    //  echo"<script>alert('Check your internet connection and try again')</script>";
     // header('location:register.php');




     ?>


     <!DOCTYPE html>
     <html lang="en">
     <head>
         <meta charset="UTF-8">
         <style>
                    @font-face {
         font-family: "poppin";
         src: url('Poppins/Poppins-Light.ttf')  format('truetype');
       }
       @font-face {
         font-family: "poppinBold";
         src: url('Poppins/Poppins-ExtraBold.ttf')  format('truetype');
       }
         </style>
         <link rel="stylesheet" href="css/register1.css">
         <link rel="stylesheet" href="css/wait.css">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Register</title>
         <link rel="website icon" href="icon/luckyDay.png">
     </head>
     <body>
         
         <div class="login">
           <form action="" method="post">
             <div class="logo">
     <img src="icon/luckyDay.png" alt="">
             </div>
             <div class="infoErr">
              <h1>Error occur! Please try again</h1>
             </div>
             <div class="input">
              <h1>Register</h1>
              <input type="text" placeholder="UserName" name="regName">
              <input type="text" placeholder="Number/Email" name="regNum">
              <input type="text" placeholder="password" name="regPass">
              <input type="text" placeholder="Your Email" name="regEmail">
              <input id="code" type="text" placeholder="Invite code" name="code">
              <button type="submit" name="reg"><label for="">Register</label><img id="wait" src="icon/loading.png" alt=""></button>
             </div>
             <div class="bottom">
                 <a href="index.php">Already have an account</a>
             </div>
             <input type="text" class="iduser" hidden name="iduser">
             </form>
         </div>
     
     </body>
     <script src="js/gen.js"></script>
     <script src="js/wait.js"></script>
     <script>
        /* let loading = document.querySelector('.loading');
         window.addEventListener("load",()=>{
         loading.style.display = 'block';
     })*/
     </script>
     </html>


<?php




    }

}
}
}else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
               @font-face {
    font-family: "poppin";
    src: url('Poppins/Poppins-Light.ttf')  format('truetype');
  }
  @font-face {
    font-family: "poppinBold";
    src: url('Poppins/Poppins-ExtraBold.ttf')  format('truetype');
  }
    </style>
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/load.css">
    <link rel="stylesheet" href="css/wait.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="website icon" href="icon/luckyDay.png">
</head>
<body>
  
    <div class="login">
      <form action="" method="post">
        <div class="logo">
<img src="icon/luckyDay.png" alt="">
        </div>
        <div class="input">
         <h1>Register</h1>
         <input type="text" placeholder="UserName" name="regName">
         <input type="text" placeholder="Number/Email" name="regNum">
         <input type="text" placeholder="password" name="regPass">
         <input type="text" placeholder="Your Email" name="regEmail">
         <input id="code" type="text" placeholder="Invite code" name="code">
         <button type="submit" name="reg"><label for="">Register</label><img id="wait" src="icon/loading.png" alt=""></button>
        </div>
        <div class="bottom">
            <a href="index.php">Already have an account</a>
        </div>
        <input type="text" class="iduser" hidden name="iduser">
        </form>
    </div>

<div class="motLoad">
  <div class="words">
  <div class="h1">
    <div>Lu</div>
    <div>ck</div>
    <div>yD</div>
    <div>ay</div>
  </div>
</div>
</div>
</body>
<script src="js/gen.js"></script>
<script src="js/wait.js"></script>
<script src="js/load.js"></script>
<script>
   /* let loading = document.querySelector('.loading');
    window.addEventListener("load",()=>{
    loading.style.display = 'block';
})*/
</script>
</html>

<?php
}


?>






