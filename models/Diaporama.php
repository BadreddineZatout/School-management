<?php
require_once 'Model.php';
class Diaporama extends Model{

    public function getImages(){
        $query = $this->db->prepare("SELECT * FROM diaporama");
        $query->execute();
        return $query->fetchAll();
    }
    public function store()
    {
        $query = $this->db->prepare("INSERT INTO diaporama (image) VALUES (?)");
        $query->execute(['data/diaporama/'.$_FILES['image_add']['name']]);
    }
    public function delete($id){
        $query = $this->db->prepare("Delete FROM diaporama WHERE id=?");
        $query->execute([$id]);
    }
}