<?php include("home.php");
 include("dbcon.php"); 
 if(isset($_POST['category']) && isset($_POST['brand']) && isset($_POST['model']))
 {
 $category=$_POST['category'];
 $brand=$_POST['brand'];
 $model=$_POST['model'];
 $numplate=$_POST['num_plate_id'];
 $sql3 = "SELECT num_plate_id,full_image FROM images where num_plate_id='$numplate'";
 $result3 = $conn->query($sql3);
 $row3 = $result3->fetch_assoc();
 }
if(isset($_POST['submit']))
{
  
    $numplate=$_POST['num_plate_id'];
    
    $date1=$_POST['date1'];
    $date2=$_POST['date2'];
    $sql = "SELECT * FROM vehicle WHERE isactive='Active' AND status='Not Booked' AND num_plate_id='$numplate'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
       
        ?>
    <script>window.location.href='demoprice.php?num_plate_id=<?php echo $numplate; ?>'</script>
       <?php
    }
    else{
        
    $sql1 = "SELECT * FROM booking WHERE num_plate_id='$numplate' and status='confirm' and (pick_date > '$date2' or drop_date < '$date1')";
    $result1 = $conn->query($sql1);
if($result1->num_rows > 0){
    $row1=$result1->fetch_assoc();
    $pdate=$row1['pick_date'];
    $ddate=$row1['drop_date'];
    
   
    echo '<script>alert("Would be available but currently rented on  pickupdate: '.$pdate.' and dropoffdate: '.$ddate.'")</script>';
  
    ?>
 <script>
 window.location.href="demoprice.php?num_plate_id=<?php echo $numplate; ?>"</script>
 <?php
  
}
else{
    echo '<script>
     if(confirm("Sorry Not available on this date would you like to book on another date?"))
        ;
      else
        window.location.href="index.php";
      </script>';
 
    
}
    }


if ($result->num_rows > 0 || $result1->num_rows>0) {
    $sql= "insert into checkavail(pick_date,drop_date) values('$date1','$date2')";
    $conn->query($sql);
}}
    ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css" rel="stylesheet">

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        *{
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}
img#img_path-field{
		max-height: 15vh;
		max-width: 8vw;
	}
  .invalid-feedback{
   
   color: #f00;
   font-size: 18px;
   font-weight: bold;
}


.invalid-feedback{
 
   border-color: #f00;
  

}
/*form{
    box-shadow: 2px 6px 100px #ffffff;
}*/
    </style>
    
    
          <div class="container ">
           <div class="row mx-0 my-5 bg-dark rounded">
            <div class="col-md-5 p-0">
     <img  src='<?php echo $row3["full_image"];?>'   style=' width:100%; height:100%; border-radius:5px 0px 0px 5px;'>

 
   </div>  
    <div class="col-md-6"> 
    <table>
             <center>
              <div class="my-3">

             <span class="mb-0 rated  text-light">Brand:</span>
                                                <span class="text-primary"><b><?php echo $brand; ?></b></span>
                                                &nbsp;&nbsp;

                                                <span class="mb-0 rated  text-light">Model:</span>
                                                <span class="text-primary"><b><?php echo $model; ?></b></span></center>
       
                                                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="request-form ftco-animate bg-dark needs-validation" novalidate>
	            
							
                <h2 class="text-center text-light"><b>Find your trip</b></h2>
            

<?php

    ?>
    
                <div class="form-group col-md-12">
                        <label for="" class="label text-light">Pick-up date</label>
                        <input type="date" class="form-control" name="date1" id="book_pick" placeholder="Pickup Date" required>
                        <div class="invalid-feedback">
Please Enter pick-up date.
</div>
                    </div>
                    <input type="hidden" name="num_plate_id" value="<?php echo $numplate; ?>">
                    <input type="hidden" name="category" value="<?php echo $category; ?>">
                 
                    <input type="hidden" name="model" value="<?php echo $model; ?>">
                 
                    <input type="hidden" name="brand" value="<?php echo $brand; ?>">
                 
                    <div class="form-group col-md-12">
                      <label for="" class="label text-light">Drop-off date</label>
                        <input type="date" class="form-control" name="date2" id="book_drop" placeholder="Drop-Off Date" required>
                        <div class="invalid-feedback">
Please Enter Drop-off date.
</div>
</div>

                    
                    
                     



          <center>
            <div class="form-group">
              <button type="submit"  name="submit" value="Find Availability" class="btn btn-primary">Find Availability</button>
            </div>
</center>
                </form>                     
             
          

         
   

        </table>    
        </div>
        </div>    
          </div>


      
       
     <script>  
    
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
</script>
  <?php include("footer.php")?>