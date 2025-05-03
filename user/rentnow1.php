

<?php  

$category = $_POST['category'];

$sql = "SELECT *FROM vehicle where isactive='Active' AND status='Not Booked' AND category!='$category'";
$result = $conn->query($sql);
?>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<section class="ftco-section bg-light">
    	<div class="container1">
        <div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">What we offer</span>
            <h2 class="mb-2">Featured Vehicles</h2>
          </div>
        </div>
	
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  $num_plate=$row['num_plate_id'];
                 $sql2 = "SELECT num_plate_id,full_image FROM images where num_plate_id='$num_plate'";
                 $result1 = $conn->query($sql2);
                 $row1 = $result1->fetch_assoc();
            ?>
                    <div class="col-md-4">
                        <div class="car-wrap rounded ftco-animate">
                            <div class="img rounded d-flex align-items-end" style="background-image: url(<?php echo $row1['full_image'];?>); background-repeat: no-repeat;   
  
" >
                            </div>
                            <div class="text">
                                <h2 class="mb-0 price ml-auto text-secondary"><?php echo $row["category"]; ?></h2>
                                <div class="d-flex mb-3">
                                    <span class="cat text-secondary"><?php echo $row["brand"]; ?></span>
                                    <p class="price ml-auto"><?php echo $row["model"]; ?> </p>
		    		
                                </div>
                                <p class="d-flex mb-0 d-block">
                                  
   


 <button type="submit" name="submit" data-id="<?php echo $row['num_plate_id'] ?>" class="btn btn-dark py-1 ml-1 view_driver_form" data-toggle="modal" data-target="#viewusermodal">
        <a href="#" class="text-light">View Details</a>
    </button>





</p>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "No Vehicle records found.";
            }
            ?>
        </div>
            
    
    		
    	</div>
    </section>
    
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
        <button type="button" class="btn btn-dark close" data-dismiss="modal" onclick="closebut();">Close</button>
      </div>
    </div>
  </div>
</div>
    
    <script>
    $(document).ready(function () {
        $('.view_driver_form').click(function (e) {
            e.preventDefault();

            var num_plate_id = $(this).data('id');
console.log(num_plate_id);
            $.ajax({
                method: "POST",
                url: "car-single.php",
                data: {
                    'click_view_btn': true,
                    'num_plate_id': num_plate_id,
                },
                success: function (response) {
                    
                    $('.view_user_data').html(response);
                    $('#viewusermodal').modal('show');
                }
            });
        });
    });
</script>

<?php include("footer.php")?>

    