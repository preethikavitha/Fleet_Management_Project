<?php include("home.php");
 include("dbcon.php"); 
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $category = $_POST['category'];
    $sql = "SELECT * FROM vehicle WHERE isactive='Active' AND status='Not Booked' AND category='$category'";
    $result = $conn->query($sql);
   
   

    $sql1 = "SELECT * FROM booking WHERE category='$category' and status='confirm' and (pick_date > '$date2' or drop_date < '$date1')";
    $result1 = $conn->query($sql1);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>
    
    <?php
              if ($result->num_rows > 0) {
                $sql= "insert into checkavail(pick_date,drop_date) values('$date1','$date2')";
	            $conn->query($sql);

                ?>
                <?php while ($row = $result->fetch_assoc()) {
                                  ?>
       <div class="container ">
        <?php
                                  
                          
                                  $num_plate=$row['num_plate_id'];
                                  $sql3 = "SELECT num_plate_id,full_image FROM images where num_plate_id='$num_plate'";
                                  $result3 = $conn->query($sql3);
                                  $row3 = $result3->fetch_assoc();
                                 ?>
        <div class="row mx-0 my-5 bg-dark rounded">
            <div class="col-md-5 p-0">
     <img  src='<?php echo $row3["full_image"];?>'   style=' width:100%; height:100%; border-radius:5px 0px 0px 5px;

 '>

 <form action="imagesslideshow.php" method="post">
    <!-- Assuming $selected_num_plate_id is the variable you want to send -->
    <input type="hidden" name="num_plate_id" value="<?php echo $row["num_plate_id"]; ?>">
    
    <button type="submit" class="btn btn-secondary py-1 ml-1">View</button>
</form>
   </div>  
    <div class="col-md-6"> 
    <table>
             <center>
              <div class="my-3">

             <span class="mb-0 rated">Brand:</span>
                                                <span class="text-primary"><b><?php echo $row["brand"]; ?></b></span>
                                                &nbsp;&nbsp;

                                                <span class="mb-0 rated" >Model:</span>
                                                <span class="text-primary"><b><?php echo $row["model"]; ?></b></span></center>
        </div>
                                              
             
                <tr><td>
            <div class="media block-6 services">
            
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-dashboard w-10 h-10"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3 text-light">
		                	Amount of Fuel<br>
		                	<span><b class="text-primary"><?php $fuel=$row["fuel_lit"];echo number_format($fuel,2); ?>&nbsp;Liter</b></span>
		                </h3>
	                </div>
                </div>
            
                  
          </div></td><td>
          <div class="media block-6 services">
        
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-pistons"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3 text-light">
		                	Transmission<br>
		                	<span><b class="text-primary"><?php echo $row["transmission_type"]; ?></b></span>
		                </h3>
	                
                </div>
              </div>
            </div> </td>
        <td>

        <div class="media block-6 services">
             
             <div class="d-flex mb-3 align-items-center">
                 <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-diesel"></span></div>
                 <div class="text">
                   <h3 class="heading mb-0 pl-3 text-light">
                    Engine Type<br>
                       <span><b class="text-primary"><?php echo $row["engine_type"]; ?></b></span>
                   </h3>
               </div>
           </div>
     
       </div> 
        </td></tr>
            <tr>
            <td>
            <div class="media block-6 services">
             
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car-seat"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3 text-light">
		                	Seats<br>
		                	<span><b class="text-primary"><?php echo $row["seat"]; ?></b></span>
		                </h3>
	                </div>
                </div>
          
            </div> </td>
            
<td>
<div class="media block-6 services">
             
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-backpack"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3 text-light">
		                	Bootspace<br>
		                	<span><b class="text-primary"><?php $boot=$row["bootspace"]; echo number_format($boot); ?>&nbsp;Liter</b></span>
		                </h3>
	                </div>
                </div>
              </div>


</td>
&nbsp;

  
			             
			           
    
        </tr>
        <tr>
         <td></td>
        
       
        <td><b>
        <form action="demoprice.php" method="POST">
       <input type="hidden" name="num_plate_id" value="<?php echo $row["num_plate_id"]; ?>">
    
    <button type="submit" class="btn btn-success">Rent Your Vehicle</button>
</form>
          
        </td>
        
      </tr>
        




           

        </table>    
       <br>
        </div>    
          </div>

      
       
       
        <?php }
        
         }
         elseif($result1->num_rows > 0) {
              
             
                               
                                               
                              
                              
                                 
              while ($row = $result1->fetch_assoc()) {
              
                  $num_plate=$row['num_plate_id'];

                  $sql2="SELECT * FROM vehicle WHERE isactive='Active' AND num_plate_id='$num_plate'";
               $result2=$conn->query($sql2);

               
               while($row2=$result2->fetch_assoc())
               {
     
                                  
                          
                                  $num_plate=$row2['num_plate_id'];
                                  $sql3 = "SELECT num_plate_id,full_image FROM images where num_plate_id='$num_plate'";
                                  $result3 = $conn->query($sql3);
                                  $row3 = $result3->fetch_assoc();
                                 ?>
                                        <div class="container ">
                                   <br>  <h3 style="text-align:center"><b>Expected Available Vehicles</b></h3>
 <br><br><br>
 <center> <h4 style="color:red">Already Booked on</h4></center>
            <center><h4 style="color:blue"> <b>Pick date: <?php echo $row['pick_date']; ?>  Drop date:<?php echo $row['drop_date']; ?></b></h4>
          <h4 style="color:green"> Would You Like to Book?</h4>
          </center>
                                       
        <div class="row mx-0 my-5 bg-dark rounded">
            <div class="col-md-5 p-0">
     <img  src='<?php echo $row3["full_image"];?>'   style=' width:100%; height:100%; border-radius:5px 0px 0px 5px;

 '>

 <form action="imagesslideshow.php" method="post">
    <!-- Assuming $selected_num_plate_id is the variable you want to send -->
    <input type="hidden" name="num_plate_id" value="<?php echo $row2["num_plate_id"]; ?>">
    
    <button type="submit" class="btn btn-secondary py-1 ml-1">View</button>
</form>
   </div>  
    <div class="col-md-6"> 
    <table>
             <center>
              <div class="my-3">

             <span class="mb-0 rated">Brand:</span>
                                                <span class="text-primary"><b><?php echo $row2["brand"]; ?></b></span>
                                                &nbsp;&nbsp;

                                                <span class="mb-0 rated" >Model:</span>
                                                <span class="text-primary"><b><?php echo $row2["model"]; ?></b></span></center>
        </div>
                                              
             
                <tr><td>
            <div class="media block-6 services">
            
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-dashboard w-10 h-10"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3 text-light">
		                	Amount of Fuel<br>
		                	<span><b class="text-primary"><?php $fuel=$row2["fuel_lit"];echo number_format($fuel,2); ?>&nbsp;Liter</b></span>
		                </h3>
	                </div>
                </div>
            
                  
          </div></td><td>
          <div class="media block-6 services">
        
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-pistons"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3 text-light">
		                	Transmission<br>
		                	<span><b class="text-primary"><?php echo $row2["transmission_type"]; ?></b></span>
		                </h3>
	                
                </div>
              </div>
            </div> </td>
        <td>

        <div class="media block-6 services">
             
             <div class="d-flex mb-3 align-items-center">
                 <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-diesel"></span></div>
                 <div class="text">
                   <h3 class="heading mb-0 pl-3 text-light">
                    Engine Type<br>
                       <span><b class="text-primary"><?php echo $row2["engine_type"]; ?></b></span>
                   </h3>
               </div>
           </div>
     
       </div> 
        </td></tr>
            <tr>
            <td>
            <div class="media block-6 services">
             
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car-seat"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3 text-light">
		                	Seats<br>
		                	<span><b class="text-primary"><?php echo $row2["seat"]; ?></b></span>
		                </h3>
	                </div>
                </div>
          
            </div> </td>
            
<td>
<div class="media block-6 services">
             
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-backpack"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3 text-light">
		                	Bootspace<br>
		                	<span><b class="text-primary"><?php $boot=$row2["bootspace"]; echo number_format($boot); ?>&nbsp;Liter</b></span>
		                </h3>
	                </div>
                </div>
              </div>


</td>
&nbsp;

  
			             
			           
    
        </tr>
        <tr>
         <td></td>
        
       
        <td><b>
        <form action="demoprice.php" method="POST">
       <input type="hidden" name="num_plate_id" value="<?php echo $row2["num_plate_id"]; ?>">
    
    <button type="submit" class="btn btn-success">Rent Your Vehicle</button>
</form>
          
        </td>
        
      </tr>
        




           

        </table>    
       <br>
        </div>    
          </div>

      
       
       
          <?php
                
              }
          }
         
        
          ?> 
             <?php } else {
              ?>
               
               <?php
                          echo "<br><br><br><br><h5 style='color:red;' 'text-align:center'><b><center><i>   Sorry, </i></center>";
    
                          echo "<center><i> The Vehicle category You Have Expected is not in availability</i></center>";
                          echo "<center><i> Would you like to rent another category instead?</i></center></b></h5>";
                include("rentnow1.php");
          }
          
     
          ?>
          <?php include("footer.php")?>
 