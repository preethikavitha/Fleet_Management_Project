
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<?php include('sidenav.php'); ?> 	
<!--view model-->

<!-- Button trigger modal -->

<!-- Modal -->

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
        <button type="button" class="btn btn-primary close" data-dismiss="modal" onclick="closebut();">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
	function closebut()
	{
		window.location.href="car1.php";
	}
				
	</script>


	<div class="container-fluid h-auto-lg w-auto-lg inline-block">
	<?php 
	include('../dbcon.php');
	if($conn->connect_error)
	{
		die("connection failed".$conn->connect_error);
	}
	$sql="SELECT num_plate_id,brand,model,category,seat,transmission_type,status FROM vehicle WHERE status='Not Booked'&& isActive='Active' ";
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
						<b>Available Vehicles</b>
					
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
									<th class="text-center">NumberPlate</th>
									<th class="text-center">Brand</th>
									<th class="text-center">Model</th>
									<th class="text-center">Category</th>
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
									<tr id=delete<?php echo $row['num_plate_id']?>>
									<td class='user_id' id='user'><?php echo $row["num_plate_id"]; ?></td>
									<td><?php echo $row["brand"];?></td>
									<td><?php echo $row["model"];?></td>
									<td><?php echo $row["category"];?></td>
									
									<td><?php echo "transmission: ".$row['transmission_type']."<br>Seats: ".$row['seat']."<br>Status:<b>".$row['status']."</b>";?></td>
									<td class="text-center">
											  <button class="btn btn-sm btn-primary view_car"   data-id="<?php echo $row['num_plate_id'] ?>" type="button" >View</button>
											  
											  
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
						
						url:"livesearch.php",
						method:"POST",
						data:{'click_search_avail':true,input:input},
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
	
	
	$(document).ready(function (){
		$('.view_car').click(function (e)
		{
			e.preventDefault();
			
			var user_id=$(this).closest('tr').find('.user_id').text();
			//console.log(user_id);
			$.ajax({
				method:"POST",
				url:"view_car.php",
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
	



	
	</script>