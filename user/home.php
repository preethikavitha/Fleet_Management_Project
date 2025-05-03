<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Fleet Management</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="styles.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

  
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <style>

div.valid .error
{
	color: #00ff00;
    font-size:15px;
}

div.invalid .error{
   
	color: #f00;
    font-size: 15px;
  
}
.form-group.valid input
{
   
	border-color: #00ff00;
   
}

.form-group.invalid input{
  
	border-color: #f00;
   

}
:root {
  --color-primary: #0073ff;
  --color-white: #e9e9e9;
  --color-black: #141d28;
  --color-black-1: #212b38;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: sans-serif;
 
}

.logo {
  color: var(--color-white);
  font-size: 30px;
}

.logo span {
  color: var(--color-primary);
}

.menu-bar {
  background-color: var(--color-black);
  height: 80px;
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 5%;

  position: relative;
}

.menu-bar ul {
  list-style: none;
  display: flex;
}

.menu-bar ul li {
  /* width: 120px; */
  padding: 10px 30px;
  /* text-align: center; */

  position: relative;
}

.menu-bar ul li a {
  font-size: 20px;
  color: var(--color-white);
  text-decoration: none;

  transition: all 0.3s;
}

.menu-bar ul li a:hover {
  color: var(--color-primary);
}

.fas {
  float: right;
  margin-left: 10px;
  padding-top: 3px;
}

/* dropdown menu style */
.dropdown-menu {
  display: none;
}

.menu-bar ul li:hover .dropdown-menu {
  display: block;
  position: absolute;
  left: 0;
  top: 100%;
  background-color: var(--color-black);
}

.menu-bar ul li:hover .dropdown-menu ul {
  display: block;
  margin: 10px;
}

.menu-bar ul li:hover .dropdown-menu ul li {
  width: 150px;
  padding: 10px;
}

.dropdown-menu-1 {
  display: none;
}

.dropdown-menu ul li:hover .dropdown-menu-1 {
  display:none;
  position: absolute;
  left: 150px;
  top: 0;
  background-color: var(--color-black);
}

.hero {
  height: calc(100vh - 80px);
  background-image: url(./bg.jpg);
  background-position: center;
}
.navbar {
 /* Replace with the color you want */
  height: 100px;
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 5 5%;
  position: relative;
}


    </style>
  </head>
  <body>
  <div class="btn-dark">
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
        
	      <a class="navbar-brand" href="index.php">Vehicle&nbsp;<span>Rental</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
         
	


          
             <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="../admin/loginsuccess/loging.php" class="text-warning nav-link">Admin Login</a></li>
	        
	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item active"><a href="aboutus.php" class="nav-link">About</a></li>
	          <li class="nav-item active"><a href="service.php" class="nav-link">Services</a></li>
	         <li class="nav-item active"><a href="vehicles.php" class="nav-link">Vehicles</a></li>
</ul>
           
          <?php
           if(isset($_COOKIE['email'])  && isset($_COOKIE['phone']) && isset($_COOKIE['name'])){
                $_SESSION['email']=$_COOKIE['email'];
             $_SESSION['phone']=$_COOKIE['phone'];
             $_SESSION['name']=$_COOKIE['name'];?>
          
              <div class="nav_right">
			<ul>
				<li class="nr_li dd_main">
					<img src="user.png" alt="profile_img" style="border-radius:50%; border:1px solid #fff">
					<!--
					<div class="dd_menu">
						<div class="dd_left">
							<ul>
								--//no need<br>
								<li><i class="fas fa-cog"></i></li>
								<li><i class="fas fa-download"></i></li>
								<li><i class="fas fa-sign-out-alt"></i></li>--
							</ul>
						</div>
						<div class="dd_right">
							<ul>
                           
                           <li><b style="color:blue">Username: </b><?php //echo $_SESSION['name'];?></li>
					
								<li><b style="color:blue">Email Id: </b><?php //echo $_SESSION['email']; ?></li>
							
								<li><b style="color:blue">Phone Number: </b> <?php //echo $_SESSION['phone']; ?></li> 
                                <li><b style="color:blue">No of Booking: </b></li>
                                <li><button type="button" class="btn btn-dark">
                  <a href="logout-user.php" style="color:white"><i class="fas fa-sign-out-alt"></i>Logout</a>
                </button></li>
    
							</ul>
						</div>
					</div>-->
				</li>
				
			
		</div>
  &nbsp;
  &nbsp;
               <li class="text-primary nav-item1"><a href="profile.php" class="text-primary nav-link1"><?php echo $_SESSION['name'];?>'s Page</a> </li>
             
    
            

            <!--session-->
            
           
         <!--  <li class="nav-item">
                <button type="button" class="btn btn-primary">
                  <a href="logout-user.php" style="color:white" class="nav-link">Logout</a>
                </button>
              </li>-->
            <?php
            } else {
              ?>
              <li class="nav-item">
                <button type="button" class="btn btn-secondary">
                  <a href="login.php" style="color:white" class="nav-link">Login</a>
                </button>
                </li>
                <li class="nav-item"><button type="button" class="btn btn-info"><a href="usersignup1.php" class="nav-link" style="color:white" >Signup</a></button></li>
  
             
             
              <?php
            }
            ?>   </ul>
	      </div>
        </div>
	
	  </nav>
    <!-- END nav -->
  	
    </div>
<script>
	var dd_main = document.querySelector(".dd_main");

	dd_main.addEventListener("click", function(){
		this.classList.toggle("active");
	 })
   
</script>