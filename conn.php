<?php

$user = 'root';
$pass = '';
$db = 'luckyday';
$host = 'localhost';

$conn = new mysqli($host ,$user ,$pass ,$db) or die('unable to connect');

/*if(!$conn){
    echo"database not connected";
}else{
    echo"database connected"; 
};*/



?>