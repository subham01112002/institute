<?php 
include("conn.php");
$id=$_REQUEST['id'];
$status=$_REQUEST['status'];
$data=mysqli_query($conn,"UPDATE  teacher SET  `Status`='Y' WHERE Teacher_id='$id'");
if($data){
@header("Location: inactive_teacher_list.php?activated");
}
?>