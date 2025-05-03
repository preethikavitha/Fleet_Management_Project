<?php
include("dbcon.php");
$sql="select *from booking";
$result=$conn->query($sql);
while ($row = $result->fetch_assoc()) {
    
    $book_id = $row['book_id'];
 
}
$sql1="select type_of_rent from booking where book_id=$book_id";
$result1=$conn->query($sql1);
$row1 = $result1->fetch_assoc();
$typeofrent=$row1['type_of_rent'];
if($typeofrent=='perhour'){
    header("location:bookpdf1.php");
}
else if($typeofrent=='perday'){
    header("location:bookpdf3.php");
}
else if($typeofrent=='perkm'){
    header("location:bookpdf2.php");
}





?>