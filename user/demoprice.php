<?php 
 include("dbcon.php"); 

if(isset($_GET['num_plate_id'])){
 $numplate=$_GET['num_plate_id'];}
 if(isset($_POST['num_plate_id'])){
 $numplate=$_POST['num_plate_id'];}
 $sql = "SELECT * FROM vehicle WHERE num_plate_id='$numplate'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$sql1 = "SELECT num_plate_id, rent_price_per_day, rent_price_per_hour, rent_price_per_km,charges,adv_amt FROM rent_price where num_plate_id='$numplate'";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();
$sql2="SELECT *from Driveramt";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();
$sql3="SELECT * FROM checkavail";
$result3=$conn->query($sql3);
while($row3=$result3->fetch_assoc())
{
	$pick_date=$row3['pick_date'];
	$drop_date=$row3['drop_date'];
}
function calculateday($date1,$date2)
{
    $dat1=strtotime($date1);
    $dat2=strtotime($date2);
   
    $diff=($dat2-$dat1)/(3600*24);
 
    return $diff;
}
$dif=calculateday($pick_date,$drop_date);
echo $dif;
 
?>




<?php include("home.php"); ?>


<style>
body{margin-top:20px;
    color: #bcd0f7;
    background: #fff;
    position: relative;
    height: 100%;
}
.pricing-plan {
    margin: 0 0 1rem 0;
    width: 100%;
    position: relative;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
}
.pricing-plan .pricing-header {
    padding: 0;
    margin-bottom: 1rem;
    text-align: center;
    background: linear-gradient(120deg, #00b5fd 0%, #0047b1 100%);
    -webkit-border-radius: 4px 4px 0px 0px;
    -moz-border-radius: 4px 4px 0px 0px;
    border-radius: 4px 4px 0px 0px;
}
.pricing-plan .pricing-header .pricing-title {
    font-size: 1.2rem;
    color: #ffffff;
    padding: 1rem 0;
    text-transform: uppercase;
    font-weight: 600;
    margin: 0;
    text-shadow: 0 30px 10px rgba(0, 0, 0, 0.15);
}
.pricing-plan .pricing-header .pricing-cost {
    color: #ffffff;
    padding: 1rem 0;
    font-size: 2.5rem;
    font-weight: 600;
    text-shadow: 0 30px 10px rgba(0, 0, 0, 0.15);
}
.pricing-plan .pricing-header .pricing-save {
    color: #ffffff;
    padding: 0.8rem 0;
    font-size: 1rem;
    font-weight: 700;
}
.pricing-plan .pricing-header.secondary {
    background-image: linear-gradient(120deg, #c0d64a 0%, #35690f 100%);
}
.pricing-plan .pricing-header.green {
    background-image: linear-gradient(120deg, #28a745 0%, #218838 100%);
	
}
.pricing-plan .pricing-header.orange {
	background-image: linear-gradient(120deg,rgb(255,131,61) 0%,rgb(249,183,23) 100%);
}
.pricing-plan .pricing-features {
    padding: 0;
    margin: 20px 0;
    text-align: left;
}
.pricing-plan .pricing-features li {
    padding: 15px 15px 15px 40px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    position: relative;
    line-height: 100%;
	text-align:center;
	color:#fff;
}

.pricing-plan .pricing-footer {
    -webkit-border-radius: 0 0 3px 3px;
    -moz-border-radius: 0 0 3px 3px;
    border-radius: 0 0 3px 3px;
    text-align: center;
    padding: 1rem 0 2rem 0;
}

@media (max-width: 767px) {
    .pricing-plan .pricing-header {
        text-align: center;
    }
    .pricing-plan .pricing-header i {
        display: block;
        float: none;
        margin-bottom: 1.5rem;
    }
}
</style>

<body>

<center>
       
<div class="container p-2">
<h4 style="text-align:center"><b class="text-primary p-3">Category : </b> <?php echo $row['category'];?>&nbsp;<b class="text-primary">Model : </b><?php echo $row["model"]; ?>&nbsp;<b class="text-primary">Brand : </b><?php echo $row["brand"]; ?></b></h4>
<h4 class="text-success" style="text-align:center"><b>"We fill the fuel tank with two liters, and ensure that you return the vehicle with the same amount of fuel."
</b>
</h4><br>
<div class="row gutters">
	<?php
	if($dif!=0){ ?>
	  <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4">
	</div>
	<?php } ?>
	<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
		<div class="pricing-plan bg-dark">
			<div class="pricing-header">
	
				<div class="pricing-cost">Rent Per Km</div>
			
			</div>
			<center><b class="pricing-cost text-primary">With Driver</b>
				</center>
			
			<ul class="pricing-features">
			<li>Per Km Driver night Charge :<span class="text-primary"> <b> <?php $kmnight=$row2['kmcharge_night']; echo number_format($kmnight,2);?></b></span></li>
			<li>Per Km Driver morning Charge : <span class="text-primary"><b><?php $kmmor=$row2['kmcharge_morning']; echo number_format($kmmor,2);?></b></span></li>
				<li>Per Km Rent Amount :<span class="text-primary"> <b> <?php $rentkm=$row1['rent_price_per_km']; echo number_format($rentkm,2);?></b></span></li>
				<li>Damage Charge :<span class="text-primary"> <b><?php $dam=$row1['charges']; echo number_format($dam,2);?></b></span></li>
				<li>Advance Charges :<span class="text-primary"> <b><?php $adam=$row1['adv_amt']; echo number_format($adam,2);?></b></span></li>
				

</ul>
			<div class="pricing-footer">
			<form action="booking.php" method="POST">
       <input type="hidden" name="num_plate_id" value="<?php echo $numplate; ?>">
	   <input type="hidden" name="typ" value="perkm">
	   <input type="hidden" name="driv" value="with">

    <button type="submit" class="btn btn-primary">Rent Now</button>
</form>
					</div>
			<center><b class="pricing-cost text-primary">Without Driver</b>
				</center>
			
			<ul class="pricing-features">
			<li>Per Km Rent Amount :<span class="text-primary"> <b><?php $rentkm=$row1['rent_price_per_km']; echo number_format($rentkm,2);?></b></span></li>
				<li>Damage Charge :<span class="text-primary"> <b><?php $dam=$row1['charges']; echo number_format($dam,2);?></b></span></li>
				<li>Advance Charges :<span class="text-primary"> <b><?php $adam=$row1['adv_amt']; echo number_format($adam,2);?></b></span></li>
				
				

</ul>
			<div class="pricing-footer">
			<form action="booking.php" method="POST">
       <input type="hidden" name="num_plate_id" value="<?php echo $numplate; ?>">
	   <input type="hidden" name="typ" value="perkm">
	   <input type="hidden" name="driv" value="without">
    <button type="submit" class="btn btn-primary">Rent Now</button>
</form>
					</div>
			
		</div>
	</div>
	<?php
	if($dif==0)
	{ ?>
	<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
		<div class="pricing-plan bg-dark">
			<div class="pricing-header green">
			<div class="pricing-cost">Rent Per Hour</div>
	</div>
	<center><b class="pricing-cost text-success">With Driver</b>
				</center>
			
			<ul class="pricing-features">
			<li>Per Hour Driver Night Charge : <span class="text-success"> <b><?php $hrnight=$row2['night_charge']; echo number_format($hrnight,2);?></b></span></li>
			<li>Per Hour Driver Morning Charge :<span class="text-success"><b>  <?php $hrmor=$row2['morning_charge']; echo number_format($hrmor,2);?></b></span></li>
				<li>Per Hour Rent Amount :<span class="text-success"> <b> <?php $renthr=$row1['rent_price_per_hour']; echo number_format($renthr,2); ?></b></span></li>
				<li>Damage Charge : <span class="text-success"><b> <?php $dam=$row1['charges']; echo number_format($dam,2);?></b></span></li>
				<li>--</li>
			
			</ul>
			<div class="pricing-footer">
			<form action="booking.php" method="POST">
       <input type="hidden" name="num_plate_id" value="<?php echo $numplate; ?>">
	   <input type="hidden" name="typ" value="perhour">
	   <input type="hidden" name="driv" value="with">
	 
    <button type="submit" class="btn btn-success">Rent Now</button>
</form>
					</div>
			<center><b class="pricing-cost text-success">Without Driver</b>
				</center>
			
			<ul class="pricing-features">
			
			<li>Per Hour Rent Amount :<span class="text-success"> <b> <?php $renthr=$row1['rent_price_per_hour']; echo number_format($renthr,2);?></b></span></li>
			<li>Damage Charge :<span class="text-success"> <b> <?php $dam=$row1['charges']; echo number_format($dam,2);?></span></b></li>
			<li>--</li>
			
					</ul>
			<div class="pricing-footer">
			<form action="booking.php" method="POST">
       <input type="hidden" name="num_plate_id" value="<?php echo $numplate; ?>">
	   <input type="hidden" name="typ" value="perhour">
	   <input type="hidden" name="driv" value="without">
    <button type="submit" class="btn btn-success">Rent Now</button>
</form>
					</div>
			
		</div>
	</div>
	<?php } else{ ?>
		<div class="col-xl-1 col-lg-1 col-md-3 col-sm-3">
	</div>
	<?php }?>
	
	<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
		<div class="pricing-plan bg-dark">
			<div class="pricing-header orange">
	
				<div class="pricing-cost">Rent Per Day</div>
			
			</div>
			<center><b class="pricing-cost text-warning">With Driver</b>
				</center>
			
			<ul class="pricing-features">
			<li>Per Day Driver Charge :<span class="text-warning"> <b><?php $daych=$row2['day_charge']; echo number_format($daych,2);?></b><span></li>
				<li>Per Day Rent Amount :<span class="text-warning"><b> <?php $rentday=$row1['rent_price_per_day']; echo number_format($rentday,2);?></b><span></li>
				<li>Damage Charge : <span class="text-warning"><b><?php $dam=$row1['charges']; echo number_format($dam,2);?></b></span></li>
			<li>--</li>
			<li>--</li>
			


</ul>
			<div class="pricing-footer">
			<form action="booking.php" method="POST">
       <input type="hidden" name="num_plate_id" value="<?php echo $numplate; ?>">
	   <input type="hidden" name="typ" value="perday">
	   <input type="hidden" name="driv" value="with">
    <button type="submit" class="btn btn-warning">Rent Now</button>
</form>
					</div>
			
			<center><b class="pricing-cost text-warning">Without Driver</b>
				</center>
			
			<ul class="pricing-features">
			
				<li>Per Day Amount :<span class="text-warning"><b> <?php $rentday=$row1['rent_price_per_day']; echo number_format($rentday,2);?></b></span></li>
				<li>Damage Charge :<span class="text-warning"> <b><?php $dam=$row1['charges']; echo number_format($dam,2);?></b></span></li>
				<li>--</li>
			
				

</ul>
			<div class="pricing-footer">
			<form action="booking.php" method="POST">
       <input type="hidden" name="num_plate_id" value="<?php echo $numplate; ?>">
	   <input type="hidden" name="typ" value="perday">
	   <input type="hidden" name="driv" value="without">
    <button type="submit" class="btn btn-warning">Rent Now</button>
</form>
					</div>
			
		</div>
	</div>

	</div>
</div>
</div>
	</center>



</body>
<?php include("footer.php")?>