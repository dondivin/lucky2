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
    grid-template-rows: 100px 600px 200px 200px;
    overflow: auto;
}
.game .all .lucky .withdraw {
    width: 100%;
    height: 100%;
    display: grid;
    /* justify-content: center; */
    /* align-items: center; */
    grid-template-columns: 100%;
    flex-direction: column;
    grid-template-rows: 300px 300px;
}
}
    </style>
    <link rel="stylesheet" href="css/load.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Withdraw</title>
    <link rel="website icon" href="icon/luckyDay.png">
</head>
<body>
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



        <input type="text" value="<?=$row['Theme']?>" id="theme" hidden>

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
                <h1 id="titl">Withdraw</h1>
                <div class="amount">
                    <h1><?=$row['Balance']?></h1>
                    <input type="number" value="<?=$row['Balance']?>" hidden id="balance">
                    <div>
                        <img src="icon/money_dollar_circle_fill@2x.png" alt="">
                    </div>
                 
                </div>
            </div>
           
            <div class="withdraw">

              <div class="withdrawInput">
                <div class="input">
                    <input type="text" placeholder="Amount to withdraw" name="" id="amount">
                    <div class="usdt">
                    <input type="text" placeholder="to USDT" name="" id="usdt">
                    </div>
                    <input type="text" placeholder="Wallet address" name="" id="wallet">
                    <div class="error">
                        <p id="redErr">!</p><p id="redErr1">You must enter only numbers</p>
                    </div>
                    <div class="error">
                        <p id="redErr">!</p><p id="redErr1">You must enter only numbers</p>
                    </div>
                    <div class="error">
                        <p id="redErr">!</p><p id="redErr1">Please enter Your wallet address</p>
                    </div>
                    <div class="error">
                        <p id="redErr">!</p><p id="redErr1">Please enter amount you want to withdraw</p>
                    </div>
                    <div class="error">
                        <p id="redErr1">Your account balance is lower than the amount you are trying to withdraw!</p>
                    </div>
                      <div class="error">
                        <p id="redErr1">Minimum to withdraw is 100000 === 10$</p>
                    </div>
                   
                </div>
               <div class="button">
                <button>Withdraw</button>
               </div>

              </div>
              <div class="history">
                 <h1>History</h1>
                 <div class="list">
                    <div class="title">
                        <h1>#</h1>
                        <h1>Amount</h1>
                        <h1>Date</h1>
                        <h1>Status</h1>
                    </div>
                    <div class="titList">

                <?php
                   $req = "select * from withdrawtbl where Id_user='$id_user'";
                   $count = 0;
                   $res = mysqli_query($conn,$req);
                    if(mysqli_num_rows($res)>0){
                        foreach($res as $row){
                            $count++;
                            $calender = new DateTime($row['date']);
                            $date = $calender->format('Y-m-d');
                    
                ?>

                        <div class="withd">
                            <p><?=$count?></p>
                            <p><?=$row['usdt']?>$</p>
                            <p><?=$date?></p>
                            <p id="stat"><?=$row['status']?></p>
                        </div>

                        

<?php
                        }
                    }
                    ?>


                    </div>
                 </div>
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
<script src="js/with.js"></script>
<script src="js/withColor.js"></script>
<script src="js/load.js"></script>
</html>
<?php
  }
}
}else{
    header("location:index.php");
}
?>