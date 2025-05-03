<?php
include('../dbcon.php');

if($conn->connect_error)
	{
		die("connection failed".$conn->connect_error);
	}

  if(isset($_POST['back']))
  {
    header("location:servicedet.php");  
  }
  if(isset($_COOKIE['num_plate']))
  {
      $num_plate=$_COOKIE['num_plate'];
  }
  if(isset($_GET['user_id']))
  {
    $id=$_GET['user_id'];
  
	$sql="SELECT * FROM fuel_cost WHERE fuel_id='$id'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$date=$row['date'];
  $cost=$row['per_lit'];
  $lit=$row['fuel_lit'];


  }

   
if(isset($_POST['save']))
{
   
 
 
    $date=$_POST['date'];
    $cost=$_POST['cost'];
    $lit=$_POST['lit'];
    $tot=$cost*$lit;
     $id=$_POST['id'];
  
  
    $sql="UPDATE fuel_cost SET date='$date',per_lit='$cost',fuel_lit='$lit',cost='$tot' WHERE fuel_id=$id";
    $conn->query($sql);






  if($sql)
  {
    
   
    header('location:fueldet.php');
  }
  else
  {
      $err="Something Problem in Updation";
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


/*form{
    box-shadow: 2px 6px 100px #ffffff;
}*/
    </style>
    <title>Form Design</title>
  </head>
  <body>
  <?php
include('sidenav.php'); 
?>
   <div class="container-fluid text-light py-3">
 
   </div>
   <section class="container my-2 bg-gray-100 w-80 text-light p-2" style="border-radius:20px;">
 <h4 style="text-align:center">Fuel Details</h4>
 <?php if(isset($err))
                { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
           <div><?=$err;?></div>
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
            <?php
      
         }?>
         
    <form class="row g-3 p-3 needs-validation" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" autocomplete="off" novalidate>
        <div class="col-md-6">
        <input type="hidden" name="id" value="<?php echo $id;?>">
            <label for="validationDefault01" class="form-label text-dark"><b>NumberPlate</b></label>
            <input type="text" class="form-control bg-light"  id="validationDefault01"   value="<?php if(isset($_COOKIE['num_plate'])) echo $_COOKIE['num_plate']; else echo ''?>" name="num_plate" readonly required>
            <div class="invalid-feedback">
                Please Provide a NumberPlate
        </div>
          </div>
          <div class="col-md-6">
            <label for="validationDefault02" class="form-label text-dark"><b>Fuel_date</b></label>
            <input type="date" class="form-control bg-light" id="validationDefault02"   value="<?php if(isset($date)) echo $date; else echo ''; ?>" placeholder="Enter Fuel Date" name="date" required>
            <div class="invalid-feedback">
                Please Provide a Fuel Date
        </div>  
        </div>
          <div class="col-md-6">
            <label for="validationDefault02" class="form-label text-dark"><b>Fuel_Liters</b></label>
            <input type="mediumtext" class="form-control bg-light" id="validationDefault02" value="<?php if(isset($lit)) echo $lit; else echo ''; ?>" placeholder="Enter Fuel Liters" name="lit" required>
            <div class="invalid-feedback">
                Please Provide a Fuel liters
        </div>  
        </div>
          <div class="col-md-6">
            <label for="validationDefault02" class="form-label text-dark"><b>CostPerLiters</b></label>
            <input type="mediumtext" class="form-control bg-light" id="validationDefault02"  value="<?php if(isset($cost)) echo $cost; else echo ''; ?>" placeholder="Enter Fuel Cost Per Liters" name="cost" required >
            <div class="invalid-feedback">
                Please Provide a CostPerLiters
        </div>  
        </div>
        <div class="col-md-4">
        </div>
        <div class="col-md-2">
          <input type="submit" class="btn btn-primary" value="Back" name="back">
        </div>
        <div class="col-md-2">
          <input type="submit" class="btn btn-primary" value="Save" name="save">
        </div>
        

</form>
</section>
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