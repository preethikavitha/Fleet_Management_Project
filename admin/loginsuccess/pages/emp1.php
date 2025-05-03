<?php
include('../dbcon.php');
if(isset($_COOKIE['id'])){
    $id=$_COOKIE['id'];
 }
if($conn->connect_error)
  {
    die("connection failed".$conn->connect_error);
  }
    if(isset($_POST['save']))
    {
        $id=$_POST['id'];
        $name=$_POST['name'];
        $age=$_POST['age'];
        $sql="INSERT INTO driver (empid,empname,age) VALUES ('$id','$name','$age')";
      $conn->query($sql);
      if($sql)
      {
        setcookie('id',$id,time()+60*60); 
        
  header('location:emp2.php');
  exit(); 
    
      }
      else
      {
          $_SESSION['status']="Something Problem in Insertion";
      }
  
        
        
      }
  ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootstrap JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        *{
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}
img#img_path-field{
    max-height: 15vh;
    max-width: 8vw;
  }

/*form{
    box-shadow: 2px 6px 100px #ffffff;
}*/
    </style>
    <title>Driver Information</title>
  </head>
  <body>
  <link rel="stylesheet" href="forerror.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <?php
include('sidenav.php'); 
?>
 <div class="container-fluid text-light py-3">
   
   </div>
   <section class="container my-2 bg-gray-100 w-60 text-light p-2" style="border-radius:20px;">
 <center><h4>Personal Infomation</h4></center>

    <form class="row g-3 p-3 needs-validation" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" novalidate>
        <div class="col-md-12 form-group1">
            <label for="EmployeeID" class="form-label text-dark"><b>EmployeeID</b></label>
            <input type="text" class="form-control bg-light"  id="EmployeeID"   placeholder="  Enter Employee ID" name="id" required>
          
            <div class="invalid-feedback">
      Please provide data.
    </div>
          </div>
          <div class="col-md-12 form-group1">
            <label for="EmployeeName" class="form-label text-dark"><b>EmployeeName</b></label>
            <input type="text" class="form-control bg-light" id="EmployeeName"   placeholder="  Enter Employee Name" name="name" required>
            <div class="invalid-feedback">
      Please provide data.
    </div>
          </div>
          <div class="col-md-12 form-group1">
          <label for="Age" class="form-label text-dark"><b>Age</b></label>
          <input type="number" class="form-control  bg-light" placeholder="  Enter Employee Age" id="Age" min="18" name="age" required>
          <div class="invalid-feedback">
      Please provide data
    </div>
        </div>
          <div class="col-12">
         <button type="submit" class="btn btn-primary" value="Save" name="save" id="save">submit</button>
  </div>
      </form>
   </section>
   <?php include("footernav.php")?>
   <script>
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
</script>

  </body>
</html>
