<?php 
include('../dbcon.php');
if($conn->connect_error)
	{
		die("connection failed".$conn->connect_error);
	}
    if(isset($_POST['click_del']))
    {
        $id=$_POST['user_id'];
       
      
        
        $sql="UPDATE driver SET status='Available' WHERE empid='$id'";
        $conn->query($sql);
        if($sql)
        {
            echo "deleted successfully ";
        }
       
    
    }

if(isset($_POST['click_del_btn']))
{
    $id=$_POST['user_id'];
   
  
    
    $sql="UPDATE driver SET status='Dismiss' WHERE empid='$id'";
    $conn->query($sql);
    if($sql)
    {
        echo "deleted successfully ";
    }
   

}
?>