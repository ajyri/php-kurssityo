<?php
$servername = "localhost";
$username = "demoxUser";
$password = "fHmJm@VY_dGWbG0/";
$dbname = "demox2";

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);// set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->beginTransaction();
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

    $stmt = $conn->prepare("DELETE FROM asiakas WHERE astunnus = :id");
    $stmt->bindValue(':id',$id,PDO::PARAM_STR);
    $stmt->execute();
    $conn->commit();
    header("Location: http://localhost/demox/index.php");
}   catch(PDOException $e){
        $conn->rollback();
        echo"Delete failed.";
    }
?>