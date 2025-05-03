
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<body>
<?php include('sidenav.php');  ?>
	<div class="container-fluid">
	<?php
	include('../dbcon.php');
	if($conn->connect_error)
	{
		die("connection failed".$conn->connect_error);
	}
    if(isset($_GET['empid']))
    {
        $id=$_GET['empid'];

    }
	
    $sql="SELECT type_of_place,book_id,from_location,from_location_address,date_format(pick_date,'%d-%m-%Y %H:%m:%s') as pick_date,date_format(drop_date,'%d-%m-%Y %H:%m:%s') as drop_date FROM booking  WHERE empid='$id' AND status='confirm' ORDER BY book_date DESC";
    $result=$conn->query($sql);
    $sql1="SELECT count(*) as count FROM booking WHERE pick_date>now()-INTERVAL 1 MONTH AND empid='$id' AND status='confirm'";
    $result1=$conn->query($sql1);
    $row1=$result1->fetch_assoc();
	$sql2="SELECT SUM(tot_amt) as amount FROM booking WHERE pick_date>now()-INTERVAL 1 MONTH AND empid='$id' AND status='confirm'";
    $result2=$conn->query($sql2);
    $row2=$result2->fetch_assoc();
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
						<b>DRIVER WORK HISTORY</b>
              
                        <div class="text-center">
                            <b>Employee_ID: </b><?php echo $id ?><br>
                            Total Bookings Attended this month:<b class='text-primary'><?php if(isset($row1['count'])) echo $row1['count']; else echo ''; ?></b><br>
                            Total Amount Earned By his Driving:<b class='text-primary'>₹<?php if(isset($row2['amount'])) echo number_format($row2['amount'],2); else echo ''; ?></b><br>
					
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
                              
									<th class="text-center">pick Up</th>
									<th class="text-center">Drop</th>
									<th class="text-center">from_location</th>
									<th class="text-center">to_location</th>
									<th class="text-center">type_of_place</th>
								</tr>
                                
							</thead>

							
							<tbody id="search">
							
                            <?php
							if($result->num_rows>0)
							{
								while($row=$result->fetch_assoc())
								{
									
									?>
									<tr class="text-center" id="<?php echo $row["book_id"] ?>">
                                 
									<td><?php echo $row["pick_date"]; ?></td>
									<td><?php echo $row["drop_date"];?></td>
									<td><?php echo $row["from_location"]; ?></td>
								
									<td><?php echo $row["to_location"] ?></td>

									<td class="text-center"><?php echo $row['type_of_place']; ?></td>
									  
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
		$("#live_search").change(function(){
			var input=$(this).val();
			console.log(input);
			if(input != "")
			{
				
				
				$.ajax(
					{
						
						url:"search.php",
						method:"POST",
						data:{'click_search':true,input:input},
						success:function(data)
						{
							$("#search").hide();
							$("#searchres").show();
							$("#searchres").html(data);
						}
					}
				)
			}
			else
			{
				
				$("#search").show();
				$("#searchres").hide();
			}
		})
	})

   
    </script>
</body>
</html>

