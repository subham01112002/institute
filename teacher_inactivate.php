<?php 
include("conn.php");
$id=$_REQUEST['tch'];
$status=$_REQUEST['status'];
$data=mysqli_query($conn,"UPDATE  teacher SET Status='N' WHERE Teacher_id='$id'");
@header("Location: Teacher_list.php");
?>