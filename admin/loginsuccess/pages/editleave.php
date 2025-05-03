<?php 
	include('../dbcon.php');
	if($conn->connect_error)
	{
		die("connection failed".$conn->connect_error);
	}
    if(isset($_GET['user_id']))
    {
    
        $id=$_GET['user_id'];
        $sql1="SELECT * FROM driver_leave WHERE id='$id'";
        $result1=$conn->query($sql1);
       
            $row1=$result1->fetch_assoc();
                $empid=$row1['empid'];
                $from_leave=$row1["from_Leave"];
                $to_leave=$row1["to_Leave"];
                $type_of_leave=$row1["type_of_leave"];

            
       

    }
    if(isset($_POST['save']))
    {
        $empid=$_POST['id'];
        $from_leave=$_POST['from_leave'];
        $to_leave=$_POST['to_leave'];
        $type_of_leave=$_POST['type_of_leave'];
        $sql="UPDATE driver_leave SET from_Leave='$from_leave',to_Leave='$to_leave',type_of_leave='$type_of_leave' WHERE id='$empid'";
        $conn->query($sql);
        if($sql)
        {
            header('location:leavedet.php?empid='.$empid);

        }
        else
        {
            $err="Something problem in Insertion";
        }
    }
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<body>
<?php include('sidenav.php'); ?>
	
	
    <div class="container-fluid text-light py-3">
 
 </div>
 <section class="container my-2 bg-gray-100 w-80 text-light p-2" style="border-radius:20px;">
<h4 style="text-align:center">Driver Leave Details</h4>
<?php if(isset($err))
              { ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <div><?=$err;?></div>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>
          <?php
    
       }?>
       
  <form class="row g-3 p-3 needs-validation" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" autocomplete="off" novalidate>
      <div class="col-md-6">
          <label for="validationDefault01" class="form-label text-dark"><b>Driver ID</b></label>
          <input type="text" class="form-control bg-light"  id="validationDefault01"   value="<?php if(isset($empid)) echo $empid; else echo ''?>" name="id" readonly required>
          
        </div>
        <div class="col-md-6">
          <label for="validationDefault02" class="form-label text-dark"><b>Type Of Leave</b></label>
          <input type="mediumtext" class="form-control bg-light" id="validationDefault02"  value="<?php if(isset($type_of_leave)) echo $type_of_leave; else ''; ?>" placeholder="Enter Insurance Claim Amount" name="type_of_leave" required>
          <div class="invalid-feedback">
              Please Provide a Type Of Leave
      </div>  
      </div>
        <div class="col-md-6">
          <label for="validationDefault02" class="form-label text-dark"><b>Leave From</b></label>
          <input type="date" class="form-control bg-light" id="validationDefault02"   value="<?php if(isset($from_leave)) echo $from_leave; else ''; ?>"placeholder="Enter Service Date" name="from_leave" required>
          <div class="invalid-feedback">
              Please Provide a Leave Start Date
      </div>  
      </div>
        <div class="col-md-6">
          <label for="validationDefault02" class="form-label text-dark"><b>Leave Till</b></label>
          <input type="date" class="form-control bg-light" id="validationDefault02" value="<?php if(isset($to_leave)) echo $to_leave; else ''; ?>" placeholder="Enter Service Cost" name="to_leave" >
           
      </div>
       
      <div class="col-md-4">
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

</script>
</body>
</html>