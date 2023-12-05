
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
      body{
        background-color:turquoise;
      }
        .navbar,
        .navbar-collapse {
        flex-direction: column;
        }
        .navbar-expand-lg .navbar-nav {
        flex-direction: column;
        }
        .navbar .container-fluid, 
        .navbar-expand-lg .navbar-collapse, 
        .navbar-expand-lg .navbar-nav{
        flex-direction: column;
        align-items: flex-start;
        }
        .navbar-brand {
           
            border-bottom: 4px solid #464646;
        }
        
    </style>
</head>
<body>
  
<div class="navigation" >
<nav class="navbar navbar-expand-lg navbar-light" class="mx-auto" >
  <a class="navbar-brand" href="#">Institute</a>
  
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item">
        <a class="nav-link" href="subject_category.php">Category</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="subject_group.php">Subject Group</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="subject_master.php">Subject Name</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="student_list.php">Student List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="home.php">Student Registration</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="fees_history.php">Fees History</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="fees_update.php">Fees Update</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="teacher.php">Teacher Registration</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="teacher_payment.php">Teacher Payment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="teacher_transfer.php">Teacher Transfer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="income.php">Income</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="expenditure.php">Expenditure</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="income_list.php">Income History Table</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="total_income_report.php">Income report Table</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="expenditure_list.php">Expenditure History Table</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="total_expen_report.php">Expenditure report Table</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="debit_credit.php">Credit-Debit Table</a>
      </li>
    </ul>
    

</nav>
</div>
</body>

</html>