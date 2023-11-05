<?php 
    session_start();
    session_reset();
    include("conn.php");
    if(mysqli_connect_errno()){
        echo "failed to connect to mysql" . mysqli_connect_error();
    }
    $req=" SELECT * FROM  `subject_category` ORDER BY `Category_id`";
    $qut=mysqli_query($conn,$req);

    $count="SELECT COUNT(*) AS 'count'  FROM  `teacher`";
    $cnt=mysqli_query($conn,$count);
    $m=mysqli_fetch_array($cnt);
    

    if(!empty($_REQUEST['mode']))
    {  
      $res_name = $_REQUEST['Teacher_name'];
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
      
      $sql_con="INSERT INTO `teacher` SET 
              `Teacher_name`= '$res_name', 
              `Teacher_phone`= '$res_phone',
              `Teacher_reg_id`='$res_regid' ,
              `Category_id`= '$res_cateid'  ,
              `Status`= '$res_status' ";  
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
          @header("Location: teacher_activity.php?msg=Sucessfull Insert");
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
      const word = document.getElementById('Teacher_name').value;
      
      var ind=word.lastIndexOf(" ");
      if(ind!=-1){
      var second= word.slice(ind+1);
      const capitalized =word.charAt(0).toUpperCase() + word.substr(1,ind+1);
      const capital=second.charAt(0).toUpperCase() + second.slice(1);
      const final = capitalized.concat(capital);
      }
				if(document.getElementById('Teacher_name').value=='')
				{
					alert('Please enter your name !');
					document.teacherform.Teacher_name.focus();
					return false;
				}
        else{
          document.getElementById('Teacher_name').value= final;
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
<h1><a href="home.php"><i class="fa-solid fa-building-columns"></i></a></h1>
  <h1>Teacher Registration Form</h1>
  
  <form action="" name="teacherform" id="teacherform" method="post" onSubmit="return checking();">
    <input type="hidden" name="mode" value="1" />
    <div class="form-group">
      <label for="Teachername">Teacher Name</label>
      <input class="form-control" id="Teacher_name" type="text" name="Teacher_name" style="text-transform: capitalize;" placeholder='Enter your teacher name here'/> 
    </div>    
    <div class="form-group">
      <label for="phone">Teacher Phone No</label>
      <input class="form-control" id="Teacher_phone" type="int" name="Teacher_phone"/>
    </div>
    <div class="form-group">
      <label for="reg_id">Registration No</label>
      <input class="form-control" id="Teacher_reg_id" type="text" name="Teacher_reg_id" value="TCH<?php echo $m['count'] ?>" readonly />
    </div>
    <div class="form-group">
      <label for="categoryid">Category Name</label>
      <select class="form-control" name="Category_id" id="Category_id" >
									<option value=""> Select Your Category</option>
									<?php while($c=mysqli_fetch_array($qut)){ ?>
									<option value="<?php echo $c['Category_id'] ?>"><?php echo $c['Category_name'] ?></option>
                  <?php } ?>
	    </select>
    </div>
    <input type="checkbox" name="Status" id="Status" value="Y" checked /> Status
    <div class="but">
        <input class="btn btn-primary" type="submit" value="Submit" /><br>
    </div>
    
  </form>
</div>
</body>
</html>