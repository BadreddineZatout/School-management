<?php
    // if(!isset($_SESSION['username'])){
    //     header('location:/?action=eleve_login');
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'includes/link.php' ?>
    <link rel="stylesheet" href="style/eleve.css">
    <title>Espace Eleve</title>
</head>
<body>
    <?php 
        require_once 'includes/header.php';
        require_once 'includes/menu.php';
    ?>
    <div class="row mx-auto">
        <div class="col-sm-3 info">
            <ul class="list-group">
                <li class="list-group-item">ID: 17/0083</li>
                <li class="list-group-item">Nom: Zatout</li>
                <li class="list-group-item">Prenom: Badreddine</li>
                <li class="list-group-item">Date de Naissance: 14/05/1999</li>
                <li class="list-group-item">Année Scolaire: 2020/2021</li>
                <li class="list-group-item">Classe: 2CS SIL1</li>
            </ul>
        </div>
        <div class="col-sm-9">

        </div>
    </div>
    <?php
        require_once 'includes/footer.php'
    ?>
</body>
</html>