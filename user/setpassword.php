<?php
include('dbcon.php');
session_start();
$tpassword="";
$password="";
$cpassword="";
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['changepass']))
{
   
$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
if(isset($_POST['password']))
{
    $password = mysqli_real_escape_string($conn, $_POST['password']);   
}
if(isset($_POST['temp_pass']))
{
    $tpassword = mysqli_real_escape_string($conn, $_POST['temp_pass']);
    $check_pass="SELECT * FROM usersignup";
    $check_pass_run=mysqli_query($conn,$check_pass);
    if(mysqli_num_rows( $check_pass_run)>0)
    {
        $count=0;
      while( $row=mysqli_fetch_array($check_pass_run)){
        $password=$row['Password'];
        if(password_verify($tpassword,$password)){
            $count=1;
        $get_email=$row["Email"];
        if(isset($_POST['password']))
        {
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $hpassword=password_hash($password,PASSWORD_BCRYPT);
            $update_pass="UPDATE usersignup SET password='$hpassword' WHERE email='$get_email' LIMIT 1";
            $update_pass_run=mysqli_query($conn,$update_pass);
            //err
              header("location:login.php");
              exit(0);
        }  
    }

}
if($count==0){
    $_SESSION['status']="temparory password is wrong";
}
           
    }
    else
    {
        $_SESSION['status']="There is no data";
    }
     
     
}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

<link rel="stylesheet" href="./style.css">
    
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" autocomplete="">
                    <h2 class="text-center" style="color:black">Change Password</h2>
                    <p class="text-center" style="color:black">Change Password to Continue.</p>
                    <?php
                if(isset($_SESSION['status']))
                {?>
                <div class="alert alert-danger">
                    <h5><?=$_SESSION['status'];?></h5>
                </div>
                <?php
                unset($_SESSION['status']);
                }
                ?>
                
                    
                   
                    <div class="form-group">
    <input class="form-control" name="temp_pass" id="temp_pass" type="password" placeholder="Enter temporary password" value="<?php echo ''?>">
                        <div class="error"></div>
                    </div>
                    <div class="form-group">
                            <input class="form-control"  type="password" name="password" id="password" placeholder="Enter New password" value="<?php echo $password?>">
                            <div class="error"></div>
                    
                        </div>
                        
                
                            <div class="form-group">
                         <input  class="form-control" type="password" name="cpassword" id="cpassword"   placeholder="Enter confirm New password" value="<?php echo $cpassword?>" >
                         <div class="error"></div>
                        </div>
                        <div class="form-group">
                        <input class="form-control button" type="submit" name="changepass"   id="changepass" value="Change Password" onclick="return validateInputs();">
                    </div>
            </div>
                    </form>
            </div>
        </div>
    </div>
    <script>
        const password = document.getElementById("password");
        const cpassword = document.getElementById("cpassword");
        const temp = document.getElementById("temp_pass");
        
        var count = 0;

        const setError = (element, message) => {
            const inputControl = element.parentElement;
            const errorDisplay = inputControl.querySelector('.error');

            errorDisplay.innerText = message;
            inputControl.classList.add('invalid');
            inputControl.classList.remove('valid');
            count = 1;
        }

        const setSuccess = (element) => {
            const inputControl = element.parentElement;
            const errorDisplay = inputControl.querySelector('.error');

            errorDisplay.innerText = '';
            inputControl.classList.add('valid');
            inputControl.classList.remove('invalid');
            count=0;
        };

        

        const validateInputs = () => {
            const tempValue = temp.value.trim();
            const passwordValue = password.value.trim();
            const cpasswordValue = cpassword.value.trim();
    
            if(tempValue === '')
    {
        setError(temp,'Temporary password is required');
       
    }
    else
    {
       setSuccess(temp);
      
    }
    if (passwordValue === '') {
        setError(password, 'Password is required');
      
    } else if (passwordValue.length < 8) {
        setError(password, 'Password must be at least 8 characters.');
      
    }
    else if(passwordValue.length > 15){
        setError(password,"Password must be lesser than 15 characters");
        
    } else {
        if (passwordValue.length > 8)
        setSuccess(password,"Password must be lesser than 15 characters");
       
    }

    if(cpasswordValue === '') {
        setError(cpassword, 'Please confirm your password');
    } else if (passwordValue !== cpasswordValue) {
        setError(cpassword, "Passwords doesn't match");
    } else {
        setSuccess(cpassword);
    }
           

            if (count == 1) {
                count=0;
                return false;
            } else {
                return true;
            }
        };
    </script>
</body>
</html>

        















































