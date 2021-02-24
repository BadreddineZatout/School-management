<?php
require 'models/Restau.php';
class RestauController{

    public function RestauPage()
    {
        $restau = new Restau();
        $menu = $restau->getRestau($_GET['cycle']);
        require 'views/cycle/restau.php';
    }
}