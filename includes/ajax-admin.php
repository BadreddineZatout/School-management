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
    case 'getedt':
        require_once('./controllers/EDTController.php');
        $ec = new EDTController();
        echo($ec->getAll());
        break;
    case 'storeedt': 
        require_once('./controllers/EDTController.php');
        $ec = new EDTController();
        $ec->store();
        break;
    case 'updateedt': 
        require_once('./controllers/EDTController.php');
        $ec = new EDTController();
        $ec->update();
        break;
    case 'deleteedt': 
        require_once('./controllers/EDTController.php');
        $ec = new EDTController();
        $ec->delete();
        break;
    case 'getEns':
        require_once('./controllers/EnsController.php');
        $cc = new EnsController();
        echo($cc->getAll());
        break;
    case'getClasses': 
        require_once('./controllers/EnsController.php');
        $cc = new EnsController();
        echo($cc->getClasses());
        break;
    case 'storeEns': 
        require_once('./controllers/EnsController.php');
        $cc = new EnsController();
        $cc->store();
        break;
    case 'updateEns': 
        require_once('./controllers/EnsController.php');
        $cc = new EnsController();
        $cc->update();
        break;
    case 'deleteEns': 
        require_once('./controllers/EnsController.php');
        $cc = new EnsController();
        $cc->delete();
        break;
    case 'getUser':
        require_once('./controllers/UserController.php');
        $cc = new UserController(2);
        echo($cc->getAll());
        break;
    case 'storeUser': 
        require_once('./controllers/UserController.php');
        $cc = new UserController(2);
        $cc->store();
        break;
    case 'updateUser': 
        require_once('./controllers/UserController.php');
        $cc = new UserController(2);
        $cc->update();
        break;
    case 'deleteUser': 
        require_once('./controllers/UserController.php');
        $cc = new UserController(2);
        $cc->delete();
        break;
    case 'getRestau':
        require_once('./controllers/RestauController.php');
        $cc = new RestauController();
        echo($cc->getAll());
        break;
    case 'storeRestau': 
        require_once('./controllers/RestauController.php');
        $cc = new RestauController();
        $cc->store();
        break;
    case 'updateRestau': 
        require_once('./controllers/RestauController.php');
        $cc = new RestauController();
        $cc->update();
        break;
    case 'deleteRestau': 
        require_once('./controllers/RestauController.php');
        $cc = new RestauController();
        $cc->delete();
        break;
    case 'getContact':
        require_once('./controllers/ContactController.php');
        $cc = new ContactController();
        echo($cc->getAll());
        break;
    case 'storeContact': 
        require_once('./controllers/ContactController.php');
        $cc = new ContactController();
        $cc->store();
        break;
    case 'deleteContact': 
        require_once('./controllers/ContactController.php');
        $cc = new ContactController();
        $cc->delete();
        break;
    case 'getclasses': 
        require_once('./controllers/EDTController.php');
        $ec = new EDTController();
        echo($ec->getClasses());
        break;
    case 'getmatiere': 
        require_once('./controllers/EDTController.php');
        $ec = new EDTController();
        echo($ec->getMatieres());
        break;
    }