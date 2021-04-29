<?php
header("Location: http://localhost/database/index.php");
$servername ="localhost";
$username ="root";
$password ="";
$dbname = "blog";
try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);// set the PDO error mode to exception
    
    $conn->beginTransaction();
    
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $text =  filter_input(INPUT_POST, 'text', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $name =  filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    

    $query = $conn->prepare("INSERT INTO user(email, name)"."VALUES(:email, :name)");
    $query->bindValue(':email', $email, PDO::PARAM_STR);
    $query->bindValue(':name', $name, PDO::PARAM_STR);
    $query->execute();


    $id = $conn->lastInsertId();


    $query = $conn->prepare("INSERT INTO entry(title, text, user_id)"."VALUES(:title, :text, :id)");
    $query->bindValue(':title', $title, PDO::PARAM_STR);
    $query->bindValue(':text', $text, PDO::PARAM_STR);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $conn->commit();


    print "<p>Tiedot tallennettu</p>";
   
}
    catch(PDOException $e)
    {
        $conn->rollback();
        echo"Connection failed: ". $e->getMessage();
    }
    ?> 
 