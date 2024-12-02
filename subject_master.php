<?php 
    include("conn.php");
    if(mysqli_connect_errno()){
        echo "failed to connect to mysql" . mysqli_connect_error();
    }
    if(!empty($_REQUEST['msg']))
    {  
      $mspg = $_REQUEST['msg'];  
    } 
    else
    {   
      $mspg  = ""; 
    } 
    $req=" SELECT * FROM  `subject_category` ORDER BY `Category_id`";
    $qut=mysqli_query($conn,$req);

    $rem=" SELECT * FROM  `subject_group`  ORDER BY `Subject_group_id`";
    $que=mysqli_query($conn,$rem);

    if(!empty($_REQUEST['mode']))
    { 
      $res_categoryid = $_REQUEST['Category_id'];
      $res_subjectgroupid = $_REQUEST['Subject_group_id']; 
      $subject = $_REQUEST['Subject_name']; 
      $res_subject = ucwords($subject);
      
      if(!empty($_REQUEST['Status']))
      {
        $res_status = $_REQUEST['Status'];
      }
      
      else
      {
        $res_status ='N';
      }
      
      $sql_con="INSERT INTO `subject_master` SET 
              `Category_id`= '$res_categoryid', 
              `Subject_group_id`=$res_subjectgroupid,
              `Subject_name`='$res_subject' ,             
              `Status`= '$res_status' ";  
      $res=mysqli_query($conn, $sql_con);
      if($res)
        {
          @header("Location: subject_master.php?msg=Sucessfull Insert");
		      exit(); 
        }
        
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href="master.css" >
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <script language="javascript" type="text/javascript">
		function checking()
		{
      if(document.getElementById('Category_id').value=='')
				{
					alert('Please enter category name!');
					document.subjectform.Category_id.focus();
					return false;
				}
      if(document.getElementById('Subject_group_id').value=='')
				{
					alert('Please enter category name!');
					document.subjectform.Subject_group_id.focus();
					return false;
				}
			if(document.getElementById('Subject_name').value=='')
				{
					alert('Please enter subject name type!');
					document.subjectform.Subject_name.focus();
					return false;
				}		
		}
	</script>
</head>
<body>
<div class="form-box">
  <h1><a href="index.php"><i class="fa-solid fa-building-columns"></i></a></h1>
  <h1>Subject Form</h1>
  <form action="" name="subjectform" id="subjectform" method="post" onSubmit="return checking();">
  <input type="hidden" name="mode" value="1" />
  
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
      <select class="form-control" name="Subject_group_id" id="Subject_group_id"  >
									<option value=""> Select Your subject group</option>
									<?php  while($c=mysqli_fetch_array($que)){ ?>
                  <option value="<?php echo $c['Subject_group_id'] ?>" data-value="<?php echo $c['Category_id'] ?>" data-subb="<?php echo $c['Subject_group_name'] ?>"><?php echo $c['Subject_group_name'] ?></option>
                  <?php } ?>
	    </select>
    </div>
    <div class="form-group">
      <label for="subject-name">Subject</label>
      <input class="form-control" id="Subject_name" type="text" name="Subject_name" style="text-transform: capitalize;" placeholder='Enter your subject here'>
    </div>
    
    
      <input type="checkbox" name="Status" id="Status" value="Y" checked /> Status
    
      <div class="button">
        <input class="btn btn-primary" type="submit" value="Submit" />
    </div>
  </form>
  <table border="0" align="center"  >
		<tr>
			<td style="color:#FF0000;">&nbsp;<?php echo $mspg; ?></td>   			 
		</tr>
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
  </script>
</body>
</html>