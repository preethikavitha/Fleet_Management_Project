
<?php
require('conn.php');
if(isset($_POST['msg'])){
    $sql="INSERT into messagetab(message) values (:msg) ";
  $stm=$pdo->prepare($sql);
    $stm->bindValue(':msg',$_POST['msg']);
    if($stm->execute()){
        echo json_encode('added');
    }
  /* conn->query($sql);
 if(conn->query($sql))
    {
       echo json_encode('added');
    }*/
}
?>