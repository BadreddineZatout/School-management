<?php
    if(!isset($_GET['action'])){
        header('location:/');
    }
    // if(!isset($_SESSION['username'])){
    //     header('location:/?action=eleve_login');
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'includes/link.php' ?>
    <link rel="stylesheet" href="style/eleve.css">
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
                <li class="list-group-item">ID: 17/0083</li>
                <li class="list-group-item">Nom: Zatout</li>
                <li class="list-group-item">Prenom: Badreddine</li>
                <li class="list-group-item">Date de Naissance: 14/05/1999</li>
                <li class="list-group-item">Année Scolaire: 2020/2021</li>
                <li class="list-group-item">Classe: 2CS SIL1</li>
            </ul>
        </div>
        <div class="col-sm-9 row">
            <div class="col-sm-12 navbar navbar-expand-sm">
                <ul id="switch" class="navbar-nav ml-auto">
                    <li class="nav-item"><button class="btn">Emploie du Temps</button></li>
                    <li class="nav-item"><button class="btn">Notes</button></li>
                    <li class="nav-item"><button class="btn">Activités Extrascolaire</button></li>
                    <li class="nav-item"><button class="btn">Remarques des Enseignants</button></li>
                </ul>
            </div>
            <div class="col-sm-12">
                <table id="edt" class="table table-bordered">
                    <thead>
                        <th></th>
                        <th>Dimanche</th>
                        <th>Lundi</th>
                        <th>Mardi</th>
                        <th>Mercredi</th>
                        <th>Jeudi</th>
                    </thead>
                    <tbody>
                        <tr>
                            <th>8h-9h</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>9h-10h</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>10h-11h</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>10h-12h</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>1h30-2h30</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>2h30-3h30</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>3h30-4h30</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>4h30-5h30</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-12">
                <table id="notes" class="table table-bordered">
                    <thead>
                        <th></th>
                        <th>Evaluaion</th>
                        <th>Interrogation 1</th>
                        <th>Interrogation 2</th>
                        <th>Examen</th>
                        <th>Moyenne</th>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Math</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Physique</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Science</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Langue Arabe</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Langue Française</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Langue Anglaise</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Science Islamique</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Histo/Geo</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Sport</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-12">
                <table id="activites" class="table table-bordered">
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
            <div class="col-sm-12">
                <table id="remarques" class="table table-bordered">
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
        </div>
    </div>
    <?php
        require_once 'includes/footer.php'
    ?>
</body>
</html>