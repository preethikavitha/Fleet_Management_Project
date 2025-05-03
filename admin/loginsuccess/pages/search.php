<?php
include('../dbcon.php');
if(isset($_POST['input']))
{

    $input=$_POST['input'];
    if(isset($_POST['click_search']))
    {
        $time = strtotime($input);

$newformat = date('Y-m-d',$time);
        $sql="SELECT * FROM services WHERE Service_date==$newformat ORDER BY Service_date DESC";
    $result=$conn->query($sql);
    }

    if($result->num_rows>0)
    {
   while($row=$result->fetch_assoc())
   {
      
       echo '<tr>
       <td>'.$row["Service_date"].'</td>
       <td>'.$row["Service_cost"].'</td>
       <td>'.$row["ins_claim"].'</td>
       <td>'.$row["rem_cost"].'</td>
       <td>
       <button class="btn btn-sm btn-primary edit_car"   type="button" >Edit</button>							  
       </td>
       </tr>';
   }
}
else
{
   echo "No data found";
}

}
?>