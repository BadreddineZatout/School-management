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
    <link rel="stylesheet" href="style/table.css">
    <title>Restauration</title>
</head>
<body>
    <?php 
        require_once 'includes/header.php';
        require_once 'includes/menu.php';
    ?>
    <div class="mx-5">
        <table class='table table-bordered'>
            <thead>
                <th>Jour</th>
                <th>Repas</th>
            </thead>
            <tbody>
                <?php 
                if(!is_null($menu)){
                    foreach ($menu as $repas) {
                        ?> 
                <tr>
                        <td style="text-align: center;"><?= $repas['jour'] ?></td>
                        <td style="text-align: center;"><?= $repas['repas'] ?></td>
                </tr>
                <?php
                    }
                    }else{
                        header('location:/');
                    } ?>
            </tbody>
        </table>
    </div>
    <?php
        require_once 'includes/footer.php'
    ?>
</body>
</html>