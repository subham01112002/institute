<?php 
include("conn.php");
$subject=explode(",",$_REQUEST['sub']);
$date=$_REQUEST['date'];
$id=$_REQUEST['id'];
$month=$_REQUEST['month'];
//echo $month;
foreach($subject as $sub)
{
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `fees_history` WHERE `student_id`='$id' AND `subject_id`='$sub' AND `month`='$month'"))=='0')
    $res=mysqli_query($conn,"INSERT INTO `fees_history` SET `student_id`='$id',`subject_id`='$sub',`month`='$month' ,`date`='$date'");
}
@header("Location: fees_history.php");
?>