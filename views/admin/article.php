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
    <link rel="stylesheet" href="style/admin/article.css">
    <title>Gestion des articles</title>
</head>
<body>
    <?php 
        require_once 'includes/header.php';
        require_once 'includes/menu.php';
    ?>
    <div class="d-flex head p-2 mx-5 mb-3">
        <span class="mr-auto">
            <h1>Les Articles</h1>
        </span>
        <span class="my-auto">
            <button class="btn b">Ajouter un article</button>
        </span>
    </div>
    <div class="mx-5">
        <table class="table table-bordered">
            <thead>
                <th>Titre</th>
                <th>Contenu</th>
                <th>Image</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </thead>
            <tbody id="article-body"></tbody>
        </table>
    </div>
    <?php
        require_once 'includes/footer.php'
    ?>
</body>
<script src="js/jquery-3.5.1.js"></script>
<script src="js/admin/article.js"></script>
</html>