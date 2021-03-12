<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php   require_once 'includes/link.php' ?>
    <link rel="stylesheet" href="../style/acceuil.css">
    <link rel="stylesheet" href="style/articles.css">
    <link rel="stylesheet" href="style/pager.css">
    <title>Acceuil</title>
</head>
<body>
    <?php
        require 'includes/header.php';
    ?>
    <div class="slider-frame">
        <div class="slide-images">
            <div class="img-container">
                <img src="data/images/img.jpg" alt="image" width="100%" height="100%">
            </div>
            <div class="img-container">
                <img src="data/images/img2.jpg" alt="image" width="100%" height="100%">
            </div>
            <div class="img-container">
                <img src="data/images/img3.png" alt="image" width="100%" height="100%">
            </div>
            <div class="img-container">
                <img src="data/images/img4.jpg" alt="image" width="100%" height="100%">
            </div>
        </div>
    </div>
    <?php
        require 'includes/menu.php'
    ?>
    <div class="row mx-auto mb-5">
        
        <div class="col-sm-12 card-deck">
        <?php 
            foreach($articles[0] as $article)
            {
        ?> 
            <div class="card col-sm-3">
                <img class="card-img-top" src="<?= $article['image'] ?>" alt="card image">
                <div class="card-body">
                    <h4 class="card-title"><?= $article['titre'] ?></h4>
                    <p class="card-text"><?= $article['contenu'] ?></p>
                    <a class="btn" href='/?action=article&article=<?= $article['id'] ?>'>Afficher la suite</a>
                </div>
            </div>
        <?php } ?>
        </div>
        <div class="col-sm-12 card-deck">
        <?php 
            foreach($articles[1] as $article)
            {
        ?> 
            <div class="card col-sm-3">
                <img class="card-img-top" src="<?= $article['image'] ?>" alt="card image">
                <div class="card-body">
                    <h4 class="card-title"><?= $article['titre'] ?></h4>
                    <p class="card-text"><?= $article['contenu'] ?></p>
                    <a class="btn" href='/?action=article&article=<?= $article['id'] ?>'>Afficher la suite</a>
                </div>
            </div>
        <?php } ?>
        </div>
        <div class="pager d-flex justify-content-end mt-5 pr-5">
                <div>
                    <button id="previous" class="btn">Previous</button>
                </div>
                <div>
                    <button id="next" class="btn">Next</button>
                </div>
        </div>
    <?php
        require 'includes/footer.php'
    ?>
</body>
<?php
require 'includes/responsive.php';
?>
<script src="../js/pager.js"></script>
</html>