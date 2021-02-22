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
        $cc->get_cadres();
    ?>
        <div class="row mx-auto mb-5">
        <?php 
            for ($i=0; $i<2; $i++) {
                ?>
        <div class="col-12 card-deck">
            <div class="card">
                <img class="card-img-top" src="" alt="card image">
                <div class="card-body">
                    <h4 class="card-title">card1</h4>
                    <p class="card-text">card</p>
                    <a class="btn" href="#">Afficher la suite</a>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="" alt="card image">
                <div class="card-body">
                    <h4 class="card-title">card1</h4>
                    <p class="card-text">card</p>
                    <a class="btn" href="#">Afficher la suite</a>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="" alt="card image">
                <div class="card-body">
                    <h4 class="card-title">card1</h4>
                    <p class="card-text">card</p>
                    <a class="btn" href="#">Afficher la suite</a>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="" alt="card image">
                <div class="card-body">
                    <h4 class="card-title">card1</h4>
                    <p class="card-text">card</p>
                    <a class="btn" href="#">Afficher la suite</a>
                </div>
            </div>
        </div>
    <?php
        }
        require_once 'includes/footer.php'
    ?>
</body>
</html>