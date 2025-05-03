<?php
include('../dbcon.php');

if($conn->connect_error)
	{
		die("connection failed".$conn->connect_error);
	}
    if(isset($_GET['user_id']))
    {
        $user_id=$_GET['user_id'];
        $sql="SELECT * FROM driver WHERE empid='$user_id'";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
        $sql1="SELECT * FROM license WHERE empid='$user_id'";
        $result1=$conn->query($sql1);
        $row1=$result1->fetch_assoc();
        
        $id=$row['empid'];
        $name=$row['empname'];
        $mobileno=$row['mobileno'];
        $address=$row['address'];
        $mailid=$row['mailID'];
        $instype=$row['isInsurance'];
        $age=$row['age'];
        $type=$row['drivetime'];
        $typeplace=$row['driveplace'];
        $status=$row['status'];
        $category=$row['category'];
        $salary=$row['salary'];
        $jndate=$row['joindate'];
        $license=$row1['license_no'];
        $expdate=$row1['ExpDate'];
        $cate=$row1['category'];
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
        $typeplace=$POST['typeplace'];
        $status=$_POST['status'];
        $category=$_POST['category'];
        $salary=$_POST['salary'];
        $jndate=$_POST['jndate'];
        $license=$_POST['license'];
        $expdate=$_POST['expdate'];
     
      $cate=$_POST['cate'];
      $lic_cate=implode(",",$cate);
      //Insertion into Driver Table
      $sql="UPDATE driver SET empname='$name',drivetime='$type',driveplace='$typeplace',salary=$salary,joindate='$jndate',mobileno=$mobileno,address='$address',mailID='$mailid',age=$age,isInsurance='$instype',category='$category' ,status='$status' WHERE empid='$id'";
      $conn->query($sql);
      //Images
   
        $sql1="INSERT license  SET license_no='$license',category='$lic_cate',ExpDate='$expdate' WHERE empid='$id'";
        $conn->query($sql1);
     
    
    //redirection after successful insertion
    if($sql && $sql1)
    {
      if($status=='Leave')
      {
        header('location:getleavedet.php?empid='.$id);
      }
      else
      {
      header('location:driver.php');
    }
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
    <h4 class="text-center">Driver Details</h4>
    <?php if(isset($err))
                { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
           <div><?=$err;?></div>
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
            <?php
      
         }?>
    <form class="row g-3 p-3 needs-validation" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" novalidate>
        <div class="col-md-6 form-group1">
            <label for="EmployeeID" class="form-label text-dark"><b>EmployeeID</b></label>
            <input type="text" class="form-control bg-light"  id="EmployeeID"   value="<?php if(isset($id)) echo $id; else ''?>" placeholder="Enter Employee ID" name="id" readonly required>
            <div class="err"></div>
          </div>
          <div class="col-md-6 form-group1">
            <label for="EmployeeName" class="form-label text-dark"><b>EmployeeName</b></label>
            <input type="text" class="form-control bg-light" id="EmployeeName"  value="<?php if(isset($name)) echo $name; else ''?>"  placeholder="Enter Employee Name" name="name" required>
            <div class="err"></div>
          </div>
          <div class="col-md-6 form-group1">
            <label for="MobileNo" class="form-label text-dark"><b>MobileNo</b></label>
            <input type="mediumtext" class="form-control bg-light" id="MobileNo"  value="<?php if(isset($mobileno)) echo $mobileno; else ''?>" placeholder="Enter Employee MobileNo" name="mobileno" required>
            <div class="err"></div>
          </div>
          <div class="col-md-6 form-group1">
            <label for="Address" class="form-label text-dark"><b>Address</b></label>
            <input type="text" class="form-control bg-light" id="Address"  value="<?php if(isset($address)) echo $address; else ''?>" placeholder="Enter Employee Address" name="address" required>
            <div class="err"></div>
          </div>
          <div class="col-md-6 form-group1">
          <label for="MailID" class="form-label text-dark"><b>MailId</b></label>
          <input type="email" class="form-control bg-light" id="MailID" name="mailid" value="<?php if(isset($mailid)) echo $mailid; else ''?>" placeholder="Enter Mail ID" required>
          <div class="err"></div>
        </div>
        <div class="col-md-6 form-group1">
          <label for="Insurance" class="form-label text-dark"><b>Insurance</b></label>
          <select id="Insurance" class="form-select bg-light" name="instype" required>
            <option  selected><?php if(isset($instype)) echo $instype; else 'Choose...'?></option>
            <option >Yes</option>
            <option>No</option>
          </select>
          <div class="err"></div>
        </div>
        <div class="col-md-6 form-group1">
          <label for="status" class="form-label text-dark"><b>Status</b></label>
          <select id="status" class="form-select bg-light" name="status" required>
          <option  selected><?php if(isset($status)) echo $status; else 'Choose...'?></option>
            <option >Leave</option>
            <option>Booked</option>
            <option>Available</option>
        </select>
        </div>
        <div class="col-md-6 form-group1">
          <label for="Age" class="form-label text-dark"><b>Age</b></label>
          <input type="number" class="form-control  bg-light" id="Age" min="18" value="<?php if(isset($age)) echo $age; else ''?>" name="age" required>
          <div class="err"></div>
        </div>
        <div class="col-md-6 form-group1">
          <label for="EmployeeType" class="form-label text-dark"><b>DrivePlace</b></label>
          <select id="EmployeeType" class="form-select bg-light" name="typeplace" required>
            <option  selected><?php if(isset($typeplace)) echo $typeplace; else 'Choose...'?></option>
            <option >HillStation</option>
            <option>RoadWay</option>
            <option>All</option>
          </select>
          <div class="err"></div>
        </div>
        <div class="col-md-6 form-group1">
          <label for="EmployeeType" class="form-label text-dark"><b>DriveTime</b></label>
          <select id="EmployeeType" class="form-select bg-light" name="type" required>
            <option  selected><?php if(isset($type)) echo $type; else 'Choose...'?></option>
            <option >Morning</option>
            <option>Night</option>
            <option>All</option>
          </select>
          <div class="err"></div>
        </div>
        <div class="col-md-6 form-group1">
          <label for="DrivingCategory" class="form-label text-dark"><b>DrivingCategory</b></label>
          <select id="DrivingCategory" class="form-select bg-light" name="category" required>
            <option selected><?php if(isset($category)) echo $category; else 'Choose...'?></option>
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
          <input type="mediumtext" class="form-control bg-light" name="salary" value="<?php if(isset($salary)) echo $salary; else ''?>" id="Salary" placeholder="Enter salary" required>
          <div class="err"></div>
        </div> 
        <div class="col-md-6 form-group1">
          <label for="JoinDate" class="form-label text-dark"><b>JoinDate</b></label>
          <input type="date" class="form-control bg-light" id="JoinDate" name="jndate" value="<?php if(isset($jndate)) echo $jndate; else ''?>" placeholder="Enter JoinDate" required>
          <div class="err"></div>
        </div>
        
        <div class="col-md-6 form-group1">
          <label for="LicenseNo" class="form-label text-dark"><b>License No</b></label>
          <input type="text" class="form-control bg-light" id="LicenseNo" name="license" value="<?php if(isset($license)) echo $license; else ''?>" placeholder="Enter License Number" required>
          <div class="err"></div>
        </div>
        <div class="col-md-6 form-group1">
          <label for="LicenseExpiryDate" class="form-label text-dark"><b>License Expiry Date</b></label>
          <input type="date" class="form-control bg-light" id="LicenseExpiryDate" name="expdate" value="<?php if(isset($expdate)) echo $expdate; else ''?>" placeholder="Enter License Expiry Date" required>
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
      

       
        
        <div class="col-12">
          <input type="submit" class="btn btn-primary" value="Save" name="save" id="save" onclick="return validateInputVal();"/>
        </div>
      </form>
   </section>
   <?php include("footernav.php")?>


  </body>
</html>