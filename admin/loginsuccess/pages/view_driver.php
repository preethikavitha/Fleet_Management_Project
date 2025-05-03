<?php
session_start();
include('../dbcon.php');
if(isset($_POST['click_view_btn']))
{
    $id=$_POST['user_id'];
    //echo $id;
    if($conn->connect_error)
	{
		die("connection failed".$conn->connect_error);
	}
	$sql="SELECT * FROM driver WHERE empid='$id'";
	$sql1="SELECT * FROM license WHERE empid='$id'";

$result=$conn->query($sql);


$result1=$conn->query($sql1);
if($result->num_rows>0)
{
$row=$result->fetch_assoc();
$empid=$row['empid'];
	$empname=$row['empname'];
	$time=$row['drivetime'];
	$place=$row['driveplace'];
	$salary=$row['salary'];
	$joindate=$row['joindate'];
	$address=$row['address'];
	$mailid=$row['mailID'];
	$mobileno=$row['mobileno'];
	$imag=$row['profile'];
	
	$age=$row['age'];
	$status=$row['status'];
	$category=$row['category'];
	$insurance=$row['isInsurance'];
}
	if($result1->num_rows>0)
	{
	$row1=$result1->fetch_assoc();
	$licenseno=$row1['license_no'];
	$licensecategory=$row1['category'];
	$expirydate=$row1['ExpDate'];
	$Image=$row1['image_path'];
}
}   

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

      <style type="text/css">
	
	.avatar {
	    max-width: calc(100%);
	    max-height: 27vh;
	    align-items: center;
	    justify-content: center;
	    padding: 2px;
	}
	.avatar img {
	    max-width: calc(100%);
	    max-height: 27vh;
	}
	p{
		margin:unset;
	}
	
</style>
<div class="container-field">
	<div class="col-lg-12">
		<div>
			<center>
				<div class="avatar" style="height:250px;width:250px;">
				 <img src='<?php if(isset($imag)) echo  $imag; else ''; ?>'  style="border-radius:50% ;border:1px solid #ff;" alt="">
				</div>
			</center>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6">
				<p>Employee ID: <b><?php if(isset($empid)) echo $empid ;else echo ''; ?></b></p>
				<p>Employee Name: <b><?php if(isset($empname)) echo $empname ; else echo ''; ?></b></p>
				<p><b>Employee Type</b></p>
				<p>Drive Time: <b><?php  if(isset($time)) echo $time ; else echo '';?></b></p>
				<p>Drive Place: <b><?php  if(isset($place)) echo $place ; else echo '';?></b></p>
				<p>Salary: <b><?php  if(isset($salary)) echo $salary ; else echo '';?></b></p>
				
                <p>JoinDate: <b><?php  if(isset($joindate)) echo $joindate ; else echo ''; ?></b></p>
                
                <p>Age: <b><?php  if(isset($age)) echo $age ; else echo ''; ?></b></p>
                <p>Status: <b><?php  if(isset($status)) echo $status ; else echo ''; ?></b></p>
                <p>category: <b><?php  if(isset($category)) echo $category ; else echo ''; ?></b></p>
                <p>Has insurance: <b><?php  if(isset($insurance)) echo $insurance ; else echo ''; ?></b></p>
            	<p><b>Contact Information</b></p>
	<p>Address: <b><?php  if(isset($address)) echo $address ; else echo ''; ?></b></p>
                <p>Mail Id: <b><?php  if(isset($mailid)) echo $mailid ; else echo ''; ?></b></p>
	<p>MobileNo: <b><?php  if(isset($mobileno)) echo $mobileno ; else echo '';?></b></p>
			</div>


<div class="col-md-6">

                <p><b>License Details</b></p>
                <p>License Number: <b><?php  if(isset($licenseno)) echo $licenseno; else echo '';  ?></b></p>
                <p>License Category :<b><?php  if(isset($licensecategory)) echo $licensecategory ; else echo ''; ?></b></p>
                <p>LicenseExpiryDate :<b><?php  if(isset($expirydate)) echo $expirydate; else echo '';  ?></b></p>
                <p>License Image <a target="_thapa" href="<?php  if(isset($Image)) echo $Image; else echo '';  ?>" style="color:blue;" >See driver License</a></p>
                <p><b>Driver History</b></p>
				<p><a href="driverhist.php?empid=<?php echo $id;?>" style="color:blue">View Details</a></p>
				<p><b>Leave Of Driver History</b></p>
				<p><a href="leavedet.php?empid=<?php echo $id;?>" style="color:blue">View Details</a></p>
				

			</div>
			
		</div>
	</div>
</div>

<script>
	
</script>