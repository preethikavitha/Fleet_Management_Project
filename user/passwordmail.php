<?php

include('dbcon.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="style.css">



     <script type="text/javascript"
    src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
</script>
<script type="text/javascript">
(function(){
  emailjs.init("FGPeI2R-A2SJR7i7C");
})();
</script>
    <title>Password Reset</title>
  
</head>
<body>
    
<?php
$email="";
function password_generate($chars)
{
    $data='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz=@.#$!^%*?&';
    return substr(str_shuffle($data),0,$chars);
}
if(isset($_POST['user']))
{
    $email=mysqli_real_escape_string($conn,$_POST['user']);
    $token=password_generate(10);
    $htoken=password_hash($token,PASSWORD_BCRYPT);
    ?>
    <?php
    $check_email="SELECT email FROM usersignup WHERE email='$email' LIMIT 1";
    $check_email_run=mysqli_query($conn,$check_email);

    if(mysqli_num_rows( $check_email_run)>0)
    {
        $row=mysqli_fetch_array($check_email_run);
        $get_email=$row["email"];
        $update_token="UPDATE usersignup SET password='$htoken' WHERE email='$get_email' LIMIT 1";
        $update_token_run=mysqli_query($conn,$update_token);
        if($update_token_run)
        {
            
            //send_password_reset($get_email,$token);
            ?>
            <script>
                //alert("we mailed you");
               
    let params={
        email:"<?php echo $get_email?>",
        password:"<?php echo $token?>",
        
    }
     console.log(params.password,params.email);
    emailjs.send("service_9rim3yc","template_shvcdmg",params).then(alert("mail sent"));//alert("mail sent")

                 window.location.href="setpassword.php";
                </script>
           
           
            <?php
             
        
        }
    }

        /*else{
            ?>
           <script>
             document.getElementById('err').innerHTML="Something went wrong";
           </script>
           <?php
          
            exit(0);
        }
    }*/
    else
    {
       
        $_SESSION['status']="Sorry! , You'r not an admin or mailID is invalid";
        
    }
}

?>  
    
     <div class="container">
        <div class="login-box" >

       
            <form method="POST"  action=>
            <div class="form-group1">
                
               
        </form>
         </div>
         
           </div> 
        </div>
     </div>

     <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  id="login-form" method="POST" autocomplete="">
                 
                   <h2 class="text-center" style="color:black">Reset Password</h2>
                    <p class="text-center" style="color:black">Please Reset password to continue Login.</p>
                         <?php if(isset($_SESSION['status']))
                { ?>
            <div class="alert alert-danger" style="font-size: 16px">
           <div><?=$_SESSION['status'];?></div>
             </div>
            <?php
        unset($_SESSION['status']);
         }?>
             
                    
                    <div class="form-group">
                           <input class="form-control" type="email" id="user" name="user" placeholder="Email Address" value="<?php echo $email ?>" onkeyup="return validateMail();">
                           <div class="error"></div>
                        </div>
                      <div class="form-group">
                        <input class="form-control button" id="pass" name="password-reset-link" type="submit"  value="Send Password" onclick="return validateInputs();">
                    </div>
                      </form>
            </div>
        </div>
    </div>
    <script>
        const email = document.getElementById("user");
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

        const isValidEmail = (email) => {
            const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }

        const validateInputs = () => {
            const emailValue = email.value.trim();
           
            if (emailValue === '') {
                setError(email, 'Email is required');
            } else if (!isValidEmail(emailValue)) {
                setError(email, 'Provide a valid email address');
            } else {
                setSuccess(email);
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