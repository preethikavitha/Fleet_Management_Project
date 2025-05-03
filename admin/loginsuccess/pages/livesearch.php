<?php
include('../dbcon.php');
if(isset($_POST['input']))
{

    $input=$_POST['input'];
    if(isset($_POST['click_search_rent']))
    {
    $sql="SELECT num_plate_id,model,brand,seat,transmission_type,category,status FROM vehicle WHERE status='NotAvailable' and (num_plate_id LIKE '%{$input}%' || model LIKE '%{$input}%' || brand LIKE '{$input}%' ||category LIKE '{$input}%' ||transmission_type LIKE '%{$input}%')";
    $result=$conn->query($sql);
}
if(isset($_POST['click_search_avail']))
{
    $sql="SELECT num_plate_id,model,brand,seat,transmission_type,category,status FROM vehicle WHERE status='Available' and (num_plate_id LIKE '%{$input}%' || model LIKE '%{$input}%' || brand LIKE '{$input}%' ||category LIKE '{$input}%' ||transmission_type LIKE '%{$input}%')";
    $result=$conn->query($sql);  
}
if(isset($_POST['click_search']))
{
    $sql="SELECT num_plate_id,model,brand,seat,transmission_type,category,status FROM vehicle WHERE num_plate_id LIKE '%{$input}%' || model LIKE '%{$input}%' || brand LIKE '{$input}%' ||category LIKE '{$input}%' ||transmission_type LIKE '%{$input}%' || status LIKE '{$input}%'";
    $result=$conn->query($sql);  
}
     if($result->num_rows>0)
     {
    while($row=$result->fetch_assoc())
    {
       
        echo '<tr>
        <td>'.$row["num_plate_id"].'</td>
        <td>'.$row["brand"].'</td>
        <td>'.$row["model"].'</td>
        <td>'.$row["category"].'</td>
        <td>transmission:'.$row["transmission_type"].'<br>Seats:'.$row["seat"].'<br>Status:<b>'.$row['status'].'</b></td>
        <td class="text-center">
		<button class="btn btn-sm btn-secondary view_car"   type="button" >View</button>
        <button class="btn btn-sm btn-primary edit_car"   type="button" >Edit</button>
		<button class="btn btn-sm btn-danger delete_car" type="button" >Delete</button>								  
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