<?php

session_start();
include('conn.php');
$email = $_GET['email'];
$inviteCode = $_GET['code'];

$sql = "select * from accounttbl where Email = '$email'";
$res = mysqli_query($conn,$sql);

if(mysqli_num_rows($res)===1){
foreach($res as $row1){
    $_SESSION['userId'] = $row1['Id_user'];
    $sql1 = "update accounttbl set Status = 'true' where Email = '$email'";
    $res1 = mysqli_query($conn,$sql1);



    $sear = mysqli_query($conn,"select * from accounttbl where Id_user = '$inviteCode'");

    if(mysqli_num_rows($sear)>0){
      $currentBalance;
      foreach($sear as $row){
        $currentBalance = intval($row['Balance']);
      };
      $newBalance = $currentBalance + 1000;

      mysqli_query($conn,"update accounttbl set Balance = '$newBalance' where Id_user = '$inviteCode'");
    };

    
    header('location:home.php');
}
}



?>