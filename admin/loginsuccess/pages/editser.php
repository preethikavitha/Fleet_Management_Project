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
  
	$sql="SELECT * FROM services WHERE service_id='$id'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$date=$row['Service_date'];
  $cost=$row['Service_cost'];
  $claim=$row['ins_claim'];
  $rem=$row['rem_cost'];

  }

   
if(isset($_POST['save']))
{
   
 
  $date=$_POST['date'];
  $cost=$_POST['cost'];
  $claim=$_POST['claim'];
  $rem=$cost-$claim;



  $sql="UPDATE services SET Service_date='$date',Service_cost='$cost',ins_claim='$claim',rem_cost='$rem' WHERE service_id='$id'";
  $conn->query($sql);






  if($sql)
  {
    
   
    header('location:servicedet.php');
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
 <h4 style="text-align:center">Service Details</h4>
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
            <label for="validationDefault01" class="form-label text-dark"><b>NumberPlate</b></label>
            <input type="text" class="form-control bg-light"  id="validationDefault01"   value="<?php if(isset($_COOKIE['num_plate'])) echo $_COOKIE['num_plate']; else echo ''?>" name="num_plate" readonly required>
            <div class="invalid-feedback">
                Please Provide a NumberPlate
        </div>
          </div>
          <div class="col-md-6">
            <label for="validationDefault02" class="form-label text-dark"><b>Service_date</b></label>
            <input type="date" class="form-control bg-light" id="validationDefault02"   value="<?php if(isset($date)) echo $date; else echo ''; ?>" placeholder="Enter Service Date" name="date" required>
            <div class="invalid-feedback">
                Please Provide a Service Date
        </div>  
        </div>
          <div class="col-md-6">
            <label for="validationDefault02" class="form-label text-dark"><b>Service_cost</b></label>
            <input type="mediumtext" class="form-control bg-light" id="validationDefault02" value="<?php if(isset($cost)) echo $cost; else echo ''; ?>" placeholder="Enter Service Cost" name="cost" required>
            <div class="invalid-feedback">
                Please Provide a Service Cost
        </div>  
        </div>
          <div class="col-md-6">
            <label for="validationDefault02" class="form-label text-dark"><b>InsuranceClaim</b></label>
            <input type="mediumtext" class="form-control bg-light" id="validationDefault02"  value="<?php if(isset($claim)) echo $claim; else echo ''; ?>" placeholder="Enter Insurance Claim Amount" name="claim" required >
            <div class="invalid-feedback">
                Please Provide a Insurance Claim
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