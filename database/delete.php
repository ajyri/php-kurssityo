<?php
header("Location: http://localhost/database/index.php");
$servername ="localhost";
$username ="root";
$password ="";
$dbname = "blog";
try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);// set the PDO error mode to exception
    $id = $_GET['id'];
    $query = $conn->prepare("DELETE FROM entry where id = $id");
    $query->execute();


    print 'Data removed '.$id;
}catch(PDOException $e){  
    echo"Connection failed: ". $e->getMessage();
}
