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
	$sql="SELECT * FROM vehicle WHERE num_plate_id='$id'";
$result=$conn->query($sql);

   
	    if($result->num_rows>0)
        {
            $row=$result->fetch_assoc();
        $brand=$row['brand'];
        $model=$row['model'];
        $category=$row['category'];
        $transmission=$row['transmission_type'];
        $engine=$row['engine_type'];
        $description=$row['Description'];
        $seat=$row['seat'];
        $bootspace=$row['bootspace'];
        }

        $sql1="SELECT * FROM rent_price WHERE num_plate_id='$id'";
        $result=$conn->query($sql1);
        if($result->num_rows>0)
        {
            $row=$result->fetch_assoc();
            $day=$row['rent_price_per_day'];
            $km=$row['rent_price_per_km'];
            $hour=$row['rent_price_per_hour'];

        }
        $sql2="SELECT SUM(amount_paid) AS amount_paid FROM insurance_history WHERE num_plate_id='$id'";
        $result=$conn->query($sql2);
        if($result->num_rows>0)
        {
            $row=$result->fetch_assoc();
            $inscost=$row['amount_paid'];
          

        }
        $sql3="SELECT * FROM notification WHERE num_plate_id='$id'";
        $result=$conn->query($sql3);
        if($result->num_rows>0)
        {
            $row=$result->fetch_assoc();
            $exp=$row['RTO_Exp_date'];
        }
        $sql4="SELECT SUM(Service_cost)as Service_cost,MAX(Service_date) as Service_date FROM services WHERE num_plate_id='$id'";
        $result=$conn->query($sql4);
        if($result->num_rows>0)
        {
            $row=$result->fetch_assoc();
          
            $serdate=$row['Service_date'];
            $sercost=$row['Service_cost'];

        }
        $sql6="SELECT SUM(cost) as cost,MAX(date) as date FROM fuel_cost WHERE num_plate_id='$id'";
        $result6=$conn->query($sql6);
        if($result6->num_rows>0)
        {
            $row6=$result6->fetch_assoc();
           $cost=$row6['cost'];
           $fueldate=$row6['date'];
        }
        $sql5="SELECT full_image FROM images WHERE num_plate_id='$id'";
        $result=$conn->query($sql5);
        if($result->num_rows>0)
        {
            $row=$result->fetch_assoc();
            $image=$row['full_image'];
        }

      
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

      <style type="text/css">
	.avatar {
    height: 500px;
    width: 500px;
    overflow: hidden; /* Ensures the image doesn't overflow the container */
    /* Makes the container a circle */
}

.avatar img {
    width: 100%; /* Makes the image fill the container */
    height: auto; /* Maintains the aspect ratio of the image */
    object-fit: cover; /* Ensures the image covers the container without stretching */
}

	/*.avatar {
	    max-width: calc(100%);
	    max-height: 27vh;
	    align-items: center;
	    justify-content: center;
	    padding: 2px;
	}
	.avatar img {
	    max-width: calc(100%);
	    max-height: 27vh;
	}*/
	p{
		margin:unset;
	}
	
</style>
<div class="container-field">
	<div class="col-lg-12">
		<div>
			<center>
				<div class="avatar" style="height:500px;width:500px;">

				 <img src='<?php echo "$image" ?>'  alt="">
				</div>
                
			</center>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6">
				<p>Brand: <b><?php if(isset($brand)) echo $brand ;else echo ''; ?></b></p>
				<p>Model: <b><?php if(isset($model)) echo $model ; else echo ''; ?></b></p>
				<p>Category: <b><?php  if(isset($category)) echo $category ; else echo '';?></b></p>
				<p>Transmission: <b><?php if(isset($transmission)) echo $transmission  ; else echo ''; ?></b></p>
				<p>Engine: <b><?php  if(isset($engine)) echo $engine ; else echo '';?></b></p>
                <p>Seat: <b><?php  if(isset($seat)) echo $seat ; else echo ''; ?></b></p>
                <p>BootSpace: <b><?php  if(isset($bootspace)) echo $bootspace ; else echo ''; ?></b></p>
                <p><b>Rent Details</b></p>
                <p>RentPricePerDay: <b><?php  if(isset($day)) echo $day; else echo '';  ?></b></p>
                <p>RentPricePerKm: <b><?php  if(isset($km)) echo $km ; else echo ''; ?></b></p>
                <p>RentPricePerHour: <b><?php  if(isset($hour)) echo $hour; else echo '';  ?></b></p>
                <p>RTOExpiryDate: <b><?php  if(isset($exp)) echo $exp; else echo '';  ?></b></p>
                <p><b>Fuel Details</b></p>
                <p>Last Fuel Date:<b><?php if(isset($fueldate)) echo $fueldate; ?></b></p> 
                <p>Fuel Cost :<b><?php if(isset($cost)) echo $cost; ?></b></p> 
                 <p><a style='color:blue' href="fueldet.php?num_plate=<?php echo $id; ?>">View Fuel Details</a></p>


			</div>
			<div class="col-md-6">
                <p><b>Insurance Details</b></p>
                <p>Insurance Cost :<b><?php if(isset($inscost)) echo $inscost; ?></b></p> 
                 <p><a style='color:blue' href="insurdet.php?num_plate=<?php echo $id; ?>">View Insurance Details</a></p>

                <p><b>Service Details</b></p>
           
                <p>Last Service Date: <b><?php  if(isset($serdate)) echo $serdate ?></b></p>
                <p>Service Cost: <b><?php  if(isset($sercost)) echo $sercost ?></b></p>
                <p><a style='color:blue' href="servicedet.php?num_plate=<?php echo $id; ?>">View Service Details</a></p>
				<p><b>Description:</b></p>
				<p><?php echo html_entity_decode($description) ?></p>
			</div>
		</div>
	</div>
</div>

<script>
	
</script>