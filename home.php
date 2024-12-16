<?php
include("conn.php");
session_start();

//random function




if(isset($_SESSION['userId'])){


$id_user = $_SESSION['userId'];

//DATA SET





$sqlDate = "select * from accounttbl where Id_user = '$id_user'";
$resDate = mysqli_query($conn,$sqlDate);
foreach($resDate as $rowDate){
    if(intval($rowDate['ClaimedCount']) === 0){
        $timePast = new DateTime($rowDate['ClaimedDate']);
        $currentDate = $timePast->format('Y-m-d H:i:s');
    }else{

    $timePast = new DateTime($rowDate['ClaimedDate']);
    $real = $timePast->format('Y-m-d');
    $hours = $timePast->format('H:i:s');
    $databaseDate = $timePast->format('Y-m-d H:i:s');

    //hours

    $hour = $timePast->format('H');
    $min = $timePast->format('i');

    //date
    $year = $timePast->format('Y');
    $mounth = $timePast->format('m');
    $day = $timePast->format('d');
    //echo "from database '$real' hour '$hours'";

    //current date
    
    $currentDate = date('Y-m-d H:i:s');
    $curDate = date("Y-m-d");
    $curTime = date('H:i:s');
    $curHour = date('H');
    $curMin = date('i');
    $curSec = date('s');

};

    //echo "current time '$currentDate' time '$curTime' Hour '$curHour' Min '$curMin'";

    /*if($curDate === $databaseDate){
        echo 'true';
    }else{
        echo 'false';
    }*/



$sql = "select * from accounttbl where Id_user = '$id_user'";
$res = mysqli_query($conn,$sql);

if(mysqli_num_rows($res)>0){
      
    foreach($res as $row){

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/claim.css">
    <link rel="stylesheet" href="css/load.css">
    <style>
        @font-face {
    font-family: "poppin";
    src: url('Poppins/Poppins-Light.ttf')  format('truetype');
  }
  @font-face {
    font-family: "poppinBold";
    src: url('Poppins/Poppins-ExtraBold.ttf')  format('truetype');
  }

          *{
              padding: 0;
              margin: 0;
              font-family: "poppin";
          }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lucky</title>
    <link rel="website icon" href="icon/luckyDay.png">
</head>
<body>
   <input type="text" value="<?=$row['Theme']?>" id="theme" hidden>
    <div class="game">
        <div class="more">
        <img id="moreIcon" src="icon/plus.svg" alt="">
            <div class="icon">
                <div class="byone">
                    <div class="div">
            <div class="logout">
              <a href="logout.php"> <img src="icon/logout.svg" alt="">
              <p id="uMore">Log out</p>
            </a>
             
            </div>
            <div class="theme">
               <a href="theme.php"><img src="icon/theme.svg" alt="">
                <p id="uMore">Theme</p>
            </a>
               
            </div>
            <div class="about">
                 <a href=""><img src="icon/aboutUs.svg" alt="">
                 <p id="uMore">About us</p>
                </a>
                
             </div>
           </div>
           </div>
        </div>
        </div>








        <div class="menu">
    <div class="title">
        <img src="icon/luckyDay.png" alt="">
    </div>
    <div class="subMenu">
        <a href="home.php">Home</a>
        <a href="wtdraw.php">Withdraw</a>
          <a href="refer.php">Invite friends</a>
    </div>
    <div class="user">
        <h1 id="use"><?=$row['UserName']?></h1>
        <div>
            <img src="icon/user.svg" alt="">
        </div>
    </div>
        </div>
        <div class="all">
        <div class="lucky">
            <div id="title">
                <h1 class="titl">Earn points every 1 hours</h1>
                <div class="amount">
                    <h1><?=$row['Balance']?></h1>
                    <div>
                        <img src="icon/money_dollar_circle_fill@2x.png" alt="">
                    </div>
                 
                </div>
            </div>
           
             <div class="price">
                <img src="photo/Screenshot_20231227-185403.png" alt="">
             </div>
             <div class="point">
                <div class="num">
                    <h1 id="luckyNum">0000</h1>
                    <h1 id="luckyNum1">0000</h1>
                </div>
                <div class="trigger">
                    
                    <button id="btn" name="trigger">
                        <div>
                            <img id="dice" src="icon/randomDice.svg" alt="">
                        </div>
                    </button>
                    <h1 id="timeSet">00:00</h1>
                </div>
             </div>
             <div class="note">
                <div class="note1">
                    <img src="" alt="">
                    <h1>Note</h1>
                </div>
                <div class="txt">
                    <p>1. The number you get tells you the amount of points you win.</p>
                    <p>2. Come back every hour to earn more.</p>
                    <p>3. Invite your frinds and earn 1000 or more.</p>
                      <p>4. The minimum of amount to withdraw is 100000 = 10$.</p>
                </div>
             </div>
             <div class="footer">


            <div class="menu1">
                <div class="foot">Menu</div>
                <div class="list">
                     <a href="home.php">Home</a>
                    <a href="wtdraw.php">Withdraw</a>
                      <a href="refer.php">Invite friends</a>
                </div>
            </div>
            <div class="social">
                <div class="plate">
                    <div class="channel">
                        <div class="foot">Our channel</div>
                    </div>
                    <div class="logo">
                        <a href=""><img src="icon/logo-facebook.svg" alt=""><p>Facebook</p></a>
                        <a href=""><img src="icon/instagram.svg" alt=""><p>Instagram</p></a>
                        <a href=""><img src="icon/twitter.svg" alt=""><p>Twitter</p></a>
                        <a href=""><img src="icon/youtube.svg" alt=""><p>Youtube</p></a>
                    </div>
                   
                </div>
        


            </div>

          <div class="right">
            <p>CopyRight©️2023</p>
          </div>

             </div>
        </div>
      
    </div>
    </div>

<!----------claiming sign-->

<div class="claim">
    <div class="logo">
<img src="icon/luckyDay.png" alt="">
    </div>
    <div class="txt">
     <h1>Congratulation</h1>
      <p id="won">You have won 1000 points</p>
      <p>1. The number you get tell you the amount of points you win.</p>
      <p>2. Come back every hour to earn more.</p>
      <p>3. Invite your frinds and earn 1000 or more.</p>
        <p>4. The minimum of amount to withdraw is 100000 = 10$.</p>
    </div>
    <div class="bottom">
       <a href="home.php">OK</a>
    </div>
</div>


<input type="text" id="dateFromBase" value="<?=$databaseDate?>" hidden>
<input type="text"  id="currentDate" value="<?=$currentDate?>" hidden>

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
<script src="js/main.js"></script>
<script src="js/hoColor.js"></script>
<script src="js/load.js"></script>
<script>
    let loading = document.querySelector('.loading');
    window.addEventListener("load",()=>{
    loading.style.display = 'block';
})
</script>
</html>
<?php

     }
  }
}
}else{
    header("location:index.php");
}
?>