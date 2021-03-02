<?php
switch ($_GET['action']) {
    case 'getArticle':
        require_once('./controllers/ArticleController.php');
        $ac = new ArticlesController();
        echo($ac->getAll());
        break;
    }