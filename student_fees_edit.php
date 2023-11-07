<?php 
   include("conn.php");
   session_start();
   
    if(mysqli_connect_errno()){
        echo "failed to connect to mysql" . mysqli_connect_error();
    }
    if(!isset($_REQUEST['stud']))
     {
      @header("Location: fees_update.php");
          
     }   
     $id=$_REQUEST['stud'];
     $sub=$_REQUEST['sub'];
     
         $sql="SELECT * FROM `student_registration` INNER JOIN `student_activity` ON `student_registration`.`Student_id`=`student_activity`.`Student_id` INNER JOIN `subject_master` ON `student_activity`.`Subject_id`=`subject_master`.`Subject_id` WHERE `student_activity`.`Student_id` ='$id' AND  `subject_master`.`Subject_id`='$sub'";
         $arr=mysqli_fetch_array(mysqli_query($conn,$sql));
     if(isset($_REQUEST['mode']))
     {
        $fees=$_REQUEST['Actual_fees'];
        $sql="UPDATE  `student_activity` SET `Actual_fees`='$fees' WHERE `Student_id`='$id'";
        $res=mysqli_query($conn,$sql);
        if($res)
        {
            @header("Location: fees_update.php");
    
        }
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="student_act.css" >
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    
</head>
<body>
<div class="form-box">
  <h1><a href="index.php"><i class="fa-solid fa-building-columns"></i></a></h1>
  <h1>Fees Change Form</h1>
  
  <form action="" name="paymentform" id="paymentform" method="post" onSubmit="return checking();">
    <input type="hidden" name="mode" value="1" />
    
    <div class="form-group">
      <label for="studentid">Student Name</label>
      <input class="form-control" id="Student_name" type="text" name="Student_name" value="<?php echo $arr['Student_name'] ?>" disabled/>
    </div>
    <div class="form-group">
      <label for="fees">Subject Name</label>
      <input class="form-control" id="Actual_fees" type="int" name="Subject" value="<?php echo $arr['Subject_name']; ?>" disabled/>
    </div>
    
    <div class="form-group">
      <label for="fees">Actual Fees</label>
      <input class="form-control" id="Actual_fees" type="int" name="Actual_fees" value="<?php echo $arr['Actual_fees']; ?>"/>
    </div>
    
    <div class="but">
        <input class="btn btn-primary" type="submit" value="Submit" /><br>
    </div>
    
  </form>
 <!-- <table border="0" align="center"  >
		<tr>
			<td style="color:#FF0000;">&nbsp;</td>   			 
		</tr>-->
</table>
</div>
</body>
</html>