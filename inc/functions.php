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

function get_genre($id){
    $connection = connect();
    $query = $connection->prepare("SELECT genrenimi FROM genre where genre_ID = $id");
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result['genrenimi'];
}

function edit_book(){
    $connection = connect();
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    
    $query = $connection->prepare("SELECT kirjanimi, kuvaus, hinta, kirja_ID FROM kirja WHERE kirja_ID = $id");
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_reviews($id){
    $connection = connect();
    $query = $connection->prepare("SELECT * FROM arvostelu where kirja_ID = $id");
    $query->execute();
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $result = $query->fetchAll();
    return $result;
}


function edit_review(){
    $connection = connect();
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    
    $query = $connection->prepare("SELECT arvostelu_ID, arvostelu, kirja_ID FROM arvostelu WHERE arvostelu_ID = $id");
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result;
}