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
  if(isset($_COOKIE['rdate']) && isset($_COOKIE['book_id'])){
    $book_id=$_COOKIE['book_id'];
    $rdate=$_COOKIE['rdate'];
  }
  $sql="select type_of_rent,drop_date,tot_amt from booking where book_id=$book_id";
  $result=$conn->query($sql);
  $row=$result->fetch_assoc();
   $type=$row['type_of_rent'];
   $dropdate=$row['drop_date'];
   $totamt=$row['tot_amt'];
if(isset($_POST['save']))
{
   
 
  


}
$sql1="SELECT model,category FROM vehicle WHERE num_plate_id='$num_plate'";
        $result1=$conn->query($sql1);
        $row1=$result1->fetch_assoc();
        $model=$row1['model'];
        $category=$row1['category'];
      
?>


<!doctype html>
<html lang="en">
  <head>
 
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootstrap JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        *{
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}


/*form{
    box-shadow: 2px 6px 100px #ffffff;
}*/
    </style>
    <title>Form Design</title>
  </head>
  <body>
  <?php
include('sidenav.php'); 
?>
   <div class="container-fluid text-light py-3">
 
   </div>
   <section class="container my-2 bg-gray-100 w-80 text-light p-2" style="border-radius:20px;">
 <h4 style="text-align:center">Payment details</h4>
 <?php if(isset($err))
                { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
           <div><?=$err;?></div>
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
            <?php
      
         }?>
         <center>
    <table>
     <tr>
        <td><b style="color:black;">NumberPlate:  </b><i class="text-primary"><?php echo $num_plate;?></i></td>
    <td></td>
        
        <td><b style="color:black;">Category:</b><i class="text-primary"><?php echo $category;?></i></td>
</tr>
<tr></tr>
<tr>
<td><b style="color:black;">Model:  </b><i class="text-primary"><?php echo $model;?></i></td>
<td></td>
</tr>
</table>
</center>

         <?php 
         function calculateday($date1,$date2)
         {
            $dat1=strtotime($date1);
            $dat2=strtotime($date2);
            $diff=($dat2-$dat1)/(3600);
            return $diff;

         }
         if($type=='perhour')
         {
$hr=calculateday($rdate,$dropdate);
$sql2="select rent_price_per_hour from rent_price where num_plate_id='$num_plate'";
$result2=$conn->query($sql2);
$row2=$result2->fetch_assoc();
$ramt=$row2['rent_price_per_hour'];
$extracharge=$hr*$ramt;
$sql3="select no_of_hour from hr where bookid='$book_id'";
$result3=$conn->query($sql3);
$row3=$result3->fetch_assoc();
$act=$row3['no_of_hour'];


         ?>
       <div class="col-md-6">
         </div>
    <form class="row g-3 p-3 needs-validation" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" autocomplete="off" novalidate>
        <div class="col-md-6">
            <label for="validationDefault01" class="form-label text-dark"><b>Extra hours</b></label>
            <input type="text" class="form-control bg-light"  id="validationDefault01"   value="<?php echo $hr?>" readonly required>
           
          </div>
          
          <div class="col-md-6">
            <label for="validationDefault02" class="form-label text-dark"><b></b></label>
            <input type="mediumtext" class="form-control bg-light" id="validationDefault02" placeholder="Enter Service Cost" name="cost" required>
            <div class="invalid-feedback">
                Please Provide a Service Cost
        </div>  
        </div>
          <div class="col-md-6">
            <label for="validationDefault02" class="form-label text-dark"><b>InsuranceClaim</b></label>
            <input type="mediumtext" class="form-control bg-light" id="validationDefault02"   placeholder="Enter Insurance Claim Amount" name="claim" required>
            <div class="invalid-feedback">
                Please Provide a Insurance Claim
        </div>  
        </div>
        <div class="col-md-4">
        </div>
        
        <div class="col-md-2">
          <input type="submit" class="btn btn-primary" value="Save" name="save"/>
        </div>
        

</form>
<?php } ?>
</section>
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

        </body>
        </html>