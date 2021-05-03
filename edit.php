<?php
require_once('./inc/functions.php')
?>

<<<<<<< HEAD
=======
<?php $result = edit_book() ?>

>>>>>>> be703d6135e796c073b0788ab1ea56c3befbd6d1
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
<<<<<<< HEAD
            <input type="text" name="nimi" id="nimi">
=======
            <input type="text" name="nimi" id="nimi" value=<?php print $result['kirjanimi']?>>
>>>>>>> be703d6135e796c073b0788ab1ea56c3befbd6d1
        </div>

        <div>
            <label for="">Kuvaus</label>
<<<<<<< HEAD
            <textarea name="kuvaus" id="kuvaus" cols="30" rows="10"></textarea>
=======
            <textarea name="kuvaus" id="kuvaus" cols="30" rows="10"><?php print_r($result)?></textarea>
>>>>>>> be703d6135e796c073b0788ab1ea56c3befbd6d1
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
</html>