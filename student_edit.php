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
    if(!empty($_REQUEST['mode']) && !empty($_REQUEST['add']))
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
     
          @header("Location:student_add_sub.php?id=$id");
          exit(); 		
    }  
          if(!empty($_REQUEST['mode']) && !empty($_REQUEST['submit']))
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
           
                @header("Location:student_list.php");
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
        /*if(document.getElementById('Date_of_birth').value=='')
				{
					alert('Please enter the birth date!');
					document.subjectform.Date_of_birth.focus();
					return false;
				}*/		

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
									<option value="Male" <?php if($data['Gender']=="Male") echo "selected" ?>>Male</option>
									<option value="Female" <?php if($data['Gender']=="Female") echo "selected" ?>>Female</option>
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
                  <option value="no class" <?php if($data['Class']=="no class") echo "selected" ?>>no class</option>
                  <option value="1st Level" <?php if($data['Class']=="1st Level") echo "selected" ?>>1st Level</option>
                  <option value="2nd level" <?php if($data['Class']=="2nd level") echo "selected" ?>>2nd level</option>
                  <option value="3rd Level" <?php if($data['Class']=="3rd Level") echo "selected" ?>>3rd Level</option>
                  <option value="4th Level" <?php if($data['Class']=="4th Level") echo "selected" ?>>4th Level</option>
                  <option value="5th Level" <?php if($data['Class']=="5th Level") echo "selected" ?>>5th Level</option>
                  <option value="6th Level" <?php if($data['Class']=="6th Level") echo "selected" ?>>6th Level</option>
                  <option value="7th Level" <?php if($data['Class']=="7th Level") echo "selected" ?>>7th Level</option>
                  <option value="8th Level" <?php if($data['Class']=="8th Level") echo "selected" ?>>8th Level</option>
                  <option value="NUR" <?php if($data['Class']=="NUR") echo "selected" ?>>NUR</option>
                  <option value="PP1" <?php if($data['Class']=="PP1") echo "selected" ?>>PP1</option>
                  <option value="PP2" <?php if($data['Class']=="PP2") echo "selected" ?>>PP2</option>
                  <option value="PP3" <?php if($data['Class']=="PP3") echo "selected" ?>>PP3</option>
                  <option value="1" <?php if($data['Class']=="1") echo "selected" ?>>1</option>
									<option value="2" <?php if($data['Class']=="2") echo "selected" ?>>2</option>
                  <option value="3" <?php if($data['Class']=="3") echo "selected" ?>>3</option>
                  <option value="4"<?php if($data['Class']=="4") echo "selected" ?>>4</option>
                  <option value="5"<?php if($data['Class']=="5") echo "selected" ?>>5</option>
                  <option value="6"<?php if($data['Class']=="6") echo "selected" ?>>6</option>
									<option value="7"<?php if($data['Class']=="7") echo "selected" ?>>7</option>
                  <option value="8"<?php if($data['Class']=="8") echo "selected" ?>>8</option>
                  <option value="9"<?php if($data['Class']=="9") echo "selected" ?>>9</option>
                  <option value="10"<?php if($data['Class']=="10") echo "selected" ?>>10</option>
                  <option value="11"<?php if($data['Class']=="11") echo "selected" ?>>11</option>
									<option value="12"<?php if($data['Class']=="12") echo "selected" ?>>12</option>
                  <option value="1st-Year" <?php if($data['Class']=="1st-Year") echo "selected" ?> >1st year</option>
                  <option value="2nd-Year" <?php if($data['Class']=="2nd-Year") echo "selected" ?>>2nd year</option>
                  <option value="3rd-Year" <?php if($data['Class']=="3rd-Year") echo "selected" ?>>3rd year</option>
                  <option value="4th-Year" <?php if($data['Class']=="4th-Year") echo "selected" ?>>4th year</option>
                  <option value="5TH" <?php if($data['Class']=="5TH") echo "selected" ?>> 5TH</option>
                  <option value="6TH" <?php if($data['Class']=="6TH") echo "selected" ?>> 6TH</option>
                  <option value="7th" <?php if($data['Class']=="7th") echo "selected" ?>> 7th</option>
                  <option value="8TH" <?php if($data['Class']=="8TH") echo "selected" ?>> 8TH</option>
                  <option value="G" <?php if($data['Class']=="G") echo "selected" ?>>G</option>
			</select>
    </div>
    <div class="form-group">  
      <label for="birthday">Date-Of-Birth</label>
      <input class="form-control"  id="Date_of_birth" value="<?php echo $data['Date_of_birth']?>" type="date" name="Date_of_birth">
    </div>
    <div class="but">
      <input class="btn btn-primary" type="submit" value="Add Subject" name="add"  />
    </div>
    <div class="but">
      <input class="btn btn-primary" type="submit" value="Submit" name="submit"/>
    </div>
    
  </form>
</div>
</body>
</html>