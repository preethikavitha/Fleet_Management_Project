

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<body>
<?php include('sidenav.php'); ?>
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
	
    $sql="SELECT *,date_format(from_Leave,'%d-%m-%Y') AS from_Leave,date_format(to_Leave,'%d-%m-%Y') AS to_Leave FROM driver_leave  WHERE empid='$id' ORDER BY from_Leave DESC";
    $result=$conn->query($sql);
	$sql1="SELECT SUM(tot_leave) AS tot_leave FROM driver_leave WHERE empid='$id'";
	$result1=$conn->query($sql1);
	$row1=$result1->fetch_assoc();


$sql2="SELECT SUM(tot_leave) AS tot_leave_mon FROM driver_leave WHERE empid='$id' AND  to_Leave>=now()-INTERVAL 1 MONTH";
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
						<b>DRIVER LEAVE HISTORY</b>
                        <span  class="float:right"><a style="float:right" class="btn btn-success btn-block btn-sm col-sm-2 float-right" href="getleavedet.php" id="new_car">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
</svg> Add New Leave Details
</a></span>
                        <div class="text-center">
                            <b>Employee_ID: </b><?php echo $id ?><br>
							
							Total no of Days driver on leave:<b class='text-primary'><?php echo number_format($row1['tot_leave']);?></b><br>
							Total no of Days driver on leave in this month:<b class='text-primary'><?php echo number_format($row2['tot_leave_mon']);?></b>
                           
                        
					
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
                                <th class="text-center">Leave_id</th>
									<th class="text-center">from_leave</th>
									<th class="text-center">to_leave</th>
									<th class="text-center">Total Days</th>
									<th class="text-center">Type of Leave</th>
									<th class="text-center">Action</th>
								</tr>
                                
							</thead>

							
							<tbody id="search">
							
                            <?php
							if($result->num_rows>0)
							{
								while($row=$result->fetch_assoc())
								{
									$from=strtotime($row["from_Leave"]);
                                    $to=strtotime($row["to_Leave"]);
									?>
									<tr class="text-center" id="<?php echo $row["id"] ?>">
                                    <td class='user_id' id='user'><?php echo $row["id"] ?></td>
									<td><?php echo $row["from_Leave"]; ?></td>
									<td><?php echo $row["to_Leave"]; ?></td>
									<td><?php echo $to-$from+1;?></td>
								
									<td><?php echo $row["type_of_leave"] ?></td>

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

    $(document).ready(function()
	{
		$('.edit_car').click(function (e)
		{
			e.preventDefault();
			
			var user_id=$(this).closest('tr').find('.user_id').text();
			
			console.log(user_id);
			window.location.href="editleave.php?user_id="+user_id;
		})
	})
    </script>
</body>


