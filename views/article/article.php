<?php
    if(!isset($_GET['action'])){
        header('location:/');
    }
    $article = $ac->getArticle($_GET['article']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php   require_once 'includes/link.php' ?>
    <link rel="stylesheet" href="style/article.css">
    <title><?= $article['titre'] ?></title>
</head>
<body>
    <?php
        require 'includes/header.php';
        require 'includes/menu.php';
    ?>
    <div class="card col-10 mx-auto pt-3">
        <img class="card-img-top" src="<?= $article['image'] ?>" alt="card image">
        <div class="card-body">
            <h1 class="titre card-title"><?= $article['titre'] ?></h1>
            <p class="card-text"><?= $article['contenu'] ?></p>
        </div>
    </div>
    <?php
        require 'includes/footer.php';
    ?>
</body>
</html>