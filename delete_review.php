<?php
require_once ('./inc/functions.php');
header("Location: http://localhost/kurssityo/index.php");

try{
    $connection = connect();
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $connection->beginTransaction();
    $query = $connection->prepare("DELETE FROM kirja where kirja_ID = :id");
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    $query->execute();
    $connection->commit();

}catch(PDOException $e){ 
    $connection->rollBack(); 
    echo $e->getMessage();
}
