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
    $rem= "SELECT * FROM `subject_category` ORDER BY `Category_id`";
    $sql= mysqli_query($conn,$rem);

    $ron= "SELECT * FROM `subject_group` ORDER BY `Subject_group_id`";
    $spl= mysqli_query($conn,$ron);

    if(!empty($_REQUEST['mode']))
    { 
      $res_categoryid = $_REQUEST['Category_id'];
      $res_subjectgroupid = $_REQUEST['Subject_group_id']; 
      $res_subject = $_REQUEST['Subject_name']; 
      
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
      const word = document.getElementById('Subject_name').value;
      const capitalized =word.charAt(0).toUpperCase() + word.slice(1);
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
        else{
          document.getElementById('Subject_name').value=capitalized;
        }
				
					
		}
	</script>
</head>
<body>
<div class="form-box">
  <h1><a href="home.php"><i class="fa-solid fa-building-columns"></i></a></h1>
  <h1>Subject Form</h1>
  <form action="" name="subjectform" id="subjectform" method="post" onSubmit="return checking();">
  <input type="hidden" name="mode" value="1" />
  
  <div class="form-group">
      <label for="Domain-name">Category Name</label>
      <select class="form-control" name="Category_id" id="Category_id" >
									<option value=""> Select your Category Name</option>
                  <?php while($arr = mysqli_fetch_array($sql)) { ?>
									<option value="<?php echo $arr['Category_id'] ; ?>" ><?php echo $arr['Category_name'] ; ?></option>								
                  <?php } ?>
			</select>
    </div>
    <div class="form-group">
      <label for="category-type">Subject Group Name</label>
      <select class="form-control" name="Subject_group_id" id="Subject_group_id" >
              <option value=""> Select your Category Name</option>
              <?php while($b = mysqli_fetch_array($spl)) { ?>
							<option value="<?php echo $b['Subject_group_id'] ; ?>" ><?php echo $b['Subject_group_name'] ; ?></option>								
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
</body>
</html>