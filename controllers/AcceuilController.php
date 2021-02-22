<?php
require 'ArticleController.php';
class AcceuilController{

    function main_page(){
        $ac = new ArticlesController();
        $articles = $ac->getArticles();
        $articles = $this->div_article($articles);
        require ('views/acceuil.php');
    }
    
    function div_article($articles){
        $a = [];
        $tmp = [];
        foreach($articles as $article){
            array_push($tmp, $article);
        }
        $a[0] = array_slice($tmp, 0, 4);
        $a[1] = array_slice($tmp, 4, 4);
        return $a;
    }
}