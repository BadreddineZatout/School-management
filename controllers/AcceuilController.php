<?php
require 'ArticleController.php';
class AcceuilController{

    public function main_page(){
        $articles = $this->get_articles();
        require ('views/acceuil.php');
    }
    public function article_page()
    {
        $ac = new ArticlesController();
        require ('views/article/article.php');
    }
    public function get_articles(){
        $ac = new ArticlesController();
        $articles = $ac->getArticles(0);
        $articles = $ac->div_article($articles);
        return $articles;
    }
}