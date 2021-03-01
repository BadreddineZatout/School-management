<?php
// session_unset();
    if(!isset($_GET['action'])){
        header('location:/');
    }
    // if(isset($_SESSION['username'])){
    //     switch ($_SESSION['type']){
    //         case 0:
    //             header('location:/?action=eleve');
    //             break;
    //         case 1: 
    //             header('location:/?action=parent');
    //             break;
    //         case 2: 
    //             header('location:/?action=admin');
    //             break;
    //     }
    // }
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
                    <label for="user">Nom d'utilisateur:</label>
                    <input name="user" class="form-control" placeholder="Enter nom d'utilisateur" id="user" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Mot de Passe:</label>
                    <input type="password" name="pdw" class="form-control" placeholder="Enter password" id="pwd" required>
                </div>
                <button type="submit" class="btn">Connecter</button>
            </form>
        </div>
        <?php
            $invalide = false;
            if ( isset($_POST['user']) && isset($_POST['pdw']) ){
                $valid = $this->login($_POST['user'], $_POST['pdw']);
                if ( $valid[0] ){
                    session_start();
                    $_SESSION['username'] = $_POST['user'];
                    $_SESSION['id'] = $valid[1]['id'];
                    $_SESSION['type'] = $valid[1]['type'];
                    
                    header($this->redirectUser($valid[1]['type']));
                } else {
                    $invalide = true;
                };
            }
            if ($invalide){?>
            <center>
                <div>
                    <strong style="color: #58391C; font-size: 24px;">Authentification invalide</strong>
                </div>
            </center>
        <?php 
            }
        ?>
    </div>
</body>
</html>