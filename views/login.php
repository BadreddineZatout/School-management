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
    <?php require 'includes/link.php' ?>
    <link rel="stylesheet" href="style/login.css">
    <title>Log in</title>
</head>
<body>
    <?php 
        require_once ('includes/header.php');
    ?>
    <div class="card col-sm-10 mx-auto">
        <div class="card-header">
            <h2>Connexion</h2>
        </div>
        <div class="form-container">
            <form action="#" method="post">
                <div class="form-group">
                    <label for="email">Adresse Email:</label>
                    <input type="email" class="form-control" placeholder="Enter email" id="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Mot de Passe:</label>
                    <input type="password" class="form-control" placeholder="Enter password" id="pwd">
                </div>
                <button type="submit" class="btn">Connecter</button>
            </form>
        </div>

    </div>
</body>
</html>