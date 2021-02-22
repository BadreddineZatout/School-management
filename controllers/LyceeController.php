<?php
class LyceeController{

    function lycee_page()
    {
        $lc = $this;
        require_once 'views/lycee.php';
    }
    public function get_cadres(){
        require_once 'views/cycle-cadre.php';
    }
}