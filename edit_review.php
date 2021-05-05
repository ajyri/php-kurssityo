<?php
require_once('./inc/functions.php')
?>

<?php $result = edit_review() ?>

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
<div class="container p-1 mx-1">
    <h1>Muokkaa arvostelua</h1>
    <form action="update_review.php?id=<?=$result['arvostelu_ID']?>" method="POST">

        <div>
            <label for="">Arvostelu</label>
            <textarea name="arvostelu" id="arvostelu" cols="30" rows="10"><?= $result['arvostelu']?></textarea>
        </div>

        <div>
            <button>Tallenna muokkaus</button>
        </div>
    </form>
    </div>
</body>
</html>