<?php

include('../dbcon.php');
if(isset($_POST['click_view_btn']))
{
    $id=$_POST['user_id'];
    //echo $id;
    if($conn->connect_error)
	{
		die("connection failed".$conn->connect_error);
	}
	$sql="SELECT *  FROM userdetail WHERE emailId='$id'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$sql1="SELECT Phno FROM usersignup WHERE Email='$id'";
$result1=$conn->query($sql1);
$row1=$result1->fetch_assoc();
   

      
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

      <style type="text/css">
	

	p{
		margin:unset;
	}
	
</style>
<div class="container-field">
	<div class="col-lg-12">
		
		<center>
            <h5>User Details</h5>
</center>
		<div class="row">
			<div class="col-md-12">
				<p>BorrowerName: <b><?php if(isset($row['name'])) echo $row['name'] ;else echo ''; ?></b></p>
				<p>MobileNo: <b><?php if(isset($row1['Phno'])) echo $row1['Phno'] ; else echo ''; ?></b></p>
				<p>AlternateMobileNo: <b><?php  if(isset($row['altmoblie'])) echo $row['altmoblie'] ; else echo '';?></b></p>
				<p>EmailID: <b><?php if(isset($row['emailId'])) echo $row['emailId']  ; else echo ''; ?></b></p>
				<p>Address: <b><?php  if(isset($row['address'])) echo $row['address'] ; else echo '';?></b></p>
                <p>Age: <b><?php  if(isset($row['age'])) echo $row['age'] ; else echo ''; ?></b></p>
                <p>AadharNo: <b><?php  if(isset($row['aadhaarno'])) echo $row['aadhaarno']; else echo ''; ?></b></p>
               
                

			</div>
		
		</div>
	</div>
</div>

<script>
	
</script>