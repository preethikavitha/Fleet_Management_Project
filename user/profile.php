<?php   

include 'dbcon.php';


// Check if user details are available
if(isset($_COOKIE['email'])) {
    $email = $_COOKIE['email'];
 
    // Query to fetch user details from userdetail table
    $sql = "SELECT address FROM userdetail WHERE emailId = '$email'";
    $result = $conn->query($sql);


    if ($result->num_rows>0) {
        // Fetch user address
        $user_detail_row = $result->fetch_assoc();
        $address = $user_detail_row['address'];
    } else {
        // If user detail not found, set address to '-'
        $address = '-';
    }
} else {
    // If email session variable is not set, set address to '-'
    $address = 'not';
}
?>


<?php include("home.php"); ?>
<!DOCTYPE html>
<html lang="en">

     <title>Profile Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Icons CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .padding {
            padding: 3rem !important;
        }

        .user-card-full {
            overflow: hidden;
        }

        .card {
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
            box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
            border: none;
            margin-bottom: 30px;
        }

        .m-r-0 {
            margin-right: 0px;
        }

        .m-l-0 {
            margin-left: 0px;
        }

        .user-card-full .user-profile {
            border-radius: 5px 0 0 5px;
        }

        .bg-c-lite-green {
            background: gray;
        }

        .user-profile {
            padding: 20px 0;
        }

        .card-block {
            padding: 1.25rem;
        }

        .m-b-25 {
            margin-bottom: 25px;
        }

        .img-radius {
            border-radius: 5px;
        }

        h6 {
            font-size: 14px;
        }

        .card .card-block p {
            line-height: 25px;
        }

        @media only screen and (min-width: 1400px) {
            p {
                font-size: 14px;
            }
        }

        .b-b-default {
            border-bottom: 1px solid #e0e0e0;
        }

        .m-b-20 {
            margin-bottom: 20px;
        }

        .p-b-5 {
            padding-bottom: 5px !important;
        }

        .m-b-10 {
            margin-bottom: 10px;
        }

        .text-muted {
            color: #919aa3 !important;
        }

        .f-w-600 {
            font-weight: 600;
        }

        .m-t-40 {
            margin-top: 20px;
        }

        .user-card-full .social-link li {
            display: inline-block;
        }

        .user-card-full .social-link li a {
            font-size: 20px;
            margin: 0 10px 0 0;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }
        /* Media query for Samsung Galaxy devices */
/* Media query for Samsung Galaxy devices */
@media only screen 
  and (device-width: 360px) 
  and (device-height: 740px) 
  and (-webkit-device-pixel-ratio: 4)
  and (orientation: portrait) {
    /* Your CSS styles here */
    .container-fluid {
        width: 100%;
        height: 100vh; /* Set height to 100% of the viewport height */
        overflow-y: scroll; /* Make the container scrollable vertically */
    }


}
    </style>

<body class="bg-light">
<div class="container-fluid">
           <div class="padding">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-md-12">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-4 bg-dark user-profile">
                                <div class="card-block text-center text-white">
                                    <div class="m-b-25">
                                        <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image">
                                    </div>
                                    <?php  
                                   // Start the session to access session variables
                                    if(isset($_SESSION['name'])) {
                                        echo '<h6 class="f-w-600 text-primary">Username: <i class="m-b-10 f-w-600 text-light">' . $_SESSION['name'] . '</i></h6>';
                                    }
                                    ?>
                                    <button type="button" class="btn btn-primary">
                  <a href="logout-user.php" style="color:white" class="nav-link">Logout</a>
                </button>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block">
                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Profile Information</h6>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <p class="m-b-10 f-w-600">Email Id</p>
                                            <h6 class="text-muted f-w-400"><?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?></h6>
                                        </div>
                                       
                                        <div class="col-sm-4">
                    <p class="m-b-10 f-w-600">Address</p>
                    <h6 class="text-muted f-w-400"><?php echo $address; ?></h6>
                </div>
                                        <div class="col-sm-4">
                                            <p class="m-b-10 f-w-600">Phone No</p>
                                            <h6 class="text-muted f-w-400"><?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : ''; ?></h6>
                                        </div>
                                    </div>
                                    <?php
                                    // Include database connection
                                  

                                    // Fetch number of bookings
                                    $email = $_SESSION['email'];
                                    $sql = "SELECT COUNT(*) AS booking_count FROM booking WHERE emailid = '$email'";
                                    $result = $conn->query($sql);
                                    $row = $result->fetch_assoc();
                                    $booking_count = $row['booking_count'];

                                    if ($booking_count > 0) {
                                        // Fetch details of most recent booking
                                        $sql = "SELECT * FROM booking WHERE emailid = '$email' ORDER BY book_date DESC LIMIT 1";
                                        $result = $conn->query($sql);
                                        $recent_booking = $result->fetch_assoc();
                                    ?>

                                    <h6 class="m-b-20 m-t-40 p-b-5 p-t-3 b-b-default f-w-600">Booking Details</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Recent Booking</p>
                                            <h6 class="text-muted f-w-400"><?php echo $recent_booking['Brand'] . " " . $recent_booking['category'] . " on " . $recent_booking['book_date']; ?></h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Number of Bookings</p>
                                            <h6 class="text-muted f-w-400"><?php echo $booking_count; ?></h6>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <ul class="social-link list-unstyled m-t-40 m-b-10">
                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="Facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="Twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="Instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <!-- Tooltips -->
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>
</html>
<?php include("footer.php")?>
