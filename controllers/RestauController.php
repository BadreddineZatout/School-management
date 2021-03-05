<?php
require 'models/Restau.php';
class RestauController{

    private $restau;
    public function __construct()
    {
        $this->restau = new Restau();
    }
    public function RestauPage()
    {
        $menu = $this->restau->getRestau($_GET['cycle']);
        require 'views/cycle/restau.php';
    }
    public function getAll()
    {
        return json_encode($this->restau->getAll());
    }
    public function store()
    {
        $this->restau->store();
        header('location:/?action=admin-edt');
    }
    public function update()
    {
        $this->restau->update();
        header('location:/?action=admin-edt');
    }
    public function delete()
    {
        $this->restau->delete($_GET['id']);
    }
}