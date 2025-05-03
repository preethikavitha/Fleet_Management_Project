
<?php
include('../dbcon.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// For Updating
if (isset($_POST['save'])) {
    $num_plate = $_POST['num_plate'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $category = $_POST['category'];
    $seat = $_POST['seat'];
    $engine = $_POST['engine'];
    $transmission = $_POST['transmission'];
    $bootspace = $_POST['bootspace'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // Update vehicle table
    $sql = "UPDATE vehicle SET num_plate_id='$num_plate', bootspace='$bootspace', model='$model', category='$category', engine_type='$engine', seat=$seat, transmission_type='$transmission', brand='$brand', Description='$description', price=$price WHERE num_plate_id='$num_plate'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully<br>";
    } else {
        echo "Error updating vehicle table: " . $conn->error . "<br>";
    }

    // Update notification table
    $rto = $_POST['rto'];
    $sql1 = "UPDATE notification SET RTO_Exp_date='$rto' WHERE num_plate_id='$num_plate'";
    if ($conn->query($sql1) === TRUE) {
        echo "Record updated successfully<br>";
    } else {
        echo "Error updating notification table: " . $conn->error . "<br>";
    }

    // Update rent_price table
    $perday = $_POST['perday'];
    $perhour = $_POST['perhour'];
    $perkm = $_POST['perkm'];
    $sql2 = "UPDATE rent_price SET rent_price_per_day=$perday, rent_price_per_hour=$perhour, rent_price_per_km=$perkm WHERE num_plate_id='$num_plate'";
    if ($conn->query($sql2) === TRUE) {
        echo "Record updated successfully<br>";
    } else {
        echo "Error updating rent_price table: " . $conn->error . "<br>";
    }

  
    // Redirect to car.php if all updates were successful
if ($conn->affected_rows > 0 && $conn->affected_rows > 0 && $conn->affected_rows > 0) {
    header('location:car.php');
    exit;
}

}

// For setting value field for editing
if (isset($_GET['user_id'])) {
    $id = $_GET['user_id'];

    // Fetch data for the form fields
    // ...
    
  $sql = "SELECT * FROM vehicle WHERE num_plate_id='$id'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $brand = $row['brand'];
      $model = $row['model'];
      $category = $row['category'];
      $transmission = $row['transmission_type'];
      $engine = $row['engine_type'];
      $description = $row['Description'];
      $seat = $row['seat'];
      $price = $row['price'];
      $bootspace = $row['bootspace'];
  }

  $sql1 = "SELECT * FROM rent_price WHERE num_plate_id='$id'";
  $result = $conn->query($sql1);
  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $day = $row['rent_price_per_day'];
      $km = $row['rent_price_per_km'];
      $hour = $row['rent_price_per_hour'];
  }

  $sql3 = "SELECT * FROM notification WHERE num_plate_id='$id'";
  $result = $conn->query($sql3);
  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $exp = $row['RTO_Exp_date'];
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
 <h4 style="text-align:center">Update Vehicle Details</h4>
    <form class="row g-3 p-3" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <div class="col-md-6">
            <label for="validationDefault01" class="form-label text-dark"><b>NumberPlate</b></label>
            <input type="text" class="form-control bg-light"  id="validationDefault01" value="<?php if(isset($id))  echo $id ; else echo ''?>" placeholder="Enter Registeration Number" name="num_plate" readonly required>
          </div>
          <div class="col-md-6">
            <label for="validationDefault02" class="form-label text-dark"><b>Model</b></label>
            <input type="text" class="form-control bg-light" id="validationDefault02" value="<?php if(isset($model))  echo $model ; else echo ''?>"  placeholder="Enter Model name" name="model" required>
          </div>
          <div class="col-md-6">
            <label for="validationDefault02" class="form-label text-dark"><b>Brand</b></label>
            <input type="text" class="form-control bg-light" id="validationDefault02" value="<?php if(isset($brand))  echo $brand ; else echo ''?>" placeholder="Enter Brand Name" name="brand" required>
          </div>
          <div class="col-md-6">
            <label for="validationDefault02" class="form-label text-dark"><b>Category</b></label>
            <input type="text" class="form-control bg-light" id="validationDefault02" value="<?php if(isset($category))  echo $category ; else echo ''?>" placeholder="Enter Category" name="category" required>
          </div>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label text-dark"><b>BootSpace</b></label>
          <input type="number" class="form-control  bg-light" id="inputEmail4" value="<?php if(isset($bootspace))  echo $bootspace; else echo ''?>" min="1" name="bootspace" />
        </div>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label text-dark"><b>Seat</b></label>
          <input type="number" class="form-control  bg-light" id="inputEmail4" value="<?php if(isset($seat))  echo $seat ; else echo ''?>" min="1" name="seat" />
        </div>
        <div class="col-md-6">
          <label for="inputState" class="form-label text-dark"><b>Engine Type</b></label>
          <select id="inputState" class="form-select bg-light"  name="engine">
            <option  selected><?php if(isset($engine))  echo $engine ; else echo 'Choose...'?></option>
            <option >Natural Gas(CNG)</option>
            <option>Petrol</option>
            <option>Diesel</option>
            <option>Others</option>
          </select>
        </div>
        <div class="col-md-6">
          <label for="inputState" class="form-label text-dark"><b>Transmission Type</b></label>
          <select id="inputState" class="form-select bg-light" name="transmission">
            <option selected><?php if(isset($transmission))  echo $transmission ; else echo 'Choose...'?></option>
            <option>Manual</option>
            <option>Automatic</option>
            <option>Others</option>
          </select>
        </div>
        
        <div class="col-md-6">
          <label for="inputAddress" class="form-label text-dark"><b>Price</b></label>
          <input type="mediumtext" class="form-control bg-light" id="inputAddress" name="price"  value="<?php if(isset($price))  echo $price ; else echo ''?>" placeholder="Enter Price Bought">
        </div>
   
        <div class="col-md-6">
          <label for="inputCity" class="form-label text-dark"><b>RentCostperDay</b></label>
          <input type="mediumtext" class="form-control bg-light" id="inputCity" name="perday"  value="<?php if(isset($day))  echo $day ; else echo ''?>" placeholder="Enter RentCost Per Day">
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label text-dark"><b>RentCostPerHour</b></label>
          <input type="mediumtext" class="form-control bg-light" id="inputCity" name="perhour"  value="<?php if(isset($hour))  echo $hour ; else echo ''?>" placeholder="Enter RentCost Per Hour">
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label text-dark"><b>RentCostPerKm</b></label>
          <input type="mediumtext" class="form-control bg-light" id="inputCity" name="perkm"  value="<?php if(isset($km))  echo $km ; else echo ''?>" placeholder="Enter RentCost Per Km">
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label text-dark"><b>RTOExp_date</b></label>
         
          <input type="date" class="form-control bg-light" id="inputCity" name="rto" value="<?php if(isset($exp))  echo $exp ; else echo ''?>" >
        </div>


        <div class="col-md-10">
          <label for="inputZip" class="form-label text-dark"><b>Description</b></label>
         <textarea class="form-control bg-light" id="inputZip" name="description" name="des" cols="30" rows="5" placeholder="Give few words about vehicle Features"><?php if(isset($description))  echo $description ; else echo ''?></textarea>
        </div>
       
        <div class="col-12">
          <input type="submit" class="btn btn-primary" value="Save" name="save"/>
        </div>
      </form>
   </section>
</body>
</html>
