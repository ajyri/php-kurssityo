<?php
$servername ="localhost";
$username ="root";
$password ="";
$dbname = "blog";
try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);// set the PDO error mode to exception
    $id = $_GET['id'];
    
    $query = $conn->prepare("SELECT title, text FROM entry WHERE id = $id");
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

}
    catch(PDOException $e)
    {echo"Connection failed: ". $e->getMessage();}
    ?> 
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <form method="post">
     <div>
        <label>Title</label>
        <input name="title" type="text" value=<?php print $result['title']?>>
        <div>
        <label>Text</label>
        <textarea name="text"><?php print $result['text'] ?></textarea>
        </div>
   </div>
    <?php print '<button formaction="update.php?id='.$id.'">Save</button>'?>
    </form>
</body>
</html>