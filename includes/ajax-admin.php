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
    case 'getInfo':
        require_once('./controllers/EcoleController.php');
        $ec = new EcoleController();
        echo($ec->getAll());
        break;
    case 'storeInfo': 
        require_once('./controllers/EcoleController.php');
        $ec = new EcoleController();
        $ec->store();
        break;
    case 'updateInfo': 
        require_once('./controllers/EcoleController.php');
        $ec = new EcoleController();
        $ec->update();
        break;
    case 'deleteInfo': 
        require_once('./controllers/EcoleController.php');
        $ec = new EcoleController();
        $ec->delete();
        break;
    }