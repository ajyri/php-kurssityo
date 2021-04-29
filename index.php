<?php
require_once('./inc/functions.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1>Lisää kirja</h1>
    <form action="save.php" method="POST">
        <div>
            <label for="">Nimi</label>
            <input type="text" name="nimi" id="nimi">
        </div>

        <div>
            <label for="">Kuvaus</label>
            <textarea name="kuvaus" id="kuvaus" cols="30" rows="10"></textarea>
        </div>

        <div>
            <label for="">Hinta</label>
            <input type="decimal" name="hinta" id="hinta">
        </div>

        <div>
            <label for="">Genre</label>
            <select name="genre" id="genre">

                <?php $genre = get_genres();
                foreach ($genre as $row) : ?>
                    <option value=<?= $row['genre_ID'] ?>><?= $row['genrenimi'] ?></option>
                <?php endforeach ?>

            </select>
        </div>

        <div>
            <button>Lisää</button>
        </div>
    </form>

    <div>
        <ul>
            <?php $book = get_books();
            foreach ($book as $row) : ?>

                <li><?= $row['kirjanimi'] ?></li>
                <a href="edit.php?id=<?=$row['kirja_ID']?>">Muokkaa</a> <a href="delete.php<?=$row['kirja_ID']?>">Poista</a>

            <?php endforeach; ?>
        </ul>
    </div>
</body>

</html>