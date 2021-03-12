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
    <title>Gestion des enseignants</title>
</head>
<body>
    <?php 
        require_once 'includes/header.php';
        require_once 'includes/menu.php';
    ?>
    <div class="d-flex head p-2 mx-5 mb-3">
        <span class="mr-auto">
            <h1>Gestion des enseignants</h1>
        </span>
        <span class="my-auto">
            <button class="btn b" data-toggle="modal" data-target="#AddModal">Ajouter</button>
            <button class="btn b"><a class="retour" href="/?action=admin">Retour</a></button>
        </span>
    </div>
    <div class="d-flex col-5 mx-5 mb-2">
        <select class="form-control" name="ens" id="ens">
            <option value="0">Les Enseignants</option>
        </select>
        <button id="class-btn" type="button" class="btn b mx-2">Classes</button>
        <button id="recep-btn" type="button" class="btn b">Reception</button>
    </div>
    <div id="classes" class="mx-5">
        <table class="table table-bordered">
            <thead>
                <th>Classe</th>
                <th>Heure</th>
                <th></th>
            </thead>
            <tbody id="class-body"></tbody>
        </table>
    </div>
    <div id="reception" class="mx-5">
        <table class="table table-bordered">
            <thead>
                <th>Reception</th>
                <th></th>
            </thead>
            <tbody id="recep-body"></tbody>
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
        <form action="/?action=storeEns" method="POST">
          <div class="modal-body">
            <div class="form-group">
                <label for="enseignant">Enseignant:</label>
                <select class="form-control" id="enseignant" name="enseignant">
                    <option value="0">Les Enseignants</option>
                </select>
            </div>
            <div class="form-group">
                <label for="class">Classe:</label>
                <select class="form-control" id="class" name="class">
                <option value="0">Les Classes</option>
                </select>
            </div>
            <div class="form-group">
                  <label for="heure">Heure:</label>
                  <input pattern="[0-2][0-9]h[0-5][0-9]" type="text" class="form-control" id="heure" name="heure" placeholder="entre 08h et 5h30" required>
            </div>
            <div class="form-group">
                  <label for="recep">Heure de Reception:</label>
                  <input pattern="[A-Za-z]*[0-2][0-9]h[0-5][0-9]" type="text" class="form-control" id="recep" name="recep" placeholder="si deja inserer c'est pas la peine de le refaire">
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
        <form action="/?action=updateEns" method="post">
          <div class="modal-body">
          <div class="form-group">
                  <label for="recepMAJ">Heure de Reception:</label>
                  <input pattern="[A-Za-z]+\s[0-2][0-9]h[0-5][0-9]" type="text" class="form-control" id="recepMAJ" name="recepMAJ">
                  <input type="hidden" name="id" id="id">
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
              <h5>Voulez vouz vraiment supprimer cet classe?</h5>
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
<script src="js/admin/ens.js"></script>
</html>