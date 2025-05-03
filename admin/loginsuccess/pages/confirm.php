<?php 
include('../dbcon.php');
if(isset($_POST['click_reject_btn']))
{
    $id=$_POST['user_id'];
    //echo $id;

    $sql3="UPDATE booking SET status='reject' WHERE book_id=$id";
    $conn->query($sql3);
}
if(isset($_POST['click_confirm_btn']))
{
    $id=$_POST['user_id'];
    //echo $id;

    $sql3="UPDATE booking SET status='confirm' WHERE book_id=$id";
    $conn->query($sql3);
  

 $sql1="SELECT * FROM booking WHERE book_id=$id";
    $result1=$conn->query($sql1);
    if($result1->num_rows>0)
    {
        $row1=$result1->fetch_assoc();
        $num_plate=$row1['num_plate_id'];
        $empid=$row1['empid'];
    }
    
    $sql="UPDATE vehicle SET status='Booked' WHERE num_plate_id='$num_plate'";
    $conn->query($sql);

    $sql2="UPDATE driver SET status='Booked' WHERE empid='$empid'";
    $conn->query($sql2);
   
}

?>