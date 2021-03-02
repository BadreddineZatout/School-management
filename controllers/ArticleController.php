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
            if (strlen($article['contenu'])>100){
                $article['contenu'] = substr($article['contenu'], 0, 100) . '...';
            }
            array_push($tmp, $article);
        }
        $a[0] = array_slice($tmp, 0, 4);
        $a[1] = array_slice($tmp, 4, 4);
        return $a;
    }
    public function getAll()
    {
        return json_encode($this->article->getAll());
    }
    public function store()
    {
        $target = 'data/images/'.basename($_FILES['image_add']['name']);
        move_uploaded_file($_FILES['image_add']['tmp_name'], $target);
        $this->article->store();
        header('location:/?action=admin-article');
    }
    public function update()
    {

    }
    public function delete()
    {
        $this->article->delete($_GET['id']);
    }

}