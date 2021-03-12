<?php
require_once 'ArticleController.php';
require_once 'DiaporamaController.php';
class AcceuilController{

    public function main_page(){
        $articles = $this->get_articles();
        $images = $this->diaporama();
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
    public function diaporama(){
        $dc = new DiaporamaController();
        return $dc->getImages();
    }
}