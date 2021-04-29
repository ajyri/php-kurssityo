<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Asiakkaat</h1>
    <?php 
    print '<a href=add.php'.'>Add a new customer</a>'
    ?>
</body>
</html>
<?php

$servername = "localhost";
$username = "demoxUser";
$password = "fHmJm@VY_dGWbG0/";
$dbname = "demox2";

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);// set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conn->prepare("SELECT asnimi, astunnus FROM asiakas");
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $result = $stmt->fetchAll();
    
    print "<ul>";
    foreach($result as $row){
        $id = $row['astunnus'];
        print "<li>".$row['asnimi']."</li>";
        print '<a href=delete.php?id='.$id.'>Delete</a>'.' <a href=edit.php?id='.$id.'>Edit</a>'.' <a href=orders.php?id='.$id.'>Orders</a>';
    }
    print "</ul>";
}
    catch(PDOException $e){
        echo"Connection failed: ". $e->getMessage();
    }
?>