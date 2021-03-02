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
        $query = $this->db->prepare("SELECT max(id) FROM articles");
        $query->execute();
        $id = $query->fetch(PDO::FETCH_ASSOC);
        if($_POST['concern']>0){
            $query = $this->db->prepare("INSERT INTO articles_cycles (article_id, cycle_id) VALUES (?, ?)");
            $query->execute([$id['max(id)'], $_POST['concern']]);
        }else{
            for ($i=1; $i<=3;$i++){
                $query = $this->db->prepare("INSERT INTO articles_cycles (article_id, cycle_id) VALUES (?, ?)");
                $query->execute([$id['max(id)'],$i]);
            }
        }
    }
    public function update()
    {

    }
    public function delete($id)
    {
        $query = $this->db->prepare("DELETE FROM articles_cycles WHERE article_id=?");
        $query->execute([$id]);
        $query = $this->db->prepare("DELETE FROM articles WHERE id=?");
        $query->execute([$id]);
    }
}