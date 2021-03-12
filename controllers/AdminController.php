<?php
class AdminController{

    private $type = 2;
    public function admin_page()
    {
        require 'views/admin.php';
    }
    public function Categorie($cat)
    {
        switch($cat){
            case 1: 
                require_once 'views/admin/article.php';
                break;
            case 2: 
                require_once 'views/admin/ppt.php';
                break;
            case 3:
                require_once 'views/admin/edt.php';
                break;
            case 4:
                require_once 'views/admin/ens.php';
                break;
            case 5:
                require_once 'views/admin/user.php';
                break;
            case 6:
                require_once 'views/admin/restau.php';
                break;
            case 7:
                require_once 'views/admin/contact.php';
                break;
            case 8:
                require_once 'DiaporamaController.php';
                $dc = new DiaporamaController();
                $images = $dc->getImages();
                require_once 'views/admin/parametre.php';
                break;
        }
    }
}