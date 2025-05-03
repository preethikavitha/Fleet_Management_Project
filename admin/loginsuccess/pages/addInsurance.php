<?php
include('../dbcon.php');

if($conn->connect_error)
	{
		die("connection failed".$conn->connect_error);
	}

 
  if(isset($_COOKIE['num_plate']))
  {
      $num_plate=$_COOKIE['num_plate'];
  }
   
if(isset($_POST['save']))
{
   
 $cname=$_POST['cname'];
 $pname=$_POST['pname'];
  $date=$_POST['date'];

$amt=$_POST['amt'];

$dat= strtotime(date("Y-m-d", strtotime($date)) . " +1 year");
$idv=$_POST['idv'];
  $sql="INSERT INTO insurancename(num_plate_id,policy_name,company_name,insurancedate,no_of_years,date,cur_idv) VALUES ('$num_plate','$pname','$cname','$date','$years','$dat',$idv)";
  $conn->query($sql);
 $sql1="SELECT insurance_id FROM insurancename WHERE num_plate_id='$num_plate' && policy_name='$pname'";
 $result=$conn->query($sql1);
 $row=$result->fetch_assoc();
 $ins_id=$row['insurance_id'];
 $sql2="INSERT INTO insurance_history(insurance_id,num_plate_id,date_of_payment,amount_paid,idv) VALUES($ins_id,'$num_plate','$date',$amt,$idv)";
$conn->query($sql2);






  if($sql)
  {
    
   
    header('location:insurdet.php');
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
 <h4 style="text-align:center">Insurance Details</h4>
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
            <label for="validationDefault02" class="form-label text-dark"><b>Policy Name</b></label>
           
            <select class="form-select bg-light"  id="validationDefault02"  name="pname" required>
            <option selected>Choose...</option>
            <option>Third-party </option>
            <option>Own damage</option>
            <option>Personal Accident Cover(Un-named)</option>
            <option>Engine protection cover</option>
            <option>Comprehensive car insurance</option>
            <option>Zero depreciation insurance</option>
            <option>Others</option>
          </select>
          <div class="invalid-feedback">
                Please Provide a Transmission Type
        </div>
            <div class="invalid-feedback">
                Please Provide a Policy Name
        </div>
        </div>  
        <div class="col-md-6">
            <label for="validationDefault02" class="form-label text-dark"><b>Company Name</b></label>
            <input type="text" class="form-control bg-light" id="validationDefault02"   placeholder="Enter Company Name" name="cname" required>
            <div class="invalid-feedback">
                Please Provide a Company Name
        </div>  
        </div>
          <div class="col-md-6">
            <label for="validationDefault03" class="form-label text-dark"><b>InsuranceDate</b></label>
            <input type="date" class="form-control bg-light" id="validationDefault03" placeholder="Enter Insurance Date" name="date" required>
            <div class="invalid-feedback">
                Please Provide a insurance Date
        </div>  
        </div>
         
        <div class="col-md-6">
            <label for="validationDefault04" class="form-label text-dark"><b>Enter IDV Value</b></label>
            <input type="mediumtext" class="form-control bg-light" id="validationDefault04"   placeholder="Enter Insured Declared" name="idv" required>
            <div class="invalid-feedback">
                Please Provide a IDV value
        </div>  
        </div>
        <div class="col-md-6">
            <label for="validationDefault05" class="form-label text-dark"><b>Amount Paid</b></label>
            <input type="number" class="form-control bg-light" id="validationDefault05"   placeholder="Enter Initial Amount Paid" name="amt" required>
            <div class="invalid-feedback">
                Please Provide a Initial Amount Paid
        </div>  
        </div>
        <div class="col-md-6">
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