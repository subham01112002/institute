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
      $res_payment_phone = $_REQUEST['payment_phone'];
      $payment_name = $_REQUEST['payment_name'];
      $res_payment_name = ucwords($payment_name);
      $res_pay_amt = $_REQUEST['payment_amt'];
      $payment_purpose = $_REQUEST['payment_purpose'];
      $res_payment_purpose = ucwords($payment_purpose);
      $res_paid_by = $_REQUEST['paid_by'];
      $res_payment_date = $_REQUEST['payment_date'];
      $m=date("m");
      if($m == 1)
      {
        $res_payment_month = 'Jannuary';
      }
      elseif($m == 2)
      {
        $res_payment_month = 'February';
      }
      elseif($m == 3)
      {
        $res_payment_month = 'March';
      }
      elseif($m == 4)
      {
        $res_payment_month = 'April';
      }
      elseif($m == 5)
      {
        $res_payment_month = 'May';
      }
      elseif($m == 6)
      {
        $res_payment_month = 'June';
      }
      elseif($m == 7)
      {
        $res_payment_month = 'July';
      }
      elseif($m == 8)
      {
        $res_payment_month = 'August';
      }
      elseif($m == 9)
      {
        $res_payment_month = 'September';
      }
      elseif($m == 10)
      {
        $res_payment_month = 'October';
      }
      elseif($m == 11)
      {
        $res_payment_month = 'November';
      }
      elseif($m == 12)
      {
        $res_payment_month = 'December';
      }
      else{
        @header("Location: expenditure.php");
      }

      $sql_con="INSERT INTO `expenditure` SET 
                `payment_name`= '$res_payment_name',
                `payment_phone`= '$res_payment_phone',
                `payment_amt`= '$res_pay_amt',
                `payment_purpose`= '$res_payment_purpose',
                `paid_by`= '$res_paid_by',
                `payment_date`= '$res_payment_date',
                `payment_month`= '$res_payment_month' ";  
      $res=mysqli_query($conn, $sql_con);
      
      if($res)
        {
          @header("Location: expenditure.php?msg=Successfull Insert");
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
      let mob = document.getElementById('payment_phone').value;
      let  mobile = mob.trim();
        if(mobile.length != 10)
				{
					alert('Please enter phone no!');
					document.payment.payment_phone.focus();
					return false;
				}
        if(document.getElementById('payment_name').value=='')
				{
					alert('Please enter category!');
					document.payment.payment_name.focus();
					return false;
				}
        if(document.getElementById('payment_amt').value=='')
				{
					alert('Please enter category!');
					document.payment.payment_amt.focus();
					return false;
				}
        if(document.getElementById('payment_purpose').value=='')
				{
					alert('Please enter purpose!');
					document.payment.payment_purpose.focus();
					return false;
				}
        if(document.getElementById('paid_by').value=='')
				{
					alert('Please select payment method !');
					document.payment.paid_by.focus();
					return false;
				}
        if(document.getElementById('payment_date').value=='')
				{
					alert('Please enter date!');
					document.payment.payment_date.focus();
					return false;
				}
                
    }
	</script>
</head>
<body>

<div class="form-box">
  <h1><a href="index.php"><i class="fa-solid fa-building-columns"></i></a></h1>
  <h1>EXPENDITURE</h1>
  
  <form action="" name="payment" id="payment" method="post" onSubmit="return checking();">
    <input type="hidden" name="mode" value="1" />
    
    <div class="form-group">
      <label for="category-type">Payment Phone Number :</label>
      <input class="form-control" id="payment_phone" type="text" name="payment_phone" style="text-transform: capitalize;" placeholder='Enter your phone no here'/>
    </div> 
    <div class="form-group">
      <label for="category-type">Payment Name :</label>
      <input class="form-control" id="payment_name" type="int" name="payment_name" style="text-transform: capitalize;" placeholder='Enter your payment name'/>
    </div> 
    <div class="form-group">
      <label for="category-type">Payment Amount :</label>
      <input class="form-control" id="payment_amt" type="int" name="payment_amt" style="text-transform: capitalize;" placeholder='Enter your amount here'/>
    </div> 
    <div class="form-group">
      <label for="category-type">Payment Purpose :</label>
      <input class="form-control" id="payment_purpose" type="text" name="payment_purpose" style="text-transform: capitalize;" />
    </div> 
    <div class="form-group">
      <label for="category-type">Paid By :</label>
      <select class="form-control" name="paid_by" id="paid_by" >
              <option value=""> Select Payment Method</option>  
              <option value="Cash"> Cash</option>
              <option value="Cheque"> Cheque</option>
	    </select>
    </div> 
    <div class="form-group">
      <label for="category-type">Payment Date :</label>
      <input class="form-control" id="payment_date" type="date" name="payment_date"  value="<?php echo date("Y-m-d")?>" max="<?php echo date("Y-m-d")?>" />
    </div>     
    
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