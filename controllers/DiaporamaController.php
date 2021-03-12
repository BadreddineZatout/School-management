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
    public function delete($id)
    {
        $this->diapo->delete($id);
        header('location:/?action=admin-param');
    }
}