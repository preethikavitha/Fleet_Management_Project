<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
<?php include('sidenav.php'); ?>
	<div class="container-fluid">
	<?php
	include('../dbcon.php');
	if($conn->connect_error)
	{
		die("connection failed".$conn->connect_error);
	}
    if(isset($_COOKIE['num_plate']))
    {
        $num_plate=$_COOKIE['num_plate'];
    }
	else if(isset($_GET['num_plate']))
	{
		$num_plate=$_GET['num_plate'];
		setcookie('num_plate',$num_plate,time()+60*60);
	      
	}
	$sql1="SELECT model,category FROM vehicle WHERE num_plate_id='$num_plate'";
	$result1=$conn->query($sql1);
    $row1=$result1->fetch_assoc();
    $model=$row1['model'];
    $category=$row1['category'];
    $sql="SELECT *,date_format(Service_date,'%d-%m-%Y') as Service_date FROM services WHERE num_plate_id='$num_plate' ORDER BY Service_date DESC";
    $result=$conn->query($sql);
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
                        <span  class="float:right"><a style="float:right" class="btn btn-success btn-block btn-sm col-sm-2 float-right" href="addService.php" id="new_car">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
</svg> Add New ServiceDetails
</a></span>
                        <div class="text-center">
                            <b>Number_Plate: </b><?php echo $num_plate ?><br>
                            <b>Model: </b><?php echo $model." " ?> <b>Category: </b><?php echo $category ?></div>
                        
					
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
                              
									<th class="text-center">Service_date</th>
									<th class="text-center">Service_cost</th>
									<th class="text-center">Insurance Claim</th>
									<th class="text-center">Spend Amount</th>
									<th class="text-center">Action</th>
								</tr>
                                
							</thead>

							
							<tbody id="search">
							
                            <?php
							if($result->num_rows>0)
							{
								while($row=$result->fetch_assoc())
								{
									
									?>
									<tr class="text-center" id="<?php echo $row["service_id"] ?>">
									<td><?php echo $row["Service_date"]; ?></td>
									<td><?php echo $row["Service_cost"];?></td>
									<td><?php echo $row["ins_claim"];?></td>
									<td><?php echo $row["rem_cost"];?></td>
									

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
			
			var user_id = $(this).closest('tr').attr('id'); 
			
			console.log(user_id);
			window.location.href="editser.php?user_id="+user_id;
		})
	})
    </script>
</body>
</html>
