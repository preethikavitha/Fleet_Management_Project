
<html>
<head>

<div class="modal fade w-100" id="viewusermodal" tabindex="-1" role="dialog" aria-labelledby="viewusermodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
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
		window.location.href="bookdet.php";
	}
				
	</script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<?php include('sidenav.php'); 
	include('../dbcon.php');?>
</head>
<body>
	<div class="container-fluid">
	<?php
	if($conn->connect_error)
	{
		die("connection failed".$conn->connect_error);
	}
    if(isset($_COOKIE['num_plate']))
    {
        $num_plate=$_COOKIE['num_plate'];
    }
	$sql1="SELECT model,category FROM vehicle WHERE num_plate_id='$num_plate'";
	$result1=$conn->query($sql1);
    $row1=$result1->fetch_assoc();
    $model=$row1['model'];
    $category=$row1['category'];
    $sql="SELECT date_format(book_date,'%d-%m-%Y') as bookdate,borrower_name,emailId,book_id,pick_date,drop_date,to_location,from_location,aboutpackage,empid,type_of_place,type_of_rent,tot_amt FROM booking WHERE num_plate_id='$num_plate' AND status='confirm' ORDER BY book_date DESC";
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
                                <th class="text-center">Book_date</th>
									<th class="text-center">Borrower_Name</th>
									<th class="text-center">Duration</th>
									<th class="text-center">Package</th>
									<th class="text-center">Payment Details</th>
									<th class="text-center">Invoice</th>
								</tr>
                                
							</thead>

							
							<tbody id="search">
							
                            <?php
							if($result->num_rows>0)
							{
								while($row=$result->fetch_assoc())
								{
									$email=$row['emailId'];
									
									?>
									<tr class="text-center" id="<?php echo $row["book_id"] ?>">
                                    <td class="text-center"><?php echo $row["bookdate"]; ?></td>
								
                                    <td class='user_id' id='user'><?php echo $row["borrower_name"] ?><br><a href="#" style='color:blue' data-id="<?php echo $row['emailId'] ?>"  class="show_user">Borrower Details</a></td>
									<td><b>Pickup:</b><?php echo $row['pick_date']; ?><br><b>Drop:</b><?php echo $row['drop_date']; ?></td>
									<td><?php $package=$row["aboutpackage"];echo $row["aboutpackage"];?><br>
									<?php
                                    if($package=='Driver')
                                    {?>
									
                                     <a href="#" style='color:blue' data-id="<?php echo $row['book_id'] ?>"  class="show_driv">PackageDetails</a>
                                   <?php }  
                                   else
                                   { ?>
                                   <br><a href="#" style='color:blue' data-id="<?php echo $row['book_id'] ?>"  class="show_lic">PackageDetails</a>
                                   <?php } ?> 
                                </td>
									<td><a href="showpay1.php?user_id=<?php echo $row['book_id'] ?>" style='color:blue' data-id="<?php echo $row['book_id'] ?>"  class="show_pay">Payment Details</a></td>
									
									

									<td class="text-center">
											  <button class="btn btn-sm btn-primary edit_car" type="button" >Download</button>
											  
											  
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

	$(document).ready(function (){
		$('.show_user').click(function (e)
		{
			e.preventDefault();
			console.log("heelo");
			var user_id ='<?php echo $email; ?>';
		
			console.log(user_id);
			$.ajax({
				method:"POST",
				url:"user.php",
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
		$('.show_driv').click(function (e)
		{
			console.log("hai");
			e.preventDefault();
			console.log("heelo");
			var user_id = $(this).closest('tr').attr('id'); 
		
			console.log(user_id);
			$.ajax({
				method:"POST",
				url:"showdriv.php",
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
		$('.show_lic').click(function (e)
		{
			e.preventDefault();
			console.log("heelo");
			var user_id = $(this).closest('tr').attr('id'); 
		
			console.log(user_id);
			$.ajax({
				method:"POST",
				url:"license.php",
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
		$('.show_amt').click(function (e)
		{
			e.preventDefault();
			console.log("heelo");
			var user_id = $(this).closest('tr').attr('id'); 
		
			console.log(user_id);
			$.ajax({
				method:"POST",
				url:"amount.php",
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
</body>
</html>
