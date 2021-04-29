<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h1>My blog</h1>
   <form action="save.php" method="post">
   <div>
        <label>Title</label>
        <input name="title" type="text">
        <div>
        <label>Text</label>
        <textarea name="text"></textarea>
        </div>
        <div>
        <label>Name</label>
        <span><input name="name" type="text">
        <label>Email</label>
        <input name="email" type="email"></span>
        </div>
   </div>
   <input type="submit" value="add new">
   <div id="entries">
   <hr>
<?php
require_once "getComments.php";

$servername ="localhost";
$username ="root";
$password ="";
$dbname = "blog";

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);// set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conn->prepare("SELECT id, title, text, added FROM entry");
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $result = $stmt->fetchAll();

    foreach($result as $row){
        $id = $row['id'];
        print "<i>".$row['added']."</i>";
        print "<h3>".$row['title']."</h3>";
        print "<p><i>".$row['text']."</p></i>";
        print '<a href=delete.php?id='.$id.'>Delete</a>'.' <a href=edit.php?id='.$id.'>Edit</a>';
        print "<h3>Comments:</h3>";
        getComments($id);
        print "<a href=comment.php>Leave a comment!</a>";
        print "<hr>";
    }

}
    catch(PDOException $e)
    {echo"Connection failed: ". $e->getMessage();}
    ?> 
   </div>
   
   
   </form> 
</body>
</html>