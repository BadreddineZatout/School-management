<?php
include 'ArticleController.php';
require_once 'views/lycee.php';
class LyceeController{

    function lycee_page()
    {
        $articles = $this->get_articles();
        $vue = new Lycee();
        $vue->Lycee($articles);
    }
    public function get_articles(){
        $ac = new ArticlesController();
        $articles = $ac->get_articles_AS();
        $articles = $ac->div_article($articles);
        return $articles;
    }
}