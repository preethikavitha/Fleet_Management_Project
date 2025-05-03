

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

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
        <button type="button" class="btn btn-secondary close" data-dismiss="modal" onclick="closebut();">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
	function closebut()
	{
		window.location.href="car.php";
	}
				
	</script>

<?php include('sidenav.php'); ?>
	
	<div class="container-fluid h-auto-lg w-auto-lg d-inline-block">
	<?php
	include('../dbcon.php');
	if($conn->connect_error)
	{
		die("connection failed".$conn->connect_error);
	}
	$sql="SELECT book_id,category,Brand, date_format(book_date,'%d-%m-%Y') as book_date,date_format(pick_date,'%d-%m-%Y %H:%m:%s') as pick_date,date_format(drop_date,'%d-%m-%Y %H:%m:%s') as drop_date,tot_amt,aboutpackage,type_of_rent FROM booking WHERE status='pending'";
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
						<b>Booking Details</b>
						<span  class="float:right"><a style="float:right" class="btn btn-success btn-block btn-sm col-sm-2 float-right" href="bookdetconf.php" id="new_car">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
</svg> Confirmed Booking
</a></span>


<span  class="float:right"><a style="float:right" class="btn btn-danger btn-block btn-sm col-sm-2 float-right" href="bookdetrej.php" id="new_car">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
</svg> Rejected Booking
</a></span>
					</div>
					
					<div class="card-body">
					<div  style="float:right "class="justify-content-right">
					
				
                    </div>


						<table class="table table-condensed table-bordered table-hover">
				
							<tbody>
							<label for="drop">Entries to show</label>
		<select id="drop">
			<option value="5" selected>5</option>
			<option value="10" >10</option>
			<option value="20">20</option>
</select>





							

                            </tbody>
					
							<thead>
								<tr>
                                <th class="text-center">Book_date</th>
									<th class="text-center">Brand</th>
									<th class="text-center">Category</th>
									<th class="text-center">Duration</th>
									<th class="text-center">TotalAmount</th>
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
									<tr id=<?php echo $row['book_id']?>>
									<td class='user_id' id='user'><?php echo $row["book_date"]; ?></td>
									<td><?php echo $row["Brand"];?></td>
									<td><?php echo $row["category"];?></td>
                                   
									<td><?php echo "<b>PickUp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b>" .$row["pick_date"]."<br><b>DropDown:</b>".$row["drop_date"];?></td>
                                    <td><?php echo $row["tot_amt"];?></td>
									<td><?php echo "<b>Package&nbsp;: </b>".$row['aboutpackage']."<br><b>RentType: </b>".$row['type_of_rent'];?></td>
									<td class="text-center">
                                    <button class="btn btn-sm btn-success confirm_car"   data-id="<?php echo $row['book_id'] ?> " type="button" >Confirm</button>
											  <button class="btn btn-sm btn-danger reject_car"   data-id="<?php echo $row['book_id'] ?>" type="button" >Reject</button>
											  
											  
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

	
	$(document).ready(function (){
		$('.confirm_car').click(function (e)
		{
			e.preventDefault();
			var user_id = $(this).closest('tr').attr('id');
		
			console.log(user_id);
            if(confirm('Are you sure to Confirm this booking?'))
			{
            $.ajax({
					method:"POST",
					url:"confirm.php",
					data:{
						'click_confirm_btn':true,
						'user_id':user_id,
					},
					success:function(response)
					{
						//alert("Data with id "+user_id+" deleted successfully");
						$(user_id).hide();

						
					}
				})
            }
		})
	})
	

	$(document).ready(function (){
		$('.reject_car').click(function(e)
		{
			e.preventDefault();
			var user_id = $(this).closest('tr').attr('id'); 
			if(confirm('Are you sure to Reject this booking?'))
			{
				$.ajax({
					method:"POST",
					url:"confirm.php",
					data:{
						'click_reject_btn':true,
						'user_id':user_id,
					},
					success:function(response)
					{
						//alert("Data with id "+user_id+" deleted successfully");
						$(user_id).hide();
						
					}
				})
			}
		})
	});

	
	</script>