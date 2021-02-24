<?php
include 'ArticleController.php';
class CEMController{

    function cem_page()
    {
        $cc = $this;
        $articles = $this->get_articles();
        require_once 'views/cem.php';
    }
    public function get_cadres($cycle){
        require_once 'views/cycle/cycle-cadre.php';
    }
    public function get_articles(){
        $ac = new ArticlesController();
        $articles = $ac->get_articles_AM();
        $articles = $ac->div_article($articles);
        return $articles;
    }
}