<?php
require_once 'models/ELeve.php';
class EleveController{

    private $type = 0;
    private Eleve $eleve;

    public function __construct()
    {
        $this->eleve = new Eleve();
    }
    function eleve_page()
    {
        if($_SESSION['type'] > 0){
            $eleve = $this->getInfo($_GET['enfant']);
            $edt_rows = $this->getEDT($eleve['class_id']);
        }else{
            $eleve = $this->getInfo($_SESSION['id']);
            $edt_rows = $this->getEDT($eleve['class_id']);
        }
        require_once 'views/eleve.php';
    }
    public function getInfo($user_id)
    {
        $infos =  $this->eleve->getInfo($user_id);
        $_SESSION['eleve_id'] = $infos['id'];
        return $infos;
    }
    public function getEDT($class)
    {
        return $this->eleve->getEDT($class);
    }
    public function getNotes()
    {
        return json_encode($this->eleve->getNotes($_SESSION['eleve_id']));
    }
    public function getActivites()
    {
        return json_encode($this->eleve->getActivites($_SESSION['eleve_id']));
    }
}