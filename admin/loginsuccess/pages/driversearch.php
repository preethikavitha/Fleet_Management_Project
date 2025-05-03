<?php
include('../dbcon.php');
if(isset($_POST['input']))
{

    $input=$_POST['input'];
    if(isset($_POST['click_search_driver']))
    {
    $sql="SELECT empid,empname,status,mobileno,category,emptype FROM driver WHERE status!='Dismiss' AND (empid LIKE '%{$input}%' || empname LIKE '%{$input}%' || status LIKE '{$input}%' ||category LIKE '{$input}%' ||emptype LIKE '%{$input}%')";
    $result=$conn->query($sql);
}
if(isset($_POST['click_search_driver_del']))
    {
    $sql="SELECT empid,empname,status,mobileno,category,emptype FROM driver WHERE status='Dismiss' AND (empid LIKE '%{$input}%' || empname LIKE '%{$input}%' || status LIKE '{$input}%' ||category LIKE '{$input}%' ||emptype LIKE '%{$input}%')";
    $result=$conn->query($sql);
}
     if($result->num_rows>0)
     {
    while($row=$result->fetch_assoc())
    {
       
        echo '<tr>
        <td>'.$row["empid"].'</td>
        <td>'.$row["empname"].'</td>
        <td>'.$row["status"].'</td>
        <td>'.$row["mobileno"].'></td>
        <td>Drive Vehicles:<b>'.$row["category"].'</b><br>Employee Type:<b>'.$row["emptype"].'</b></td>
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