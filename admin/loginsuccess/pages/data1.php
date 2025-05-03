<?php
require('conn.php');
//if(isset($_POST['type'])){
    $query='UPDATE messagetab SET seen=1';
    $stm-$pdo->prepare($query);
    if($stm->execute()){
        $query2='select message as msg from messagetab where seen=1';
        $stm2=$pdo->prepare($query2);
        $stm2->execute();
        $result=$stm2->fetchAll();
            echo json_encode($result);
    
    }
//}
?>