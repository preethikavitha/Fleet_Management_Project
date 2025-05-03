<?php
include('../dbcon.php');

if($conn->connect_error)
	{
		die("connection failed".$conn->connect_error);
	}
 
  if(isset($_POST['back']))
  {
    header("location:addVehi2.php");  
  }
if(isset($_POST['save']))
{
    if(isset($_COOKIE['num_plate']))
    {
        $num_plate=$_COOKIE['num_plate'];
    }
    $perday=$_POST['perday'];
    $perhour=$_POST['perhour'];
    $perkm=$_POST['perkm'];
    $sql="INSERT INTO rent_price(num_plate_id,rent_price_per_day,rent_price_per_hour,rent_price_per_km) VALUES('$num_plate',$perday,$perhour,$perkm)";
    $conn->query($sql);
    if($sql)
    {
      
      header('location:image.php');
    }
    else
    {
        $_SESSION['status']="Something Problem in Insertion";
    }
}
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
img#img_path-field{
		max-height: 15vh;
		max-width: 8vw;
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
   <section class="container my-2 bg-gray-100 w-60 text-light p-2" style="border-radius:20px;">
   <h4 style="text-align:center">Rent Details</h4>
   <h5 style="text-align:center"><?php echo $_COOKIE['num_plate']; ?></h5>
   <?php if(isset($_SESSION['status']))
                { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
           <div><?=$_SESSION['status'];?></div>
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
            <?php
        unset($_SESSION['status']);
         }?>
    <form class="row g-3 p-3" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" autocomplete="off">
    <div class="col-md-12">
          <label for="inputCity" class="form-label text-dark"><b>RentCostperDay</b></label>
          <input type="mediumtext" class="form-control bg-light" id="inputCity" name="perday" placeholder="Enter RentCost Per Day">
        </div>
        <div class="col-md-12">
          <label for="inputCity" class="form-label text-dark"><b>RentCostPerHour</b></label>
          <input type="mediumtext" class="form-control bg-light" id="inputCity" name="perhour" placeholder="Enter RentCost Per Hour">
        </div>
        <div class="col-md-12">
          <label for="inputCity" class="form-label text-dark"><b>RentCostPerKm</b></label>
          <input type="mediumtext" class="form-control bg-light" id="inputCity" name="perkm" placeholder="Enter RentCost Per Km">
        </div>
        <div class="col-md-4">
        </div>
        <div class="col-md-2">
          <input type="submit" class="btn btn-primary" value="Back" name="back"/>
        </div>
        <div class="col-md-2">
          <input type="submit" class="btn btn-primary" value="Save" name="save"/>
        </div>
</form>
</section>
</body>
</html>