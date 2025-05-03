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
    $sql1="SELECT num_plate_id,policy_name FROM insurancename WHERE insurance_id=$user";
    $result1=$conn->query($sql1);
    $row1=$result1->fetch_assoc();
    $policyname=$row1['policy_name'];
    $numplate=$row1['num_plate_id'];
   
    $sql2="SELECT category,model from vehicle where num_plate_id='$numplate'";
    $result2=$conn->query($sql2);
    $row2=$result2->fetch_assoc();
    $category=$row2['category'];
    $model=$row2['model'];
    $sql3="SELECT date_format(date_of_claim,'%d-%m-%Y') as date_of_claim,amount_claim from insurance_claim where num_plate_id='$numplate' and insurance_id='$user'";
    $result3=$conn->query($sql3);






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
<td><b style="color:black;">PolicyName:  </b><i class="text-primary"><?php echo $policyname;?></i></td>
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