<?php 
include('../dbcon.php');
if(isset($_POST['click_delete_btn']))
{
    $id=$_POST['user_id'];
    //echo $id;
    $sql1="SELECT isActive from vehicle WHERE num_plate_id='$id'";
    $result1=$conn->query($sql1);
    if($conn->connect_error)
	{
		die("connection failed".$conn->connect_error);
	}
    
    $row1=$result1->fetch_assoc();
    $isActive=$row['isActive'];
    if($isActive=='Active')
    {
  $sql="UPDATE vehicle SET isActive='Suspend' WHERE num_plate_id='$id'";
  $conn->query($sql);
    if($sql)
    {
        $res=1;
        echo $res;
    }
}
else
{
    $sql="UPDATE vehicle SET isActive='Active' WHERE num_plate_id='$id'";
    $conn->query($sql);
      if($sql)
      {
          $res=1;
          echo $res;
      }   
}
}

?>