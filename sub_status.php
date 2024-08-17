<?php
include("conn.php");
$id=$_REQUEST['id'];
$status=$_REQUEST['status'];
$crt=date("Y-m-d");
    if($status=='Y'){
        $sql="UPDATE `student_activity` SET `Status`='N',`end_date`= '$crt' WHERE `Activity_id`='$id'";
    }
    else{
        $date=date("Y-m-d");
        $month=substr($date,0,7);
        $sql="UPDATE `student_activity` SET `Status`='Y' , `Joining_date`='$date',`Month`='$month',`end_date`='0000-00-00'  WHERE `Activity_id`='$id'";
    }
    $res=mysqli_query($conn,$sql);
    @header("Location: ".$_SERVER['HTTP_REFERER']);

?>