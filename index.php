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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col-4 text-center">
                <h1>Kirjoja</h1>
            </div>
            <div class="col-4">
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center border-top border-dark">
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
                        <input type="number" name="hinta" id="hinta">
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
                        <button class="btn btn-light border border-dark mt-3 mb-5">Lisää</button>
                    </div>
                </form>
            </div>
        </div>


        <ul>
            <?php $book = get_books();
            foreach ($book as $row) : ?>
                <?php $id = $row['kirja_ID'] ?>
                <div class="row border-top border-dark">

                    <div class="col-4">
                        <li>
                            <h4>Nimi:</h4>
                            <p class="m-0 p-0"><?= $row['kirjanimi'] ?></p>
                            <h4 class="pt-3">Kuvaus:</h4>
                            <p class="text-break"><?= $row['kuvaus'] ?></p>
                            <h4>Hinta:</h4>
                            <p><?= $row['hinta'] ?>€</p>
                            <h4>Genre:</h4>
                            <p><?= get_genre($row['genre']) ?></p>
                        </li>
                        <span><a href="edit.php?id=<?= $row['kirja_ID'] ?>">Muokkaa kirjaa</a> <a href="delete.php?id=<?= $row['kirja_ID'] ?>">Poista</a></span>
                    </div>

                    <div class="col-4">
                        <form action="save_review.php?id=<?= $row['kirja_ID'] ?>" method="POST">
                            <h4>Arvostele kirja</h4>
                            <textarea name="arvostelu" cols="30" rows="5"></textarea>
                            <button class="btn btn-light border border-dark mt-2">Lähetä arvostelu</button>
                        </form>
                    </div>

                    <div class="col-4">
                        <h4>Kirjan <?= $row['kirjanimi'] ?> arvostelut:</h4>
                        <?php $arvostelu = get_reviews($id);
                        foreach ($arvostelu as $row) : ?>
                            <p><?= $row['arvostelu'] ?></p><span><a href="edit_review.php?id=<?= $row['arvostelu_ID'] ?>">Muokkaa arvostelua</a> <a href="delete.php?id=<?= $row['arvostelu_ID'] ?>">Poista</a></span>
                            <hr>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>

        </ul>
    </div>
</body>

</html>