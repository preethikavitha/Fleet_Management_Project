<div class="modal fade w-100" id="viewusermodal" tabindex="-1" role="dialog" aria-labelledby="viewusermodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewusermodalLabel">Vehicle Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="view_user_data">
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close" data-dismiss="modal" onclick="closebut();">Close</button>
      </div>
    </div>
  </div>
</div>





<div class="modal fade w-100" id="viewusermodal" tabindex="-1" role="dialog" aria-labelledby="viewusermodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewusermodalLabel">Vehicle Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="view_user_data">
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close" data-dismiss="modal" onclick="closebut();">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
	function closebut()
	{
		window.location.href="empdel.php";
	}
				
	</script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<?php include('sidenav.php'); ?>
	<div class="container-fluid">
	<?php
	include('../dbcon.php');
	if($conn->connect_error)
	{
		die("connection failed".$conn->connect_error);
	}
	$sql="SELECT empid,empname,drivetime,driveplace,category,status,mobileno FROM driver WHERE status='Dismiss'";
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
						<b> Resigned Driver Details</b>
						<span  class="float:right" style="margin-right:10px"><a style="float:right" class="btn btn-success btn-block btn-sm col-sm-2 float-right" href="driver.php" id="new_car">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
</svg> Working Driver Details
</a></span>
			
					</div>
					
					<div class="card-body">
					<div  style="float:right "class="justify-content-right">
					<label for="live_search">Search</label>
					<input type="search" placeholder="Search" id="live_search"  aria-label="Search">
				
                    </div>


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
									<th class="text-center">ID</th>
									<th class="text-center">Name</th>
									<th class="text-center">Status</th>
									<th class="text-center">MobileNo</th>
									<th class="text-center">Other Info</th>
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
                                    
									<tr id=delete<?php echo $row['empid']?>>
									<td class='user_id' id='user'><?php echo $row['empid']; ?></td>
									<td><?php echo $row["empname"];?></td>
									<td><?php echo $row["status"];?></td>
									<td><?php echo $row["mobileno"];?></td>
							
									<td><?php echo "Drive Vehicles: <b>".$row['category']."</b><br>Drive Time: <b>".$row['drivetime']."</b><br>Drive Place: <b>".$row['driveplace']."</b>";?></td>
									<td class="text-center">
											  <button class="btn btn-sm btn-secondary view_driver"   data-id="<?php echo $row['empid'] ?>" type="button" >View</button>
											  <button class="btn btn-sm btn-primary edit_driver"   data-id="<?php echo $row['empid'] ?> " type="button" >Edit</button>
											  <button class="btn btn-sm btn-danger delete_driver"  data-id="<?php echo $row['empid'] ?>" type="button" >Delete</button>
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
		$("#live_search").keyup(function(){
			var input=$(this).val();
			console.log(input);
			if(input != "")
			{
				
				console.log("true");
				$.ajax(
					{
						
						url:"driversearch.php",
						method:"POST",
						data:{'click_search_driver_del':true,input:input},
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
		$('.edit_driver').click(function (e)
		{
			e.preventDefault();
			
			var user_id=$(this).closest('tr').find('.user_id').text();
			
			console.log(user_id);
			window.location.href="editdriver.php?user_id="+user_id;
		})
	})
	
	$(document).ready(function (){
		$('.view_driver').click(function (e)
		{
			e.preventDefault();
			
			var user_id=$(this).closest('tr').find('.user_id').text();
			//console.log(user_id);
			$.ajax({
				method:"POST",
				url:"view_driver.php",
				data:{
					'click_view_btn':true,
					'user_id':user_id,
				},
				success:function (response){
					//console.log(response);
					$('.view_user_data').html(response);
					$('#viewusermodal').modal('show');
					
				}
			})
		})
	})
	

	$(document).ready(function (){
		$('.delete_driver').click(function(e)
		{
			e.preventDefault();
			var user_id=$(this).closest('tr').find('.user_id').text();
			console.log(user_id);
			if(confirm('Are you sure to delete the driver?'))
			{
				$.ajax({
					method:"POST",
					url:"deletedriver.php",
					data:{
						'click_del':true,
						'user_id':user_id,
					},
					success:function(response)
					{
						//alert("Data with id "+user_id+" deleted successfully");
						$('#delete'+user_id).hide();
						
					}
				})
			}
		})
	});



	
	
	</script>