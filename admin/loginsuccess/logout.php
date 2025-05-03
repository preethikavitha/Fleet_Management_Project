<?php
session_start();
setcookie('user',$_SESSION['user'],60);
unset($_SESSION['user']);
session_destroy();
header('location:loging.php');
?>