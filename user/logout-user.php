<?php
session_start();
//unset($_SESSION['email']);
setcookie('email',$use,60);
//header('location: homepage.php');
session_destroy();
header("location:index.php");
?>
    