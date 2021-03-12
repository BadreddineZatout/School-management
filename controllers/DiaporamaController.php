<?php
require_once 'models/Diaporama.php';
class DiaporamaController{
    private $diapo;
    public function __construct()
    {
        $this->diapo = new Diaporama();
    }
    public function getImages(){
        return $this->diapo->getImages();
    }
    public function store()
    {
        $target = 'data/diaporama/'.basename($_FILES['image_add']['name']);
        move_uploaded_file($_FILES['image_add']['tmp_name'], $target);
        $this->diapo->store();
        header('location:/?action=admin-param');
    }
    public function delete($id)
    {
        $this->diapo->delete($id);
        header('location:/?action=admin-param');
    }
}