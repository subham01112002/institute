<?php 
   include("conn.php");
   session_start();
   
    if(mysqli_connect_errno()){
        echo "failed to connect to mysql" . mysqli_connect_error();
    }
    if(!isset($_SESSION['id']))
     {
      @header("Location: index.php");
          
     }   
          $mspg = $_SESSION['id'];  
          $name = $_SESSION['name'];
          $join_date = $_SESSION['joindate'];
         
    $req=" SELECT * FROM  `subject_category` ORDER BY `Category_id`";
    $qut=mysqli_query($conn,$req);

    $rem=" SELECT * FROM  `subject_group`  ORDER BY `Subject_group_id`";
    $que=mysqli_query($conn,$rem);
    
    $ren=" SELECT * FROM  `subject_master`  ORDER BY `Subject_id`";
    $quy=mysqli_query($conn,$ren);
    
    $wer=" SELECT `Subject_id`,`Subject_name` FROM  `subject_master` ORDER BY `Subject_id`";
    $ter=mysqli_query($conn,$wer);

    $rel=" SELECT * FROM  `teacher`  INNER JOIN `teacher_activity` ON `teacher`.`Teacher_id`=`teacher_activity`.`Teacher_id` and `status`='Y' ORDER BY `teacher`.`Teacher_id` ";
    $qup=mysqli_query($conn,$rel);

    if(!empty($_REQUEST['add']) && !empty($_REQUEST['mode'])){
      $res_studentid = $mspg; 
      $res_studentname = $name;
      $res_Categoryid = $_REQUEST['Category_id'];
      $res_Subject_groupid = $_REQUEST['Subject_group_id'];
      $res_Subjectid = $_REQUEST['Subject_id'];
      $res_Teacher_id = $_REQUEST['Teacher_id'];
      $res_Actual_fees = $_REQUEST['Actual_fees']; 
      $res_Joining_date = $_REQUEST['Joining_date'];  
      $res_Month = substr($res_Joining_date,0,7);
      if(!empty($_REQUEST['Status']))
      {
        $res_status = $_REQUEST['Status'];
      }
      
      else
      {
        $res_status ='N';
      }
      
      
      $sql_con="INSERT INTO `student_activity` SET 
              `Student_id`='$res_studentid' ,
              `Category_id`= '$res_Categoryid',
              `Subject_group_id`= '$res_Subject_groupid',
              `Subject_id`= '$res_Subjectid', 
              
              `Actual_fees`='$res_Actual_fees' ,
              `Joining_date`= '$res_Joining_date', 
              `Month`= '$res_Month' ,
              `Teacher_id`= '$res_Teacher_id' ,
              `Status`= '$res_status' ";  
      $res=mysqli_query($conn, $sql_con);
      if($res)
        {
          @header("Location: student_activity.php");
		      exit();   		
        }
    }

    if(!empty($_REQUEST['mode']))
    {  
      $res_studentid = $mspg; 
    
      $res_Categoryid = $_REQUEST['Category_id'];
      $res_Subject_groupid = $_REQUEST['Subject_group_id'];
      $res_Subjectid = $_REQUEST['Subject_id'];
      $res_Teacher_id = $_REQUEST['Teacher_id'];
      $res_Actual_fees = $_REQUEST['Actual_fees']; 
      $res_Joining_date = $_REQUEST['Joining_date'];
      $res_Month = substr($res_Joining_date,0,7);
      if(!empty($_REQUEST['Status']))
      {
        $res_status = $_REQUEST['Status'];
      }
      
      else
      {
        $res_status ='N';
      }
      

      
      $sqll="INSERT INTO `student_activity` SET 
              `Student_id`='$res_studentid' ,
              `Category_id`= '$res_Categoryid',
              `Subject_group_id`= '$res_Subject_groupid',
              `Subject_id`= '$res_Subjectid', 
              
              `Actual_fees`='$res_Actual_fees' ,
              `Joining_date`= '$res_Joining_date', 
              `Month`= '$res_Month' ,
              `Teacher_id`= '$res_Teacher_id' ,
              `Status`= '$res_status' ";  
      $rqs=mysqli_query($conn, $sqll);
      
      if($rqs)
        {
          unset($_SESSION['id']);
          unset($_SESSION['name']);
          unset($_SESSION['joindate']);
          session_destroy();
          @header("Location: index.php?msg=Successfull Insert");
		      exit();   		
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
    <script language="javascript" type="text/javascript">
      
    /*function showdt(){
      let joindate=document.getElementById('Joining_date').value;
      let month=joindate.slice(3,6);
      let day=joindate.slice(0,3);
      let year=joindate.slice(6);
      let final=month.concat(day);
      let finalized=final.concat(year);
      const months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
      const d= new date(finalized);
      let month = months[d.getMonth()];
      Month.value= month;
      let month = joindate.substring(0,7);
      document.paymentform.Month.focus()= month;
    
    }*/
    function checking()
		{
				if(document.getElementById('Student_name').value=='')
				{
					alert('Please enter your id!');
					document.paymentform.Student_name.focus();
					return false;
				}
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
				if(document.getElementById('Teacher_id').value=='')
				{
					alert('Please enter teacher name!');
					document.paymentform.Teacher_id.focus();
					return false;
				}		
				
        if(document.getElementById('Actual_fees').value=='')
				{
					alert('Please enter fees!');
					document.paymentform.Actual_fees.focus();
					return false;
				}	
        if(document.getElementById('Joining_date').value=='')
				{
					alert('Please enter admission date!');
					document.paymentform.Joining_date.focus();
					return false;
				}	
        
		}
    /*function changepage(val){
      window.location.href='student_activity.php?cid='+val;
    }*/
	</script>
</head>
<body>
<div class="form-box">
  <h1><a href="index.php"><i class="fa-solid fa-building-columns"></i></a></h1>
  <h1>Student Activity Form</h1>
  
  <form action="" name="paymentform" id="paymentform" method="post" onSubmit="return checking();">
    <input type="hidden" name="mode" value="1" />
    
    <div class="form-group">
      <label for="studentid">Student Name</label>
      <input class="form-control" id="Student_name" type="text" name="Student_name" value="<?php echo $name ?>"/>
    </div>
    <div class="form-group">
      <label for="categoryid">Category Name</label>
      <select class="form-control" name="Category_id" id="Category_id" onchange="subject_groupchk(this.value)" >
									<option value=""> Select Your Category</option>
									<?php while($c=mysqli_fetch_array($qut)){ ?>
									<option value="<?php echo $c['Category_id'] ?>"><?php echo $c['Category_name'] ?></option>
                  <?php } ?>
	    </select>
    </div>
    <div class="form-group">
      <label for="categoryid">Subject Group Name</label>
      <select class="form-control" name="Subject_group_id" id="Subject_group_id" onchange="subject_chk(this.value)"  >
									<option value=""> Select Your subject group</option>
									<?php  while($c=mysqli_fetch_array($que)){ ?>
                  <option value="<?php echo $c['Subject_group_id'] ?>" data-value="<?php echo $c['Category_id'] ?>" data-subb="<?php echo $c['Subject_group_name'] ?>"><?php echo $c['Subject_group_name'] ?></option>
                  <?php } ?>
	    </select>
    </div>
    <div class="form-group">
      <label for="subjectid">Subject Name</label>
      <select class="form-control" name="Subject_id" id="Subject_id" onchange="teacher_chk(this.value)">
									<option value=""> Select your subject</option>
									<?php  while($b=mysqli_fetch_array($quy)){ ?>
									<option value="<?php echo $b['Subject_id'] ?>" data-value="<?php echo $b['Subject_group_id'] ?>" data-sub="<?php echo $b['Subject_name'] ?>"><?php echo $b['Subject_name'] ?></option>
                  <?php } ?>
	    </select>
    </div>
    <div class="form-group">
    <label for="teacherid">Teacher Name</label>
      <select class="form-control" name="Teacher_id" id="Teacher_id" >
									<option value="">Select teacher</option>
									<?php while($d=mysqli_fetch_array($qup)){ ?>
                  <option value="<?php echo $d['Teacher_id'] ?>" data-value="<?php echo $d['Subject_id'] ?>" data-sub="<?php echo $d['Teacher_name'] ?>"><?php echo $d['Teacher_name'] ?></option>
                  <?php } ?>
	    </select>    
    </div>
    <div class="form-group">
      <label for="fees">Actual Fees</label>
      <input class="form-control" id="Actual_fees" type="int" name="Actual_fees"/>
    </div>
    <div class="form-group">
      <label for="joining-date">Join Date</label>
      <input class="form-control" id="Joining_date" type="date" name="Joining_date" min= "<?php echo $join_date ?>" max="<?php echo date("Y-m-d") ?>"/>
    </div>
      
    <input type="checkbox" name="Status" id="Status" value="Y" checked />Status
    <div class="but">
      <input class="btn btn-primary" type="submit" name="add" value="+" /><br> 
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
<script>
  const elem=document.getElementById('Subject_group_id').cloneNode(true);
  const ogg=elem.options;
  console.log(ogg);
  document.getElementById('Subject_group_id').innerHTML='<option value=""> Please Select a Category</option>';
  function subject_groupchk(vall){
    document.getElementById('Subject_group_id').innerHTML='<option value=""> Please Select a Subject Group</option>';
  
    for(let j of ogg)
    {
      if(j.dataset)
      console.log(j.dataset.value)
       if(j.dataset.value===vall)
      document.getElementById('Subject_group_id').innerHTML+=`<option value="${j.value}"> ${j.dataset.subb}</option>`; 
    }
  }
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

  const el=document.getElementById('Teacher_id').cloneNode(true);
  const ogy=el.options;
  console.log(ogy);
  document.getElementById('Teacher_id').innerHTML='<option value=""> Please Select a Subject</option>';
  function teacher_chk(val){
    document.getElementById('Teacher_id').innerHTML='<option value=""> Please Select a Teacher</option>';
  
    for(let k of ogy)
    {
      if(k.dataset)
      console.log(k.dataset.value)
       if(k.dataset.value===val)
      document.getElementById('Teacher_id').innerHTML+=`<option value="${k.value}"> ${k.dataset.sub}</option>`; 
    }
  }
		
</script>
</body>
</html>