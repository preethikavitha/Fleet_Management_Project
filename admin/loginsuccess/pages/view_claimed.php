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
    if(isset($_POST['save'])){
        $dateclaim=$_POST['dateclaim'];
        $amountclaim=$_POST['amountclaim'];
         $user=$_POST['insid'];
        $numplate=$_POST['numplate'];
       
        $sql3="INSERT INTO insurance_claim(insurance_id,num_plate_id,date_of_claim,amount_claim) VALUES($user,'$numplate','$dateclaim',$amountclaim)";
        
        if($conn->query($sql3))
       {
        $sql4="UPDATE insurancename SET claim='date_of_claim' WHERE insurance_id=$user";
        if($conn->query($sql4))
        {
           header("location:insurdet.php");
          }
       } 
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
    <title>Insurance paid details Entering</title>
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
  
                          

   <section class="container my-2 w-70 text-light p-2" style="border-radius:20px;">
 <h4 style="text-align:center">Insurance Amount Payment</h4>
 <?php if(isset($err))
                { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
           <div><?=$err;?></div>
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
            <?php
      
         }?>
         
    <form class="row g-3 p-3 needs-validation" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" autocomplete="off" novalidate>
        
    <input type="hidden" value="<?php echo $user;?>" name="insid">
   
    <input type="hidden" value="<?php echo $numplate;?>" name="numplate">
   
       
          <div class="col-md-12">
            <label for="validationDefault03" class="form-label text-dark"><b>ClaimDate</b></label>
            <input type="date" class="form-control bg-light" id="validationDefault03" placeholder="Enter Insurance Date" name="dateclaim" required>
            <div class="invalid-feedback">
                Please Provide a Claim Date
        </div>  
        </div>
          
        <div class="col-md-12">
            <label for="validationDefault05" class="form-label text-dark"><b>Claim Amount</b></label>
            <input type="number" class="form-control bg-light" id="validationDefault05"   placeholder="Enter Initial Amount Paid" name="amountclaim" required>
            <div class="invalid-feedback">
                Please Provide a claim Amount Paid
        </div>  
        </div>
       
        
       
        
        <div class="col-md-2">
          <input type="submit" class="btn btn-primary" value="Save" name="save"/>
        </div>
        

</form>
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
document.getElementById("validationDefault05").defaultValue = 0;
</script>

        </body>
        </html>


        