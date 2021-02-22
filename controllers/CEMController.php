<?php
class CEMController{

    function cem_page()
    {
        $cc = $this;
        require_once 'views/cem.php';
    }
    public function get_cadres(){
        require_once 'views/cycle/cycle-cadre.php';
    }
}