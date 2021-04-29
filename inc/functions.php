<?php

function connect(){
    $servername = "localhost";
    $username = "harjoitustyoUser";
    $password = "tIPOgJc85ThmqgJb";
    $dbname = "kirjakauppa";

    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e){
        echo $e->getMessage();
    }
}

function get_books(){
   $connection = connect(); 
   $query = $connection->prepare("SELECT * FROM kirja");
   $query->execute();

   $query->setFetchMode(PDO::FETCH_ASSOC);
   $result = $query->fetchAll();
   return $result;
}

function get_genres(){
    $connection = connect();
    $query = $connection->prepare("SELECT * FROM genre");
    $query->execute();

    $query->setFetchMode(PDO::FETCH_ASSOC);
    $result = $query->fetchAll();
    return $result;
    }
