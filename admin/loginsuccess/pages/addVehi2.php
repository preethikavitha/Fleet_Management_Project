<?php
include('../dbcon.php');

if($conn->connect_error)
	{
		die("connection failed".$conn->connect_error);
	}
  if(isset($_POST['back']))
  {
    header("location:addVehi1.php");  
  }
   
if(isset($_POST['save']))
{
   
    if(isset($_COOKIE['num_plate']))
    {
        $num_plate=$_COOKIE['num_plate'];
    }
    
   
    
  
    $seat=$_POST['seat'];
    $engine=$_POST['engine'];
    $transmission=$_POST['transmission'];
  
    $price=$_POST['price'];
    $bootspace=$_POST['bootspace'];
    $sql="UPDATE vehicle SET engine_type='$engine',price=$price,seat=$seat,transmission_type='$transmission',bootspace='$bootspace' WHERE num_plate_id='$num_plate'";
  $conn->query($sql);
    $rto=$_POST['rto'];
  $sql1="INSERT INTO notification(num_plate_id,RTO_Exp_date) values('$num_plate','$rto')";
  $conn->query($sql1);

    if($sql && $sql1)
    {
      
      header('location:addVehi3.php');
    }
    else
    {
        $err="Something Problem in Insertion";
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
  <?php
include('sidenav.php'); 
?>
   <div class="container-fluid text-light py-3">
 
   </div>
   <section class="container my-2 bg-gray-100 w-80 text-light p-2" style="border-radius:20px;">
   <h4 style="text-align:center">Additional Details</h4>
   <h5 style="text-align:center"><?php echo $_COOKIE['num_plate']; ?></h5>
   <?php if(isset($err))
                { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
           <div><?=$err;?></div>
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
            <?php
      
         }?>
    <form class="row g-3 p-3  needs-validation" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" autocomplete="off">
    
    <div class="col-md-6">
          <label for="inputState" class="form-label text-dark"><b>Engine Type</b></label>
          <select id="inputState" class="form-select bg-light" name="engine" required>
            <option  selected>Choose...</option>
            <option >Natural Gas(CNG)</option>
            <option>Petrol</option>
            <option>Diesel</option>
            
            <option>Others</option>
          </select>
          <div class="invalid-feedback">
                Please Provide a Engine Type
        </div>
        </div>
        <div class="col-md-6">
          <label for="inputState" class="form-label text-dark"><b>Transmission Type</b></label>
          <select id="inputState" class="form-select bg-light" name="transmission" required>
            <option selected>Choose...</option>
            <option>Manual </option>
            <option>Automatic</option>
            <option>Others</option>
          </select>
          <div class="invalid-feedback">
                Please Provide a Transmission Type
        </div>
        </div>
        
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label text-dark"><b>Seat</b></label>
          <input type="number" class="form-control  bg-light" id="inputEmail4" min="1" name="seat" required>
          <div class="invalid-feedback">
                Please Provide a number of seats
        </div>
        </div>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label text-dark"><b>Bootspace(in liters)</b></label>
          <input type="number" class="form-control  bg-light" id="inputEmail4" min="4" name="bootspace" required>
          <div class="invalid-feedback">
                Please Provide Bootspace
        </div>
        </div>
        <div class="col-md-6">
          <label for="inputAddress" class="form-label text-dark"><b>Price</b></label>
          <input type="mediumtext" class="form-control bg-light" id="inputAddress" name="price" placeholder="Enter Price Bought" required>
          <div class="invalid-feedback">
                Please Provide Price Of Vehicle
        </div>
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label text-dark"><b>Last_RTO_RenewedDate</b></label>
         
          <input type="date" class="form-control bg-light" id="inputCity" name="rto" required>
          <div class="invalid-feedback">
                Please Provide RTO Renewal Date
        </div>
        </div>
        <div class="col-md-4">
        </div>
        <div class="col-md-2">
          <input type="submit" class="btn btn-primary" value="Back" name="back"/>
        </div>
        <div class="col-md-2">
          <input type="submit" class="btn btn-primary" value="Save" name="save"/>
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