<?php
require 'ArticleController.php';
class AcceuilController{

    public function main_page(){
        $articles = $this->get_articles();
        require ('views/acceuil.php');
    }
    public function get_articles(){
        $ac = new ArticlesController();
        $articles = $ac->getArticles();
        $articles = $ac->div_article($articles);
        return $articles;
    }
}