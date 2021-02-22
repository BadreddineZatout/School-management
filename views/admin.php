<?php
    if(!isset($_GET['action'])){
        header('location:/');
    }
    session_start();
    if(!isset($_SESSION['username']) || $_SESSION['type']<2){
        header('location:/?action=admin_login');
    }
    session_unset();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'includes/link.php' ?>
    <title>Admin</title>
</head>
<body>
<?php 
        require_once 'includes/header.php';
        require_once 'includes/menu.php';
    ?>

    <?php
        require_once 'includes/footer.php'
    ?>
</body>
</html>