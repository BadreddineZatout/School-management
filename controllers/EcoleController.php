<?php
require 'models/info_ecole.php';
class EcoleController{

    public function ppt_page()
    {
        $infos = $this->get_info();
        require_once ('views/ecole.php');
    }

    public function get_info()
    {
        $ppt = new info_ecole();
        return $ppt->get_info();
    }
}