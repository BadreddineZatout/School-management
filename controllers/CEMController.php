<?php
include 'ArticleController.php';
require_once 'views/cem.php';
class CEMController{

    function cem_page()
    {
        $articles = $this->get_articles();
        $vue = new CEM();
        $vue->Cem($articles);
    }
    
    public function get_articles(){
        $ac = new ArticlesController();
        $articles = $ac->get_articles_AM();
        $articles = $ac->div_article($articles);
        return $articles;
    }
}