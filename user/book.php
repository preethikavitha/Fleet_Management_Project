
<?php
include("dbcon.php");

if (isset($_COOKIE['email'])) {
     // Make sure to start the session before accessing or setting session variables.
    $_SESSION['email'] = $_COOKIE['email'];
}
if(isset($_COOKIE['category'])){
    $_SESSION['category']=$_COOKIE['category'];
}
$category=$_COOKIE['category'];
if(isset($_COOKIE['num_plate'])){
    $_SESSION['num_plate']=$_COOKIE['num_plate'];
}
$num_plate=$_COOKIE['num_plate'];
$count=0;
if (isset($_POST['submit'])) {
    $email = $_COOKIE['email'];
    $sql = "SELECT * FROM checkavail";
	$result=$conn->query($sql);
	if($result->num_rows>0)
	{ 
while($row=$result -> fetch_assoc()){
	$pickdate=$row['pick_date'];
	$dropdate=$row['drop_date'];
   
    //$dat1=strtotime($pickdate);
   // $dat2=strtotime($dropdate);
   // $days=$dat2-$dat1;
    
}
    }
   // $sql = "SELECT MAX(pick_date) as pick_date,MAX(drop_date) as drop_date,emailid FROM booking WHERE emailid='$email' AND category='$category'";
   // $result = $conn->query($sql);

   // if ($result->num_rows > 0) {
        //$row = $result->fetch_assoc();
        
        //$pickdate = $row['pick_date'];
        //$dropdate = $row['drop_date'];
        $to_location = $_POST['to_location'];
        $from_location = $_POST['from_location'];
        $type_of_place = $_POST['type_of_place'];

     
function calculateShift($datetime) {
    $hour = date('H', strtotime($datetime));
    echo $hour;
    if ($hour >= 6 && $hour < 18) {
        return "Morning";
    }  else {
        return "Night";
    }
}

function calculateday($date1,$date2)
{
    $dat1=strtotime($date1);
    $dat2=strtotime($date2);
   
    $diff=($dat2-$dat1)/(3600);
 
    return $diff;
}

$diff=calculateday($pickdate,$dropdate);
echo "function".$diff;
$dif=$diff/24;
$type=$_COOKIE['typ'];
if($dif==0)
{
    if($type=='perhour')
    {
        $sql="SELECT ptime,dtime FROM hr";
    }
    if($type=='perkm')
    {
        $sql="SELECT ptime,dtime FROM km"; 
    }
   
    $result=$conn->query($sql);
    while($row=$result -> fetch_assoc()){
        $picktime=$row['ptime'];
        $droptime=$row['dtime'];
        //$dat1=strtotime($pickdate);
       // $dat2=strtotime($dropdate);
       // $days=$dat2-$dat1;
        
    }
    $dif1=calculateday($picktime,$droptime);
$d1=calculateShift($picktime);
$d2=calculateShift($droptime);


}
else
{
    $d1='both';
$d2='both';


}
if(isset($_COOKIE['last']))
{
    $book=$_COOKIE['last'];
}
if($d1=="Night" && $d2=="Night"){
    $sql1 = "SELECT * FROM driver WHERE category='$category' AND driveplace='$type_of_place' AND drivetime='Night' AND status='Available' LIMIT 1";
    $result1 = $conn->query($sql1);
    $count=1;
    if($result1->num_rows<=0)
    {
        $count=0;
        
        $sql2 = "SELECT * FROM driver WHERE category='$category' AND driveplace='$type_of_place' AND drivetime='All' AND status='Available' LIMIT 1";
        $result2=$conn->query($sql2);
        if ($result2->num_rows > 0) {
            $row2 = $result2->fetch_assoc();
            $empid = $row2['empid']; // Assuming empid is a column in the 'driver' table
            $sql2 = "UPDATE booking SET to_location='$to_location', from_location='$from_location', type_of_place='$type_of_place', empid='$empid' WHERE emailid='$email' AND drop_date='$dropdate' AND pick_date='$pickdate' AND category='$category'";
            if ($conn->query($sql2)) {
                echo 'Record updated successfully';
         
             
     
               $count=1;
                // Additional logic if needed
            } else {
                echo 'Error updating record: ' . $conn->error;
            }
           
            
        } 
        else{
             echo '<script>alert("No Driver Available in this category Please Would You Choose Another Plan!!");
    window.location.href="index.php" </script>';
  
        }


    }
    if($count==1)
    {
        $book=$_COOKIE['last'];
    $sql3="SELECT night_charge,kmcharge_night FROM driveramt WHERE category='$category'";
    $result3=$conn->query($sql3);
    $row3=$result3->fetch_assoc();
    $type=$_COOKIE['typ'];
    if($type=="perkm")
    {
        $km=$row3['kmcharge_night'];
        $driv=$km*60;
        $sql7="UPDATE km SET driver_charge=$driv,daytype='night' WHERE bookid=$book";
        $conn->query($sql7);
        if($sql7)
        {
            $sql9="SELECT driver_charge,advamt FROM km WHERE bookid=$book";
            $result9=$conn->query($sql9);
            $row9=$result9->fetch_assoc();
            $advamt=$row9['advamt'];$driv=$row9['driver_charge'];
            $sql10="SELECT charges from rent_price WHERE num_plate_id='$num_plate'";
            $result10=$conn->query($sql10);
            $row10=$result10->fetch_assoc();
            $char=$row10['charges'];
    //total amount
            $tot=$advamt+$driv+$char;
             $sql5="UPDATE booking SET tot_amt=$tot WHERE book_id=$book";
             $conn->query($sql5);
             
      
if ($sql5) {
   $email=$_COOKIE['email'];
    $sql2 = "SELECT emailId FROM userdetail WHERE emailId = '$email'";
    $result2 = $conn->query($sql2);

    if ($result2->num_rows > 0) {
        // Email exists, redirect to finalbook.php
     header("location: finalbook.php");
    } else {
        // Email does not exist, redirect to userdetailsform.php
       header("location: userdetailsform.php");
    }
}


    }
    }
    if($type=="perhour")
    {
    $charge=$row3['night_charge'];
    $driv=$charge*$dif1;
    echo $dif1;
    $sql7="UPDATE hr SET driver_charge=$driv,daytype='night' WHERE bookid=$book";
    $conn->query($sql7);
    if($sql7)
    {
        $sql9="SELECT driver_charge,hramt FROM hr WHERE bookid=$book";
        $result9=$conn->query($sql9);
        $row9=$result9->fetch_assoc();
        $advamt=$row9['hramt'];$driv=$row9['driver_charge'];
        $sql10="SELECT charges from rent_price WHERE num_plate_id='$num_plate'";
        $result10=$conn->query($sql10);
        $row10=$result10->fetch_assoc();
        $char=$row10['charges'];
//total amount
        $tot=$advamt+$driv+$char;
         $sql5="UPDATE booking SET tot_amt=$tot WHERE book_id=$book";
         $conn->query($sql5);
         if ($sql5) {
            $email=$_COOKIE['email'];
             $sql2 = "SELECT emailId FROM userdetail WHERE emailId = '$email'";
             $result2 = $conn->query($sql2);
             echo 'hrn';
             if ($result2->num_rows > 0) {
                echo 'henkrn';
                 // Email exists, redirect to finalbook.php
                 header("location: finalbook.php");
             } else {
                 // Email does not exist, redirect to userdetailsform.php
                 header("location: userdetailsform.php");
                 echo 'hello';
             }
         }
         
        
    }
}
}  

}
else if($d1=="Morning" && $d2=="Morning")
{
    $sql1 = "SELECT * FROM driver WHERE category='$category' AND driveplace='$type_of_place' AND drivetime='Morning' AND status='Available' LIMIT 1";
   
    $result1= $conn->query($sql1);
    $count=1;
    if($result1->num_rows<=0)
    { 
        $count=0;
        echo $type_of_place;
        echo $category;
        $sql2 = "SELECT * FROM driver WHERE category='$category' AND driveplace='$type_of_place' AND drivetime='All' AND status='Available' LIMIT 1";
        $result2=$conn->query($sql2);
        if ($result2->num_rows > 0) {
            echo 'hello';
            $row2 = $result2->fetch_assoc();
            $count=1;
            $empid = $row2['empid']; // Assuming empid is a column in the 'driver' table
            $sql2 = "UPDATE booking SET from_location_address='$to_location', from_location='$from_location', type_of_place='$type_of_place', empid='$empid' WHERE emailid='$email' AND drop_date='$dropdate' AND pick_date='$pickdate' AND category='$category'";
          
            if ($conn->query($sql2)) {
                echo 'Record updated successfully';
               $count=1;
                // Additional logic if needed
            } else {
                echo 'Error updating record: ' . $conn->error;
            }
           
            
        } 
        else{
             echo '<script>alert("No Driver Available in this category Please Would You Choose Another Plan!!");
            window.location.href="index.php" </script>';
          
        }

    }
    if($count==1)
    {
        $book=$_COOKIE['last'];
    $sql3="SELECT morning_charge,kmcharge_morning FROM driveramt WHERE category='$category'";
    $result3=$conn->query($sql3);
    $row3=$result3->fetch_assoc();
    $type=$_COOKIE['typ'];
    if($type=="perkm")
    {
        $km=$row3['kmcharge_morning'];
        $driv=$km*60;
        $sql7="UPDATE km SET driver_charge=$driv,daytype='morning' WHERE bookid=$book";
        $conn->query($sql7);
        if($sql7)
        {
        $sql9="SELECT driver_charge,advamt FROM km WHERE bookid=$book";
        $result9=$conn->query($sql9);
        $row9=$result9->fetch_assoc();
        $advamt=$row9['advamt'];$driv=$row9['driver_charge'];
        $sql10="SELECT charges from rent_price WHERE num_plate_id='$num_plate'";
        $result10=$conn->query($sql10);
        $row10=$result10->fetch_assoc();
        $char=$row10['charges'];
//total amount
        $tot=$advamt+$driv+$char;
         $sql5="UPDATE booking SET tot_amt=$tot WHERE book_id=$book";
         $conn->query($sql5);
         if($sql5)
         {
            $sql2="SELECT emailId FROM userdetail";
            $result2=$conn->query($sql2);
           
               while($row2=$result2->fetch_assoc())
               {
                $email=$row2['emailId'];
                if($email==$_COOKIE['email'])
                {
                    header("location:finalbook.php"); 
                }
               }
            header("location:userdetailsform.php");

         }
           
        }
       
    }
    if($type=="perhour")
    {
    $charge=$row3['morning_charge'];
    echo 'diff='.$dif1;
    $driv=$charge*$dif1;
    $sql7="UPDATE hr SET driver_charge=$driv,daytype='morning' WHERE bookid=$book";
    $conn->query($sql7);
    if($sql7)
    {
        $sql9="SELECT driver_charge,hramt FROM hr WHERE bookid=$book";
        $result9=$conn->query($sql9);
        $row9=$result9->fetch_assoc();
        $advamt=$row9['hramt'];$driv=$row9['driver_charge'];
        $sql10="SELECT charges from rent_price WHERE num_plate_id='$num_plate'";
        $result10=$conn->query($sql10);
        $row10=$result10->fetch_assoc();
        $char=$row10['charges'];
//total amount
        $tot=$advamt+$driv+$char;
         $sql5="UPDATE booking SET tot_amt=$tot WHERE book_id=$book";
         $conn->query($sql5);
         if($sql5)
         {
            $sql2="SELECT emailId FROM userdetail";
            $result2=$conn->query($sql2);
           
               while($row2=$result2->fetch_assoc())
               {
                $email=$row2['emailId'];
                if($email==$_COOKIE['email'])
                {
                   header("location:finalbook.php"); 
                }
               }
           header("location:userdetailsform.php");

    }
}
}

    }

}
else{ 
    

    $sql1 = "SELECT * FROM driver WHERE category='$category' AND driveplace='$type_of_place' AND drivetime='All' AND status='Available' LIMIT 1";
    $result1 = $conn->query($sql1);

    if($result1->num_rows<=0){
        echo '<script>alert("No Driver Available in this category Please Would You Choose Another Plan!!");
        window.location.href="index.php" </script>';
      
         }
    else{
    $count=0;
    if($sql1)
      $count=1;
    if($count==1)
    {
        $book=$_COOKIE['last'];
    $sql3="SELECT day_charge,kmcharge_morning,kmcharge_night,night_charge,morning_charge FROM driveramt WHERE category='$category'";
    $result3=$conn->query($sql3);
    $row3=$result3->fetch_assoc();
    $dif=$diff/24;
    $type=$_COOKIE['typ'];
    if($type=="perkm")
    {
        $km=$row3['kmcharge_morning'];
        $driv1=$km*12;
        $km=$row3['kmcharge_night'];
        $driv2=$km*12;
        $driv=$driv1+$driv2;
        $sql7="UPDATE km SET driver_charge=$driv WHERE bookid=$book";
        $conn->query($sql7);
         if($sql7)
        {
            $sql9="SELECT driver_charge,advamt FROM km WHERE bookid=$book";
        $result9=$conn->query($sql9);
        $row9=$result9->fetch_assoc();
        $advamt=$row9['advamt'];$driv=$row9['driver_charge'];
        $sql10="SELECT charges from rent_price WHERE num_plate_id='$num_plate'";
        $result10=$conn->query($sql10);
        $row10=$result10->fetch_assoc();
        $char=$row10['charges'];
//total amount
        $tot=$advamt+$driv+$char;
         $sql5="UPDATE booking SET tot_amt=$tot WHERE book_id=$book";
         $conn->query($sql5);
         if($sql5)
         {
        
            $sql2="SELECT emailId FROM userdetail";
            $result2=$conn->query($sql2);
           
               while($row2=$result2->fetch_assoc())
               {
                $email=$row2['emailId'];
                if($email==$_COOKIE['email'])
                {
                 header("location:finalbook.php"); 
                }
               }
            header("location:userdetailsform.php");

        }
    }
}
    if($type=="perhour")
    {
    $charge=$row3['night_charge'];
    $charge1=$row3['morning_charge'];
    $driv=$charge*$dif1+$dif1*$charge1;
    $sql7="UPDATE hr SET driver_charge=$driv WHERE bookid=$book";
    $conn->query($sql7);
     if($sql7)
        {
            $sql9="SELECT driver_charge,hramt FROM hr WHERE bookid=$book";
            $result9=$conn->query($sql9);
            $row9=$result9->fetch_assoc();
            $advamt=$row9['hramt'];$driv=$row9['driver_charge'];
            $sql10="SELECT charges from rent_price WHERE num_plate_id='$num_plate'";
            $result10=$conn->query($sql10);
            $row10=$result10->fetch_assoc();
            $char=$row10['charges'];
    //total amount
            $tot=$advamt+$driv+$char;
             $sql5="UPDATE booking SET tot_amt=$tot WHERE book_id=$book";
             $conn->query($sql5);
             if($sql5)
             {
                $sql2="SELECT emailId FROM userdetail";
                $result2=$conn->query($sql2);
               
                   while($row2=$result2->fetch_assoc())
                   {
                    $email=$row2['emailId'];
                    if($email==$_COOKIE['email'])
                    {
                        header("location:finalbook.php"); 
                    }
                   }
                header("location:userdetailsform.php");
    
        }
    }
}
    if($type=="perday")
    {
    $charge=$row3['day_charge'];
    $driv=$charge*$dif;
    $sql7="UPDATE day SET driver_charge=$driv WHERE bookid=$book";
    $conn->query($sql7);
     if($sql7)
        {
            $sql9="SELECT driver_charge,dayamt FROM day WHERE bookid=$book";
        $result9=$conn->query($sql9);
        $row9=$result9->fetch_assoc();
        $advamt=$row9['dayamt'];$driv=$row9['driver_charge'];
        $sql10="SELECT charges from rent_price WHERE num_plate_id='$num_plate'";
        $result10=$conn->query($sql10);
        $row10=$result10->fetch_assoc();
        $char=$row10['charges'];
//total amount
        $tot=$advamt+$driv+$char;
         $sql5="UPDATE booking SET tot_amt=$tot WHERE book_id=$book";
         $conn->query($sql5);
         if($sql5)
         {
            $sql2="SELECT emailId FROM userdetail";
            $result2=$conn->query($sql2);
           
               while($row2=$result2->fetch_assoc())
               {
                $email=$row2['emailId'];
                if($email==$_COOKIE['email'])
                {
                    header("location:finalbook.php");
                }
               }
            header("location:userdetailsform.php");

        }
    }
}
    }
    }
}



      


       
        if ($result1->num_rows > 0) {
            $row1 = $result1->fetch_assoc();
            $empid = $row1['empid']; // Assuming empid is a column in the 'driver' table
            $sql2 = "UPDATE booking SET from_location_address='$to_location', from_location='$from_location', type_of_place='$type_of_place', empid='$empid' WHERE emailid='$email' AND drop_date='$dropdate' AND pick_date='$pickdate' AND category='$category'";
          
            if ($conn->query($sql2)) {
                
                $sql2="SELECT emailId FROM userdetail";
                $result2=$conn->query($sql2);
               
                   while($row2=$result2->fetch_assoc())
                   {
                    $email=$row2['emailId'];
                    if($email==$_COOKIE['email'])
                    {
                     header("location:finalbook.php");                }
                   }
               header("location:userdetailsform.php");
                // Additional logic if needed
            } 
           
            
        } 
        else {
            echo 'Error updating record: ' . $conn->error;
        }
     
    //} else {
       // echo 'No booking record found for the specified email';
   // }
    

}

?>





<!--  HTML code -->
    
<?php include("home.php");?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        *{
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}
img#img_path-field{
		max-height: 15vh;
		max-width: 8vw;
	}
  .invalid-feedback{
   
   color: #f00;
   font-size: 18px;
   font-weight: bold;
}


.invalid-feedback{
 
   border-color: #f00;
  

}
/*form{
    box-shadow: 2px 6px 100px #ffffff;
}*/
    </style>
<link rel="stylesheet" href="use2.css">
<link rel="stylesheet" href="css/all.css">
<div class="bd">

<section>

    <div class="container2 bg-dark">
        <div class="heading">Renting Details</div>
        <form method="POST" class="needs-validation" id="myForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="off" novalidate>
            <div class="card-details p-3">
           
                <!--checking default date-->
                <div class="card-box">
                <span class="details">
                   Type of place
                    </span>
                          <select name="type_of_place" id="type_of_place" style="border: 1px solid #ccc; padding: 7px; border-radius: 5px; height: 45px;
width: 100%;
outline: none;
padding-left: 15px;
font-size: 15px;
color:gray;
border-bottom-width: 2px;
transition: all 0.3s ease;" required>
                            <option disabled selected>Choose Here....</option>
                            <option value='HillStation'>HillStation</option>
                            <option value='RoadWay'>RoadWay</option>
                           
                        </select>
                       
                    </div>
                    
    

                 
           
                 
                
                <div class="card-box">
                    <span class="details">
                    From Location Place
                    </span>
                    <input type="text" name="from_location" placeholder="Enter Your from location Place" required>
                    <div class="invalid-feedback">
      Please provide From Location Place.
    </div>
                </div>
                
                <div class="card-box">
                    <span class="details">
                      From Location Address
                    </span>
                    <input type="text" name="to_location" placeholder="Enter Your From Location Address" required>
                    <div class="invalid-feedback">
      Please provide From Location Address.
    </div>
                </div>
                    
    
<!--checking default date-->


                
</div>        
              
<div class="text-center">
                <input type="submit" class="btn btn-primary" name="submit" value="Book now">
           
</div>

               </form>
        
   </div>
   <script>
function validateDropdown() {
    // Get the dropdown/select element by its ID
    var dropdown = document.getElementById('type_of_place');

    // Get the selected value of the dropdown
    var selectedValue = dropdown.value;

    // Check if a valid option is selected
    if (selectedValue === "") {
        alert('Please choose an option from the dropdown.');
        return false; // Prevent form submission
    }

    // Allow form submission if a valid option is selected
    return true;
}


(() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
    
</script>
</body>
</html>

   