
<?php

include("conn.php");

session_start();

if(isset($_SESSION['userId'])){
header("location:home.php");
}else{



if(isset($_POST['log'])){
  $logNum = $_POST['logNum'];
  $logPass = $_POST['logPass'];
  
  $logNumSanitized = mysqli_real_escape_string($conn,$logNum);
  $logPassSanitized = mysqli_real_escape_string($conn,$logPass);

  $sql = "select * from accounttbl where numbers = '$logNumSanitized' AND Password = '$logPassSanitized' AND status = 'true'";
   $res = mysqli_query($conn,$sql);

if(mysqli_num_rows($res)>0){
  //echo "exist";
  $sql1 = "select * from accounttbl where numbers = '$logNumSanitized' AND Password = '$logPassSanitized' AND status = 'true'";
  $res1 = mysqli_query($conn,$sql);
  if(mysqli_num_rows($res1)>0){
    foreach($res1 as $row){
      $_SESSION['userId'] = $row['Id_user'];
    }
  }
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
          <h1>There is no account with that information</h1>
          </div>
          <div class="bottom">
             <a href="index.php">OK</a>
          </div>
      </div>
  </body>
  </html>

<?php

}


}


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
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/load.css">
    <link rel="stylesheet" href="css/wait.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="website icon" href="icon/luckyDay.png">
</head>
<body>
    <div class="login">
    <form action="" method="post">
        <div class="logo">
<img src="icon/luckyDay.png" alt="">
        </div>
        <div class="input">
         <h1>Login</h1>
         <input type="text" placeholder="Your Number/Email" name="logNum">
         <input type="text" placeholder="Enter your password" name="logPass">
         <button type="submit" name="log"><label for="">Log</label><img id="wait" src="icon/loading.png" alt=""></button>
        </div>
        <div class="bottom">
            <a href="register.php">Create an account</a>
        </div>
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
<script src="js/wait.js"></script>
<script>
  setInterval(()=>{
   // let error = document.querySelector('.error'),
   let input = document.querySelector('input');

    let num = input.value
if(onlyNumbers(num)){
  
    if(num != ''){
      //  error.style.display = 'none';
        input.style.border = '';
        console.log('you entered only numbers');
    }
   
}else{

    if(num === ''){
       // error.style.display = 'none';
        input.style.border = '';
      
    }
  
    if(num != ''){
       // console.error("fool");
       // error.style.display = 'flex';
        input.style.border = '3px solid red';
    }
}
},100);
function onlyNumbers(num){
return /^[0-9  +]+$/i.test(num);
};
</script>
<script src="js/indexColor.js"></script>
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