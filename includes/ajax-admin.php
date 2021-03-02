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