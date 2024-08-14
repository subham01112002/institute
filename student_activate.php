<?php 
include("conn.php");
$id=$_REQUEST['id'];
$status=$_REQUEST['status'];
$data=mysqli_query($conn,"UPDATE  student_registration SET  `Status`='Y' WHERE Student_id='$id'");
if($data){
@header("Location: student_inact.php?activated");
}
?>