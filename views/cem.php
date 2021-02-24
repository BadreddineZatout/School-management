<?php
    if(!isset($_GET['action'])){
        header('location:/');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'includes/link.php' ?>
    <link rel="stylesheet" href="style/articles.css">
    <title>Moyen</title>
</head>
<body>
    <?php 
        require_once 'includes/header.php';
        require_once 'includes/menu.php';
        $cc->get_cadres(2);
    ?>
    <div class="row mx-auto mb-5">
        <div class="col-12 card-deck">
        <?php 
            foreach($articles[0] as $article)
            {
        ?> 
            <div class="card col-3">
                <img class="card-img-top" src="<?= $article['image'] ?>" alt="card image">
                <div class="card-body">
                    <h4 class="card-title"><?= $article['titre'] ?></h4>
                    <p class="card-text"><?= $article['contenu'] ?></p>
                    <a class="btn" href="/?action=article&article=<?= $article['id'] ?>">Afficher la suite</a>
                </div>
            </div>
        <?php } ?>
        </div>
        <div class="col-12 card-deck">
        <?php 
            foreach($articles[1] as $article)
            {
        ?> 
            <div class="card col-3">
                <img class="card-img-top" src="<?= $article['image'] ?>" alt="card image">
                <div class="card-body">
                    <h4 class="card-title"><?= $article['titre'] ?></h4>
                    <p class="card-text"><?= $article['contenu'] ?></p>
                    <a class="btn" href="/?action=article&article=<?= $article['id'] ?>">Afficher la suite</a>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
    <?php
        require_once 'includes/footer.php'
    ?>
</body>
</html>