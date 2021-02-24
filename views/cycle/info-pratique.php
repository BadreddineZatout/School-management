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
    <title>Informations pratiques</title>
</head>
<body>
    <?php 
        require_once 'includes/header.php';
        require_once 'includes/menu.php';
    ?>
    <div class="row mx-auto">
        <?php

            foreach ($infos as $info) {
                ?>
        <div class="col-sm-10 card mx-auto mb-5">
            <div style="background-color: inherit;" class='card-header'>
                <h1><?= $info['titre'] ?></h1>
            </div>
            <div style="background-color: inherit;" class="card-body row mx-1 my-1">
                <p><?= $info['paragraphe'] ?></p>
            </div>
        </div>
        <?php
            } 
        ?>
    </div>
    <?php
        require_once 'includes/footer.php'
    ?>
</body>
</html>