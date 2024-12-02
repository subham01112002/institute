<?php 
include("conn.php");
$id=$_REQUEST['stud'];
$status=$_REQUEST['status'];
$data=mysqli_query($conn,"UPDATE  student_registration SET Status='N' WHERE Student_id='$id'");
@header("Location: student_list.php");
?>