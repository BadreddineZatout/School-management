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
    <link rel="stylesheet" href="style/admin/article.css">
    <title>Gestion des articles</title>
</head>
<body>
    <?php 
        require_once 'includes/header.php';
        require_once 'includes/menu.php';
    ?>
    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Ajouter Un Article</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
        <form action="" method="post">
          <div class="modal-body">
                <div class="form-group">
                  <label for="email">Email address:</label>
                  <input type="email" class="form-control" placeholder="Enter email" id="email">
                </div>
                <div class="form-group">
                  <label for="pwd">Password:</label>
                  <input type="password" class="form-control" placeholder="Enter password" id="pwd">
                </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </form>

        </div>
      </div>
    </div>
    <div class="d-flex head p-2 mx-5 mb-3">
        <span class="mr-auto">
            <h1>Les Articles</h1>
        </span>
        <span class="my-auto">
            <button class="btn b" data-toggle="modal" data-target="#myModal">Ajouter un article</button>
        </span>
    </div>
    <div class="mx-5">
        <table class="table table-bordered">
            <thead>
                <th>Titre</th>
                <th>Contenu</th>
                <th>Image</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </thead>
            <tbody id="article-body"></tbody>
        </table>
    </div>
    <?php
        require_once 'includes/footer.php'
    ?>
</body>
<script src="js/jquery-3.5.1.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/admin/buttons.js"></script>
<script src="js/admin/article.js"></script>
</html>