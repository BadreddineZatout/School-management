<?php

class AdminController{

    private $type = 2;
    public function admin_page()
    {
        require 'views/admin.php';
    }
}