<?php
require 'ArticleController.php';

function main_page(){
    $ac = new ArticlesController();
    $articles = $ac->getArticles();
    require ('views/acceuil.php');
}