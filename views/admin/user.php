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
    <title>Gestion des utilisateurs</title>
</head>
<body>
    <?php 
        require_once 'includes/header.php';
        require_once 'includes/menu.php';
    ?>
    <div class="d-flex head p-2 mx-5 mb-3">
        <span class="mr-auto">
            <h1>Gestion des utilisateur</h1>
        </span>
        <span class="my-auto">
            <button class="btn b" data-toggle="modal" data-target="#AddModal">Ajouter un utilisateur</button>
            <button class="btn b"><a class="retour" href="/?action=admin">Retour</a></button>
        </span>
    </div>
    <div class="mx-5">
        <table class="table table-bordered">
            <thead>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Adresse</th>
                <th>Email</th>
                <th>Telephone 1</th>
                <th>Telephone 2</th>
                <th>Telephone 3</th>
                <th>Nom Utilisateur</th>
                <th>Mot de Passe</th>
                <th></th>
                <th></th>
            </thead>
            <tbody id="users-body"></tbody>
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
        <form action="/?action=storeUser" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
                <div class="form-group">
                  <label for="nom">Nom:</label>
                  <input type="text" class="form-control" id="nom" name="nom" required>
                </div>
                <div class="form-group">
                  <label for="prenom">Prenom:</label>
                  <input type="text" class="form-control" id="prenom" name="prenom" required>
                </div>
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="text" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                  <label for="adresse">Adresse:</label>
                  <input type="text" class="form-control" id="adresse" name="adresse" required>
                </div>
                <div class="form-group">
                  <label for="tele1">Telephone 1:</label>
                  <input type="text" class="form-control" id="tele1" name="tele1" required>
                </div>
                <div class="form-group">
                  <label for="tele2">Telephone 2:</label>
                  <input type="text" class="form-control" id="tele2" name="tele2">
                </div>
                <div class="form-group">
                  <label for="tele3">Telephone 3:</label>
                  <input type="text" class="form-control" id="tele3" name="tele3">
                </div>
                <div class="form-group">
                  <label for="user">Nom Utilisateur:</label>
                  <input type="text" class="form-control" id="user" name="user" required>
                </div>
                <div class="form-group">
                  <label for="pdw">Mot de passe:</label>
                  <input type="text" class="form-control" id="pdw" name="pdw" required>
                </div>
                <div class="form-group">
                  <label for="type">Type d'utilisateur:</label>
                  <select class="form-control" id="type" name="type" required>
                    <option value="0">Eleve</option>
                    <option value="1">Parent</option>
                    <option value="2">Enseignant</option>
                    <option value="3">Admin</option>
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
        <form action="/?action=updateUser" method="post">
          <div class="modal-body">
                <div class="form-group">
                  <label for="paragraphe">Paragraphe:</label>
                  <textarea class="form-control" name="paraMAJ" id="paraMAJ" required></textarea>
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
            <h4 class="modal-title">Supprimer Un Utilisateur</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
              <h5>Voulez vouz vraiment supprimer cet utilisateur?</h5>
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
<script src="js/admin/user.js"></script>
</html>