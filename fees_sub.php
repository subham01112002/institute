<?php 
include("conn.php");
$subject=explode(",",$_REQUEST['sub']);
$date=$_REQUEST['date'];
$id=$_REQUEST['id'];
$month=$_REQUEST['month'];
//echo $month;
foreach($subject as $sub)
{

    $subject_amt=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `student_activity` WHERE `Subject_id`='$sub' AND `Student_id`='$id'"));
    $amt=$subject_amt['Actual_fees'];
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `fees_history` WHERE `student_id`='$id' AND `subject_id`='$sub' AND `month`='$month'"))=='0')
    $res=mysqli_query($conn,"INSERT INTO `fees_history` SET `student_id`='$id',`subject_id`='$sub',`month`='$month' ,`date`='$date',`amt`='$amt'");
    
}
@header("Location: fees_history.php");
?>