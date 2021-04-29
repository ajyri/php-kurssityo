<?php
    function getComments($postId){
        $servername ="localhost";
        $username ="root";
        $password ="";
        $dbname = "blog";
        try{
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $conn->prepare("SELECT * FROM comments WHERE entry_id = :id");
            $stmt->bindValue(":id",$postId, PDO::PARAM_INT);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $result = $stmt->fetchAll();
            
            print("<ol>");

            foreach($result as $row){
                print("<li>");
                print($row['text']." "."<br>".$row['added']);
                print("</li>");
            }
            print("</ol>");
        }catch(PDOException $e){
            echo 'Connection failed.'.$e->getMessage();
        }   
    }