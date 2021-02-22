<?php
class PrimaireController{


    public function primaire_page()
    {
        $pc = $this;
        require_once 'views/primaire.php';
    }
    public function get_cadres(){
        require_once 'views/cycle/cycle-cadre.php';
    }
}