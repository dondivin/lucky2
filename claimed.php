<?php
include("conn.php");

$wonPoints = $_GET['r'];
$wonPointsSan = mysqli_real_escape_string($conn,$wonPoints);
session_start();
$remainPoint;
$ClaimedCount;
$id_user = $_SESSION['userId'];
$sql = "select * from accounttbl where Id_user = '$id_user'";

$res = mysqli_query($conn,$sql);
foreach($res as $row){
  $lastPoint = $row['Balance'];
  $remainPoint = intval($wonPointsSan) + intval($lastPoint);
  $ClaimedCount = intval($row['ClaimedCount']) + 1;
  echo $remainPoint;
}

$time = date("Y-m-d H:i:s");


$uptReq = "UPDATE accounttbl SET Balance = '$remainPoint',ClaimedDate = '$time',ClaimedCount = '$ClaimedCount'  WHERE Id_user = '$id_user'";
  mysqli_query($conn,$uptReq);



  echo "Created date is " . date("Y-m-d h:i:sa");




  ?>