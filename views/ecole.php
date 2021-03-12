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
    <link rel="stylesheet" href="/style/ecole.css">
    <title>Presentation</title>
</head>
<body>
    <?php
        require_once 'includes/header.php';
        require_once 'includes/menu.php';
    ?>
    <div class="row mx-auto">
        <div class="col-sm-10 card ppt mx-auto">
            <div class='card-header'>
                <h1>Nom ecole</h1>
            </div>
            <?php
                foreach ($infos as $info) {
                    ?>
            <div class="card-body row ppt mx-1 my-1">
                <div class="col">
                    <p><?= $info['paragraphe'] ?></p>
                </div>
                <?php
                    if (!is_null($info['image'])) {
                        ?>
                <div class="col-4 mr-auto">
                    <img src="<?= $info['image'] ?>" height="300px" width="400px" alt="">
                </div>
            </div>
            <?php
                    }
                } 
            ?>
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