<?php 

session_start();
session_reset();
if(empty($_REQUEST['stud']))
{
    @header("Location : student_list.php");
    exit();
}
$id=$_REQUEST['stud'];
include("conn.php");
   if(mysqli_connect_errno()){
        echo "failed to connect to mysql" . mysqli_connect_error();
    }
    $data=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM student_registration WHERE Student_id='$id'"));
    if(!empty($_REQUEST['mode']))
    {  
      $res_studentname = $_REQUEST['Student_name']; 
      $res_Studentregno = $_REQUEST['Student_reg_no'];
      $res_Phoneno = $_REQUEST['Phone_no'];
      $res_GuardianPhone = $_REQUEST['Guardian_Phone']; 
      $res_Address = $_REQUEST['Address'];
      $res_Emailid = $_REQUEST['Email'];
      $res_Gender = $_REQUEST['Gender']; 
      $res_Joiningdate = $_REQUEST['Joining_date'];
      $res_Class = $_REQUEST['Class'];
      $res_birthdate = $_REQUEST['Date_of_birth']; 
      
      $sql_con="UPDATE  `student_registration` SET 
              `Student_name`='$res_studentname' ,
              `Student_reg_no`= '$res_Studentregno', 
              `Phone_no`= '$res_Phoneno' , 
              `Guardian_Phone`='$res_GuardianPhone' ,
              `Address`= '$res_Address', 
              `Email`= '$res_Emailid' , 
              `Gender`='$res_Gender' ,
              `Joining_date`= '$res_Joiningdate', 
              `Class`= '$res_Class' , 
              `Date_of_birth`='$res_birthdate' WHERE Student_id='$id'";  
      $res=mysqli_query($conn, $sql_con);
     
          @header("Location: student_list.php");
          exit(); 		
        
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href="student_reg.css" >
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script language="javascript" type="text/javascript">
		function checking()
		{
      const word = document.getElementById('Student_name').value;
      const capitalized =word.charAt(0).toUpperCase() + word.slice(1);
  
				if(document.getElementById('Student_name').value=='')
				{
					alert('Please enter  your name!');
					document.subjectform.Student_name.focus();
					return false;
				}
        else{
          document.getElementById('Student_name').value = capitalized;
        }
				if(document.getElementById('Student_reg_no').value=='')
				{
					alert('Please enter registration no!');
					document.subjectform.Student_reg_no.focus();
					return false;
				}
				
				if(document.getElementById('Gender').value=='')
				{
					alert('Please select your gender!');
					document.subjectform.Gender.focus();
					return false;
				}		
        if(document.getElementById('Joining_date').value=='')
				{
					alert('Please provide admission date!');
					document.subjectform.Joining_date.focus();
					return false;
				}		
        if(document.getElementById('Class').value=='')
				{
					alert('Please enter the class!');
					document.subjectform.Class.focus();
					return false;
				}		
        if(document.getElementById('Date_of_birth').value=='')
				{
					alert('Please enter the birth date!');
					document.subjectform.Date_of_birth.focus();
					return false;
				}		

		}
	</script>
</head>
<body>
<div class="form-box">
  <h1><i class="fa-sharp fa-solid fa-id-card"></i></h1>
  <h1>Student Registration Form</h1>
  
  <form action="" name="subjectform" id="subjectform" method="post" onSubmit="return checking();">
    <input type="hidden" name="mode" value="1" />
    <div class="form-group">
      <label for="student-name">Student Name</label>
      <input class="form-control" id="Student_name" type="text" value="<?php echo $data['Student_name']?>" name="Student_name" style="text-transform: capitalize;" placeholder='Enter your name'>
    </div>
    <div class="form-group">
      <label for="registration-id">Registration Id</label>
      <input class="form-control" id="Student_reg_no" value="<?php echo $data['Student_reg_no']?>" type="text" name="Student_reg_no">
    </div>
    <div class="form-group">
      <label for="student-name">Phone-No</label>
      <input class="form-control" id="Phone_no" value="<?php echo $data['Phone_no']?>" type="integer" name="Phone_no">
    </div>
    <div class="form-group">
      <label for="student-name">Guardian Phone-No</label>
      <input class="form-control" id="Guardian_Phone" value="<?php echo $data['Guardian_phone']?>"  type="integer" name="Guardian_Phone">
    </div>
    <div class="form-group">
      <label for="address">Address</label>
      <input class="form-control" id="Address" value="<?php echo $data['Address']?>" type="text" name="Address">
    </div>
    <div class="form-group">
      <label for="email">Email-Id</label>
      <input class="form-control" id="Email" value="<?php echo $data['Email']?>" type="email" name="Email">
    </div>
    <div class="form-group">
      <label for="Gender">Gender</label>
      <select class="form-control" name="Gender" id="Gender" >
									<option value=""> </option>
									<option value="male" <?php if($data['Gender']=="male") echo "selected" ?>>Male</option>
									<option value="female" <?php if($data['Gender']=="female") echo "selected" ?>>Female</option>
			</select>
    </div>
    <div class="form-group">  
      <label for="joindate">Admission Date</label>
      <input class="form-control"  id="Joining_date" value="<?php echo $data['Joining_date']?>" type="date" name="Joining_date">
      
    </div>
    <div class="form-group">
      <label for="class">Class</label>
      <select class="form-control" name="Class" id="Class" >
									<option value=""> </option>
									<option value="1" <?php if($data['Class']=="1") echo "selected" ?>>1</option>
									<option value="2" <?php if($data['Class']=="2") echo "selected" ?>>2</option>
			</select>
    </div>
    <div class="form-group">  
      <label for="birthday">Date-Of-Birth</label>
      <input class="form-control"  id="Date_of_birth" value="<?php echo $data['Date_of_birth']?>" type="date" name="Date_of_birth">
    </div>
    <div class="but">
      <input class="btn btn-primary" type="submit" value="Submit" />
    </div>
    
  </form>
</div>
</body>
</html>