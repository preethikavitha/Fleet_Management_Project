<?php

include('../dbcon.php');
if($conn->connect_error)
	{
		die("connection failed".$conn->connect_error);
	}
 
    $user='';
    if(isset($_GET['user_id']))
    {
        $user=$_GET['user_id'];
       
    
    }
    if(isset($_POST['save'])){
        $date=$_POST['date'];
        $user=$_POST['book_id'];
        setcookie("book_id",$user,time()+60*60);
      
       setcookie("rdate",$date,time()+60*60);
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
    <form class="row g-3 p-3 needs-validation" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" autocomplete="off" >
    <?php if(isset($err))
                { ?>
            <div class="alert alert-danger alert-dismissible fade show " role="alert">
           <div><?=$err;?></div>
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
            <?php
      
         }?>
    <input type="hidden" value="<?php echo $user;?>" name="book_id">
   
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
    
        <div class="col-md-3">
          <input type="submit" class="btn btn-primary" value="PaymentDetails" name="save"/>
        </div>
        
       
      
        </form>
        </section>
        </body>
        </html>