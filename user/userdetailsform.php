<?php
include('dbcon.php'); 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    if(isset($_COOKIE['email'])){
        $_SESSION['email']=$_COOKIE['email'];   
    }
$email=$_SESSION['email'];
$sql="select Name from usersignup where Email='$email'";
$result=$conn->query($sql);
$row = $result->fetch_assoc();
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $mobile=$_POST['altmob'];
    $mailId=$_POST['email'];
    $address=$_POST['address'];
    $age=$_POST['age']; // Corrected the variable name
    $aadhaar=$_POST['aadhaar'];

$sql1="Select emailId from userdetail where emailId='$mailId'";

$result1=$conn->query($sql1);
$row1=$result1->fetch_assoc();
  /* if($result1->num_rows>0){
    echo '<script>
    function myFunction() {
    Swal.fire({
        icon: "error",
        title: "User",
        text: "Already Exits!!"
      });
      window.location.href="finalbook.php";}
    </script>';
   }
  */
  
if ($result1->num_rows > 0) {
    if (!empty( $address) && !empty($age) && !empty($aadhaar) && !empty($mobile) && !empty($name) && !empty($mailId)) {
       
    
    echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: "error",
                    title: "User",
                    text: "Already Exists!!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        localStorage.setItem("modalShown", "true");
                        window.location.href = "finalbook.php";
                    }
                });
          
        });
    </script>';
    }
}


   else{
       $sql= "insert into userdetail(name,altmoblie,emailId,address,age,aadhaarno) values('$name',$mobile,'$mailId','$address',$age,'$aadhaar')";
    $result=mysqli_query($conn,$sql);
    if($result) {
        echo '<script>
        window.location.href="finalbook.php"</script>';
      
    } else {
       
    }}
    
}

?>
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
  .invalid-feedback{
   
   color: #f00;
   font-size: 18px;
   font-weight: bold;
}


.invalid-feedback{
 
   border-color: #f00;
  

}
/*form{
    box-shadow: 2px 6px 100px #ffffff;
}*/
    </style>
<?php include("home.php");?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css" rel="stylesheet">
<link rel="stylesheet" href="use.css">
<link rel="stylesheet" href="css/all.css">

   
    <div class="bd">

<section>

    <div class="container1 bg-dark">

        <div class="heading">User Details</div>
        <form class="needs-validation" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" autocomplete="off" novalidate>
            <div class="card-details">
                <div class="card-box">
                    <span class="details">
                       Full Name
                    </span>
                    <input type="text" name="name" placeholder="Enter Your Name" value="<?php echo $row['Name'];?>" required>
                </div>
                <div class="card-box">
                    <span class="details">
                      Alternate Mobile Number
                    </span>
                    <input type="mediumtext" maxLength="10" name="altmob" pattern="[6-9]{1}[0-9]{9}" placeholder="Enter your mobile number" required>

                   <div class="invalid-feedback">
      Please provide Valid Mobile Number.
    </div>
                </div>
                <div class="card-box">
                    <span class="details">
                       Email Id
                    </span>
                    <input type="email" name="email" placeholder="Enter Your Email Id" value="<?php echo $_SESSION['email']; ?>" required>
                </div>
                <div class="card-box">
                    <span class="details">
                       Address
                    </span>
                    <input type="text" name="address" placeholder="Enter Your Address" required>
                    <div class="invalid-feedback">
      Please provide Address.
    </div>
                </div>
                <div class="card-box">
                    <span class="details">
                       Age
                    </span>
                    <input type="number" name="age" placeholder="Enter Your Age" required>
                    <div class="invalid-feedback">
      Please provide Your Age.
    </div>
                </div>
                <div class="card-box">
                    <span class="details">
                     Aadhaar No
                    </span>
                    <input type="text" maxLength="12" name="aadhaar" id="txtAadhar" pattern="[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}" placeholder="xxxxxxxxxxxx" required>

                          <div class="invalid-feedback">
      Please provide Valid Number.
    </div>
                </div>
            </div>
            
   
            
            <div class="row align-items-center p-3">
    <div class="col-6 text-center">
   <a href="finalbook.php"> <input type="button" class="btn btn-warning" value="skip" name="skip"></a>
            
            </div>
               <div class="col-6 text-center">
             
              <input type="submit" class="btn btn-primary" value="submit" name="submit" id="submit">
            
      
            
                     </div>
        </form>
    </div>
</section>
</div>



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

