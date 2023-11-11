<?php 

session_start();
session_reset();

include("conn.php");
if(mysqli_connect_errno()){
        echo "failed to connect to mysql" . mysqli_connect_error();
}


    $count="SELECT COUNT(*) AS 'count'  FROM  `student_registration`";
    $cnt=mysqli_query($conn,$count);
    $m=mysqli_fetch_array($cnt);

  if(!empty($_REQUEST['mode']))
    {  
      $studentname = $_REQUEST['Student_name'];
      $res_studentname = ucwords($studentname);
      $res_Studentregno = $_REQUEST['Student_reg_no'];
      $res_Phoneno = $_REQUEST['Phone_no'];
      $res_GuardianPhone = $_REQUEST['Guardian_Phone']; 
      $Address = $_REQUEST['Address'];
      $res_Address = ucwords($Address);
      $res_Emailid = $_REQUEST['Email'];
      $res_Gender = $_REQUEST['Gender']; 
      $res_Joiningdate = $_REQUEST['Joining_date'];
      $res_Class = $_REQUEST['Class'];
      $res_birthdate = $_REQUEST['Date_of_birth']; 
      if(!empty($_REQUEST['Status']))
      {
        $res_status = $_REQUEST['Status'];
      }
      
      else
      {
        $res_status ='N';
      }
      
      $sql_con="INSERT INTO `student_registration` SET 
              `Student_name`='$res_studentname' ,
              `Student_reg_no`= '$res_Studentregno', 
              `Phone_no`= '$res_Phoneno' , 
              `Guardian_Phone`='$res_GuardianPhone' ,
              `Address`= '$res_Address', 
              `Email`= '$res_Emailid' , 
              `Gender`='$res_Gender' ,
              `Joining_date`= '$res_Joiningdate', 
              `Class`= '$res_Class' , 
              `Date_of_birth`='$res_birthdate' ,
              `Status`= '$res_status'  ";  
      $res=mysqli_query($conn, $sql_con);
      $rem="SELECT * FROM  `student_registration` WHERE Student_reg_no='$res_Studentregno'  ORDER BY `Student_id`";
      
      $quey=mysqli_query($conn,$rem);
      $id=mysqli_fetch_array($quey);
      $ID=$id['Student_id'];
      $Name=$id['Student_name'];
      $join=$id['Joining_date'];
      if($res)
        {
          $_SESSION['id']=$ID;
          $_SESSION['name']=$Name;
          $_SESSION['joindate']=$join;
          @header("Location: student_activity.php");
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
    <link rel = "stylesheet" href="student_reg.css" >
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script language="javascript" type="text/javascript">
      
		function checking()
		{
      let mob = document.getElementById('Phone_no').value;
      let  mobile = mob.trim();
      
				if(document.getElementById('Student_name').value=='')
				{
					alert('Please enter  your name!');
					document.subjectform.Student_name.focus();
					return false;
				}
				if(document.getElementById('Student_reg_no').value=='')
				{
					alert('Please enter registration no!');
					document.subjectform.Student_reg_no.focus();
					return false;
				}
        if(document.getElementById('Phone_no').value=='')
				{
					alert('Please enter your phone no!');
					document.subjectform.Phone_no.focus();
					return false;
				}
        else if(mobile.length > 10){
          alert('Please enter valid phone no !');
					document.subjectform.Phone_no.focus();
					return false;
        }
        else{
          alert("ok");
        }
				if(document.getElementById('Guardian_Phone').value=='')
				{
					alert('Please enter Guardian phone no!');
					document.subjectform.Guardian_Phone.focus();
					return false;
				}
        if(document.getElementById('Address').value=='')
				{
					alert('Please enter Address no!');
					document.subjectform.Address.focus();
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
        
		}
	</script>
</head>
<body>
<div class="form-box">
  <h1><a href="index.php"><i class="fa-sharp fa-solid fa-id-card"></i></a></h1>
  <h1>Student Registration Form</h1>
  
  <form action="" name="subjectform" id="subjectform" method="post" onSubmit="return checking();">
    <input type="hidden" name="mode" value="1" />
    <div class="form-group">
      <label for="student-name">Student Name *</label>
      <input class="form-control" id="Student_name" type="text" name="Student_name" style="text-transform: capitalize;" placeholder='Enter your name (mandatory fields)'>
    </div>
    <div class="form-group">
      <label for="registration-id">Registration Id</label>
      <input class="form-control" id="Student_reg_no" type="text" name="Student_reg_no" value="STUD<?php if($m)
    {
      echo $m['count']+1;  
    } else echo 1;?>" readonly>
    </div>
    <div class="form-group">
      <label for="student-name">Phone-No *</label>
      <input class="form-control" id="Phone_no" type="integer" name="Phone_no" placeholder='Enter your Phone no (mandatory fields)'>
    </div>
    <div class="form-group">
      <label for="student-name">Guardian Phone-No *</label>
      <input class="form-control" id="Guardian_Phone" type="integer" name="Guardian_Phone" placeholder='Enter your guardian`s contact no (mandatory fields)'>
    </div>
    <div class="form-group">
      <label for="address">Address *</label>
      <input class="form-control" id="Address" type="text" name="Address" style="text-transform: capitalize;" placeholder='Enter your address (mandatory fields)'>
    </div>
    <div class="form-group">
      <label for="email">Email-Id</label>
      <input class="form-control" id="Email" type="email" name="Email">
    </div>
    <div class="form-group">
      <label for="Gender">Gender *</label>
      <select class="form-control" name="Gender" id="Gender" placeholder='Enter your gender (mandatory fields)' >
									<option value="">Enter your gender (mandatory fields) </option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
			</select>
    </div>
    <div class="form-group">  
      <label for="joindate">Admission Date *</label>
      <input class="form-control" id="Joining_date" type="date" name="Joining_date" placeholder='Enter your admission date(mandatory fields)' max="<?php echo date("Y-m-d") ;?>" required >
      
    </div>
    <div class="form-group">
      <label for="class">Class *</label>
      <select class="form-control" name="Class" id="Class" placeholder='Enter your class (mandatory fields)'>
									<option value="">Enter your class (mandatory fields)</option>
									<option value="1">1</option>
									<option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
									<option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
									<option value="12">12</option>
                  <option value="1st-Year">1st year</option>
                  <option value="2nd-Year">2nd year</option>
                  <option value="3rd-Year">3rd year</option>
                  <option value="4th-Year">4th year</option>
			</select>
    </div>
    <div class="form-group">  
      <label for="birthday">Date-Of-Birth</label>
      <input class="form-control"  id="Date_of_birth" type="date" name="Date_of_birth" max="<?php echo date("Y-m-d") ;?>" >
    </div>
    <input type="checkbox" name="Status" id="Status" value="Y" checked /> Status

    <div class="but">
      <input class="btn btn-primary" type="submit" value="Next" />
    </div>
    
  </form>
</div>
</body>
</html>