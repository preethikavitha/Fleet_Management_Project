<?php

include("dbcon.php"); 
$sql="select *from booking";
$result=$conn->query($sql);
while ($row = $result->fetch_assoc()) {
    
    $book_id = $row['book_id'];
 
}



$sql1="select *from booking where book_id=$book_id";
$result1=$conn->query($sql1);
$row1 = $result1->fetch_assoc();
$type=$row1['type_of_rent'];
$numplate=$row1['num_plate_id'];
$sql2="select *from vehicle where num_plate_id='$numplate'";
$result2=$conn->query($sql2);
$row2 = $result2->fetch_assoc();
$sql3="select *from hr where bookid=$book_id";
$result3=$conn->query($sql3);
$row3 = $result3->fetch_assoc();
$sql4="select *from km where bookid=$book_id";
$result4=$conn->query($sql4);
$row4 = $result4->fetch_assoc();
$sql5="select *from day where bookid=$book_id";
$result5=$conn->query($sql5);
$row5 = $result5->fetch_assoc();
$sql6="select *from rent_price where num_plate_id='$numplate'";
$result6=$conn->query($sql6);
$row6 = $result6->fetch_assoc();


?>




<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css
" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
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

   


/* Common styles for the container */
.container {
  margin-top: 30px;
  margin-bottom: 50px;
  margin-left: auto;
  margin-right: auto;
  color: #ffffff;
  border-radius: 15px;
  font-family: Arial, sans-serif;
}

/* Default styles for medium-sized screens */
.container.bg-dark.col-6 {
  width: 50%;
  padding: 20px;
}

.col-6.p-3 {
  margin: 0 auto; /* Center the div */
  /* Set background color for the inner div */
}

/* Media query for smaller screens */
@media (max-width: 576px) {
  .container.bg-dark.col-6 {
    width: 80%; /* Adjusted width for smaller screens */
   
  }
}
@media (max-width: 700px) {
  .container.bg-dark.col-6 {
    width: 70%; /* Adjusted width for smaller screens */
   
  }
}

/* Media query for larger screens */
@media (min-width: 992px) {
  .container.bg-dark.col-6 {
    width: 40%; /* Adjusted width for larger screens */
     
  }
}
@media (min-height: 1000px) {
  .container.bg-dark.col-6 {
    width: 80%; /* Adjusted width for larger screens */
    padding:50px;
    height:80%;
     
  }
}




/* Default styling */
body {
  background-image: url('https://as1.ftcdn.net/v2/jpg/05/36/13/22/1000_F_536132274_VebgPU03wGtIc5zEoRTAUaem8wb5FtLc.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center;
  background-size: cover;
}

/* Media query for screens with a maximum width of 768 pixels (tablets and smaller screens) */
@media (max-width: 768px) {
  body {
    background-size: contain; /* Adjust background size for smaller screens */
     height:auto;
  }
}

/* Media query for screens with a minimum width of 1200 pixels (large screens) */
@media (min-width: 1200px) {
  body {
    background-size: cover; /* Adjust background size for large screens */
    height:auto;
  }
}





        </style>
<body>
<div class="container bg-dark col-6">

<center>

   <div class="col-6 p-3"></div>
       <h2 style="color:green;" class="p-3">Thank you for booking!! Have A Nice Day</h2>

<table class="table table-striped table-dark">
  <thead>
    <tr>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col"></th>
       <th scope="col" class="text-primary">Brand</th>
      <th scope="col"> <?php echo $row2['brand']; ?></th>
         </tr>
  </thead>
  <tbody>
    <tr>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col"></th>
        <th class="text-primary">Category</th>
      <th><?php echo $row2['category']; ?></th>
      
    </tr>
    <tr>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col"></th>
      <th class="text-primary">Model </th>
      <th><?php echo $row2['model']; ?></th>
      
    </tr>
    <tr>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col"></th>
      <th class="text-primary">Amount of Fuel</th>
      <th><?php $fuel=$row2["fuel_lit"];echo number_format($fuel,2); ?>&nbsp;Liter</th>
      
    </tr>
  </tbody>

<?php if ($type == 'perday'): ?>

  <thead>
    <tr>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col"></th>
    
       <th class="text-primary">Type Of Rent</th>
      <th><?php echo $row1['type_of_rent']; ?> </th>
         </tr>
  </thead>
  <tbody>
    <tr>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col"></th>
        <th class="text-primary">No Of days </th>
      <th><?php echo $row5['no_of_day']; ?></th>
      
    </tr>
    <tr>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col"></th>
      <th class="text-primary">Per Day Charge </th>
      <th><?php echo $row6['rent_price_per_day']; ?></th>
      
    </tr>
    <tr>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col"></th>
      <th class="text-primary">Total Day cost</th>
      <th><?php echo $row5['dayamt']; ?></th>
      
    </tr>
    <tr>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col"></th>
      <th class="text-primary">Driver Charge:</th>
      <th><?php echo isset($row5['driver_charge']) ? $row5['driver_charge'] : "-"; ?></th>
      
    </tr>
    <tr>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col"></th>
      <th class="text-primary">Damage Cost:</th>
      <th><?php echo $row6['charges'];?></th>
      
    </tr>
  </tbody>

<?php elseif ($type == 'perhour'): ?>
    
  <thead>
    <tr>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col"></th>
       <th scope="col" class="text-primary">Type Of Rent</th>
      <th scope="col"> <?php echo $row1['type_of_rent']; ?></th>
         </tr>
  </thead>
  <tbody>
    <tr>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col"></th>
        <th class="text-primary">Driver Charge</th>
      <th> <?php echo isset($row3['driver_charge']) ? $row3['driver_charge'] : "-"; ?></th>
      
    </tr>
    <tr>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col"></th>
      <th class="text-primary">No of Hour</th>
      <th><?php echo $row3['no_of_hr']; ?></th>
      
    </tr>
    <tr>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col"></th>
      <th class="text-primary">Per Hour Charge</th>
      <th><?php echo $row6['rent_price_per_hour']; ?></th>
      
    </tr>
   
    <tr>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col"></th>
      <th class="text-primary">Total Hour Charge</th>
      <th><?php echo $row3['hramt']; ?></th>
      
    </tr>
    <tr>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col"></th>
      <th class="text-primary">Damage Cost</th>
      <th><?php echo $row6['charges']; ?></th>
      
    </tr>
  </tbody>


  
    <?php elseif ($type == 'perkm'): ?>

  <thead>
    <tr>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col"></th>
       <th scope="col" class="text-primary">Type Of Rent</th>
      <th scope="col"><?php echo $row1['type_of_rent']; ?> </th>
         </tr>
  </thead>
  <tbody>
    <tr>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col"></th>
        <th class="text-primary">Km Charge </th>
      <th><?php echo $row6['rent_price_per_km']; ?></th>
      
    </tr>
    <tr>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col"></th>
      <th class="text-primary"> Driver Charge</th>
      <th><?php echo isset($row4['driver_charge']) ? $row4['driver_charge'] : "-"; ?></th>
      
    </tr>
    <tr>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col"></th>
      <th class="text-primary">Damage Cost</th>
      <th><?php echo $row6['charges']; ?></th>
      
    </tr>
    <tr>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col"></th>
      <th class="text-primary">Advance Amount</th>
      <th> <?php echo $row6['adv_amt']; ?></th>
      
    </tr>
    
  </tbody>

<?php endif; ?>

  <thead>
    <tr>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col"></th>
       <th scope="col" class="text-primary">Total Amount</th>
      <th scope="col"><?php echo $row1['tot_amt']; ?> </th>
         </tr>
  </thead>
  </table>
  <div class="mx-sm-3 mb-3">
  <p>Click here to download your Bill Amount</p>
        <button class="btn btn-primary">  <a href="selectpdf.php" target="_thapa" class="text-light" style="text-decoration:none;">Download Now</a></button>
    </div>
  <form class="form-inline needs-validation" method="POST" id="frm" novalidate>
         
          <div class="row">
            <div class="col-2"></div>
   <div class="form-group mx-sm-3 mb-2 col-8">
    
  <input type="text" class="form-control" name="con" id="con" placeholder="Booking slot say yes or No" required>
 
</div>
  <div class="col-12">
  <input type="submit" class="btn btn-success mb-2" value="Confirm" id="submit" onclick="myFunction()">
  <div class="invalid-feedback">
      Please provide Valid Mobile Number.
    </div>
  </div>
  <div class="col-2"></div>
          </div>
    
 </form>

        
</center>
</div>
   
<!--    
<div class="container bg-dark col-6">

 <center>
    <div class="col-6 p-3"></div>
        <h2 style="color:green;">Thank you for booking!! Have A Nice Day</h2>

         Display booking details from the database -->
       <!-- <p><b>Brand: <?php echo $row2['brand']; ?></b></p>
        <p><b>Category: <?php echo $row2['category']; ?></b></p>
        <p><b>Model: <?php echo $row2['model']; ?></b></p>
        <p><b>Amount of Fuel:<?php $fuel=$row2["fuel_lit"];echo number_format($fuel,2); ?>&nbsp;Liter</b></p>

     <?php if ($type == 'perday'): ?>
    <p><b>Type Of Rent: <?php echo $row1['type_of_rent']; ?></b></p>
     <p><b>No Of days: <?php echo $row5['no_of_day']; ?></b></p>
    <p><b>Per Day Charge: <?php echo $row6['rent_price_per_day']; ?></b></p>
    <p><b>Total Day cost: <?php echo $row5['dayamt']; ?></b></p>
    <p><b>Driver Charge: <?php echo isset($row5['driver_charge']) ? $row5['driver_charge'] : "-"; ?></b></p>
    <p><b>Damage Cost:<?php echo $row6['charges'];?></b></p>
 


    <?php elseif ($type == 'perhour'): ?>
    <p><b>Type Of Rent: <?php echo $row1['type_of_rent']; ?></b></p>
    <p><b>Driver Charge: <?php echo isset($row3['driver_charge']) ? $row3['driver_charge'] : "-"; ?></b></p>
    <p><b>No of Hour: <?php echo $row3['no_of_hr']; ?></b></p>
    <p><b>Per Hour Charge: <?php echo $row6['rent_price_per_hour']; ?></b></p>
    <p><b>Total Hour Charge: <?php echo $row3['hramt']; ?></b></p>
    <p><b>Damage Cost: <?php echo $row6['charges']; ?></b></p>

    <?php elseif ($type == 'perkm'): ?>
    
    <p><b>Type Of Rent: <?php echo $row1['type_of_rent']; ?></b></p>
    <p><b>Km Charge: <?php echo $row6['rent_price_per_km']; ?></b></p>
    <p><b>Driver Charge: <?php echo isset($row4['driver_charge']) ? $row4['driver_charge'] : "-"; ?></b></p>
     <p><b>Damage Cost: <?php echo $row6['charges']; ?></b></p>
    <p><b>Advance Amount: <?php echo $row6['adv_amt']; ?></b></p>
    <?php endif; ?>

       
           <p><b>Total Amount: <?php echo $row1['tot_amt']; ?></b></p>
         Add a confirmation button -->
      
       <!-- <form class="form-inline" method="POST" id="frm" novalidate>
         
          <div class="row">
            <div class="col-2"></div>
   <div class="form-group mx-sm-3 mb-2 col-8">
    
  <input type="text" class="form-control" name="con" id="con" id="inputPassword2" placeholder="Booking slot say yes or No" required>
 
</div>
  <div class="col-12">
  <input type="submit" class="btn btn-success mb-2" value="Confirm" id="submit" onclick="myFunction()">
 
  </div>
  <div class="col-2"></div>
          </div>
    
 </form>

        <p>Click here to download your Bill Amount</p>
        <button class="btn btn-primary">  <a href="selectpdf.php" target="_thapa" class="text-light" style="text-decoration:none;">Download Now</a></button>
           
    </center>
   
</div>

    -->


<script>
 
function myFunction() {

 
  Swal.fire({
  title: "Thank You!",
  text: "Your Booking is Placed and Your Slot will Be Confirmed Soon!",
  icon: "success"
}).then((result) => {
                    if (result.isConfirmed) {
                        localStorage.setItem("modalShown", "true");
                        window.location.href = "index.php";
                    }
                });

     
}

    const frm=document.getElementById('frm');
    document.getElementById('submit').addEventListener('click',(e)=>{
        e.preventDefault();
        let insert_xhr=new XMLHttpRequest();
        insert_xhr.open('POST','pinsert.php',true);
        let userInput=document.getElementById('con').value;
        let formdata="msg="+userInput;
        insert_xhr.onload=function(){
            if(insert_xhr.status == 200)
            {  
                let get_data=JSON.parse(insert_xhr.responseText);
                console.log(get_data);
                if(get_data=='added'){
                    alert("Do You Want To Confirm? click Ok!!");
                }
            }
        }
        //make http header
        insert_xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
        //send data
        insert_xhr.send(formdata);
    })
    
    
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
</script>
    </script>

</body>    

</html>

