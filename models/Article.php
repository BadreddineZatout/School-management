<?php
require_once 'models/Model.php';
class Article extends Model{
    private $id;
    private $titre;
    private $contenu;
    private $image;
    public function getArticles($offset){
        $sql = 'SELECT * FROM articles ORDER BY id DESC LIMIT '. $offset.', 8';
        return $this->db->query($sql);
    }
    public function getArticle($id)
    {
        $query = $this->db->prepare("SELECT * FROM articles WHERE id = ? ");
        $query->execute([$id]);
        $rows = $query->fetch(PDO::FETCH_ASSOC);
        return $rows;
    }
    public function get_articles_AP(){
        $sql = 'SELECT * FROM articles JOIN articles_cycles AS ac ON ac.article_id=articles.id WHERE ac.cycle_id=1 ORDER BY articles.id DESC LIMIT 8';
        return $this->db->query($sql);
    }
    public function get_articles_AM(){
        $sql = 'SELECT * FROM articles JOIN articles_cycles AS ac ON ac.article_id=articles.id WHERE ac.cycle_id=2 ORDER BY articles.id DESC LIMIT 8';
        return $this->db->query($sql);
    }
    public function get_articles_AS(){
        $sql = 'SELECT * FROM articles JOIN articles_cycles AS ac ON ac.article_id=articles.id WHERE ac.cycle_id=3 ORDER BY articles.id DESC LIMIT 8';
        return $this->db->query($sql);
    }
    public function getAll()
    {
        $query = $this->db->prepare("SELECT * FROM articles ORDER BY id DESC");
        $query->execute();
        $rows = $query->fetchAll();
        return $rows;
    }
    public function store()
    {
        $query = $this->db->prepare("INSERT INTO articles (titre, contenu, image) VALUES (?, ?, ?)");
        $query->execute([$_POST['titre'], $_POST['contenu'], 'data/images/'.$_FILES['image_add']['name']]);
    }
    public function update()
    {

    }
    public function delete()
    {

    }
}