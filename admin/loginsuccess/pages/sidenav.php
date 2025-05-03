<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="icon" type="image/jpeg" href="images/logo.jpeg">
  
  <link rel="icon" type="image/jpeg" href="images/logo.jpeg">
  <title>
 
    Source Sidebar
  </title>
  <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.20.0/font/bootstrap-icons.css" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      Fonts and icons     -->
  <!--<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
   Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>


<style>
 

/* Add this style to your existing styles */
.notify1-menu ul {
  list-style-type: none;
  padding: 0;
  margin: 0;
  z-index:3;
}

.notify1-menu li {
  background-color:#e91e63;
  color:white;
  padding: 10px;
  margin-bottom: 0px;
  border-radius: 0px;
}



    .notify1{
      position:relative;
    }
    
    .notify1-menu{
      overflow:hidden;
      box-shadow:1px 1px 10px rgba(0,0,0,2);
      position:absolute;
      width:190px;
      top:50px;
      right:50px;
      display:none;
      z-index:3;
    }
    .show1{
      display:block;
    }
    .notify1-menu li:hover{
      background-color:pink;
      cursor:pointer;
      color:white;
    }
    .icon-button1{
      position:relative;
      display:flex;
      align-items:center;
      justify-content:center;
      width:50px;
      height:50px;
      color:#333333;
      background:#dddddd;
      border:none;
      outline:none;
      border-radius:50%;
    }
    .icon-button1:hover{
      cursor:pointer;
    }
    .icon-button__badge1{
      position:absolute;
      top:-10px;
      right:-10px;
      width:25px;
      height:25px;
      background:red;
      color:#ffffff;
      display:flex;
      justify-content:center;
      align-items:center;
      border-radius:50%;
    }
    </style>
</head>

<body class="g-sidenav-show  bg-gray-200">
  
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="dashboardp.php " target="_blank">
        <img src="images/logo.jpeg" class="navbar-brand-img h-100" alt="logo">
        <span class="ms-1 font-weight-bold text-white">Fleet Management</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white l1" onclick="bg(this)" href="home.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1 back">Home</span>
          </a>
        </li>
        <!--dropdown-->
       
                <!--dropdown-->
                <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Manage Vehicles</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white l2"  onclick="bg(this)" href="car.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">directions_car</i>
            </div>
            <span class="nav-link-text ms-1">Add Vehicles</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white l2"  onclick="bg(this)" href="car1.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">check_box</i>
            </div>
            <span class="nav-link-text ms-1">Available Vehicles</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white l3" onclick="bg(this)" href="car2.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center"  onclick="bg();">
              <i class="material-icons opacity-10">login</i>
            </div>
            <span class="nav-link-text ms-1">Rented Vehicles</span>
          </a>
        </li> 
       
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Vehicles Details</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white l4" onclick="bg(this)" href="driver.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Driver Details</span>
          </a>
        </li>
        <li class="nav-item not">
          <a class="nav-link text-white l5"  onclick="bg(this)" href="numplateser.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
               <i class="material-icons opacity-10">build</i>
            </div>
            <span class="nav-link-text ms-1">Services</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white l6" onclick="bg(this)" href="numplateins.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">enhanced_encryption</i>
            </div>
            <span class="nav-link-text ms-1">Insurance</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn btn-outline-primary mt-4 w-100" href="booked.php" type="button">Booking Details</a>
        <a class="btn bg-gradient-primary w-100" href="manage.php" type="button">Manage Booking</a>
      </div>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

<!-- Navbar -->
    <!--Dashboard-->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;"></a>Admin</li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Pages</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
          <?php
if(!isset($_COOKIE['user']))
{
  ?>
 <script>window.location.href="../loging.php";</script>
  <?php
  die();
}
$_SESSION['user']=$_COOKIE['user'];
echo "Welcome ".$_SESSION['user'];

?>
        </nav>
        <!--Dashboard-->
        
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
           
              
           
            </div>
           
          </div>
        
          <ul class="navbar-nav  justify-content-end">
          <li class="nav-item dropdown d-flex align-items-center">
          <a class="btn btn-outline-primary btn-sm mb-0 me-3" href="numplatefuel.php">Fuel
</a>
</li>
          <?php include('notification.php'); ?>
            <li class="nav-item d-flex align-items-center">
              <a href="../pages/sign-in.html" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Users Details</span>
              </a>
            </li>
            
            
          
           
            <li class="nav-item d-flex align-items-center">
              <a class="btn btn-outline-primary btn-sm mb-0 me-3" target="_blank" href="../logout.php">LOGOUT</a>
            </li>
                    
          <li class="nav-item d-flex align-items-center">
          <div class="notify1">
    <div class="notify-btn" id="notify-btn">
      <button type="button" class="icon-button1">
        <span>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6"/>
          </svg>
        </span>
        <span class="icon-button__badge1" id="show_notify">1</span>
      </button>
    </div>
    <div class="notify1-menu" id="notify-menu"></div>
  </div>
 </li>
           
            
         
            
            
   
</ul>
        
        </div>
      </div>
    </nav>
    <!-- End Navbar
      --> 
      <script>
  // Function to set the active link
  function bg(element) {
    var navItems = document.getElementsByClassName('not');

    // Remove 'active' class from all links
    for (var i = 0; i < navItems.length; i++) {
      navItems[i].classList.remove("active", "bg-gradient-primary");
    }

    // Add 'active' class to the clicked link
    element.parentElement.classList.add("active", "bg-gradient-primary");

    // Store the index of the clicked link in sessionStorage
    var index = Array.from(navItems).indexOf(element.parentElement);
    sessionStorage.setItem('activeLinkIndex', index);
  }

  // Function to apply active class on page load
  function applyActiveClassOnLoad() {
    var navItems = document.getElementsByClassName('not');
    var activeLinkIndex = sessionStorage.getItem('activeLinkIndex');

    // If there's a stored index, add 'active' class to the corresponding link
    if (activeLinkIndex !== null) {
      navItems[activeLinkIndex].classList.remove("active", "bg-gradient-primary");
    }
  }

  // Apply the active class on page load
  applyActiveClassOnLoad();



  ////preethi ntification
  
  const notify_btn = document.getElementById('notify-btn');
    const notify_label = document.getElementById('show_notify');
    const notify_container = document.getElementById('notify-menu');
    let xhr = new XMLHttpRequest();

   function notify_me() {
      xhr.open('GET', 'select.php', true);
      xhr.send();
      xhr.onload = () => {
        if (xhr.status == 200) {
          let get_data = JSON.parse(xhr.responseText);
console.log(get_data);
if(get_data==get_data){

    notify_label.innerHTML=get_data;
}
else{
    notify_btn.innerHTML+=get_data;
}
        }
      }
    }

   
    window.onload = () => {
    notify_me();
    setInterval(() => {
        notify_me();
    }, 1000);
};





  /*  notify_btn.addEventListener('click', (e) => {
      e.preventDefault();
      let type=e.type;
      notify_container.classList.toggle('show');


      xhr.open('GET', 'data.php', true);
      xhr.send();
      notify_container.innerHTML='';
      xhr.onload = function() {
        if (xhr.status == 200) {
          let data = JSON.parse(xhr.responseText);
          data.forEach(message => {
            let li = <li>${message.msg}</li>;
            notify_container.innerHTML += li;
          });
        }
      }
    })*/
   

    notify_btn.addEventListener('click', (e) => {
  e.preventDefault();
  let type = e.type;
  notify_container.classList.toggle('show');

  xhr.open('GET', 'data.php', true);
  xhr.send();
  xhr.onload = function () {
    if (xhr.status == 200) {
    try {
      let data = JSON.parse(xhr.responseText);
      notify_container.innerHTML = ''; // Clear previous content

      if (data.length > 0) {
        // Create a list element
        let ul = document.createElement('ul');

        data.forEach((message) => {
          let li = document.createElement('li');
          li.textContent = message.msg;
          ul.appendChild(li);
        });

        // Append the list to the container
        notify_container.appendChild(ul);
      } else {
        // Display a message if there are no messages
        notify_container.textContent = 'No new messages.';
      }
    } catch (error) {
      console.error('Error parsing JSON:', error);
      console.log('Response:', xhr.responseText);
    }
  } else {
    console.error('Request failed with status:', xhr.status);
  }
};

});

</script>