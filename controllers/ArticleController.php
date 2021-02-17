<?php
require 'models/Article.php';

class ArticlesController{
    
    public function getArticles(){
        $articles = new Article();
        return $articles->getArticles();
    }
}