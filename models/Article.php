<?php
require 'models/Model.php';
class Article extends Model{
    private $id;
    private $titre;
    private $contenu;
    private $image;
    public function getArticles(){
        $sql = 'SELECT * FROM articles';
        return $this->db->query($sql);
    }
}