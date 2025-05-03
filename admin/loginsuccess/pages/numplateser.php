<?php

include('../dbcon.php');
if($conn->connect_error)
	{
		die("connection failed".$conn->connect_error);
	}
 
  if(isset($_POST['save']))
  {
    $num_plate=$_POST['num_plate'];
   $sql="SELECT num_plate_id FROM vehicle WHERE num_plate_id='$num_plate'";
   $result=$conn->query($sql);

    if($result->num_rows>0)
    {
   
      setcookie('num_plate',$num_plate,time()+60*60*12);
      header('location:servicedet.php');
    }
    else
    {
        
       $err="The Vehicle Doesn't exists";
    }
}
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
  <?php
include('sidenav.php'); 
?>
   <div class="container-fluid text-light py-3">
 
   </div>
   <section class="container my-2 bg-gray-100 w-60 text-light p-2" style="border-radius:20px;">
 <h4 style="text-align:center">Enter Vehicle's NumberPlate to see Service Details</h4>

    <form class="row g-3 p-3 needs-validation" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" autocomplete="off" >
    <?php if(isset($err))
                { ?>
            <div class="alert alert-danger alert-dismissible fade show " role="alert">
           <div><?=$err;?></div>
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
            <?php
      
         }?>
          
    <div class="col-md-6">
            <label for="validationDefault01" class="form-label text-dark"><b>NumberPlate</b></label>
            <input type="text" class="form-control bg-light"  id="validationDefault01"   placeholder="Enter Registeration Number" name="num_plate" required>
           
        </div>
        <br>
      <div class="col-md-6">
        </div>
    
        <div class="col-md-3">
          <input type="submit" class="btn btn-primary" value="ServiceDetails" name="save"/>
        </div>
        
       
      
        </form>
        </section>
        </body>
        </html>