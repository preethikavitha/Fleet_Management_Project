<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

</head>
<body>
	<div class="container-fluid">
	<?php include('sidenav.php'); 
	include('../dbcon.php');
	if($conn->connect_error)
	{
		die("connection failed".$conn->connect_error);
	}
    if(isset($_COOKIE['num_plate']))
    {
        $num_plate=$_COOKIE['num_plate'];
    }
$ins_id=0;
	if(isset($_GET['ins_id']))
	{
		$ins_id=$_GET['ins_id'];
	}	
	
	$sql1="SELECT model,category FROM vehicle WHERE num_plate_id='$num_plate'";
	$result1=$conn->query($sql1);
	$row1=$result1->fetch_assoc();


	$sql3="SELECT * FROM insurancename WHERE num_plate_id='$num_plate' AND insurance_id=$ins_id";
	$result3=$conn->query($sql3);
	$row3=$result3->fetch_assoc(); 

	$sql="SELECT * FROM insurance_history WHERE num_plate_id='$num_plate' AND insurance_id=$ins_id ORDER BY date_of_payment DESC";
	$result=$conn->query($sql);

	
	


	/*if(isset($_POST['ins']))
	{
      $date=$_POST['date'];
	  $dis=$_POST['dis'];
	  $amt=$_POST['amt'];
	  $sql4="INSERT INTO insurance_history (num_plate_id,date_of_payment,amount_paid,discount) VALUES ('$num_plate','$date',$amt,$dis)";
       $conn->query($sql4);
	   if($sql4)
	   {?>
		<script>
		window.location.href="inshist.php";
		</script>
		<?php
	   }
	
	}*/
	if(isset($_POST['ins']))
{
	$ins_id=$_POST['insid'];
    $date = $_POST['date'];
    $dis = $_POST['dis'];
    $amt = $_POST['amt'];
    $sql4 = "INSERT INTO insurance_history (num_plate_id,insurance_id,date_of_payment, amount_paid, discount) VALUES ('$num_plate',$ins_id,'$date', $amt, $dis)";

    if ($conn->query($sql4) === TRUE) {
     ?>
      <script>
         var ins="<?php echo $ins_id;?>";
		 window.location.href="inshist.php?ins_id="+ins;
		</script>
		<?php
       
    } else {
        echo "Error: " . $sql4 . "<br>" . $conn->error;
    }
}

    
	?>
	<div class="col-lg-12">
		<div class="row mb-3 mt-3">
		<div class="col-md-12">
				
		</div>
		</div>
		<div class="row">
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<b>SERVICE HISTORY</b>
                        <span  class="float:right"><a style="float:right" class="btn btn-success btn-block btn-sm col-sm-2 float-right" href="addInsurance.php" id="new_car">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
</svg> Add New InsuranceDetails
</a></span>
                        <div class="text-center">
                            <b>Number_Plate: </b><?php echo $num_plate ?><br>
                            <b>Model: </b><?php if(isset($row1['model']))echo $row1['model']." "; else " "; ?> <b>Category: </b><?php if(isset($row1['category']))echo $row1['category']." "; else " ";  ?>
                           
							<b>PolicyName: </b><?php if(isset($row3['policy_name']))echo $row3['policy_name']." "; else " "; ?>
						</div>
                        
					
					</div>

					
					<div class="card-body">
					

						<table class="table table-condensed table-bordered table-hover">
							<tbody>
		<select id="drop">
			<option value="5" selected>5</option>
			<option value="10" >10</option>
			<option value="20">20</option>
</select>
<label for="drop">Entries to show</label>
</div>
							

                            </tbody>
							<thead>
								<tr>
                               	<th class="text-center">Date_of_payment</th>
									<th class="text-center">DiscountAmount</th>
									<th class="text-center">Amount_paid</th>
									<th class="text-center">Action</th>
								</tr>
                                
							</thead>
							

							
							<tbody id="search">
							<!--	<tr>
									<td></td>
									
									<td style="text-align:center;"><input type='date' name='date' id='dat'></td>
									<td style="text-align:center;"><input type='number' name='dis' id='dis'></td>
								
                                    <td  style="text-align:center;"><input type='number' name='amt' ></td>   
									<td class="text-center">
										<input class="btn btn-sm btn-primary ins_car" type="button" value="Insert" name="ins">
											  
								</td>		  
										 
								
	                              							
								</tr>-->


								<!-- Add this form around your input fields -->
<form method="post" action="inshist.php">
    <tr>
        <td><input type="hidden" name="insid" value="<?php echo $ins_id;?>"> </td>
        <td style="text-align:center;"><input type='date' name='date' id='dat'></td>
        <td style="text-align:center;"><input type='number' name='dis' id='dis'></td>
        <td style="text-align:center;"><input type='number' name='amt' ></td>
        <td class="text-center">
            <!-- Change type to "submit" to trigger the form submission -->
            <input class="btn btn-sm btn-primary ins_car" type="submit" value="Insert" name="ins">
        </td>
    </tr>
</form>

							
                            <?php
							if($result->num_rows>0)
							{
							
								while($row=$result->fetch_assoc())
								{  $ins_id=$row["insurance_id"];
                                  
									
									?>
									<tr class="text-center" id="<?php echo $row["inshisid"] ?>">
                                       <td><?php echo $row["date_of_payment"]; ?></td>
									<td><?php echo $row["discount"]; ?></td>
                                    <td><?php echo $row["amount_paid"];?></td>
								
									
									

									<td class="text-center">
											  <button class="btn btn-sm btn-primary edit_car" type="button" >Edit</button>
											  
											  
										  </td>
									  
									</tr>
									<?php
								}
								
                              
							  
							}
							?>
							
							</tbody>
							<tbody id="searchres">
						</tbody> 
							
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<script>

    $(document).ready(function()
	{
		$('.edit_car').click(function (e)
		{
			e.preventDefault();
			
			var user_id=$(this).closest('tr').find('.user_id').text();
			
			console.log(user_id);
			window.location.href="editser.php?user_id="+user_id;
		})
	})
    </script>
</body>
</html>