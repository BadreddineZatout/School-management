<?php
require 'models/Model.php';
class Article extends Model{
    private $id;
    private $titre;
    private $contenu;
    private $image;
    public function getArticles($offset){
        $sql = 'SELECT * FROM articles ORDER BY id DESC LIMIT '. $offset.', 8';
        
        return $this->db->query($sql);
    }
}