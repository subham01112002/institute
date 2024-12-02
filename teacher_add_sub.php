<?php 
    include("conn.php");
    session_start();
    if(mysqli_connect_errno()){
        echo "failed to connect to mysql" . mysqli_connect_error();
    }
    $id=$_REQUEST['id'];
    $categ=$_SESSION['cid'];
 $data=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM teacher WHERE Teacher_id='$id'"));

    $ret=" SELECT * FROM  `subject_category` WHERE Category_id='$categ'";
    $cat=mysqli_query($conn,$ret);
    $c=mysqli_fetch_array($cat);

    $rem=" SELECT * FROM  `subject_group` WHERE Category_id='$categ'  ORDER BY `Subject_group_id`";
    $que=mysqli_query($conn,$rem);

    $ren=" SELECT * FROM  `subject_master` ORDER BY `Subject_id`";
    $quy=mysqli_query($conn,$ren);

    if(!empty($_REQUEST['add']) && !empty($_REQUEST['mode'])){
      $res_subjectgroupid=$_REQUEST['Subject_group_id']; 
      $res_subjectid = $_REQUEST['Subject_id']; 
      if(!empty($_REQUEST['Status']))
      {
        $res_status = $_REQUEST['Status'];
      }
      
      else
      {
        $res_status ='N';
      }
      $sql_con="INSERT INTO `teacher_activity` SET 
              `Teacher_id`='$id' ,
              `Category_id`= '$categ' ,
              `Subject_group_id`='$res_subjectgroupid' ,
              `Subject_id`='$res_subjectid'  ";  
      $add=mysqli_query($conn, $sql_con);

      if($add)
        {
          @header("Location: teacher_add_sub.php?id=$id");
		      exit();  
        }
    }
    
    if(!empty($_REQUEST['mode']) && !empty($_REQUEST['submit']))
    { 
      $res_subjectgroupid=$_REQUEST['Subject_group_id']; 
      $res_subjectid = $_REQUEST['Subject_id']; 
      if(!empty($_REQUEST['Status']))
      {
        $res_status = $_REQUEST['Status'];
      }
      
      else
      {
        $res_status ='N';
      }
      
      $sql_con="INSERT INTO `teacher_activity` SET 
              `Teacher_id`='$id' ,
              `Category_id`= '$categ' ,
              `Subject_group_id`='$res_subjectgroupid' ,
              `Subject_id`='$res_subjectid' ,
              `Status`= '$res_status'  ";  
      $sub=mysqli_query($conn, $sql_con);
      
      if($sub)
        {
          unset($_SESSION['id']);
          unset($_SESSION['name']);
          unset($_SESSION['cid']);
          session_destroy();
          @header("Location: teacher_list.php?msg=Successfull Insert");
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
				if(document.getElementById('Category_id').value=='')
				{
					alert('Please enter subject category!');
					document.paymentform.Category_id.focus();
					return false;
				}	
        if(document.getElementById('Subject_group_id').value=='')
				{
					alert('Please enter subject category!');
					document.paymentform.Subject_group_id.focus();
					return false;
				}	
				if(document.getElementById('Subject_id').value=='')
				{
					alert('Please enter your subject !');
					document.paymentform.Subject_id.focus();
					return false;
				}
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
					alert('Please enter Category !');
					document.teacherform.Category_id.focus();
					return false;
				}	
                
		}
	</script>
</head>
<body>
<div class="form-box">
<h1><a href="index.php"><i class="fa-solid fa-building-columns"></i></a></h1>
  <h1>Teacher Activity Form</h1>
  
  <form action="" name="teacherform" id="teacherform" method="post" onSubmit="return checking();">
    <input type="hidden" name="mode" value="1" />
    <div class="form-group">
      <label for="Teachername">Teacher Name</label>
      <input class="form-control" id="Teacher_id" type="text" name="Teacher_id" value="<?php echo $data['Teacher_name'] ?>"/> 
    </div>
    <div class="form-group">
      <label for="categoryname">Category Name</label>
      <input class="form-control" id="Category_id" type="text" name="Category_id" value="<?php echo $c['Category_name'] ?>"/> 
    </div>
    <div class="form-group">
      <label for="categoryid">Subject Group Name</label>
      <select class="form-control" name="Subject_group_id" id="Subject_group_id" onchange="subject_chk(this.value)"  >
									<option value=""> Select Your subject group</option>
									<?php  while($c=mysqli_fetch_array($que)){ ?>
                  <option value="<?php echo $c['Subject_group_id'] ?>"><?php echo $c['Subject_group_name'] ?></option>
                  <?php } ?>
	    </select>
    </div>
    <div class="form-group">
      <label for="subjectid">Subject Name</label>
      <select class="form-control" name="Subject_id" id="Subject_id">
									<option value=""> Select your subject</option>
									<?php  while($b=mysqli_fetch_array($quy)){ ?>
									<option value="<?php echo $b['Subject_id'] ?>" data-value="<?php echo $b['Subject_group_id'] ?>" data-sub="<?php echo $b['Subject_name'] ?>"><?php echo $b['Subject_name'] ?></option>
                  <?php } ?>
	    </select>
    </div>  
    <input type="checkbox" name="Status" id="Status" value="Y" checked /> Status
    <div class="but">
      <input class="btn btn-primary" type="submit" name="add" value="+" /><br> 
    </div>
    <div class="but">
        <input class="btn btn-primary" type="submit" name="submit" value="Submit" /><br>
    </div>
  </form>

</div>
<script>
  const ele=document.getElementById('Subject_id').cloneNode(true);
  const og=ele.options;
  console.log(og);
  document.getElementById('Subject_id').innerHTML='<option value=""> Please Select a Subject Group</option>';
  function subject_chk(val){
    document.getElementById('Subject_id').innerHTML='<option value=""> Please Select a Subject</option>';
  
    for(let i of og)
    {
      if(i.dataset)
      console.log(i.dataset.value)
       if(i.dataset.value===val)
      document.getElementById('Subject_id').innerHTML+=`<option value="${i.value}"> ${i.dataset.sub}</option>`; 
    }
  }
  </script>
</body>
</html>