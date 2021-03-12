<?php
require_once 'ArticleController.php';
require_once 'DiaporamaController.php';
require_once 'views/acceuil.php';
class AcceuilController{

    public function main_page(){
        $articles = $this->get_articles();
        $images = $this->diaporama();
        $vue = new AcceuileView();
        $vue->Acceuil($articles, $images);
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
    public function diaporama(){
        $dc = new DiaporamaController();
        return $dc->getImages();
    }
}