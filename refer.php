
<?php
include("conn.php");
session_start();

//random function




if(isset($_SESSION['userId'])){


$id_user = $_SESSION['userId'];



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
          .game .all .lucky {
    width: 100%;
    height: 100%;
    display: grid;
    grid-template-columns: 100%;
    grid-template-rows: 100px 500px 200px 200px;
    overflow: auto;
}
@media only screen and (max-width:600px){
    .game .all .lucky {
    width: 100%;
    height: 100%;
    display: grid;
    grid-template-columns: 100%;
    grid-template-rows: 100px 300px 200px 200px;
    overflow: auto;
}
}
    </style>
    <link rel="stylesheet" href="css/load.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invite</title>
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
                <h1 id="titl">Invite friends</h1>
                <div class="amount">
                <h1><?=$row['Balance']?></h1>
                    <div>
                        <img src="icon/money_dollar_circle_fill@2x.png" alt="">
                    </div>
                 
                </div>
            </div>
           
                
            <div class="refer">
                <div class="link">
                <div class="txt">
                    <h1>Invite via link</h1>
                </div>
                <div class="input">
                    <input id="txtcopy" type="text" value="http://realestatedon.rf.gd/reg.php?ref=<?=$id_user?>">
                </div>
                <div class="copy" >
                    <img onclick="copyText()" src="icon/copy.svg" alt="">
                    <p>copy</p>
                </div>
                </div>
                <div class="referal">
                    <div class="referalCode">
                        <h1>Referal code</h1>
                        <h1><?=$row['Id_user']?></h1>
                    </div>
                    <div class="referalPerson">
                        <h1>Referals</h1>

<?php

      $sear = mysqli_query($conn,"select * from accounttbl where InvitedBy = '$id_user'");

      if(mysqli_num_rows($sear)>0){
        $count = 0;
        foreach($sear as $row){
            $count++;
        }

?>
          <h1><?=$count?></h1>
<?php
      }else{
        ?>
       <h1>0</h1>
        <?php
      }

?>


                        
                    </div>
                </div>

            </div>

             <div class="note">
                <div class="note1">
                    <img src="" alt="">
                    <h1>Note</h1>
                </div>
                <div class="txt">
                    <p>1. The number you get tell you the amount of points you win.</p>
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
<script src="js/copy.js"></script>
<script src="js/reColor.js"></script>
<script src="js/load.js"></script>
</html>
<?php
  }
}
}else{
    header("location:index.php");
}
?>