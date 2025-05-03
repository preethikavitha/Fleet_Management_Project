<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


<?php
include('../dbcon.php'); 
$sql2="SELECT * FROM notifyservice";
$result2=$conn->query($sql2);
$row2=$result2->fetch_assoc();
$count=$row2['count'];


echo'<li class="nav-item dropdown d-flex align-items-center">';
         echo'<a class="btn btn-outline-primary btn-sm mb-0 me-3" data-bs-toggle="dropdown" href="#">';
           echo'Insurance AND RTO Alert';
           echo' <span class="badge bg-primary badge-number" id="red">'.$count.'</span>';
         echo' </a><!-- End Notification Icon -->';

         echo' <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">';
          
// Get current date


// Query to fetch payments due tomorrow for the specific user
$sql = "SELECT policy_name, num_plate_id, date,insurance_id,date FROM insurancename WHERE date=CURDATE() OR date =DATE_ADD(CURDATE(), INTERVAL 1 DAY) OR date=DATE_ADD(CURDATE(), INTERVAL 1 WEEK) OR date=DATE_ADD(CURDATE(), INTERVAL 1 MONTH) OR date=DATE_ADD(CURDATE(), INTERVAL 6 MONTH)";
$result = $conn->query($sql);
$sql1="SELECT RTO_Exp_date,num_plate_id FROM notification WHERE RTO_Exp_date=CURDATE() OR RTO_Exp_date =DATE_ADD(CURDATE(), INTERVAL 1 DAY) OR RTO_Exp_date=DATE_ADD(CURDATE(), INTERVAL 1 WEEK) OR RTO_Exp_date=DATE_ADD(CURDATE(), INTERVAL 1 MONTH) OR RTO_Exp_date=DATE_ADD(CURDATE(), INTERVAL 6 MONTH)";
$result1=$conn->query($sql1);


if ($result->num_rows > 0 || $result1->num_rows>0) {
    $count = 0;
    while ($row = $result->fetch_assoc()) {
        $policy_name = $row['policy_name'];
        $num_plate = $row['num_plate_id']; // Corrected column name
        $date = $row['date'];
        $insurance_id=$row['insurance_id'];
       

        // Calculate the time difference in days
        $diff = strtotime($date) - strtotime('today');
        $daysDifference = floor($diff / (60 * 60 * 24));

        // Label the notification based on the days difference
        if ($daysDifference == 0) {
            $timeLabel = ' today';
        } elseif ($daysDifference == 1) {
            $timeLabel = ' tomorrow';
        } elseif ($daysDifference == 7) {
            $timeLabel = ' one week';
        } elseif ($daysDifference == 30) {
            $timeLabel = ' one month';
        } elseif ($daysDifference == 365) {
            $timeLabel = ' one year';
        } else {
            // Handle other cases if needed
            $timeLabel = 'in ' . $daysDifference . ' days';
        }
        $count += 1;
        $notificationMessage="$count ) Vehicle with number plate $num_plate has to renew the insurance $policy_name within $dayDifference";
     $link="insurdet.php?num_plate=$num_plate";
       echo '<div class="font" style="font-family:poppins";>';
        echo '<li class="notification-item">';
        echo '<i class="bi bi-x-circle text-warning"></i>';
        echo '<div >';
        echo '<a href='.$link.' onclick="noti();" class="text-dark font-weight-bold text-sm font-italic mt-0 view_ins"><b> &nbsp <b>Insurance</b>' . $notificationMessage . '</b></a>';

        echo '</div>';
        echo '</li>';
       

   
  }
  while($row1=$result1->fetch_assoc())
  {
    $num_plate=$row1['num_plate_id'];
    $Exp_date=$row1['RTO_Exp_date'];
    $diff1 = strtotime($Exp_date) - strtotime('today');
        $daysDifference1 = floor($diff1 / (60 * 60 * 24));

        // Label the notification based on the days difference
        if ($daysDifference1 == 0) {
            $timeLabel1 = ' today';
        } elseif ($daysDifference1 == 1) {
            $timeLabel1 = ' tomorrow';
        } elseif ($daysDifference1 == 7) {
            $timeLabel1 = ' one week';
        } elseif ($daysDifference1 == 30) {
            $timeLabel1 = ' one month';
        } elseif ($daysDifference1 == 365) {
            $timeLabel1 = ' one year';
        } else {
            // Handle other cases if needed
            $timeLabel1 = 'in ' . $daysDifference1 . ' days';
        }
        $count += 1;
        $notificationMessage1 = "  $count.  Vehicle with $num_plate    has to renew RTO in  $timeLabel1.";
        // Notification message for the user
        $link="insurdet.php?num_plate=$num_plate";
        echo '<div class="font" style="font-family:poppins";>';
        echo '<li class="notification-item">';
        echo '<i class="bi bi-x-circle text-warning"></i>';
        echo '<div >';
      
        echo '<a href="#" onclick="noti();" class="text-dark font-weight-bold text-sm font-italic mt-0 view_ins"><b> &nbsp <b>Insurance</b><br>' . $notificationMessage1 . '</b></a>';
        echo '</div>';
        echo '</li>';
  }

  echo '<script>
      function noti()
      {
        var r=document.getElementById("red");
          r.innerHTML="0";
      }
  </script>';
}
 else {
    // If no pending payments for the user tomorrow
    $count=0;
    echo "No notifications.";
}
$sql2="UPDATE notifyservice SET count=$count";
$conn->query($sql2);
echo '</div></ul>';






?>