<?php
include("conn.php");

$amount = $_GET['am'];
$usdt = $_GET['us'];
$wallet = $_GET['wa'];
$amountSan = mysqli_real_escape_string($conn,$amount);
$usdtSan = mysqli_real_escape_string($conn,$usdt);
$walletSan = mysqli_real_escape_string($conn,$wallet);
session_start();
$id_user = $_SESSION['userId'];
$balance;
$withd = false;
$BalanceRest;

$req = "select * from accounttbl where Id_user = '$id_user'";
$res = mysqli_query($conn,$req);
  if(mysqli_num_rows($res)>0){
    foreach($res as $row){
$balance = $row['Balance'];
echo $usdtSan;


if($balance >= $amountSan){

  $BalanceRest = intval($balance) - intval($amountSan);
  $req1 = "update accounttbl set Balance = '$BalanceRest' where Id_user ='$id_user'";
  mysqli_query($conn,$req1);

    $sql ="insert into withdrawtbl(Id_user,amount,usdt,date,wallet) values(?,?,?,?,?)";

    $time = date("Y-m-d H:i:s");
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdss",$id_user ,$amountSan ,$usdtSan ,$time ,$walletSan);
    $stmt->execute();

    $stmt->close();
    $conn->close();
 
    echo $BalanceRest;
}else{
    echo 'insufficient amount';
}


}
}







  ?>