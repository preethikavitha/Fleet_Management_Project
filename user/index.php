
<?php include("home.php")?>

<!---date store temporarily-->
<?php include("dbcon.php"); 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




$sql = "SELECT distinct category FROM vehicle";
$result = $conn->query($sql);
?>




<!---html file-->
<style>


.invalid-feedback{
   
   color: #f00;
   font-size: 15px;
   font-weight: bold;
}


.invalid-feedback{
 
   border-color: #f00;
  

}



</style>
    <div class="" style="background-image: url('https://as1.ftcdn.net/v2/jpg/05/36/13/22/1000_F_536132274_VebgPU03wGtIc5zEoRTAUaem8wb5FtLc.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
          <div class="col-lg-8 ftco-animate">
          	<div class="text w-100 text-center mb-md-5 pb-md-5">

	           <!--<h1 class="mb-4" style="color:grey;">Fast &amp; Easy Way To Rent A Vehicles</h1>-->
				<div class="col-md-20 d-flex-self-center align-items-center">
	  						<form  method="POST" action="pricing.php" class="request-form ftco-animate bg-dark needs-validation" novalidate>
	            
							
							<h2>Find your trip</h2>
						
<div class="row">
<?php
            if ($result->num_rows > 0) {
                ?>
			    			<div class="form-group col-md-4">
			    					<label for="" class="label">Pick-up date</label>
			    					<input type="date" class="form-control text-light" name="date1" id="book_pick" placeholder="Pickup Date" required>
									<div class="invalid-feedback">
    
    </div>
			    				</div>
			    				<div class="form-group col-md-4">
			    					<label for="" class="label">Drop-off date</label>
			    					<input type="date" class="form-control text-light" name="date2" id="book_drop" placeholder="Drop-Off Date" required>
									<div class="invalid-feedback">
      
    </div>
</div>
			    				
			    				
								 <div class="form-group col-md-4">
								 <label for="" class="label"> Vehicle Category</label>
                          <select name="category" id="category" class="bg-dark" style=" padding: 7px; border-radius: 0px; height: 40px; width: 100%;
outline: none;
padding-left: 15px;
font-size: 15px;
color:gray;
border-bottom-width: 1px;
transition: all 0.3s ease;" required> 

                            <option selected>Choose Here....</option>
                          
								
 <?php
  while ($row = $result->fetch_assoc()) {
           ?>
   <option><?php echo $row["category"]; ?></option>
                            
   <?php               
                   

                }
             ?>
			     </select>
                    </div><?php }
			else {
                echo "No matching records found.";
            }
            ?>
			<div class="invalid-feedback">
     Choose Your Vehicle
    </div>
</div>
		              
			            <div class="form-group">
			              <button type="submit"  name="submit" value="Find Availability" class="btn btn-primary" onclick="return validateInputs()">Find Availability</button>
			            </div>
			    			</form>
	  					</div>
	            
	           
            </div>
          </div>
        </div>
      </div>
    </div>

<div class="bg-light">
     <section class="ftco-section ftco-no-pt p-0">
    	<div class="container">
    		<div class="row no-gutters">
    			<div class="col-md-12	featured-top">
    				<div class="row no-gutters">
	  					
	  					<div class="col-md-8 d-flex align-items-center bg-dark">
	  						<div class="services-wrap rounded-right w-100">
	  							<h3 class="heading-section mb-4 text-light">Better Way to Rent Your Perfect Vehicles</h3>
	  							<div class="row d-flex mb-4">
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2 text-light">Choose Your Pickup Location</h3>
				                </div>
					            </div>      
					          </div>
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2 text-light">Select the Best Deal</h3>
					              </div>
					            </div>      
					          </div>
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2 text-light">Reserve Your Rental Vehicle</h3>
					              </div>
					            </div>      
					          </div>
					        </div>
					        <p><a href="#" class="btn btn-primary py-3 px-4">Reserve Your Perfect Vehicle</a></p>
	  						</div>
	  					</div>
	  				</div>
				</div>
  		</div>
    </section>
		</div>
	<script>
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
//date hidden script

document.addEventListener("DOMContentLoaded", function() {
    var today = new Date();
    var month = today.getMonth() + 1;
    var year = today.getFullYear();
    var tdate = today.getDate() + 1;

    if (month < 10) {
      month = "0" + month;
    }
    if (tdate < 10) {
      tdate = "0" + tdate;
    }

    var minDate = year + '-' + month + '-' + tdate;
    document.getElementById("book_pick").setAttribute("min", minDate);

    // Set initial minDate for book_drop
    document.getElementById("book_drop").setAttribute("min", minDate);

    // Add event listener to book_pick
    document.getElementById("book_pick").addEventListener("change", function() {
      var selectedDate = new Date(this.value);
      selectedDate.setDate(selectedDate.getDate()); // Increment by one day
      var minDate = selectedDate.toISOString().split('T')[0]; // Format as yyyy-mm-dd
      document.getElementById("book_drop").setAttribute("min", minDate);
    });
  });



     





    // Function to check if drop date is after pickup date
    const isValiddate = (pickupDate, dropDate) => {
      return new Date(pickupDate) < new Date(dropDate);
    }

    // Function to set error message and styling
    const setError = (element, message) => {
      const inputControl = document.getElementById(element.id).parentElement;
      const errorDisplay = inputControl.querySelector('.invalid-feedback');

      errorDisplay.innerText = message;
      inputControl.classList.add('invalid');
      inputControl.classList.remove('valid');
    }

    // Function to set success styling
    const setSuccess = (element) => {
      const inputControl = document.getElementById(element.id).parentElement;
      const errorDisplay = inputControl.querySelector('.invalid-feedback');

      errorDisplay.innerText = '';
      inputControl.classList.add('valid');
      inputControl.classList.remove('invalid');
    }

    // Function to validate inputs
    const validateInputs = () => {
      const pickdate = document.getElementById('book_pick');
      const dropdate = document.getElementById('book_drop');

      const pickupDate = pickdate.value.trim();
      const dropDate = dropdate.value.trim();

      if (pickupDate === '' || dropDate === '') {
        setError(pickdate, 'PickupDate is Required');
        setError(dropdate, 'DropoffDate is Required');
      } else if (!isValiddate(pickupDate, dropDate)) {
        setError(dropdate, 'Drop date must be after pickup date');
      } else {
        setSuccess(pickdate);
        setSuccess(dropdate);
      }
    };
		
    </script>
    </body>


   <?php include("rentnow.php")?>

    <?php include("aboutus1.php")?>

    <?php include("footer.php")?>