<?php
include('../dbcon.php');

if($conn->connect_error)
	{
		die("connection failed".$conn->connect_error);
	}

    $numplate='';
    if(isset($_POST['user_id']))
    {
        $numplate=$_POST['user_id'];
       
    
    }
  
   
    $sql2="SELECT category,model from vehicle where num_plate_id='$numplate'";
    $result2=$conn->query($sql2);
    $row2=$result2->fetch_assoc();
    $category=$row2['category'];
    $model=$row2['model'];
    $sql3="SELECT date_format(book_date,'%d-%m-%Y') as bookdate,type_of_rent,tot_amt,date_format(pick_date,'%d-%m-%Y') as pickdate,date_format(drop_date,'%d-%m-%Y') as dropdate,aboutpackage,empid FROM booking where num_plate_id='$numplate' and status='confirm'";
   
    $result3=$conn->query($sql3);

$sql4="SELECT sum(tot_amt) as totamt FROM booking WHERE num_plate_id='$numplate' and status='confirm'";
$result4=$conn->query($sql4);
   $row4=$result4->fetch_assoc();




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
  <body> <center>
  <div class="text-center">
                            <b>Number_Plate: </b><?php echo $numplate ?><br>
                            <b>Model: </b><?php echo $model." " ?> <b>Category: </b><?php echo $category ?></div>
                        
					
					</div>
                    <h6><b>AmountEarnedFromrent:</b><span class="text-primary"><?php echo $row4['totamt']; ?></span></h6>
</center>
   <div class="container-fluid text-light py-3">
 
   </div>

  

   <table class="table table-bordered">
   
  <thead>
    <tr>
    <th scope="col" class="text-center">BookDate</th>
      <th scope="col"  class="text-center">Duration</th>
      <th scope="col"  class="text-center">Package</th>
      <th scope="col"  class="text-center">TypeOfRent</th>
      <th scope="col"  class="text-center">Total cost</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    if($result3->num_rows>0)
							{
								while($row3=$result3->fetch_assoc())
								{?>
      <tr>
      <td class="text-center"><?php echo $row3['bookdate'];?></td>
      <td class="text-center"><b>PickDate:</b><?php echo $row3['pickdate'];?><br><b>DropDate:</b><?php echo $row3['dropdate'];?></td>
      <td class="text-center"><?php echo $row3['aboutpackage'];?><br>
      <?php if($row3['aboutpackage']=='Driver')
      {?>

      <b>Driver:</b><?php $emp=$row3['empid']; echo $row3['empid'];?>
      <?php } ?>
    <br><a href='driver.php' style='color:blue;'>View Details</a></td> 
    <td class="text-center"><?php echo $row3['type_of_rent'];?></td>
    <td class="text-center"><?php echo $row3['tot_amt'];?></td>
    </tr>
                 <?php               }}?>
    
                

  </tbody>

</table>
                                
</body>