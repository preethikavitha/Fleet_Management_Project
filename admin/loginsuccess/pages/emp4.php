<?php
include('../dbcon.php');

if($conn->connect_error)
  {
    die("connection failed".$conn->connect_error);
  }
    if(isset($_COOKIE['id'])){
        $id=$_COOKIE['id'];
       
        
     }
    
    
    if(isset($_POST['save']))
    {
        $jndate=$_POST['jndate'];
        $salary=$_POST['salary'];
        $type=$_POST['type'];
        $typeplace=$_POST['typeplace'];
        $category=$_POST['category'];
        $instype=$_POST['instype'];
        $sql="UPDATE driver SET driveplace='$typeplace',drivetime='$type',salary=$salary,joindate='$jndate',isInsurance='$instype',category='$category' WHERE empid='$id'";
        $conn->query($sql);
        if($sql)
        {
          
          header('location:emp3.php');
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
    <title>Form Design</title>
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
 <center><h3>Driving Details</h3></center>
 <h5 style="text-align:center">EMPLOYEE ID:<?php echo $_COOKIE['id'];?></h5>
    <form class="row g-3 p-3 needs-validation" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" novalidate>
    
        <div class="col-md-6 form-group1">
         
        <label for="EmployeePlace" class="form-label text-dark"><b>Drive Place</b></label>
          <select id="EmployeeType" class="form-select bg-light" name="typeplace" required>
            <option  selected disabled value="">   Choose...</option>
            <option >HillStation</option>
            <option>RoadWay</option>
            <option>All</option>
          
          </select>
          <div class="invalid-feedback">
      Please provide data.
    </div>
        </div>
        <div class="col-md-6 form-group1">
          <label for="EmployeePlace" class="form-label text-dark"><b>Drive Time</b></label>
         
          <select id="EmployeePlace" class="form-select bg-light" name="type" required>
            <option  selected disabled value="">   Choose...</option>
            <option >Morning</option>
            <option>Night</option>
            <option>All</option>
          
          </select>
          <div class="invalid-feedback">
      Please provide data.
    </div>
        </div>
        <div class="col-md-6 form-group1">
          <label for="DrivingCategory" class="form-label text-dark"><b>DrivingCategory</b></label>
          
          <select id="DrivingCategory" class="form-select bg-light" name="category" required>
          <option selected disabled>Choose...</option>
          <?php
          $sql1="SELECT DISTINCT category FROM vehicle WHERE category NOT LIKE '%cycle%'";
          $result1=$conn->query($sql1);
          echo var_dump($result1);
       while($row1=$result1->fetch_assoc())
       {
       echo "<option>". $row1['category']."</option>";
      }
       ?>
  
          <option>others</option>
          </select>
          <div class="invalid-feedback">
      Please provide data.
    </div>
           
</div>
        <div class="col-md-6 form-group1">
          <label for="Salary" class="form-label text-dark"><b>Salary</b></label>
          <input type="mediumtext" class="form-control bg-light" name="salary" id="Salary" placeholder="  Enter salary" required>
          <div class="invalid-feedback">
      Please provide data.
    </div>
</div>
        <div class="col-md-6 form-group1">
          <label for="JoinDate" class="form-label text-dark"><b>JoinDate</b></label>
          <input type="date" class="form-control bg-light" id="JoinDate" name="jndate" required>
          <div class="invalid-feedback">
      Please provide data.
    </div>
   </div>
  
        <div class="col-md-6 form-group1">
          <label for="Insurance" class="form-label text-dark"><b>Insurance</b></label>
          <select id="Insurance" class="form-select bg-light" name="instype" required>
            <option  selected disabled value="">  Choose...</option>
            <option >Yes</option>
            <option>No</option>
          </select>
          <div class="invalid-feedback">
      Please provide data.
    </div>
</div>
        <div class="col-12">
          <input type="submit" class="btn btn-primary" value="Save" name="save" id="save"/>
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
