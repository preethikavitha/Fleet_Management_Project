
<?php
require('conn.php');

$query = 'UPDATE messagetab SET seen=1';
$stm = $pdo->prepare($query);

if ($stm->execute()) {
    $query2 = 'SELECT message as msg FROM messagetab WHERE seen=1';
    $stm2 = $pdo->prepare($query2);
    $stm2->execute();
    $result = $stm2->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}
?>