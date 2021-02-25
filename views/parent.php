<?php
    if(!isset($_GET['action'])){
        header('location:/');
    }
    if(!isset($_SESSION['username'])|| $_SESSION['type']<1){
        header('location:/?action=parent_login');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'includes/link.php' ?>
    <link rel="stylesheet" href="style/parent.css">
    <title>Espace Parent</title>
</head>
<body>
    <?php 
        require_once 'includes/header.php';
        require_once 'includes/menu.php';
    ?>
    <div class="row mx-auto">
        <div class="col-sm-3 ml-2 info">
            <ul class="list-group">
            <li class="list-group-item">ID: <?= $parent['id'] ?></li>
                <li class="list-group-item">Nom: <?= $parent['nom'] ?></li>
                <li class="list-group-item">Prenom: <?= $parent['prenom'] ?></li>
            </ul>
        </div>
        <div class="col-sm-8 ml-5 row">
            <div class="col-sm-12 align-self-start">
                <h1>Liste des enfants:</h1>
            </div>
            <div class="col-sm-12">
                <ul id="enfants" class="list-group">
                <?php
                    foreach ($enfants as $enfant) {
                        ?>
                    <li class="list-group-item"><a href="/?action=eleve"><?= $enfant['nom'] .' '. $enfant['prenom'] ?></a></li>
                <?php
                    } ?>
                </ul>
            </div>
        </div>
    </div>
    <?php
        require_once 'includes/footer.php'
    ?>
</body>
</html>