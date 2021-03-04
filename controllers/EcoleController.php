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
        $target = 'data/images/'.basename($_FILES['image_add']['name']);
        move_uploaded_file($_FILES['image_add']['tmp_name'], $target);
        $this->ppt->store();
        header('location:/?action=admin-ppt');
    }
    public function update()
    {
        $this->ppt->update();
        header('location:/?action=admin-ppt');
    }
    public function delete()
    {
        $this->ppt->delete($_GET['id']);
    }
}