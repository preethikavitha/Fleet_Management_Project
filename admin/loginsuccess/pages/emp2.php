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
        $mobileno=$_POST['mobileno'];
        $address=$_POST['address'];
        $mailid=$_POST['mailid'];
        $sql="UPDATE driver set address='$address',mailID='$mailid',mobileno='$mobileno' WHERE empid='$id'";
      $conn->query($sql);
    
    
    if($sql)
      {
        
        
  header('location:emp4.php');
  exit(); 
    
      }
      else
      {
          $_SESSION['status']="Something Problem in Insertion";
      }
  
        
    }      
      
  ?>
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
    <title>Contact Details</title>
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
 <center><h4>Contact Details</h4></center>
 <h5 style="text-align:center">EMPLOYEE ID:<?php echo $_COOKIE['id'];?></h5>
    <form class="row g-3 p-3 needs-validation" method="POST" action="" enctype="multipart/form-data" novalidate>
    
<div class="col-md-12 form-group1">
            <label for="MobileNo" class="form-label text-dark"><b>MobileNo</b></label>
            <input type="mediumtext" class="form-control bg-light" pattern="[789][0-9]{9}" id="MobileNo" placeholder="  Enter Employee MobileNo" name="mobileno" required>
            <div class="invalid-feedback">
      Please provide data.
    </div>
          </div>
          <div class="col-md-12 form-group1">
            <label for="Address" class="form-label text-dark"><b>Address</b></label>
            <input type="text" class="form-control bg-light" id="Address"   placeholder="  Enter Employee Address" name="address" required>
            <div class="invalid-feedback">
      Please provide data.
    </div>
          </div>
          <div class="col-md-12 form-group1">
          <label for="MailID" class="form-label text-dark"><b>MailId</b></label>
          <input type="email" class="form-control bg-light" id="MailID" name="mailid" placeholder="  Enter Mail ID" required>
          <div class="invalid-feedback">
      Please provide data.
    </div>
        </div>
        <div class="col-12">
          <input type="submit" class="btn btn-primary" value="Save" name="save" id="save">
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