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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="stylead.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript"
    src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
</script>
<script type="text/javascript">
(function(){
  emailjs.init("FGPeI2R-A2SJR7i7C");
})();
</script>
    <title>PasswordReset</title>
  
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
    $check_email="SELECT email FROM login WHERE email='$email' LIMIT 1";
    $check_email_run=mysqli_query($conn,$check_email);

    if(mysqli_num_rows( $check_email_run)>0)
    {
        $row=mysqli_fetch_array($check_email_run);
        $get_email=$row["email"];
        $update_token="UPDATE login SET password='$htoken' WHERE email='$get_email' LIMIT 1";
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

                 window.location.href="newpass.php";
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

        <p class="header-text">Reset Password</p>
        <?php if(isset($_SESSION['status']))
                { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
           <div><?=$_SESSION['status'];?></div>
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
            <?php
        unset($_SESSION['status']);
         }?>
            <form method="POST" id="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group1">
                
                <label for="user" name="user">Enter MAIL ID</label>
                <input type="email" class="input-field" id="user" name="user" value="<?php echo $email ?>" onkeyup="return validateMail();" class="form-control" >
                <div class="err"></div>
            </div>
            <br><br>
         <div class="form-group">
                <input type="submit" name="password-reset-link"  value="Reset Password" class="btn btn-primary" onclick="return validateMail();"/>
            </div>
        </form>
         </div>
         
           </div> 
        </div>
     </div>
<script src="script.js"></script>
</body>
</html>