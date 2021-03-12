<?php
include 'ArticleController.php';
require_once 'views/primaire.php';
class PrimaireController{
    public function primaire_page()
    {
        $articles = $this->get_articles();
        $vue = new Primaire();
        $vue->Primaire($articles);
    }
    public function get_articles(){
        $ac = new ArticlesController();
        $articles = $ac->get_articles_AP();
        $articles = $ac->div_article($articles);
        return $articles;
    }
}