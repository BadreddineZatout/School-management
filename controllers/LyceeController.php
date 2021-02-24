<?php
include 'ArticleController.php';
class LyceeController{

    function lycee_page()
    {
        $lc = $this;
        $articles = $this->get_articles();
        require_once 'views/lycee.php';
    }
    public function get_cadres($cycle){
        require_once 'views/cycle/cycle-cadre.php';
    }
    public function get_articles(){
        $ac = new ArticlesController();
        $articles = $ac->get_articles_AS();
        $articles = $ac->div_article($articles);
        return $articles;
    }
}