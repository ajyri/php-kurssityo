<?php

$servername = "localhost";
$username = "demoxUser";
$password = "fHmJm@VY_dGWbG0/";
$dbname = "demox2";

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);// set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $astunnus = filter_input(INPUT_GET,'id',FILTER_SANITIZE_STRING);
    $stmt = $conn->prepare("Select asnimi, tilaus.tilausnro, kpl, tuotenimi from tilaus, asiakas, tilausrivi, tuote WHERE tilaus.tilausnro = tilausrivi.tilausnro AND tilaus.astunnus = :astunnus AND tilausrivi.tuotenro = tuote.tuotenro AND tilaus.astunnus = asiakas.astunnus group by tilausnro");
    $stmt->bindValue(':astunnus', $astunnus, PDO::PARAM_STR);
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $result = $stmt->fetchAll();

    foreach($result as $row){
        $asnimi = $row['asnimi'];
    }
    print "<h1>Asiakkaan ".$asnimi." Tilaukset</h1>";
    print "<ul>";
    foreach($result as $row){
        print '<li>'.$row['tuotenimi']." ".$row['kpl']." kpl ".'</li>';
    }
    print "</ul>";
}
    catch(PDOException $e){
        echo"Connection failed: ". $e->getMessage();
    }
?>