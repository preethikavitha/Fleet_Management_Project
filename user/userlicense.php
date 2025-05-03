<?php
include('dbcon.php');
if($conn->connect_error)
	{
		die("connection failed".$conn->connect_error);
	}
  $sql = "SELECT book_id FROM booking";
	$result=$conn->query($sql);
	if($result->num_rows>0)
	{ 
while($row=$result -> fetch_assoc()){
	$book_id=$row['book_id'];
}
   
    
}
    if(isset($_POST['save']))
    {
   
       $licenseno=$_POST['licenseno'];
      $expdate=$_POST['expdate'];  
    $cate=$_POST['cate'];
    $lic_cate=implode(",",$cate);
    $image=$_FILES['file'];
    $imagefilename=$image['name'];
    $imagefileerr=$image['error'];
    $imagefiletemp=$image['tmp_name'];
    $filename_separate=explode('.',$imagefilename);
    $file_extension=strtolower($filename_separate[1]);
  
    $extension=array('jpeg','jpg','png','pdf');
    if(in_array($file_extension,$extension))
    {
      $upload_image='licenseimage/'.$imagefilename;
      move_uploaded_file($imagefiletemp,$upload_image);
      $sql1="INSERT INTO userlicense (book_id,license_no,category,ExpDate,image_path) VALUES ('$book_id','$licenseno','$lic_cate','$expdate','$upload_image')";
      $conn->query($sql1);
   
  }
  //redirection after successful insertion
  if($sql1)
  {
    
    header('location:userdetailsform.php');
    exit();
  }
  else
  {
      $_SESSION['status']="Something Problem in Insertion";
  }

}
    
  
    ?>

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
  .invalid-feedback{
   
   color: #f00;
   font-size: 15px;
   font-weight: bold;
}


.invalid-feedback{
 
   border-color: #f00;
  

}
/*form{
    box-shadow: 2px 6px 100px #ffffff;
}*/
    </style>
    
 
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      
<?php include("home.php");?>







<div class="" style="background-image: url('https://as1.ftcdn.net/v2/jpg/05/36/13/22/1000_F_536132274_VebgPU03wGtIc5zEoRTAUaem8wb5FtLc.jpg');">
  

   <section class="container my-2 bg-gray-10 w-80 text-light p-2 justify-content-center bg-dark" style="border-radius:30px;">
 <center><h4 class="text-light">User License Details</h4></center>
    <form class="row g-3 p-3 needs-validation" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" onsubmit="return validateCheckbox()" autocomplete="off" novalidate>
    <div class="row">
    <div class="col-md-6 form-group">
          <label for="LicenseNo" class="form-label text-light"><b>License No</b></label>
          <input type="text" class="form-control bg-dark" id="LicenseNo" name="licenseno" placeholder="  Enter License Number" required>
          <div class="invalid-feedback">
      Please Enter License Number .
    </div>
        </div>
        <div class="col-md-6 form-group">
          <label for="LicenseExpiryDate" class="form-label text-light"><b>License Expiry Date</b></label>
          <input type="date" class="form-control bg-light" id="LicenseExpiryDate" name="expdate" required>
          <div class="invalid-feedback">
      Please Enter Expiry Date.
    </div>
        </div>
</div>

        <div class="col-md-12 text-dark form-group">
          <label class="form-label text-light"><b>Category Of License</b></label>
          <br>
          <div class="form-check form-check-inline">
  <input class="form-check-input checkbox-group" type="checkbox" id="inlineCheckbox1" name="cate[]" value="LMV">
  <label class="form-check-label text-light" for="inlineCheckbox1">LMV</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input checkbox-group" type="checkbox" id="inlineCheckbox2" name="cate[]" value="MCWG">
  <label class="form-check-label text-light" for="inlineCheckbox2">MCWG</label>
</div>

<div class="form-check form-check-inline">
  <input class="form-check-input checkbox-group" type="checkbox" id="inlineCheckbox3" name="cate[]" value="MG" >
  <label class="form-check-label text-light" for="inlineCheckbox3">MG</label>
</div>
<br>
<div class="form-check form-check-inline">
  <input class="form-check-input checkbox-group" type="checkbox" id="inlineCheckbox3" name="cate[]" value="HMV" >
  <label class="form-check-label text-light" for="inlineCheckbox3">HMV</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input checkbox-group" type="checkbox" id="inlineCheckbox3" name="cate[]" value="HGMV" >
  <label class="form-check-label text-light" for="inlineCheckbox3">HGMV</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input checkbox-group" type="checkbox" id="inlineCheckbox3" name="cate[]" value="HPMV" >
  <label class="form-check-label text-light" for="inlineCheckbox3">HPMV</label>
</div>

        </div>
       
       
          <!--image-->
        <div class="col-md-12 form-group">
            <label for="File" class="form-label text-light"><b>Image of license</b></label>
            <input type="file" class="form-control text-dark bg-light"  id="File" name="file" required />
            <div class="invalid-feedback">
      Please Upload a License.
    </div>
</div>
<div class="col-12">
<input type="submit" class="btn btn-success" value="Save" name="save" id="save"/>
        </div>
      </form>
   </section>
</div>
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
function validateCheckbox() {
            // Get all checkboxes with the specified class
            var checkboxes = document.querySelectorAll('.checkbox-group');

            // Initialize a variable to check if at least one checkbox is selected
            var atLeastOneChecked = false;

            // Loop through each checkbox
            checkboxes.forEach(function(checkbox) {
                // Check if the current checkbox is checked
                if (checkbox.checked) {
                    // Set the flag to true if at least one checkbox is checked
                    atLeastOneChecked = true;
                }
            });

            // Display an alert if no checkbox is checked
            if (!atLeastOneChecked) {
                alert('Please select at least one checkbox.');
                return false; // Prevent form submission
            }

            // Allow form submission if at least one checkbox is checked
            return true;
        }


</script>
<?php include("footer.php")?>


      
   
       