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

    if(!empty($_REQUEST['mode']))
    {  
      $categoryname = $_REQUEST['Category_name'];
      $res_categoryname = ucwords($categoryname);
      if(!empty($_REQUEST['Status']))
      {
        $res_status = $_REQUEST['Status'];
      }
      
      else
      {
        $res_status ='N';
      }
      
      $sql_con="INSERT INTO `subject_category` SET 
                `Category_name`= '$res_categoryname',
                `Status`= '$res_status' ";  
      $res=mysqli_query($conn, $sql_con);
      
      if($res)
        {
          @header("Location: subject_category.php?msg=Successfull Insert");
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
				if(document.getElementById('Category_name').value=='')
				{
					alert('Please enter category!');
					document.subjectform.Category_name.focus();
					return false;
				}
		}
	</script>
</head>
<body>

<div class="form-box">
  <h1><a href="index.php"><i class="fa-solid fa-building-columns"></i></a></h1>
  <h1>Subject Category Form</h1>
  
  <form action="" name="subjectform" id="subjectform" method="post" onSubmit="return checking();">
    <input type="hidden" name="mode" value="1" />
    <div class="form-group">
      <label for="category-type">Category Name</label>
      <input class="form-control" id="Category_name" type="text" name="Category_name" style="text-transform: capitalize;" placeholder='Enter your category here'/>
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