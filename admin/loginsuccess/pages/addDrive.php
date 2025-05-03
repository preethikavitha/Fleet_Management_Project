<?php
include('../dbcon.php');

if($conn->connect_error)
	{
		die("connection failed".$conn->connect_error);
	}
    if(isset($_POST['save']))
    {
        $id=$_POST['id'];
        $name=$_POST['name'];
        $mobileno=$_POST['mobileno'];
        $address=$_POST['address'];
        $mailid=$_POST['mailid'];
        $instype=$_POST['instype'];
        $age=$_POST['age'];
        $type=$_POST['type'];
        $
        $category=$_POST['category'];
        $salary=$_POST['salary'];
        $jndate=$_POST['jndate'];
        $license=$_POST['license'];
        $expdate=$_POST['expdate'];
        $description=$_POST['description'];
      $cate=$_POST['cate'];
      $lic_cate=implode(",",$cate);
      //Insertion into Driver Table
      $sql="INSERT INTO driver (empid,empname,drivetime,salary,joindate,mobileno,address,mailID,age,isInsurance,category) VALUES ('$id','$name','$type',$salary,'$jndate',$mobileno,'$address','$mailid',$age,'$instype','$category')";
      $conn->query($sql);
      //Images
      $image=$_FILES['file'];
      $imagefilename=$image['name'];
      $imagefileerr=$image['error'];
      $imagefiletemp=$image['tmp_name'];
       print_r($imagefiletemp);
      $filename_separate=explode('.',$imagefilename);
      $file_extension=strtolower($filename_separate[1]);
    
      $extension=array('jpeg','jpg','png','pdf');
      if(in_array($file_extension,$extension))
      {
        $upload_image='images/'.$imagefilename;
        move_uploaded_file($imagefiletemp,$upload_image);
        $sql1="INSERT INTO license (empid,license_no,category,ExpDate,image_path) VALUES ('$id','$license','$lic_cate','$expdate','$upload_image')";
        $conn->query($sql1);
     
    }
    //redirection after successful insertion
    if($sql && $sql1)
    {
      
      header('location:driver.php');
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
  
<link rel="stylesheet" href="forerror.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <?php
include('sidenav.php'); 
?>
    <div class="container-fluid text-light py-3">
   
   </div>
   <section class="container my-2 bg-gray-100 w-95 text-light p-2" style="border-radius:20px;">
   <?php if(isset($err))
                { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
           <div><?=$err;?></div>
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
            <?php
      
         }?>
    <form class="row g-3 p-3" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <div class="col-md-6 form-group1">
            <label for="EmployeeID" class="form-label text-dark"><b>EmployeeID</b></label>
            <input type="text" class="form-control bg-light"  id="EmployeeID"   placeholder="Enter Employee ID" name="id"  oninput="validateInputs(id);" >
            <div class="err"></div>
          </div>
          <div class="col-md-6 form-group1">
            <label for="EmployeeName" class="form-label text-dark"><b>EmployeeName</b></label>
            <input type="text" class="form-control bg-light" id="EmployeeName"   placeholder="Enter Employee Name" name="name"  oninput="validateInputs(id);">
            <div class="err"></div>
          </div>
          <div class="col-md-6 form-group1">
            <label for="MobileNo" class="form-label text-dark"><b>MobileNo</b></label>
            <input type="mediumtext" class="form-control bg-light" id="MobileNo" placeholder="Enter Employee MobileNo" name="mobileno"  oninput="validateInputs(id);" >
            <div class="err"></div>
          </div>
          <div class="col-md-6 form-group1">
            <label for="Address" class="form-label text-dark"><b>Address</b></label>
            <input type="text" class="form-control bg-light" id="Address"   placeholder="Enter Employee Address" name="address"  oninput="validateInputs(id);" >
            <div class="err"></div>
          </div>
          <div class="col-md-6 form-group1">
          <label for="MailID" class="form-label text-dark"><b>MailId</b></label>
          <input type="email" class="form-control bg-light" id="MailID" name="mailid" placeholder="Enter Mail ID"  oninput="validateInputs(id);">
          <div class="err"></div>
        </div>
        <div class="col-md-6 form-group1">
          <label for="Insurance" class="form-label text-dark"><b>Insurance</b></label>
          <select id="Insurance" class="form-select bg-light" name="instype"  oninput="validateInputs(id);">
            <option  selected>Choose...</option>
            <option >Yes</option>
            <option>No</option>
          </select>
          <div class="err"></div>
        </div>
        <div class="col-md-4 form-group1">
          <label for="Age" class="form-label text-dark"><b>Age</b></label>
          <input type="number" class="form-control  bg-light" id="Age" min="18" name="age" oninput="validateInputs(id);"/>
          <div class="err"></div>
        </div>
        <div class="col-md-4 form-group1">
          <label for="EmployeeType" class="form-label text-dark"><b>EmployeeType</b></label>
          <select id="EmployeeType" class="form-select bg-light" name="type"  oninput="validateInputs(id);">
            <option  selected>Choose...</option>
            <option >Include HillAndNight</option>
            <option>Only Morning</option>
            <option>Include Mountain</option>
            <option>All</option>
            <option>Others</option>
          </select>
          <div class="err"></div>
        </div>
        <div class="col-md-4 form-group1">
          <label for="DrivingCategory" class="form-label text-dark"><b>DrivingCategory</b></label>
          <select id="DrivingCategory" class="form-select bg-light" name="category"  oninput="validateInputs(id);">
            <option selected>Choose...</option>
            <option>Car</option>
            <option>Bike</option>
            <option>Van</option>
            <option>Taxi</option>
            <option>Others</option>
          </select>
          <div class="err"></div>
        </div>
        
        <div class="col-md-6 form-group1">
          <label for="Salary" class="form-label text-dark"><b>Salary</b></label>
          <input type="mediumtext" class="form-control bg-light" name="salary" id="Salary" placeholder="Enter salary"  oninput="validateInputs(id);">
          <div class="err"></div>
        </div> 
        <div class="col-md-6 form-group1">
          <label for="JoinDate" class="form-label text-dark"><b>JoinDate</b></label>
          <input type="date" class="form-control bg-light" id="JoinDate" name="jndate" placeholder="Enter JoinDate"  oninput="validateInputs(id);">
          <div class="err"></div>
        </div>
        
        <div class="col-md-6 form-group1">
          <label for="LicenseNo" class="form-label text-dark"><b>License No</b></label>
          <input type="text" class="form-control bg-light" id="LicenseNo" name="license" placeholder="Enter License Number"  oninput="validateInputs(id);">
          <div class="err"></div>
        </div>
        <div class="col-md-6 form-group1">
          <label for="LicenseExpiryDate" class="form-label text-dark"><b>License Expiry Date</b></label>
          <input type="date" class="form-control bg-light" id="LicenseExpiryDate" name="expdate" placeholder="Enter License Expiry Date"  oninput="validateInputs(id);">
          <div class="err"></div>
        </div>
        <div class="col-md-12 text-dark form-group1">
          <label class="form-label text-dark"><b>Category Of License</b></label><br>
          <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="cate[]" value="LMV">
  <label class="form-check-label" for="inlineCheckbox1">LMV</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="cate[]" value="MCWG">
  <label class="form-check-label" for="inlineCheckbox2">MCWG</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="cate[]" value="MG" >
  <label class="form-check-label" for="inlineCheckbox3">MG</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="cate[]" value="HMV" >
  <label class="form-check-label" for="inlineCheckbox3">HMV</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="cate[]" value="HGMV" >
  <label class="form-check-label" for="inlineCheckbox3">HGMV</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="cate[]" value="HPMV" >
  <label class="form-check-label" for="inlineCheckbox3">HPMV</label>
</div>

        </div>
       
       
          <!--image-->
        <div class="col-md-6 form-group1">
            <label for="File" class="form-label text-dark"><b>Image of license</b></label>
            <input type="file" class="form-control text-dark bg-light"  id="File" name="file" />
</div>

        <div class="col-md-10 form-group1">
          <label for="Description" class="form-label text-dark"><b>Description</b></label>
         <textarea class="form-control bg-light" id="Description" name="description"  cols="30" rows="5" placeholder="Give few words about vehicle Features"  oninput="validateInputs(id);"></textarea>
         <div class="err"></div>
        </div>
       
        

					
					
        <div class="col-12">
          <div class="form-check text-light">
            <input class="form-check-input" type="checkbox" id="gridCheck" >
            <label class="form-check-label text-dark" for="gridCheck">
            <b>Check the details once...</b>
            </label>
          </div>
        </div>
        <div class="col-12">
          <input type="submit" class="btn btn-primary" value="Save" name="save" id="save" onclick="return validateInputVal();"/>
        </div>
      </form>
   </section>
   <?php include("footernav.php")?>


  </body>
</html>