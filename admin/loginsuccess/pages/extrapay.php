<?php

include('../dbcon.php');
if($conn->connect_error)
	{
		die("connection failed".$conn->connect_error);
	}
 
    $user='';
   
    if(isset($_COOKIE['book_id']) && isset($_COOKIE['rdate']))
    {
        $book_id=$_COOKIE['book_id'];
        $rdate=$_COOKIE['rdate'];
    }
    if(isset($_POST['save'])){
     
       
        $sql3="UPDATE booking SET date_of_return='$date' WHERE book_id=$user";
        
        if($conn->query($sql3))
       {
           header("location:license.php");
       } 
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
        $sql2="SELECT tot_amt,type_of_rent,drop_date FROM booking WHERE book_id=$book_id";
        $result2=$conn->query($sql2);
        if($result2->num_rows>0)
        {
            $row2=$result2->fetch_assoc();
            $tot_amt=$row2['tot_amt'];
        }
       
        $sql4="SELECT  rent_price_per_day, rent_price_per_hour, rent_price_per_km FROM rent_price WHERE num_plate_id='$num_plate'";
        $result4=$conn->query($sql4);
        $row4=$result4->fetch_assoc();
        $sql5="SELECT * FROM driveramt WHERE category='$category'";
        $result5=$conn->query($sql5);
        $row5=$result5->fetch_assoc();
   



?>
<!doctype html>
<html lang="en">
  <head>
 
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
  <section class="container my-2 bg-gray-100 w-60 text-light p-2" style="border-radius:20px;">
 <h4 style="text-align:center">Enter Return Date to See Payment Details</h4>

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
include('sidenav.php'); 
?>
   <div class="container-fluid text-light py-3">
 
   </div>


  
    <form class="row g-3 p-3 needs-validation" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" autocomplete="off" >
    <?php if(isset($err))
                { ?>
            <div class="alert alert-danger alert-dismissible fade show " role="alert">
           <div><?=$err;?></div>
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
            <?php
      
         }?>
   
   <?php
if($result2->num_rows>0)
{

$row2=$result2->fetch_assoc();
$type_of_rent=$row2['type_of_rent']; 
$drop_date=$row2['drop_date'];
function differenceInHours($startdate,$enddate){ $starttimestamp = strtotime($startdate); $endtimestamp = strtotime($enddate); $difference = abs($endtimestamp - $starttimestamp)/3600; return $difference; }
if($type_of_rent=='perhour')
{
    $rent_hour=$row4['rent_price_per_hour'];
  $diff=differenceInHours($drop_date,$rdate);
  if($diff!=0)
  {
    $extra_charge=$diff*$rent_hour;
  }
  $sql7="SELECT no_of_hr FROM hr WHERE book_id=$book_id";
  $result7=$conn->query($sql7);
  $row7=$result7->fetch_assoc();
  $hr=$row7['no_of_hr'];
  ?>
  <p>Hours Booked:<b class='text-success'><?php echo $no_of_hr; ?></b></p>
  <p>Amount for <?php echo $no_of_hr; ?> Hours:<b class='text-success'><?php echo $tot_amt; ?></b></p>
   <p>Extra Hours:<b class='text-danger'><?php echo $diff; ?></b></p>
  <p>Extra charge for <?php echo $diff; ?> Hours:<b class='text-danger'><?php echo $extra_charge; ?></b></p>
<?php }
else if($type_of_rent=='perday'){
  
}?> 
        <div class="col-md-6">
            <label for="validationDefault03" class="form-label text-dark"><b>ReturningDateTime</b></label>
            <input type="datetime-local" class="form-control bg-light" id="validationDefault03" placeholder="Enter Returning Date" name="date" required>
            <div class="invalid-feedback">
                Please Provide a Returning Date time
        </div>  
        </div>
        <br>
      <div class="col-md-6">
        </div>
   <?php } ?> 
        <div class="col-md-3">
          <input type="submit" class="btn btn-primary" value="PaymentDetails" name="save"/>
        </div>
        
       
      
        </form>
        </section>
        </body>
        </html>