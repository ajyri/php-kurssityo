<?php
header("Location: http://localhost/database/index.php");
$servername ="localhost";
$username ="root";
$password ="";
$dbname = "blog";
try{
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);// set the PDO error mode to exception
$id = $_GET['id']; 
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$text =  filter_input(INPUT_POST, 'text', FILTER_SANITIZE_STRING);
$query = $conn->prepare("UPDATE entry SET title = :title, text = :text WHERE id = :id");
$query->bindValue(':title', $title, PDO::PARAM_STR);
$query->bindValue(':text', $text, PDO::PARAM_STR);
$query->bindValue(':id', $id, PDO::PARAM_INT);
$query->execute();

}catch(e $e){
    echo"Connection failed: ". $e->getMessage();
}