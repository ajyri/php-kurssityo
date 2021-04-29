<?php
require_once ('./inc/functions.php');
header("Location: http://localhost/kurssityo/index.php");

try{
$connection = connect();

$connection->beginTransaction();

$nimi = filter_input(INPUT_POST, 'nimi', FILTER_SANITIZE_STRING);
$kuvaus =  filter_input(INPUT_POST, 'kuvaus', FILTER_SANITIZE_STRING);
$hinta = filter_input(INPUT_POST, 'hinta', FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_POST, 'genre',FILTER_SANITIZE_NUMBER_INT);

$query = $connection->prepare("INSERT INTO kirja(kirjanimi, kuvaus, hinta, genre) VALUES (:nimi, :kuvaus, :hinta, :id)");
$query->bindValue(':nimi', $nimi, PDO::PARAM_STR);
$query->bindValue(':kuvaus', $kuvaus, PDO::PARAM_STR);
$query->bindValue(':hinta', $hinta, PDO::PARAM_STR);
$query->bindValue(':id',$id,PDO::PARAM_INT);
$query->execute();
$connection->commit();

}catch(PDOException $e){
    $connection->rollback();
    echo $e->getMessage();
}

