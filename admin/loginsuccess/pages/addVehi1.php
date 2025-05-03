<?php
include('../dbcon.php');

if($conn->connect_error)
	{
		die("connection failed".$conn->connect_error);
	}
  if(isset($_POST['back']))
  {
    header("location:car.php");  
  }
   
if(isset($_POST['save']))
{
  if(isset($_POST['num_plate']))
  {
  $num_plate=$_POST['num_plate'];
  $brand=$_POST['brand'];
  $model=$_POST['model'];
  $category=$_POST['category'];

  $description=$_POST['description'];



  $sql="INSERT INTO vehicle (num_plate_id,model,category,brand,Description) VALUES ('$num_plate','$model','$category','$brand','$description')";
  $conn->query($sql);






  if($sql)
  {
    
    setcookie('num_plate',$num_plate,time()+60*60*12);
    header('location:addVehi2.php');
  }
  else
  {
      $err="Something Problem in Insertion";
  }
}
else
{
  $err="NumPlate not given";
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
 <h4 style="text-align:center">Vehicle Details</h4>
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
            <input type="text" class="form-control bg-light"  id="validationDefault01"   placeholder="Enter Registeration Number" name="num_plate" required>
            <div class="invalid-feedback">
                Please Provide a NumberPlate
        </div>
          </div>
          <div class="col-md-6">
            <label for="validationDefault02" class="form-label text-dark"><b>Model</b></label>
            <input type="text" class="form-control bg-light" id="validationDefault02"   placeholder="Enter Model name" name="model" required>
            <div class="invalid-feedback">
                Please Provide a Model
        </div>  
        </div>
          <div class="col-md-6">
            <label for="validationDefault02" class="form-label text-dark"><b>Brand</b></label>
            <input type="text" class="form-control bg-light" id="validationDefault02" placeholder="Enter Brand Name" name="brand" required>
            <div class="invalid-feedback">
                Please Provide a Brand
        </div>  
        </div>
          <div class="col-md-6">
            <label for="validationDefault02" class="form-label text-dark"><b>Category</b></label>
            <input type="text" class="form-control bg-light" id="validationDefault02"   placeholder="Enter Category" name="category" required>
            <div class="invalid-feedback">
                Please Provide a Category
        </div>  
        </div>
          <div class="col-md-10">
          <label for="inputZip" class="form-label text-dark"><b>Description</b></label>
         <textarea class="form-control bg-light" id="inputZip" name="description" name="des" cols="25" rows="5" placeholder="Give few words about vehicle Features" required></textarea>
        </div>
        <div class="col-md-4">
        </div>
      <div class="col-md-2">
          <button  class="btn btn-primary" value="Back" name="back">Back</button>
        </div>
        <div class="col-md-2">
          <button type="submit" class="btn btn-primary" value="Save" name="save">Save</button>
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