<?php
require 'models/ELeve.php';
class EleveController{

    private $type = 0;
    
    function eleve_page()
    {
        session_start();
        $eleve = $this->getInfo($_SESSION['id']);
        require_once 'views/eleve.php';
    }
    public function getInfo($user_id)
    {
        $eleve = new Eleve();
        return $eleve->getInfo($user_id);
    }
}