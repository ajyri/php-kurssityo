<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h1>Uusi Asiakas</h1>
   <form action="save.php" method="post">
   <div>
        <label for="">Astunnus</label>
        <div>
        <input name="astunnus" type="text">
        </div>
        <label for="">Asnimi</label>
        <div>
        <input name="asnimi" type="text">
        </div>
        <label for="">Yhteyshlo</label>
        <div>
        <input name="yhteyshlo" type="text">
        </div>
        <label for="">Postinro</label>
        <div>
        <input name="postinro" type="text">
        </div>
        <label for="">Postitmp</label>
        <div>
        <input name="postitmp" type="text">
        </div>
   </div>
   <input type="submit" value="Lisää uusi">
   <div id="entries">