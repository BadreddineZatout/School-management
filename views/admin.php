<?php
    if(!isset($_GET['action'])){
        header('location:/');
    }
    if(!isset($_SESSION['username']) || $_SESSION['type']<3){
        header('location:/?action=admin_login');
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
    <title>Admin</title>
</head>
<body>
<?php 
        require_once 'includes/header.php';
        require_once 'includes/menu.php';
    ?>
<div class="col-12 card-deck">
    <div class="card">
        <img class="card-img-top" src="../data/images/articles.jpg" alt="card image">
        <div class="card-body">
            <h4 class="card-title">Les Articles</h4>
            <p class="card-text">Gerer les articles de l'ecole</p>
            <a class="btn" href="/?action=admin-article">Aller au page</a>
        </div>
    </div>
    <div class="card">
        <img class="card-img-top" src="../data/images/ppt.jpg" alt="card image">
        <div class="card-body">
            <h4 class="card-title">Presentaion de l'Ecole</h4>
            <p class="card-text">Gerer le contenu de la presentation de l'ecole</p>
            <a class="btn" href="/?action=admin-ppt">Aller au page</a>
        </div>
    </div>
    <div class="card">
        <img class="card-img-top" src="../data/images/edt.jpg" alt="card image">
        <div class="card-body">
            <h4 class="card-title">Emploi de temps</h4>
            <p class="card-text">Gerer l'emploi du temps de chaque cycle</p>
            <a class="btn" href="/?action=admin-edt">Aller au page</a>
        </div>
    </div>
    <div class="card">
        <img class="card-img-top" src="../data/images/ens.jpg" alt="card image">
        <div class="card-body">
            <h4 class="card-title">Les Enseignants</h4>
            <p class="card-text">Geres les enseignants de chaque cycle</p>
            <a class="btn" href="/?action=admin-ens">Aller au page</a>
        </div>
    </div>
</div>
<div class="col-12 card-deck">
    <div class="card">
        <img class="card-img-top" src="../data/images/users.jpg" alt="card image">
        <div class="card-body">
            <h4 class="card-title">Les Utilisateurs</h4>
            <p class="card-text">Geres les enseignants de site</p>
            <a class="btn" href="/?action=admin-user">Aller au page</a>
        </div>
    </div>
    <div class="card">
        <img class="card-img-top" src="../data/images/restau.jpg" alt="card image">
        <div class="card-body">
            <h4 class="card-title">Restauration</h4>
            <p class="card-text">Gerer le planning de Restauration de chaque cycle</p>
            <a class="btn" href="/?action=admin-restau">Aller au page</a>
        </div>
    </div>
    <div class="card">
        <img class="card-img-top" src="../data/images/contact.jpg" alt="card image">
        <div class="card-body">
            <h4 class="card-title">Contact</h4>
            <p class="card-text">Gerer les information dans la page du contact</p>
            <a class="btn" href="/?action=admin-contact">Aller au page</a>
        </div>
    </div>
    <div class="card">
        <img class="card-img-top" src="../data/images/info-pratique.jpg" alt="card image">
        <div class="card-body">
            <h4 class="card-title">Parametres</h4>
            <p class="card-text">Gerer les parametres de site</p>
            <a class="btn" href="/?action=admin-param">Aller au page</a>
        </div>
    </div>
    
</div>
    <?php
        require_once 'includes/footer.php'
    ?>
</body>
</html>