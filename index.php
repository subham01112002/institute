
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
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
<nav class="navbar navbar-expand-lg navbar-light" class="mx-auto"  style="background-color:turquoise;" style="widt">
  <a class="navbar-brand" href="#">Institute</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
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
        <a class="nav-link" href="index.php">Student Registration</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="student_activity.php">Student activity</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="teacher.php">Teacher Registration</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="teacher_activity.php">Teacher activity</a>
      </li>
    </ul>
    
  </div>
</nav>
</div>
</body>

</html>