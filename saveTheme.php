<?php
include('conn.php');

session_start();
$Theme = $_GET['th'];
if(isset($_SESSION['userId'])){
   
    $id_user = $_SESSION['userId'];

    $themeSanitized = mysqli_real_escape_string($conn,$Theme);
    
    $sql = "update accounttbl set Theme = '$themeSanitized' where id_user = '$id_user'";
    mysqli_query($conn,$sql);
}




?>