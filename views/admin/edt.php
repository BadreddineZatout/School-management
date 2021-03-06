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
    <link rel="stylesheet" href="style/admin.css">
    <title>Gestion des emplois du temps</title>
</head>
<body>
    <?php 
        require_once 'includes/header.php';
        require_once 'includes/menu.php';
    ?>
    <div class="d-flex head p-2 mx-5 mb-3">
        <span class="mr-auto">
            <h1>Emploi du Temps</h1>
        </span>
        <span class="my-auto">
            <button id="add" class="btn b" data-toggle="modal" data-target="#AddModal">Ajouter</button>
            <button class="btn b"><a class="retour" href="/?action=admin">Retour</a></button>
        </span>
    </div>
    <div class="mx-5">
        <table class="table table-bordered">
            <thead>
            <th>Cycle</th>
                <th>Classe</th>
                <th>Jour</th>
                <th>8h-9h</th>
                <th>9h-10h</th>
                <th>10h-11h</th>
                <th>10h-12h</th>
                <th>1h30-2h30</th>
                <th>2h30-3h30</th>
                <th>3h30-4h30</th>
                <th>4h30-5h30</th>
                <th></th>
                <th></th>
            </thead>
            <tbody id="edt-body"></tbody>
        </table>
    </div>
    <div class="modal" id="AddModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Ajouter</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
        <form action="/?action=storeedt" method="POST">
          <div class="modal-body">
          <div class="form-group">
                  <label for="cycle">Cycle:</label>
                  <select class="form-control" id="cycle" name="cycle">
                    <option value="0" selected>Choisir une cycle</option>
                    <option value="1">Primaire</option>
                    <option value="2">Moyenne</option>
                    <option value="3">Secondaire</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="class">Class:</label>
                  <select class="form-control" id="class" name="class">
                  </select>
                </div>
                <div class="form-group">
                  <label for="jour">Jour:</label>
                  <select class="form-control" id="jour" name="jour">
                    <option value="Dimanche">Dimanche</option>
                    <option value="Lundi">Lundi</option>
                    <option value="Mardi">Mardi</option>
                    <option value="Mercredi">Mercredi</option>
                    <option value="Jeudi">Jeudi</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="t1">8h-9h:</label>
                  <select class="form-control" id="t1" name="t1">
                  <option value="" selected>Choisir une matiere</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="t2">9h-10h:</label>
                  <select class="form-control" id="t2" name="t2">
                  <option value="" selected>Choisir une matiere</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="t3">10h-11h:</label>
                  <select class="form-control" id="t3" name="t3">
                  <option value="" selected>Choisir une matiere</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="t4">10h-12h:</label>
                  <select class="form-control" id="t4" name="t4">
                  <option value="" selected>Choisir une matiere</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="t5">1h30-2h30:</label>
                  <select class="form-control" id="t5" name="t5">
                  <option value="" selected>Choisir une matiere</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="t6">2h30-3h30:</label>
                  <select class="form-control" id="t6" name="t6">
                  <option value="" selected>Choisir une matiere</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="t7">3h30-4h30:</label>
                  <select class="form-control" id="t7" name="t7">
                  <option value="" selected>Choisir une matiere</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="t8">4h30-5h30:</label>
                  <select class="form-control" id="t8" name="t8">
                  <option value="" selected>Choisir une matiere</option>
                  </select>
                </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn submit">Submit</button>
                <button type="button" class="btn cancel" data-dismiss="modal">Close</button>
            </div>
        </form>

        </div>
      </div>
    </div>
    <div class="modal" id="UpdateModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Modifier</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
        <form action="/?action=updateedt" method="post">
          <div class="modal-body">
                <div class="form-group">
                  <label for="cycleMAJ">Cycle:</label>
                  <select class="form-control" id="cycleMAJ" name="cycleMAJ">
                    <option value="1">Primaire</option>
                    <option value="2">Moyenne</option>
                    <option value="3">Secondaire</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="classMAJ">Class:</label>
                  <select class="form-control" id="classMAJ" name="classMAJ">
                  </select>
                </div>
                <div class="form-group">
                  <label for="jourMAJ">Jour:</label>
                  <select class="form-control" id="jourMAJ" name="jourMAJ">
                    <option value="Dimanche">Dimanche</option>
                    <option value="Lundi">Lundi</option>
                    <option value="Mardi">Mardi</option>
                    <option value="Mercredi">Mercredi</option>
                    <option value="Jeudi">Jeudi</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="t1MAJ">8h-9h:</label>
                  <select class="form-control" id="t1MAJ" name="t1MAJ">
                  </select>
                </div>
                <div class="form-group">
                  <label for="t2MAJ">9h-10h:</label>
                  <select class="form-control" id="t2MAJ" name="t2MAJ">
                  </select>
                </div>
                <div class="form-group">
                  <label for="t3MAJ">10h-11h:</label>
                  <select class="form-control" id="t3MAJ" name="t3MAJ">
                  </select>
                </div>
                <div class="form-group">
                  <label for="t4MAJ">10h-12h:</label>
                  <select class="form-control" id="t4MAJ" name="t4MAJ">
                  </select>
                </div>
                <div class="form-group">
                  <label for="t5MAJ">1h30-2h30:</label>
                  <select class="form-control" id="t5MAJ" name="t5MAJ">
                  </select>
                </div>
                <div class="form-group">
                  <label for="t6MAJ">2h30-3h30:</label>
                  <select class="form-control" id="t6MAJ" name="t6MAJ">
                  </select>
                </div>
                <div class="form-group">
                  <label for="t7MAJ">3h30-4h30:</label>
                  <select class="form-control" id="t7MAJ" name="t7MAJ">
                  </select>
                </div>
                <div class="form-group">
                  <label for="t8MAJ">4h30-5h30:</label>
                  <select class="form-control" id="t8MAJ" name="t8MAJ">
                  </select>
                </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn submit" id="modif">Submit</button>
                <button type="button" class="btn cancel" data-dismiss="modal">Close</button>
            </div>
        </form>
        </div>
      </div>
    </div>

    <div class="modal" id="DeleteModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Supprimer</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
              <h5>Voulez vouz vraiment supprimer cette entrée?</h5>
              <div class="mt-5 d-flex flex-row-reverse">
                  <button type="button" class="btn cancel" data-dismiss="modal">Close</button>
                  <button type="submit" id="supp" data-dismiss="modal" class="btn mr-3 submit">Submit</button>
              </div>
            </div>
            
        </div>
      </div>
    </div>
    <?php
        require_once 'includes/footer.php'
    ?>
</body>
<?php
        require_once 'includes/admin-script.php';
    ?>
<script src="js/admin/edt.js"></script>
</html>