<?php
include('../dbcon.php');

if($conn->connect_error)
	{
		die("connection failed".$conn->connect_error);
	}
 
   
if(isset($_POST['save']))
{
  $num_plate=$_POST['num_plate'];
  $brand=$_POST['brand'];
  $model=$_POST['model'];
  $category=$_POST['category'];
  $seat=$_POST['seat'];
  $engine=$_POST['engine'];
  $transmission=$_POST['transmission'];
  $fuel=$_POST['fuel'];
  $price=$_POST['price'];
  $description=$_POST['description'];


  /*if(!empty($_FILES["image"]["name"]))
  {
    $fileName=basename($_FILES["image"]["name"]);
    $fileType=pathinfo($fileName,PATHINFO_EXTENSION);
    $allowTypes=array('jpg','png','jpeg','gif');
    if(in_array($fileType,$allowTypes))
    {
      $image=$_FILES['image']['tmp_name'];
      $imgContent=addslashes(file_get_contents($image));
      $sql="INSERT INTO vehicle (num_plate_id,model,category,engine_type,seat,transmission_type,brand,Description,fuel_cost,price,image_path) VALUES ('$num_plate','$model','$category','$engine',$seat,'$transmission','$brand','$description',$fuel,$price,' ".$imgContent." ')";
      $conn->query($sql);
    }
  }*/

  //image parts separation
  $image=$_FILES['file'];
  $imagefilename=$image['name'];
  $imagefileerr=$image['error'];
  $imagefiletemp=$image['tmp_name'];
   print_r($imagefiletemp);
  $filename_separate=explode('.',$imagefilename);
  $file_extension=strtolower($filename_separate[1]);

  $extension=array('jpeg','jpg','png');
  if(in_array($file_extension,$extension))
  {
    $upload_image='images/'.$imagefilename;
    move_uploaded_file($imagefiletemp,$upload_image);

  $sql="INSERT INTO vehicle (num_plate_id,model,category,engine_type,seat,transmission_type,brand,Description,fuel_cost,price,image_path) VALUES ('$num_plate','$model','$category','$engine',$seat,'$transmission','$brand','$description',$fuel,$price,'$upload_image')";
  $conn->query($sql);
}
$rto=$_POST['rto'];
  $sql1="INSERT INTO notification(num_plate_id,RTO_Exp_date) values('$num_plate','$rto')";
  $conn->query($sql1);
  $perday=$_POST['perday'];
  $perhour=$_POST['perhour'];
  $perkm=$_POST['perkm'];
  $sql2="INSERT INTO rent_price(num_plate_id,rent_price_per_day,rent_price_per_hour,rent_price_per_km) VALUES('$num_plate',$perday,$perhour,$perkm)";
  $conn->query($sql2);
  $policy=$_POST['inspolicy'];
  $date=$_POST['insdate'];
  $cost=$_POST['inscost'];
  $sql3="INSERT INTO insurance (num_plate_id,Insurance_policy,Insurance_date,Insurance_Cost) VALUES('$num_plate','$policy','$date',$cost)";
  $conn->query($sql3);
  $serdate=$_POST['servicedate'];
  $sercost=$_POST['servicecost'];
  $sql4="INSERT INTO services (num_plate_id,Service_date,Service_cost) VALUES ('$num_plate','$serdate',$sercost)";
  $conn->query($sql4);
  if($sql && $sql1 && $sql2 && $sql3 && $sql4)
  {
    
    header('location:car.php');
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
   <section class="container my-2 bg-gray-100 w-95 text-light p-2" style="border-radius:20px;">
 
    <form class="row g-3 p-3" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <div class="col-md-6">
            <label for="validationDefault01" class="form-label text-dark"><b>NumberPlate</b></label>
            <input type="text" class="form-control bg-light"  id="validationDefault01"   placeholder="Enter Registeration Number" name="num_plate" required>
          </div>
          <div class="col-md-6">
            <label for="validationDefault02" class="form-label text-dark"><b>Model</b></label>
            <input type="text" class="form-control bg-light" id="validationDefault02"   placeholder="Enter Model name" name="model" required>
          </div>
          <div class="col-md-6">
            <label for="validationDefault02" class="form-label text-dark"><b>Brand</b></label>
            <input type="text" class="form-control bg-light" id="validationDefault02" placeholder="Enter Brand Name" name="brand" required>
          </div>
          <div class="col-md-6">
            <label for="validationDefault02" class="form-label text-dark"><b>Category</b></label>
            <input type="text" class="form-control bg-light" id="validationDefault02"   placeholder="Enter Category" name="category" required>
          </div>
        <div class="col-md-4">
          <label for="inputEmail4" class="form-label text-dark"><b>Seat</b></label>
          <input type="number" class="form-control  bg-light" id="inputEmail4" min="4" name="seat" />
        </div>
        <div class="col-md-4">
          <label for="inputState" class="form-label text-dark"><b>Engine Type</b></label>
          <select id="inputState" class="form-select bg-light" name="engine">
            <option  selected>Choose...</option>
            <option >Gasoline</option>
            <option>Petrol</option>
            <option>Diesel</option>
            <option>Gear</option>
            <option>Others</option>
          </select>
        </div>
        <div class="col-md-4">
          <label for="inputState" class="form-label text-dark"><b>Transmission Type</b></label>
          <select id="inputState" class="form-select bg-light" name="transmission">
            <option selected>Choose...</option>
            <option>Manual Transmission</option>
            <option>Semi-automatic and Dual Clutch Transmission</option>
            <option>Continuously Variable Transmission</option>
            <option>With Driver</option>
            <option>Without Driver</option>
          </select>
        </div>
        
        <div class="col-md-6">
          <label for="inputAddress" class="form-label text-dark"><b>Fuel Cost</b></label>
          <input type="mediumtext" class="form-control bg-light" name="fuel" id="inputAddress" placeholder="Enter Fuel Cost">
        </div> 
        <div class="col-md-6">
          <label for="inputAddress" class="form-label text-dark"><b>Price</b></label>
          <input type="mediumtext" class="form-control bg-light" id="inputAddress" name="price" placeholder="Enter Price Bought">
        </div>
        <div class="col-md-6">
          <label for="inputAddress2" class="form-label text-dark"><b>Last Service Date</b></label>
          <input type="date" class="form-control bg-light" id="inputAddress2" name="servicedate">
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label text-dark"><b>Service Cost</b></label>
          <input type="mediumtext" class="form-control bg-light" id="inputCity" name="servicecost" placeholder="Enter Service Cost">
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label text-dark"><b>RentCostperDay</b></label>
          <input type="mediumtext" class="form-control bg-light" id="inputCity" name="perday" placeholder="Enter RentCost Per Day">
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label text-dark"><b>RentCostPerHour</b></label>
          <input type="mediumtext" class="form-control bg-light" id="inputCity" name="perhour" placeholder="Enter RentCost Per Hour">
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label text-dark"><b>RentCostPerKm</b></label>
          <input type="mediumtext" class="form-control bg-light" id="inputCity" name="perkm" placeholder="Enter RentCost Per Km">
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label text-dark"><b>RTOExp_date</b></label>
         
          <input type="date" class="form-control bg-light" id="inputCity" name="rto">
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label text-dark"><b>InsurancePolicy</b></label>
          <input type="text" class="form-control bg-light" id="inputCity" name="inspolicy" placeholder="Enter InsurancePolicy Type">
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label text-dark"><b>Insurance Date</b></label>
          <input type="date" class="form-control bg-light" id="inputCity" name="insdate" >
        </div>
       
        <div class="col-md-6">
          <label for="inputZip" class="form-label text-dark"><b>Insurance Cost</b></label>
          <input type="mediumtext" class="form-control bg-light" id="inputZip" name="inscost" placeholder="Enter Insurance Cost">
        </div>
       
          <!--image-->
        <div class="col-md-6">
            <label class="form-label text-dark"><b>Choose Image</b></label>
            <input type="file" class="form-control text-dark bg-light"  name="file"/>
</div>

        <div class="col-md-10">
          <label for="inputZip" class="form-label text-dark"><b>Description</b></label>
         <textarea class="form-control bg-light" id="inputZip" name="description" name="des" cols="30" rows="5" placeholder="Give few words about vehicle Features"></textarea>
        </div>
       
        

					
					
        <div class="col-12">
          <div class="form-check text-light">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label text-dark" for="gridCheck">
            <b>Check the details once...</b>
            </label>
          </div>
        </div>
        <div class="col-12">
          <input type="submit" class="btn btn-primary" value="Save" name="save"/>
        </div>
      </form>
   </section>
   <?php include("footernav.php")?>
  

  </body>
</html>