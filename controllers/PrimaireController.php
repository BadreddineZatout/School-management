<?php
include 'ArticleController.php';
class PrimaireController{
    public function primaire_page()
    {
        $pc = $this;
        $articles = $this->get_articles();
        require_once 'views/primaire.php';
    }
    public function get_cadres($cycle){
        require_once 'views/cycle/cycle-cadre.php';
    }
    public function get_articles(){
        $ac = new ArticlesController();
        $articles = $ac->get_articles_AP();
        $articles = $ac->div_article($articles);
        return $articles;
    }
}