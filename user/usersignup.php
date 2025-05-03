<?php
session_start();
include('dbcon.php'); 

if(isset($_POST['typ']))
{
    $type=$_POST['typ'];
    echo $type;
    setcookie('typ',$type,time()+60*60);

}

if(isset($_POST['driv']))
{
    $drive=$_POST['driv'];
    setcookie('driv',$drive,time()+60*60);

}
$name=$_POST['Name'];
$email=$_POST['Email'];
$password=$_POST['Password'];
$hpassword=password_hash($password,PASSWORD_BCRYPT);
$phoneno=$_POST['Phno'];
$sql="select *from usersignup where Email='$email'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
  if($num>0)
  {
    echo '<script>alert("EmailId already Exists Please Login!!");
    window.location.href="login.php"</script>';
  
  }
 
else{
 
    $sql= "insert into usersignup (Name,Email,Password,Phno) values('$name','$email','$hpassword','$phoneno')";
    $result=mysqli_query($conn,$sql);
  if($result)
 {
  setcookie('email',$email,time()+60*60*12);  
  setcookie('phone',$phoneno,time()+60*60*12);
  setcookie('name',$name,time()+60*60*12);
 
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
  else
 {
  die(mysqli_error($conn));
 }
  }




?>
 