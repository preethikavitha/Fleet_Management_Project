<?php
include('../dbcon.php');

if($conn->connect_error)
	{
		die("connection failed".$conn->connect_error);
	}

    $user='';
    if(isset($_POST['user_id']))
    {
        $user=$_POST['user_id'];
       
    
    }
    $sql1="SELECT type_of_rent,aboutpackage,num_plate_id FROM booking WHERE book_id=$user";
    $result1=$conn->query($sql1);
    $row1=$result1->fetch_assoc();
    $rentprice=$row1['type_of_rent'];
    $package=$row1['aboutpackage'];
    $num_plate=$row1['num_plate_id'];
  if($rentprice=='perhour')
  {
    $sql="SELECT no_of_hr,hramt,driver_charge FROM hour WHERE book_id=$user";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
  }
  else if($rentprice=='perkm')
{
    $sql="SELECT advamt,driver_charge FROM km WHERE book_id=$user";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
}
else if($rentprice=='perday')
{
    $sql="SELECT dayamt,no_of_day,driver_charge FROM day WHERE book_id=$user";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
}
$sql2="SELECT charges FROM rent_price WHERE num_plate_id='$num_plate'";
$result2=$conn->query($sql2);
$row2=$result2->fetch_assoc();



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
</style>
</head>
  <body> 
  <h6>Amount Details</h6>  
  <center>
    <table>
     <tr>
        <td><b style="color:black;">NumberPlate:  </b><i class="text-primary"><?php echo $numplate;?></i></td>
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
   <div class="container-fluid text-light py-3">
 
   </div>

  

   <table class="table table-bordered">
   
  <thead>
    <tr>
     
      <th scope="col" class="text-center">Date_of_claim</th>
      <th scope="col"  class="text-center">claimAmount</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    if($result3->num_rows>0)
							{
								while($row3=$result3->fetch_assoc())
								{?>
      <tr>
      <td class="text-center"><?php echo $row3['date_of_claim'];?></td>
      <td class="text-center"><?php echo $row3['amount_claim'];?></td>
     </tr>
                 <?php               }}?>
    
                

  </tbody>

</table>
                                
</body>