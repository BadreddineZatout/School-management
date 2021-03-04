<?php
require 'models/Restau.php';
class RestauController{

    public function RestauPage()
    {
        $restau = new Restau();
        $menu = $restau->getRestau($_GET['cycle']);
        require 'views/cycle/restau.php';
    }
    public function getAll()
    {
        return json_encode($this->ppt->getAll());
    }
    public function store()
    {
        $target = 'data/images/'.basename($_FILES['image_add']['name']);
        move_uploaded_file($_FILES['image_add']['tmp_name'], $target);
        $this->edt->store();
        header('location:/?action=admin-edt');
    }
    public function update()
    {
        $this->edt->update();
        header('location:/?action=admin-edt');
    }
    public function delete()
    {
        $this->edt->delete($_GET['id']);
    }
}