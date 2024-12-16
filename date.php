<?php
include('conn.php');

//$date = date("Y-m-d H:i:sa");

//mysqli_query($conn,"insert into date(time) value('$date')");


$sqlDate = "select * from date where id = '4'";
$res = mysqli_query($conn,$sqlDate);
foreach($res as $row){
    $time = new DateTime($row['time']);
    $real = $time->format('Y-m-d H:i:s');
    $hours = $time->format('H:i:s');
    $databaseDate = $time->format('Y-m-d');

    //hours

    $hour = $time->format('H');
    $min = $time->format('i');

    //date
    $year = $time->format('Y');
    $mounth = $time->format('m');
    $day = $time->format('d');
    echo "from database '$real' hour '$hours'";

    //current date
    
    $currentDate = date('Y-m-d H:i:s');
    $curDate = date("Y-m-d");
    $curTime = date('H:i:s');
    $curHour = date('H');
    $curMin = date('i');
    $curSec = date('s');

    echo "current time '$currentDate' time '$curTime' Hour '$curHour' Min '$curMin'";

    if($curTime < '12:01:10'){
        echo 'true';
    }else{
        echo 'false';
    }
}

?>