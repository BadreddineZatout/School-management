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
                  <option value="" selected>Vide</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="t2">9h-10h:</label>
                  <select class="form-control" id="t2" name="t2">
                  <option value="" selected>Vide</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="t3">10h-11h:</label>
                  <select class="form-control" id="t3" name="t3">
                  <option value="" selected>Vide</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="t4">10h-12h:</label>
                  <select class="form-control" id="t4" name="t4">
                  <option value="" selected>Vide</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="t5">1h30-2h30:</label>
                  <select class="form-control" id="t5" name="t5">
                  <option value="" selected>Vide</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="t6">2h30-3h30:</label>
                  <select class="form-control" id="t6" name="t6">
                  <option value="" selected>Vide</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="t7">3h30-4h30:</label>
                  <select class="form-control" id="t7" name="t7">
                  <option value="" selected>Vide</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="t8">4h30-5h30:</label>
                  <select class="form-control" id="t8" name="t8">
                  <option value="" selected>Vide</option>
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
                  <label for="tMAJ1">8h-9h:</label>
                  <select class="form-control" id="tMAJ1" name="tMAJ1">
                  <option value="" selected>Vide</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="tMAJ2">9h-10h:</label>
                  <select class="form-control" id="tMAJ2" name="tMAJ2">
                  <option value="" selected>Vide</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="tMAJ3">10h-11h:</label>
                  <select class="form-control" id="tMAJ3" name="tMAJ3">
                  <option value="" selected>Vide</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="tMAJ4">10h-12h:</label>
                  <select class="form-control" id="tMAJ4" name="tMAJ4">
                  <option value="" selected>Vide</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="tMAJ5">1h30-2h30:</label>
                  <select class="form-control" id="tMAJ5" name="tMAJ5">
                  <option value="" selected>Vide</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="tMAJ6">2h30-3h30:</label>
                  <select class="form-control" id="tMAJ6" name="tMAJ6">
                  <option value="" selected>Vide</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="tMAJ7">3h30-4h30:</label>
                  <select class="form-control" id="tMAJ7" name="tMAJ7">
                  <option value="" selected>Vide</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="tMAJ8">4h30-5h30:</label>
                  <select class="form-control" id="tMAJ8" name="tMAJ8">
                  <option value="" selected>Vide</option>
                  </select>
                </div>
                <input type="hidden" name="id" id="id">
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