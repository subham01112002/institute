<?php
include("conn.php");
$id=$_REQUEST['id'];
$status=$_REQUEST['status'];
if($status=='Y'){
    $sql="UPDATE `student_activity` SET `Status`='N' WHERE `Activity_id`='$id'";
}
else{
    $date=date("Y-m-d");
    $sql="UPDATE `student_activity` SET `Status`='Y' , `Joining_date`='$date' WHERE `Activity_id`='$id'";
}
$res=mysqli_query($conn,$sql);
@header("Location: ".$_SERVER['HTTP_REFERER']);
?>