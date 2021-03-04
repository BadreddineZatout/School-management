<?php
require 'models/info_ecole.php';
class EcoleController{
    private $ppt;
    
    public function __construct()
    {
        $this->ppt = new info_ecole();
    }
    public function ppt_page()
    {
        $infos = $this->get_info();
        require_once ('views/ecole.php');
    }

    public function get_info()
    {
        return $this->ppt->get_info();
    }
    public function getAll()
    {
        return json_encode($this->ppt->getAll());
    }
    public function store()
    {

    }
    public function update()
    {

    }
    public function delete()
    {

    }
}