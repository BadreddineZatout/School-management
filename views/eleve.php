<?php
    if(!isset($_GET['action'])){
        header('location:/');
    }
    if(!isset($_SESSION['username'])){
        header('location:/?action=eleve_login');
    }
    // session_unset();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'includes/link.php' ?>
    <link rel="stylesheet" href="style/eleve.css">
    <link rel="stylesheet" href="style/table.css">
    <title>Espace Eleve</title>
</head>
<body>
    <?php 
        require_once 'includes/header.php';
        require_once 'includes/menu.php';
    ?>
    <div class="row mx-auto">
        <div class="col-sm-3 align-self-start ml-2 info">
            <ul class="list-group">
                <li class="list-group-item">ID: <?= $eleve['id'] ?></li>
                <li class="list-group-item">Nom: <?= $eleve['nom'] ?></li>
                <li class="list-group-item">Prenom: <?= $eleve['prenom'] ?></li>
                <li class="list-group-item">Date de Naissance: <?= $eleve['date_naissance'] ?></li>
                <li class="list-group-item">Année Scolaire: <?= $eleve['annee'] ?></li>
                <li class="list-group-item">Classe: <?= $eleve['classe'] ?></li>
            </ul>
        </div>
        <div class="col-sm-9 row">
            <div class="col-sm-12 navbar navbar-expand-sm">
                <ul id="switch" class="navbar-nav ml-auto">
                    <li class="nav-item"><button id="edt-btn" class="btn">Emploie du Temps</button></li>
                    <li class="nav-item"><button id="note-btn" class="btn">Notes</button></li>
                    <li class="nav-item"><button id="activ-btn" class="btn">Activités Extrascolaire</button></li>
                    <?php 
                        if ($_SESSION['type'] >= 1){
                    ?>
                    <li class="nav-item"><button id="rque-btn" class="btn">Remarques des Enseignants</button></li>
                    <?php } ?>
                </ul>
            </div>
            <div id="edt" class="col-sm-12">
                <table id="edt" class="table table-bordered">
                    <thead>
                        <th>Jour</th>
                        <th>8h-9h</th>
                        <th>9h-10h</th>
                        <th>10h-11h</th>
                        <th>10h-12h</th>
                        <th>1h30-2h30</th>
                        <th>2h30-3h30</th>
                        <th>3h30-4h30</th>
                        <th>4h30-5h30</th>
                    </thead>
                    <tbody>
                    <?php
                    $style = 'style="text-align: center;"';
                    foreach ($edt_rows as $row) {
                        ?>
                        <tr>
                            <td <?= $style ?>><?= $row['jour'] ?></td>
                            <td <?= $style ?>><?= $row['t1'] ?></td>
                            <td <?= $style ?>><?= $row['t2'] ?></td>
                            <td <?= $style ?>><?= $row['t3'] ?></td>
                            <td <?= $style ?>><?= $row['t4'] ?></td>
                            <td <?= $style ?>><?= $row['t5'] ?></td>
                            <td <?= $style ?>><?= $row['t6'] ?></td>
                            <td <?= $style ?>><?= $row['t7'] ?></td>
                            <td <?= $style ?>><?= $row['t8'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <div id="notes" class="col-sm-12">
                <table class="table table-bordered">
                    <thead>
                        <th></th>
                        <th>Evaluaion</th>
                        <th>Interrogation 1</th>
                        <th>Interrogation 2</th>
                        <th>Examen</th>
                        <th>Moyenne</th>
                    </thead>
                    <tbody id="notes-body">
                        
                    </tbody>
                </table>
            </div>
            <div id="activites" class="col-sm-12">
                <table class="table table-bordered">
                    <thead>
                        <th>Activité</th>
                        <th>Date</th>
                        <th>Lieu</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <?php 
                if($_SESSION['type'] >= 1){
            ?>
            <div id="remarques" class="col-sm-12">
                <table class="table table-bordered">
                    <thead>
                        <th>Enseignant</th>
                        <th>Matiere</th>
                        <th>Remarque</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
    <?php
        require_once 'includes/footer.php'
    ?>
</body>
<?php 
    require 'includes/eleve_script.php';
?>
</html>