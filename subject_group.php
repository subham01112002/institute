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

    $sql_que="SELECT * FROM `subject_category` ORDER BY `Category_id`";
    $rem=mysqli_query($conn, $sql_que);

    if(!empty($_REQUEST['mode']))
    {  
      $res_category_id = $_REQUEST['Category_id']; 
      $res_subject_typename = $_REQUEST['Subject_group_name'];
      if(!empty($_REQUEST['Status']))
      {
        $res_status = $_REQUEST['Status'];
      }
      
      else
      {
        $res_status ='N';
      }
      
      $sql_con="INSERT INTO `subject_group` SET 
              `Category_id`='$res_category_id' ,
              `Subject_group_name`= '$res_subject_typename' ,
              `Status`= '$res_status'  ";  
      $res=mysqli_query($conn, $sql_con);
      
      if($res)
        {
          @header("Location: subject_group.php?msg=Successfull Insert");
		      exit();  		
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="category.css" >
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <script language="javascript" type="text/javascript">
		function checking()
		{
      const word = document.getElementById('Subject_group_name').value;
      const capitalized =word.charAt(0).toUpperCase() + word.slice(1);
				if(document.getElementById('Category_id').value=='')
				{
					alert('Please enter category!');
					document.subjectform.Category_id.focus();
					return false;
				}
				if(document.getElementById('Subject_group_name').value=='')
				{
					alert('Please enter domain name!');
					document.subjectform.Subject_group_name.focus();
					return false;
				}	
        else{
          document.getElementById('Subject_group_name').value = capitalized;
        }
		}
	</script>
</head>
<body>

<div class="form-box">
  <h1><a href="index.php"><i class="fa-solid fa-building-columns"></i></a></h1>
  <h1>Subject Group Form</h1>
  
  <form action="" name="subjectform" id="subjectform" method="post" onSubmit="return checking();">
    <input type="hidden" name="mode" value="1" />
    
    <div class="form-group">
      <label for="category-name">Category Name</label>
      <select class="form-control" name="Category_id" id="Category_id" >
          <option value=""> Select your category </option>
          <?php  while($arr=mysqli_fetch_array($rem)){ ?>
          <option value="<?php echo $arr['Category_id']?> "><?php echo $arr['Category_name']?></option>
          <?php } ?>
			</select>
    </div>
    <div class="form-group">
      <label for="category-name">Subject Group Name</label>
      <input class="form-control" id="Subject_group_name" type="text" name="Subject_group_name" style="text-transform: capitalize;" placeholder='Enter your subject group here'/>
    </div>
    <input type="checkbox" name="Status" id="Status" value="Y" checked /> Status
    <div class="but">
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