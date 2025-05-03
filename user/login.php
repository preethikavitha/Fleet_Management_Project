<?php
include('dbcon.php');   
session_start();
if(isset($_COOKIE['email']) && isset($_COOKIE['phone']) && isset($_COOKIE['name'])){
  header('location:index.php');
  exit();
}
if(isset($_POST['typ']))
{
    $type=$_POST['typ'];
    setcookie('typ',$type,time()+60*60);

}


if(isset($_POST['driv']))
{
    $drive=$_POST['driv'];
    setcookie('driv',$drive,time()+60*60);

}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$email="";
if (isset($_POST['email']) && isset($_POST['password'])){
$email=$_POST['email'];
$password=$_POST['password'];
$sql= "select *from usersignup where Email='$email'";
$result=mysqli_query($conn,$sql);
$count=0;
$use='';
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
  $use=$row["Email"];
  if($email==$use)
  {
    $count=1;
  }

}
if($count==1)
{
$sql= "select Password,Phno,Name from usersignup where Email='$email'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$password=$_POST['password'];
$pass=$row["Password"];
$phoneno=$row["Phno"];
$uname=$row["Name"];
if(password_verify($password,$pass))
{
 // header('location:usersignup1.php');
 //session
 if(isset($_POST['submit'])){
   //$date=date('Y-m-d h:i:s a',time());
   // Current date and time
   date_default_timezone_set("Asia/kolkata");
$currentdatetime=new DateTime('now');
$cdate=$currentdatetime->format('Y-m-d H:i:s');
   $sql="update usersignup set loginindt='$cdate' where Email='$email'";
   $conn->query($sql);
 //$_SESSION['email']=$email; 
 //cheking
 setcookie('email',$use,time()+60*60*12);  
 setcookie('phone',$phoneno,time()+60*60*12);
 setcookie('name',$uname,time()+60*60*12);

 //cheking
 if(isset($_COOKIE['book']))
 {
    echo '<script>
window.location.href="booking.php";</script>';
 }
 else
 {
   echo '<script>
window.location.href="index.php";</script>';

}
 }
}
else{
  $_SESSION['status']='<strong>Password Doesnt matches</strong> Please enter valid password';



}
    
}
else
{
  
  $_SESSION['status']='<strong>Please Signup</strong> Dont have account';


}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-8 form login-form">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" autocomplete="">
                    <h2 class="text-center" style="color:black">Login Form</h2>
                    <p class="text-center" style="color:black">Login with your email and password.</p>
                    <?php if(isset($_SESSION['status'])) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <div style="font-size: 14px;"><?=$_SESSION['status'];?></div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        unset($_SESSION['status']);
                    }?>
                    <div class="form-group">
                        <input class="form-control" type="email" id="user" name="email" value="<?php echo $email ?>" placeholder="Email Address">
                        <div class="error"></div>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" id="password" name="password"  value="<?php echo "" ?>" placeholder="Password">
                        <div class="error"></div>
                    </div>
                    <div class="link forget-pass text-left"><a href="passwordmail.php"  style="color:blue; text-decoration:none"><p style="font-size: 16px">Forgot password?</p></a></div>
                    <div class="form-group">
                        <input class="form-control btn btn-dark" type="submit" name="submit" value="Login" onclick="return validateInputs();">
                    </div>
                    <div class="link login-link text-center" style="color:black">Not yet a member? <a href="usersignup1.php"  style="color:blue; text-decoration:none"><p style="font-size: 16px">Signup now</p></a></div>
                </form>
            </div>
        </div>
    </div>
    <script>
        const email = document.getElementById("user");
        const password = document.getElementById("password");
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
        };

        const isValidEmail = (email) => {
            const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }

        const validateInputs = () => {
            const emailValue = email.value.trim();
            const passwordValue = password.value.trim();

            if (emailValue === '') {
                setError(email, 'Email is required');
            } else if (!isValidEmail(emailValue)) {
                setError(email, 'Provide a valid email address');
            } else {
                setSuccess(email);
            }

            if (passwordValue === '') {
                setError(password, 'Password is required');
            } else if (passwordValue.length < 8) {
                setError(password, 'Password must be at least 8 characters.');
            } else {
                setSuccess(password);
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
