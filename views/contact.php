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
    <link rel="stylesheet" href="style/contact.css">
    <title>Contact</title>
</head>
<body>
    <?php 
        require_once 'includes/header.php';
        require_once 'includes/menu.php';
    ?>
    <div class="col-sm-10 card mx-auto">
        <div class="card-header">
            <h3>Pour nous contacter, veuillez consulter les informatins suivantes : </h3>
        </div>
        <div class="card-body row p-5">
            <div class="col-sm-12 mb-5">
                <p><i class="fas fa-map-pin fa-3x"></i> <b><?= $contact['adresse'] ?></b></p>
            </div>
            <div class="col-sm-12 mb-5">
                <p><i class="fas fa-phone fa-2x"></i> <b><?= $contact['telephone'] ?></b></p>
            </div>
            <div class="col-sm-12">
                <p><i class="fas fa-tty fa-2x"></i> <b><?= $contact['fax'] ?></b></p>
            </div>
        </div>
    </div>
    <?php
        require_once 'includes/footer.php'
    ?>
</body>
<?php
require 'includes/responsive.php';
?>
</html>