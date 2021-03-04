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
    <title>Gestion des articles</title>
</head>
<body>
    <?php 
        require_once 'includes/header.php';
        require_once 'includes/menu.php';
    ?>
    <div class="d-flex head p-2 mx-5 mb-3">
        <span class="mr-auto">
            <h1>Les Articles</h1>
        </span>
        <span class="my-auto">
            <button class="btn b" data-toggle="modal" data-target="#AddModal">Ajouter un article</button>
        </span>
    </div>
    <div class="mx-5">
        <table class="table table-bordered">
            <thead>
                <th>Titre</th>
                <th>Contenu</th>
                <th>Image</th>
                <th></th>
                <th></th>
            </thead>
            <tbody id="article-body"></tbody>
        </table>
    </div>
    <div class="modal" id="AddModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Ajouter Un Article</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
        <form action="/?action=storeArticle" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
                <div class="form-group">
                  <label for="titre">Titre:</label>
                  <input type="titre" class="form-control" placeholder="Introduire Titre" id="titre" name="titre" required>
                </div>
                <div class="form-group">
                  <label for="contenu">Contenu:</label>
                  <textarea class="form-control" name="contenu" id="contenu" placeholder="Introduire Contenu" required></textarea>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="0" name="concern">Tous
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="1" name="concern">Cycle Primaire
                  </label>
                </div>
                <div class="form-check disabled">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="2" name="concern">Cycle Moyenne
                  </label>
                </div> 
                <div class="form-check disabled">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="3" name="concern">Cycle Secondaire
                  </label>
                </div> 
                <div class="form-group">
                  <label for="img">Image:</label>
                  <input type="file" class="form-control" name="image_add" id="img" required>
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
            <h4 class="modal-title">Modifier Un Article</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
        <form action="/?action=updateArticle" method="post">
          <div class="modal-body">
                <div class="form-group">
                  <label for="titre">Titre:</label>
                  <input type="titre" class="form-control" id="titreMAJ" name="titreMAJ" required>
                </div>
                <div class="form-group">
                  <label for="contenu">Contenu:</label>
                  <textarea class="form-control" name="contenuMAJ" id="contenuMAJ" required></textarea>
                  <input type="hidden" name="id" id="id">
                </div>
                <!-- <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="0" name="concernMAJ">Tous
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="1" name="concernMAJ">Cycle Primaire
                  </label>
                </div>
                <div class="form-check disabled">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="2" name="concernMAJ">Cycle Moyenne
                  </label>
                </div> 
                <div class="form-check disabled">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="3" name="concernMAJ">Cycle Secondaire
                  </label>
                </div> 
                <div class="form-group">
                  <label for="img">Image:</label>
                  <input type="file" class="form-control" name="image_maj" id="image_maj" >
                </div> -->
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
            <h4 class="modal-title">Supprimer Un Article</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
              <h5>Voulez vouz vraiment supprimer ce article?</h5>
              <div class="mt-5 d-flex flex-row-reverse">
                  <button type="button" class="btn cancel" data-dismiss="modal">Close</button>
                  <button type="submit" id="supp" data-dismiss="modal" class="btn mr-3 submit">Submit</button>
              </div>
            </div>
            
        </div>
      </div>
    </div>
    <?php
        require_once 'includes/footer.php';
    ?>
</body>
<?php
        require_once 'includes/admin-script.php';
    ?>
<script src="js/admin/article.js"></script>
</html>