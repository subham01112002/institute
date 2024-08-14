<?php 
    session_start();
    session_reset();
    include("conn.php");
    if(mysqli_connect_errno()){
        echo "failed to connect to mysql" . mysqli_connect_error();
    }
    if(empty($_REQUEST['tch']))
{
    @header("Location : student_list.php");
    exit();
}
$id=$_REQUEST['tch'];
$data=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM teacher WHERE Teacher_id='$id'"));
$req=" SELECT * FROM  `subject_category` ORDER BY `Category_id`";
$qut=mysqli_query($conn,$req);

    

    if(!empty($_REQUEST['mode']) && !empty($_REQUEST['add']))
    {  

      $name = $_REQUEST['Teacher_name'];
      $res_name = ucwords($name);
      $res_phone = $_REQUEST['Teacher_phone'];
      $res_regid = $_REQUEST['Teacher_reg_id'];
      $res_cateid = $_REQUEST['Category_id'];  
        $res_status ='Y';
      
      
      $sql_con="UPDATE  `teacher` SET 
              `Teacher_name`= '$res_name', 
              `Teacher_phone`= '$res_phone',
              `Teacher_reg_id`='$res_regid' ,
              `Category_id`= '$res_cateid'  ,
              `Status`= '$res_status' where `Teacher_id`='$id'";  
      $res=mysqli_query($conn, $sql_con);
      
      $rev="SELECT * FROM `teacher` WHERE Teacher_reg_id='$res_regid' ";
      $quw=mysqli_query($conn,$rev);
      $tid=mysqli_fetch_array($quw);
      $tid=$tid['Teacher_id'];
      $name=$tid['Teacher_name'];
      $cate=$tid['Category_id'];
      if($res)
        {
          $_SESSION['id']=$tid;
          $_SESSION['name']=$name;
          $_SESSION['cid']=$cate;
          @header("Location: teacher_add_sub.php?id=$id ");
		      exit();  
        }
    }
    if(!empty($_REQUEST['mode']) && !empty($_REQUEST['submit']))
    {  

      $name = $_REQUEST['Teacher_name'];
      $res_name = ucwords($name);
      $res_phone = $_REQUEST['Teacher_phone'];
      $res_regid = $_REQUEST['Teacher_reg_id'];
      $res_cateid = $_REQUEST['Category_id'];  

      if(!empty($_REQUEST['Status']))
      {
        $res_status = $_REQUEST['Status'];
      }
      
      else
      {
        $res_status ='N';
      }
      
      $sql_con="UPDATE  `teacher` SET 
              `Teacher_name`= '$res_name', 
              `Teacher_phone`= '$res_phone',
              `Teacher_reg_id`='$res_regid' ,
              `Category_id`= '$res_cateid'  ,
              `Status`= '$res_status' where `Teacher_id`='$id'";  
      $res=mysqli_query($conn, $sql_con);
      
      $rev="SELECT * FROM `teacher` WHERE Teacher_reg_id='$res_regid' ";
      $quw=mysqli_query($conn,$rev);
      $tid=mysqli_fetch_array($quw);
      $id=$tid['Teacher_id'];
      $name=$tid['Teacher_name'];
      $cate=$tid['Category_id'];
      if($res)
        {
          $_SESSION['id']=$id;
          $_SESSION['name']=$name;
          $_SESSION['cid']=$cate;
          @header("Location: teacher_list.php");
		      exit();  
        }
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="teach.css" >
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <script language="javascript" type="text/javascript">
		function checking()
		{
				if(document.getElementById('Teacher_name').value=='')
				{
					alert('Please enter your name !');
					document.teacherform.Teacher_name.focus();
					return false;
				}	
				if(document.getElementById('Teacher_phone').value=='')
				{
					alert('Please enter phone!');
					document.teacherform.Teacher_phone.focus();
					return false;
				}	
        if(document.getElementById('Teacher_reg_id').value=='')
				{
					alert('Please enter reg no!');
					document.teacherform.Teacher_reg_id.focus();
					return false;
				}	
        if(document.getElementById('Category_id').value=='')
				{
					alert('Please enter subject category!');
					document.paymentform.Category_id.focus();
					return false;
				}	
                
		}
	</script>
</head>
<body>
<div class="form-box">
<h1><a href="index.php"><i class="fa-solid fa-building-columns"></i></a></h1>
  <h1>Teacher Registration Form</h1>
  
  <form action="" name="teacherform" id="teacherform" method="post" onSubmit="return checking();">
    <input type="hidden" name="mode" value="1" />
    <div class="form-group">
      <label for="Teachername">Teacher Name</label>
      <input class="form-control" id="Teacher_name" type="text" name="Teacher_name" value="<?php echo $data['Teacher_name']?>" style="text-transform: capitalize;" placeholder='Enter your teacher name here'/> 
    </div>    
    <div class="form-group">
      <label for="phone">Teacher Phone No</label>
      <input class="form-control" id="Teacher_phone" type="int" name="Teacher_phone" value="<?php echo $data['Teacher_phone']?>"/>
    </div>
    <div class="form-group">
      <label for="reg_id">Registration No</label>
      <input class="form-control" id="Teacher_reg_id" type="text" name="Teacher_reg_id" value="<?php echo $data['Teacher_reg_id']?>"/>
    </div>
    <div class="form-group">
      <label for="categoryid">Category Name</label>
      <select class="form-control" name="Category_id" id="Category_id" >
									<option value=""> Select Your Category</option>
                                    
									<?php while($c=mysqli_fetch_array($qut)){ ?>
									<option value="<?php echo $c['Category_id'] ?>" <?php if($data['Category_id']==$c['Category_id']) echo "selected" ?>><?php echo $c['Category_name'] ?></option>
                  <?php } ?>
	    </select>
    </div>
    <div class="but">
      <input class="btn btn-primary" type="submit" name="add" value="Add Subject"  />
    </div>
    <div class="but">
        <input class="btn btn-primary" type="submit"  name="submit" value="Submit" /><br>
    </div>
    
  </form>
</div>
</body>
</html>