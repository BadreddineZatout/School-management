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
    <title>Liste des enseignants</title>
</head>
<body>
    <?php 
        require_once 'includes/header.php';
        require_once 'includes/menu.php';
    ?>
    <div class="col-8 mx-auto">
        <table class="table table-bordered">
            <thead>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Heure de reception</th>
            </thead>
            <tbody>
                <?php 
                if(!is_null($ens_rows)){
                    foreach ($ens_rows as $row) {
                        ?>
                    <tr>
                        <td style="text-align: center;"><?= $row['nom'] ?></td>
                        <td style="text-align: center;"><?= $row['prenom'] ?></td>
                        <td style="text-align: center;"><?= $row['temps_recep'] ?></td>
                    </tr>
                <?php
                    }
                    }else{
                        header('location:/');
                    }
                ?>
            </tbody>
        </table>
    </div>
    <?php
        require_once 'includes/footer.php'
    ?>
</body>
<?php
require 'includes/responsive.php';
?>
</html>