<?php
include("conn.php");
$tid=$_REQUEST['tid'];
$t_status=$_REQUEST['t_status'];

    if($t_status=='Y'){
        $sql="UPDATE `teacher_activity` SET `Status`='N' WHERE `Teacher_activity_id`='$tid'";
    }
    else{
        
        $sql="UPDATE `teacher_activity` SET `Status`='Y'  WHERE `Teacher_activity_id`='$tid'";
    }
    $res=mysqli_query($conn,$sql);
    @header("Location: ".$_SERVER['HTTP_REFERER']);

?>