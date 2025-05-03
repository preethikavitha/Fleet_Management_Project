
<?php
session_start();
include('dbcon.php');

if(isset($_POST['click_view_btn']))
{
	$id=$_POST['num_plate_id'];
	
  
    if($conn->connect_error)
	{
		die("connection failed".$conn->connect_error);
	}
	$sql="SELECT * FROM vehicle WHERE num_plate_id='$id'";
	
$result=$conn->query($sql);

	?>
	<?php
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
		$sql2 = "SELECT *FROM images where num_plate_id='$id'";
		$result1 = $conn->query($sql2);
		//$row1 = $result1->fetch_assoc();
		//$imag=$row1['full_image'];
		?>
<!--detail-->

<div class="bg-light">
	
<center><h5><span class="mb-0 rated">Brand:</span> <span class="text-primary"><b><?php echo $row["brand"]; ?></b></span>&nbsp;&nbsp;&nbsp;
<span class="mb-0 rated" >Model:</span>
                                                <span class="text-primary"><b><?php echo $row["model"]; ?></b></span></h5>
   

												
  
 
</center>
<br>

<div class="row">
		<div class="col-3"></div>
<div class="col-6 text-center">

				 <!--<img src='<?php //if(isset($imag)) echo  $imag; else ''; ?>' alt="" style="height:250px;width:350px;">-->
				<!-- <form action="imagesslideshow.php" method="POST">
       <input type="hidden" name="num_plate_id" value="<?php //echo $id; ?>">
	  
    <button type="submit" class="btn btn-primary">View Vehicle</button>
</form>-->
<?php
if ($result1->num_rows > 0) {

	while($row1 = $result1->fetch_assoc()) {
	   $fullImage = $row1['full_image'];
	   $frontImage = $row1['front_image'];
	   $rearImage = $row1['rear_image'];
	   $insideImage = $row1['inside_image'];
	   $addiImage = $row1['addi_image'];
	   $bootImage = $row1['boot_image'];
	   
	   echo "<div class='content section' style='max-width:500px'>";
	   
	   if (!empty($fullImage)) {
		   echo "<img class='slides' src='$fullImage' style='width:100%' alt='Full Image'>";
	   }
	
   
	   if (!empty($frontImage)) {
		   echo "<img class='slides' src='$frontImage' style='width:100%' alt='Front Image'>";
	   }
   
	   if (!empty($rearImage)) {
		   echo "<img class='slides' src='$rearImage' style='width:100%' alt='Rear Image'>";
	   }
	   if (!empty($insideImage)) {
		echo "<img class='slides' src='$insideImage' style='width:100%' alt='Full Image'>";
	}
	if (!empty($addiImage)) {
		echo "<img class='slides' src='$addiImage' style='width:100%' alt='Full Image'>";
	}
	if (!empty($bootImage)) {
		echo "<img class='slides' src='$bootImage' style='width:100%' alt='Full Image'>";
	}
   
	   echo "    </div>";
   }
   




	 }
else {
echo "Empty Gallery";
}
?>





				</div>
				<div class="col-3"></div>
		</div>	</div> <br><hr><div class="p-6"></div> <div class="bg-light">
			<table class="table">
		<tr><div class="row">
		<div class="col-4"></div>
<div class="col-4 text-center">	
		

   <div class="media block-6 services">
  <div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-dashboard"></span></div>
	              	<div class="text">
		                <span class="heading mb-0 pl-3 text-dark">
		                	Amount of Fuel </span>
		                	<span><b class="text-primary"><?php $fuel=$row["fuel_lit"]; echo number_format($fuel); ?>&nbsp;Liter</b></span>
		               
	                </div>
                </div></div></div>
				<div class="col-4"></div>
		</div></tr><tr>
		<div class="row">
		<div class="col-4"></div>
		<div class="col-4 text-center">	
				<div class="media block-6 services">
             
			 <div class="d-flex mb-3 align-items-center">
				 <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-backpack"></span></div>
				 <div class="text">
				   <span class="heading mb-0 pl-3 text-dark">
					   Bootspace</span>
					   <span><b class="text-primary"><?php $boot=$row["bootspace"]; echo number_format($boot); ?>&nbsp;Liter</b></span>
				   
			   </div>
		   </div>
		 </div></div>
				<div class="col-4"></div>
		</div></tr><tr>
		<div class="row">
		<div class="col-4"></div>
		<div class="col-4 text-center">	
<div class="media block-6 services">
        
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-pistons"></span></div>
	              	<div class="text">
		                <span class="heading mb-0 pl-3 text-dark">
		                	Transmission </span>
		                	<span><b class="text-primary"><?php echo $row["transmission_type"]; ?></b></span>
		               
	                
                </div>
              </div>
            </div>

		 </div>
				<div class="col-4"></div></div></tr>
				<tr>	<div class="col-12"></div></tr>
				<tr>	<div class="col-12"></div></tr>
				<tr>
		<div class="row">
		<div class="col-4"></div>
		<div class="col-4 text-center">	
<div class="media block-6 services">
        
              	<div class="d-flex mb-3 align-items-center">
				  <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-diesel"></span></div>
	          
	              	 	<div class="text">
		                <span class="heading mb-0 pl-3 text-dark">
						Engine Type </span>
		                	<span><b class="text-primary"><?php echo $row["engine_type"]; ?></b></span>
		               
							    	
                </div>
              </div>
            </div>

		 </div>
				<div class="col-4"></div></div></tr>
<tr>	<div class="col-12"></div></tr>
<tr>	<div class="col-12"></div></tr>
				<tr>	<div class="col-12"></div></tr>
			
				<tr>
		<div class="row">
		<div class="col-4"></div>
		<div class="col-4 text-center">	
<div class="media block-6 services">
        
              	<div class="d-flex mb-3 align-items-center">
	              		  <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car-seat"></span></div>
	              
					<div class="text">
				<span class="heading mb-0 pl-3 text-dark">
		              	&nbsp;&nbsp;&nbsp;&nbsp; Seats	</span>
		                	<span><b class="text-primary"><?php echo $row["seat"]; ?></b></span>
							
	                
                </div>
              </div>
            </div>

		 </div>
				<div class="col-4"></div></div></tr>
			
			</table>
		
			
       
<form id="rentForm" action="refercode.php" method="POST">

<input type="hidden" name="num_plate_id" value="<?php echo $id; ?>">
<input type="hidden" name="img" value="<?php echo $fullImage; ?>">
     <input type="hidden" name="brand" value="<?php echo $row["brand"]; ?>">
    <input type="hidden" name="model" value="<?php echo $row["model"]; ?>">
    <input type="hidden" name="category" value="<?php echo $row["category"]; ?>">
    <center>
        <input class="btn btn-primary text-light" id="showInputButton" name="rent" value="Rentnow" type="submit">
    </center>
</form>



    
	
	</div>
	

 
       <script>
		
var index = 0;
slideshow();
function plusSlides(x) {
        showSlides(slideIndex += x);
    }
function slideshow() {
  var i;
  var x = document.getElementsByClassName("slides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  index++;
  if (index > x.length) {index = 1} 
  
  x[index-1].style.display = "block";  
  setTimeout(slideshow, 3000); // Change slides every 3 seconds
}






</script>
 
<!---details->

<?php
} else {
                echo "No matching records found.";
            }
        
           
        } else {
            echo "Invalid request.";
        }?>

		