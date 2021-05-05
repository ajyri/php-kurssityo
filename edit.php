<?php
require_once('./inc/functions.php')
?>

<?php $result = edit_book() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1>Muokkaa kirjaa</h1>
    <form action="update.php?id=<?=$result['kirja_ID']?>" method="POST">
        <div>
            <label for="">Nimi</label>
            <input type="text" name="nimi" id="nimi" value='<?= $result['kirjanimi']?>'>
        </div>

        <div>
            <label for="">Kuvaus</label>
            <textarea name="kuvaus" id="kuvaus" cols="30" rows="10"><?= ($result['kuvaus'])?></textarea>
        </div>

        <div>
            <label for="">Hinta</label>
            <input type="decimal" name="hinta" id="hinta" value='<?= $result['hinta']?>'>
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
            <button>Tallenna muokkaus</button>
        </div>
    </form>
</html>