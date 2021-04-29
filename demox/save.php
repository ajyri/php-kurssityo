<?php
$servername = "localhost";
$username = "demoxUser";
$password = "fHmJm@VY_dGWbG0/";
$dbname = "demox2";

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);// set the PDO error mode to exception
    
    $conn->beginTransaction();
    
    $astunnus = filter_input(INPUT_POST, 'astunnus', FILTER_SANITIZE_STRING);
    $asnimi =  filter_input(INPUT_POST, 'asnimi', FILTER_SANITIZE_STRING);
    $yhteyshlo = filter_input(INPUT_POST, 'yhteyshlo', FILTER_SANITIZE_STRING);
    $postitmp =  filter_input(INPUT_POST, 'postitmp', FILTER_SANITIZE_STRING);
    $postinro =  filter_input(INPUT_POST, 'postinro', FILTER_SANITIZE_NUMBER_INT);

    $query = $conn->prepare("INSERT INTO asiakas VALUES(:astunnus, :asnimi, :yhteyshlo, :postitmp, :postinro, YEAR(CURDATE()) )");
    $query->bindValue(':astunnus', $astunnus, PDO::PARAM_STR);
    $query->bindValue(':asnimi', $asnimi, PDO::PARAM_STR);
    $query->bindValue(':yhteyshlo', $yhteyshlo, PDO::PARAM_STR);
    $query->bindValue(':postitmp', $postitmp, PDO::PARAM_STR);
    $query->bindValue(':postinro', $postinro, PDO::PARAM_STR);
    $query->execute();
    $conn->commit();


    $id = $conn->lastInsertId();

    print "<p>Tiedot tallennettu</p>";
   
}
    catch(PDOException $e)
    {
        $conn->rollback();
        echo"Connection failed: ". $e->getMessage();
    }
    ?> 
 