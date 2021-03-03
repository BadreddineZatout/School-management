<?php
switch ($_GET['action']) {
    case 'getArticle':
        require_once('./controllers/ArticleController.php');
        $ac = new ArticlesController();
        echo($ac->getAll());
        break;
    case 'storeArticle': 
        require_once('./controllers/ArticleController.php');
        $ac = new ArticlesController();
        $ac->store();
        break;
    case 'updateArticle': 
        var_dump($_POST);
        var_dump(isset($_POST["image_maj"]));
        require_once('./controllers/ArticleController.php');
        $ac = new ArticlesController();
        $ac->update();
        break;
    case 'deleteArticle': 
        require_once('./controllers/ArticleController.php');
        $ac = new ArticlesController();
        $ac->delete();
        break;
    }