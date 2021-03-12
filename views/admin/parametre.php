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
    <link rel="stylesheet" href="style/admin.css">
    <link rel="stylesheet" href="style/articles.css">
    <title>Parametres</title>
</head>
<body>
    <?php 
        require_once 'includes/header.php';
        require_once 'includes/menu.php';
    ?>
    <div class="d-flex head p-2 mx-5 mb-3">
        <span class="mr-auto">
            <h1>Parameteres</h1>
        </span>
        <span class="my-auto">
            <button class="btn b" data-toggle="modal" data-target="#AddModal">Ajouter image</button>
            <button class="btn b"><a class="retour" href="/?action=admin">Retour</a></button>
        </span>
    </div>
    <div id="a2" class="row mx-5">
        <?php 
            foreach($images as $image)
            {
        ?> 
            <div class="card col-sm-3">
                <img class="card-img-top" src="<?= $image['image'] ?>" alt="card image">
                <div class="card-body">
                    <a class="btn" href='/?action=deleteimage&image=<?= $image['id'] ?>'>Supprimer</a>
                </div>
            </div>
        <?php } ?>
        </div>
    <?php
        require_once 'includes/footer.php'
    ?>
</body>
</html>