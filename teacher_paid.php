<?php 
include("conn.php");
$id=$_REQUEST['id'];
$fees=$_REQUEST['fees'];
$percent=$_REQUEST['percent'];
$actual=$_REQUEST['actual'];
$date=$_REQUEST['date'];
$paid=$_REQUEST['paid'];
$month=substr($date,0,7);
$res=mysqli_query($conn,"INSERT INTO `teacher_fees` SET `teacher_id`='$id',`total_fees`='$fees',`percentage`='$percent',`actual_fees`='$actual',`date`='$date',`month`='$month',`paid_by`='$paid'");
if($res){
    @header("Location: teacher_payment.php");
}
else{
    echo mysqli_error($conn);
}


?>