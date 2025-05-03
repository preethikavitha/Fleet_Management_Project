<div class="modal fade w-100" id="viewusermodal" tabindex="-1" role="dialog" aria-labelledby="viewusermodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewusermodalLabel">Insurance Amount Details</h5>
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
		window.location.href="insurdet.php";
	}
				
	</script>




<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<!-- Option 1: Include in HTML -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<?php include('sidenav.php');?> 
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
    $sql="SELECT *,date_format(insurancedate,'%d-%m-%Y') as insurancedate FROM insurancename WHERE num_plate_id='$num_plate' ORDER BY date DESC";
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
                        <span  class="float:right"><a style="float:right" class="btn btn-success btn-block btn-sm col-sm-2 float-right" href="addInsurance.php" id="new_car">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
</svg> Add New InsuranceDetails
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
                                <th class="text-center">PolicyName</th>
									<th class="text-center">Company_name</th>
									<th class="text-center">InsuranceDate</th>
									
									<th class="text-center">InsurancePaid</th>
                                    <th class="text-center">InsuranceClaimed</th>
									<th class="text-center">Action</th>
								</tr>
                                
							</thead>

							
							<tbody id="search">
							
                            <?php
							if($result->num_rows>0)
							{
								while($row=$result->fetch_assoc())
								{  $ins_id=$row["insurance_id"];
                                    $sql2="SELECT SUM(amount_paid) as paidamount FROM insurance_history WHERE insurance_id='$ins_id'";
                                    $result2=$conn->query($sql2);
                                    $row2=$result2->fetch_assoc();
                                    $sql3="SELECT SUM(amount_claim) as claimamount FROM insurance_claim WHERE insurance_id='$ins_id'";
                                    $result3=$conn->query($sql3);
                                    $row3=$result3->fetch_assoc();
									
									
									?>
									<tr class="text-center" id="<?php echo $row["insurance_id"] ?>">
                                    <td class='user_id' id='user'><?php echo $row["policy_name"] ?></td>
                                    <td><?php echo $row["company_name"]; ?></td>
									<td><?php echo $row["insurancedate"]; ?></td>
                                   
									<!--<td data-id="<?php echo $row['insurance_id'] ?>" ><?php if(isset($row2["paidamount"])) echo $row2["paidamount"]; else echo '0';?><br><a href="inshist.php?ins_id=<?php echo $ins_id; ?>" style='color:blue'>View History</a><br></td>
									<td data-id="<?php echo $row['insurance_id'] ?>" ><?php if(isset($row2["claimamount"])) echo $row2["claimamount"]; else echo '0';?><br><a href="insclaim.php" style='color:blue'>View History</a></td>
								-->
								<td><?php if(isset($row2["paidamount"])) echo $row2["paidamount"]; else echo '0';?><br><a href="" style='color:blue' data-id="<?php echo $row['insurance_id'] ?>"  class="show_ins">View History</a><br></td>
									<td><?php if(isset($row3["claimamount"])) echo $row3["claimamount"]; else echo '0';?><br><a href="" style='color:blue' data-id="<?php echo $row['insurance_id'] ?>" class="show_claim">View History</a></td>
								
								
									
									<td class="text-center">
										<?php 
										$sql6="SELECT insurance_id FROM insurancename WHERE date<=CURDATE() AND insurance_id=$ins_id";
										//date-when to do next payment
										$result6=$conn->query($sql6);
										if($result6->num_rows>0)
										{
										?>
											  <input type="button" class="btn btn-sm btn-primary view_paid"   data-id="<?php echo $row['insurance_id'] ?>" value="paid">
											  <?php } else{?>
												<input type="button" class="btn btn-sm btn-primary shows_paid"  data-id="<?php echo $row['insurance_id'] ?>" value="Can'tPay">
												<?php }?>
											  <?php $sql5="SELECT claim FROM insurancename WHERE insurance_id=$ins_id AND claim<ins_date ";
											  //claim = lastclaim date  and ins_date = last insurance payment date
											  $result5=$conn->query($sql5);
											  if($result5->num_rows>0)
											  {
											 
											  ?>
											
												
											  <input type="button" class="btn btn-sm btn-primary view_claimed"   data-id="<?php echo $row['insurance_id'] ?>" value="claimed">
											  <?php }
											  else{
												?>
                                          <input type="button" class="btn btn-sm btn-primary shows_claim"  data-id="<?php echo $row['insurance_id'] ?>" value="Can'tclaim">
											  <?php }
											
											
												 ?>
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
	
	$(document).ready(function (){
		$('.view_paid').click(function (e)
		{
			
		
			e.preventDefault();
			console.log("heelo");
			var user_id = $(this).closest('tr').attr('id'); 
			
		
			console.log(user_id);
			$.ajax({
				method:"POST",
				url:"view_paid.php",
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
		$('.view_claimed').click(function (e)
		{
			
			e.preventDefault();
			console.log("heelo");
			var user_id = $(this).closest('tr').attr('id'); 
		
			console.log(user_id);
			$.ajax({
				method:"POST",
				url:"view_claimed.php",
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
		$('.shows_claim').click(function (e)
		{
			
			e.preventDefault();
			console.log("heelo");
			
			var user_id = $(this).closest('tr').attr('id'); 
			if(confirm("Already,You've Claimed in this year.Click here to view claim history"))
			{
			console.log(user_id);
			$.ajax({
				method:"POST",
				url:"show_claim.php",
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
		}
		})
	})
	$(document).ready(function (){
		$('.shows_paid').click(function (e)
		{
			e.preventDefault();
			console.log("heelo");
			var user_id = $(this).closest('tr').attr('id'); 
			if(confirm("Already,You've Paid Your Insurance in this year.Click here to view Paid history"))
			{
			console.log(user_id);
			$.ajax({
				method:"POST",
				url:"show_ins.php",
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
		}
		})
	})
	$(document).ready(function (){
		$('.show_ins').click(function (e)
		{
			e.preventDefault();
			console.log("heelo");
			var user_id = $(this).closest('tr').attr('id'); 
		
			console.log(user_id);
			$.ajax({
				method:"POST",
				url:"show_ins.php",
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
		$('.show_claim').click(function (e)
		{
			e.preventDefault();
			
			console.log("heelo");
			var user_id = $(this).closest('tr').attr('id'); 
		
			console.log(user_id);
			$.ajax({
				method:"POST",
				url:"show_claim.php",
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
