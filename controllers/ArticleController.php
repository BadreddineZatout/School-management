<?php
require 'models/Article.php';

class ArticlesController{
    private $article;

    public function __construct()
    {
        $this->article = new Article();
    }
    public function getArticles(){
        return $this->article->getArticles(0);
    }
    public function getArticle($id)
    {
        return $this->article->getArticle($id);
    }
    public function get_articles_AP(){
        return $this->article->get_articles_AP();
    }
    public function get_articles_AM(){
        return $this->article->get_articles_AM();
    }
    public function get_articles_AS(){
        return $this->article->get_articles_AS();
    }
    public function div_article($articles){
        $a = [];
        $tmp = [];
        foreach($articles as $article){
            array_push($tmp, $article);
        }
        $a[0] = array_slice($tmp, 0, 4);
        $a[1] = array_slice($tmp, 4, 4);
        return $a;
    }

}