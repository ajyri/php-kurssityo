<?php
require_once ('./inc/functions.php');
header("Location: http://localhost/kurssityo/index.php");

try{
$connection = connect();

$connection->beginTransaction();

$arvostelu = filter_input(INPUT_POST, 'arvostelu', FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);

$query = $connection->prepare("INSERT INTO arvostelu (arvostelu, kirja_ID) values (:arvostelu, :id)");
$query->bindValue(':arvostelu', $arvostelu, PDO::PARAM_STR);
$query->bindValue(':id',$id,PDO::PARAM_INT);
$query->execute();
$connection->commit();

}catch(PDOException $e){
    $connection->rollback();
    echo $e->getMessage();
}

