
<?php

include("conn.php");

session_start();

$email = $_SESSION['email'];
$emailSanitized = mysqli_real_escape_string($conn,$email);

/*if(isset($_POST['log'])){
  $verifyCode = $_POST['verifyCode'];
 
  $inviteCode = $_SESSION['invite_code'];
  
  $verifyCodeSanitized = mysqli_real_escape_string($conn,$verifyCode);

  $sql = "select * from accounttbl where OTP = '$verifyCodeSanitized' AND Email ='$emailSanitized'";
   $res = mysqli_query($conn,$sql);

if(mysqli_num_rows($res)>0){
  //echo "exist";
    foreach($res as $row){
      $_SESSION['userId'] = $row['Id_user'];
     
     
    };
 
    $sear = mysqli_query($conn,"select * from accounttbl where Id_user = '$inviteCode'");

    if(mysqli_num_rows($sear)>0){
      $currentBalance;
      foreach($sear as $row){
        $currentBalance = intval($row['Balance']);
      };
      $newBalance = $currentBalance + 1000;

      mysqli_query($conn,"update accounttbl set Balance = '$newBalance' where Id_user = '$inviteCode'");
    }
    

    mysqli_query($conn,"update accounttbl set status = 'true' where OTP = '$verifyCodeSanitized' AND Email ='$emailSanitized'");
    header('location:home.php');
}else{
  //echo "not exist";
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
    <link rel="stylesheet" href="css/verfy.css">
    <link rel="stylesheet" href="css/load.css">
    <link rel="stylesheet" href="css/wait.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificatiion</title>
    <link rel="website icon" href="icon/luckyDay.png">
</head>
<body>
<input type="text" value="white" id="theme" hidden>
    <div class="login">
    <form action="" method="post">
        <div class="logo">
<img src="icon/luckyDay.png" alt="">
        </div>
        <div class="infoPhp">
            <h1>Verification code is incorrect! Please try again</h1>
        </div>
        <div class="input">
         <h1>Verification</h1>
         <input type="text" placeholder="Verification Code" name="verifyCode">
         <button type="submit" name="log"><label for="">Verification</label><img id="wait" src="icon/loading.png" alt=""></button>
        </div>
        <div class="bottom">
            <a id="btncode" href="resend.php">resend code</a>
        </div>
        </form>
    </div>

   
</body>
<script src="js/wait.js"></script>
</html>

<?php

}


}else{*/

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
    <link rel="stylesheet" href="css/verfy.css">
    <link rel="stylesheet" href="css/load.css">
    <link rel="stylesheet" href="css/wait.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
    <link rel="website icon" href="icon/luckyDay.png">
</head>
<body>
<input type="text" value="white" id="theme" hidden>
    <div class="login">
    <form action="" method="post">

        <div class="logo">
<img src="icon/luckyDay.png" alt="">
        </div>
        <div class="infoPhp">
            <h1>To activate your account check your Email <?=$emailSanitized?></h1>
        </div>
       <!-- <div class="input">
         <h1>Verification</h1>
         <input type="text" placeholder="Verification Code" name="verifyCode">
         <button type="submit" name="log"><label for="">Verification</label><img id="wait" src="icon/loading.png" alt=""></button>
        </div>-->
        <div class="bottom">
            <a id="btncode" href="resend.php">Resend</a>
        </div>
        </form>
    </div>


   
</body>
<script src="js/wait.js"></script>
</html>








