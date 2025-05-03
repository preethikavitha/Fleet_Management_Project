<?php
include('dbcon.php');   
session_start();
$timezone=date_default_timezone_set("Asia/Kolkata");
if(isset($_SESSION['user']) || (isset($_COOKIE['user'])))
{
    header('location:pages/home.php');
    die();
}
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM login";
$result = $conn->query($sql);
$user = "";
if (isset($_POST['user']) && isset($_POST['password'])) {
    $user = $_POST["user"];
    $password = $_POST["password"];
    $count = 0;
    while ($row = $result->fetch_assoc()) {
        $use = $row["email"];
        
        if ($user == $use) {
            //echo "password and username matches";
            $pass = $row['password'];
            $count = 1;
            break;
        }
    }
    if ($count == 1) {
        if(!password_verify($password,$pass))
        {
         $_SESSION['status']="Password is wrong";
        }
        else{
      
            $currentDateTime=new DateTime('now');
            $currentDT=$currentDateTime->format('Y-m-d h:i:s');
            $sql="UPDATE login SET last_login='$currentDT' WHERE email='$use'";
            $conn->query($sql);
         $_SESSION['user']=$user;
         setcookie('user',$user,time()+60*60*12);
        
         header('location:pages/home.php');
         die();
       
    }
         // Add exit() after header to stop further execution
    }
    else
{
    $_SESSION['status']="Mail ID is wrong";
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
    <title>Login</title>

</head>

<body>
    <div class="container">
        <div class="login-box" style="height:500px;">
            <p class="header-text">Admin Login</p>
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
                    <label for="user">Username</label>
                    <input type="email" class="input-field" id="user" name="user" value="<?php echo $user ?>" onkeyup="return validateMail();"  class="form-control">
                    <div class="err"></div>
                </div>
                <br>
                <div class="form-group1">
                    <label for="password">Password</label>
                    <input type="password" class="input-field" id="password" name="password"  value="<?php echo "" ?>"  onkeyup="return validatePassword();" class="form-control">
                    <div class="err"></div>
                </div>
                <br><br>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" onclick="return validateInputs();" value="Login" >
                    <a href="mailsend.php" class="float-end">Forget-password?</a>
                </div>
            </form>
        </div>
    </div>
    <script src="script.js">
        
    </script>
</body>

</html>