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
    $check_pass="SELECT * FROM login";
    $check_pass_run=mysqli_query($conn,$check_pass);
    if(mysqli_num_rows( $check_pass_run)>0)
    {
        $count=0;
        while($row=mysqli_fetch_array($check_pass_run))
        {
            $password=$row["password"];
            if(password_verify($tpassword,$password))
            {
                $count=1;
        $get_email=$row["email"];
        if(isset($_POST['password']))
        {
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $hpassword=password_hash($password,PASSWORD_BCRYPT);
            $update_pass="UPDATE login SET password='$hpassword' WHERE email='$get_email' LIMIT 1";
            $update_pass_run=mysqli_query($conn,$update_pass);
            //err
              header("location:loging.php");
              exit(0);
        } 
    } 
    }
    if($count==0)
    {
        $_SESSION['status']="Temp password is wrong";
    }
           
    }
    else
    {
        $_SESSION['status']="There is no data in the database";
    }
     
     
}
}

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
   
    <title>Reset Password</title>
  
</head>
<body>
    
       

     <div class="container">
        <div class="login-box" style="height:600px;">

            
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
            <form method="POST" id="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
            <div class="form-group1">
                
                <label for="temp_pass" name="temp_pass">Temporary Password</label>
                <input type="password" class="input-field" id="temp_pass" name="temp_pass"  onkeyup="return temppass();" value="<?php echo ''?>"class="form-control" >
                <div class="err"></div>
            </div>
            <br>
            <div class="form-group1">
                
                <label for="password" name="password">password</label>
                <input type="password" class="input-field" id="password" name="password"  onkeyup="return validatePassword();" value="<?php echo $password?>"  class="form-control">
              <div class="err"></div>
                
            </div>
            <br>
            <div class="form-group1">
                
                <label for="cpassword" name="cpassword">Confirm Password</label>
                <input type="password" class="input-field" id="cpassword" name="cpassword"  onkeyup="return validatePassword1();" value="<?php echo $cpassword?>"  class="form-control" >
                <div class="err"></div>
                
            </div>
        <br>
           <div class="form-group">
                <input type="submit" name="changepass" class="btn btn-primary"  onclick="return validatePasswords(this);" value="Reset Password"/>
                
                
            </div>
        </form>
         </div>
         </div> 
           <script src="script.js"></script>
</body>
</html>