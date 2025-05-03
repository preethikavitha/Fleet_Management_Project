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
	$sql="SELECT from_location,to_location,type_of_rent,type_of_place,empid,aboutpackage FROM booking WHERE book_id=$id";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$empid=$row['empid'];
$sql1="SELECT empname FROM driver WHERE empid='$empid'";
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
            <h5>Package Details(DrivingDetails)</h5>
</center>
<br>
		<div class="row">
			<div class="col-md-12">
				<p>Package: <b><?php if(isset($row['aboutpackage'])) echo $row['aboutpackage'] ;else echo ''; ?></b></p>
                <p>Type Of Rent: <b><?php if(isset($row['type_of_rent'])) echo $row['type_of_rent']  ; else echo ''; ?></b></p>
				<p>Driver Id: <b><?php  if(isset($row['empid'])) echo $row['empid'] ; else echo '';?></b></p>
                <p>Driver Name: <b><?php  if(isset($row1['empname'])) echo $row1['empname'] ; else echo ''; ?></b></p>
                <p>From Location: <b><?php if(isset($row['from_location'])) echo $row['from_location'] ; else echo ''; ?></b></p>
				<p>To Location: <b><?php  if(isset($row['to_location'])) echo $row['to_location'] ; else echo '';?></b></p>
				
				
                <p>Type Of Place: <b><?php  if(isset($row['type_of_place'])) echo $row['type_of_place']; else echo ''; ?></b></p>
               
                

			</div>
		
		</div>
	</div>
</div>

<script>
	
</script>