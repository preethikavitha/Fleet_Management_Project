<?php
include('../dbcon.php');
if(isset($_POST['input']))
{
    $input=$_POST['input'];
    $sql="SELECT num_plate_id,model,brand,seat,transmission_type,category FROM vehicle WHERE status='Available' and (num_plate_id LIKE '%{$input}%' || model LIKE '%{$input}%' || brand LIKE '{$input}%' ||category LIKE '{$input}%' ||transmission_type LIKE '%{$input}%')";
    $result=$conn->query($sql);
     if($result->num_rows>0)
     {
    while($row=$result->fetch_assoc())
    {
       
        echo '<tr>
        <td>'.$row["num_plate_id"].'</td>
        <td>'.$row["brand"].'</td>
        <td>'.$row["model"].'</td>
        <td>'.$row["category"].'</td>
        <td>transmission type:'.$row["transmission_type"].'<br>Seats:'.$row["seat"].'</td>
        <td class="text-center">
		<button class="btn btn-sm btn-primary view_car"   type="button" >View</button>
        							  
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