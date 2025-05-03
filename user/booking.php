<?php
  
include('dbcon.php'); 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_COOKIE['email'])){
    $_SESSION['email']=$_COOKIE['email'];   
}
$em=$_SESSION['email'];
$sqlp="select *from usersignup where Email='$em'";
$resultp=$conn->query($sqlp);
$rowp=$resultp->fetch_assoc();
$name=$rowp['Name'];
if (isset($_POST['num_plate_id'])) {
    $selected_num_plate_id = $_POST['num_plate_id'];
    setcookie('num_plate',$selected_num_plate_id,time()+60*60);
     $stmt = $conn->prepare("SELECT * FROM vehicle WHERE num_plate_id = ?");
     $stmt->bind_param("s", $selected_num_plate_id);
     $stmt->execute();
     $result = $stmt->get_result();
     if($result->num_rows>0)
     {
        while($row=$result->fetch_assoc())
        {
            $brand=$row["brand"]; 
            $category=$row["category"];
            $model=$row["model"];
            setcookie("category",$category,time()+60*60);
            $num_plate=$row['num_plate_id'];
            setcookie("num_plate",$num_plate,time()+60*60);
        }
     }
 }
 else {
    if($_COOKIE['num_plate'])
    {
        $selected_num_plate_id = $_COOKIE['num_plate'];
    
        $stmt = $conn->prepare("SELECT * FROM vehicle WHERE num_plate_id = ?");
     $stmt->bind_param("s", $selected_num_plate_id);
     $stmt->execute();
     $result = $stmt->get_result();
     if($result->num_rows>0)
     {
        while($row=$result->fetch_assoc())
        {
            $brand=$row["brand"]; 
            $category=$row["category"];
            $model=$row["model"];
          
            setcookie("category",$category,time()+60*60);
            $num_plate=$row['num_plate_id'];
        }
     } 
    }
    else
    {
        echo "Invalid Request";
    }
 }
if(isset($_POST['typ']))
{
    $type=$_POST['typ'];
    $_SESSION['typ']=$type;
    setcookie("typ",$type,time()+60*60);


}
if(isset($_COOKIE['typ']))
{
    $type=$_COOKIE['typ'];
  
    
}
         
if(isset($_POST['driv']))
{
    $drive=$_POST['driv'];
    $_SESSION['driv']=$drive;
    setcookie("driv",$drive,time()+60*60);


}
if(isset($_COOKIE['driv']))
{
    $drive=$_COOKIE['driv'];
   
}
if(isset($_SESSION['typ']))
{
    $type=$_SESSION['typ'];

    
  
    
}

if(isset($_SESSION['driv']))
{
    $drive=$_SESSION['driv'];
   
}



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
if($conn->query($sql)) {
    $count=1;
    

} else {
  die(mysqli_error($conn));
}

function calculateday1($date1,$date2)
{
    $dat1=strtotime($date1);
    $dat2=strtotime($date2);
   
    $diff=($dat2-$dat1)/(3600*24);
 
    return $diff;
}
$dif=calculateday1($pickdate,$dropdate);

if(isset($_POST['submit'])){
    if(isset($_COOKIE['email'])){
        $_SESSION['email']=$_COOKIE['email'];
         
      
         
          
      }
      var_dump($_POST);
      function calculateday($date1,$date2)
{
    $dat1=strtotime($date1);
    $dat2=strtotime($date2);
   
    $diff=($dat2-$dat1)/(3600);
 
    return $diff;
}
    //$num_plate=$_SESSION['num_plate'];
   
   // $num_plate=$row['num_plate_id'];
   $type=$_SESSION['typ'];
  
   $num_plate=$_POST['num_plate'];
 
   
    $name=$_POST['name'];
    $date1=$pickdate;
    $date2=$dropdate;
    //No of hours

    $dtime=$_POST['dtime'];
    $ptime=$_POST['ptime'];
    $diff=calculateday($ptime,$dtime);
    $diff1=calculateday($date1,$date2);
    $noday=($diff1/24)+1;
    $b_name=$_POST['b_name'];
    $category=$_POST['category'];
    $package=$_POST['drive'];
     // Corrected the variable name
  
   
   
  
    $email=$_COOKIE['email'];
    $sql1= "insert into booking(emailid,num_plate_id,borrower_name,pick_date,drop_date,Brand,category,aboutpackage,type_of_rent) values('$email','$num_plate','$name','$date1','$date2','$b_name','$category','$package','$type')";
 $result1=$conn->query($sql1);
   // $result1=mysqli_query($conn,$sql1);

    
    if($result1) {
        $last_id=$conn->insert_id;
        setcookie('last',$last_id,time()+60*60);
        $sql5="SELECT * FROM rent_price WHERE num_plate_id='$num_plate'";
       $result5=$conn->query($sql5);
      if($result5->num_rows>0)
        {
         $row5=$result5->fetch_assoc();
         $km=$row5['rent_price_per_km'];
         $day=$row5['rent_price_per_day'];
         $hr=$row5['rent_price_per_hour'];
         $adv_amt=$row5['adv_amt'];
         if($type=='perkm')
         {
            if($dif==0)
            {
                $sql6="INSERT INTO km (bookid,advamt,ptime,dtime) VALUES ($last_id,$adv_amt,'$dtime','$ptime')";
                $conn->query($sql6);
            }
            else{
                $sql6="INSERT INTO km (bookid,advamt) VALUES ($last_id,$adv_amt)";
                $conn->query($sql6);
            }
            if($package=='without Driver')
            {
            $num_plate=$_COOKIE['num_plate'];
            $sql3="SELECT charges FROM rent_price WHERE num_plate_id='$num_plate'";
            $result3=$conn->query($sql3);
            $row3=$result3->fetch_assoc();
            if($result3->num_rows>0)
            {
                $charges=$row3['charges'];
                $tot_amt=$adv_amt+$charges;
                $sql8="UPDATE booking SET tot_amt=$tot_amt WHERE book_id=$last_id";

                $conn->query($sql8);
            }
        }
            
         }
         else if($type=='perhour')
         {
            $hramt=$hr*$diff;
            $dtime=$_POST['dtime'];
            $ptime=$_POST['ptime'];
           $sql6="INSERT INTO hr(bookid,hramt,no_of_hr,dtime,ptime)VALUES($last_id,$hramt,$diff,'$dtime','$ptime')";
           $conn->query($sql6); 
           
           $dif1=$diff.' hour';
           $sql7="UPDATE booking SET duration='$dif1' WHERE book_id=$last_id";
           $conn->query($sql7);
           if($package=='without Driver')
           {
           $num_plate=$_COOKIE['num_plate'];
           $sql3="SELECT charges FROM rent_price WHERE num_plate_id='$num_plate'";
           $result3=$conn->query($sql3);
           $row3=$result3->fetch_assoc();
           if($result3->num_rows>0)
           {
               $charges=$row3['charges'];
               $tot_amt=$hramt+$charges;
               $sql8="UPDATE booking SET tot_amt=$tot_amt WHERE book_id=$last_id";
               $conn->query($sql8);
           }
       }
         }
         else if($type=='perday')
         {
            $dayamt=$noday*$day;
            $sql6="INSERT INTO day(bookid,dayamt,no_of_day)VALUES($last_id,$dayamt,$noday)";
            $conn->query($sql6);
            $dif1=$noday.' day';
            $sql7="UPDATE booking SET duration='$dif1' WHERE book_id=$last_id";
            $conn->query($sql7);
            if($package=='without Driver')
            {
            $num_plate=$_COOKIE['num_plate'];
            $sql3="SELECT charges FROM rent_price WHERE num_plate_id='$num_plate'";
            $result3=$conn->query($sql3);
            $row3=$result3->fetch_assoc();
            if($result3->num_rows>0)
            {
                $charges=$row3['charges'];
                $tot_amt=$dayamt+$charges;
                echo $tot_amt;
                $sql8="UPDATE booking SET tot_amt=$tot_amt WHERE book_id=$last_id";
                $conn->query($sql8);
            }
        }
         }
        }
        if($sql6)
        {
            //preethi
   // echo '<script>alert("Insert successfully!!");
   // window.location.href="homepage.php" </script>';
    }
     
      
    } else {
        die(mysqli_error($conn));
    }

    
}
if (isset($_POST['drive'])) {
    $selectedOption = $_POST['drive'];

    switch ($selectedOption) {
        case 'with Driver':
            header('Location: book.php');
            exit();
        case 'without Driver':
            if($category!='Gear Bicycles' && $category!='Gear Cycles' && $category!='Folding Bicycle')
            {
                header('Location: userlicense.php');
            }
            else{
                header('Location: userdetailsform.php'); 
            }
            exit();
        // Add more cases as needed
    }
}



// ...



   
// ...
?>

<!--  HTML code -->

<!DOCTYPE html>
<html lang="en">
<?php

if(isset($_COOKIE['email'])){
  $_SESSION['email']=$_COOKIE['email'];
  
   

   
    
}
else{
    setcookie('book','is',time()+60*60);
    header("location:login.php");
}
    
    
    ?>

    
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
  

}</style>
<link rel="stylesheet" href="use.css">

<link rel="stylesheet" href="css/all.css">

<div class="bd">

<section>

    <div class="container1 bg-dark">


    <?php

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <div class="heading">Renting Details</div>
        
       
     
        <form method="POST" class="needs-validation" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  autocomplete="off" novalidate>
        <input type='hidden' name='num_plate' value="<?php echo $num_plate; ?>">
         
        <div class="card-details">
            <div class="card-box">
                                
                    <span class="details">
                      Borrower Name
                    </span>
                    <input type="text" name="name" placeholder="Enter Borrower Name" value="<?php echo $name;?>">
                </div>
                <div class="card-box">
                    <span class="details">
                       Category
                    </span>
                    <input type="text" name="category" placeholder="Enter Vehicle Category"  value="<?php if(isset($category)) echo $category; ?>" readonly>
                </div>
                <div class="card-box">
                    <span class="details">
                      Brand Name
                    </span>
                    <input type="text" name="b_name" placeholder="Enter Brand Name" value="<?php if(isset($brand)) echo $brand;?>" readonly>
                </div>
                <div class="card-box">
                    <span class="details">
                      Model Name
                    </span>
                    <input type="text" name="m_name" placeholder="Enter model Name" value="<?php if(isset($model)) echo $model;?>" readonly>
                </div>
                <!--checking default date-->
                <div class="card-box">
                        <span class="details">
                            Type Of Rent
                        </span>
                        
                        <input type="text" name="typ" value="<?php if(isset($type)) echo $type; ?>" readonly>
             
                    </div>
               
                    <div class="card-box">
                        <span class="details">
                            About Packages
                        </span>
                        
                        <input type="text" name="drive" value="<?php if(isset($drive)) echo $drive; ?> Driver" readonly>
             
                    </div>
                  
                   
                <div class="card-box">
    <span class="details">
        Pickup Date
    </span>
    <input type="datetime" class="form-control" name="date1" id="book_pick" value="<?php echo $pickdate; ?>" placeholder="Pick-up Date" readonly>
</div>
<div class="card-box">
                    <span class="details">
                      Dropoff Date
                    </span>
                    <input type="datetime" class="form-control" name="date2" id="book_drop" value="<?php echo $dropdate; ?>" placeholder="Drop-Off Date" readonly>
 
                </div>
    
<!--checking default date-->
<?php if($dif==0){ 
    ?>
<div class="card-box">
    <span class="details">
        Pickup Time
    </span>
    <input type="time" class="form-control" name="ptime" id="book_pick" placeholder="Pick-up Time" required>
    <div class="invalid-feedback">
      Please Enter pick-up Time.
    </div>
</div>
<div class="card-box">
                    <span class="details">
                      Dropoff Time
                    </span>
                    <input type="time" class="form-control" name="dtime" id="book_drop" placeholder="Drop-Off Time" required>
                    <div class="invalid-feedback">
      Please Enter Drop-off time.
    </div>
                </div>

            <?php } ?>

                
</div>
                    
                <div class="button">
                <input type="submit" name="submit" value="Proceed">
           
</div>
               </form>
          <?php  } else {
                echo "No matching records found.";
            }
        
           
        ?>
   </div>
        </section>
        </div>
   <!-- Original HTML and PHP code -->



   <script>
    //validation script
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


    //validation script
    function toggleDriverForm(selectElement) {
        var form = document.querySelector('form');
       var selectedOptionField = document.getElementById('selected_option');
 
        if (selectElement.value === 'Driver' || selectElement.value === 'Full Package') {
            selectedOptionField.value = 'driver';
        } else if (selectElement.value === 'No Driver') {
            selectedOptionField.value = 'no_driver';
        } else {
            selectedOptionField.value = '';
        }

        form.submit();
    }
</script>


</html>
<?php include("footer.php")?>






