<?php
require_once 'controllers/AdminController.php';
$ac = new AdminController();
switch($_GET['action']){
    case 'admin-article': 
        $ac->Categorie(1);
        break;
    case 'admin-ppt':
        $ac->Categorie(2);
        break;
    case 'admin-edt':
        $ac->Categorie(3); 
        break;
    case 'admin-ens': 
        $ac->Categorie(4);
        break;
    case 'admin-user': 
        $ac->Categorie(5);
        break;
    case 'admin-restau':
        $ac->Categorie(6);
        break;
    case 'admin-contact': 
        $ac->Categorie(7);
        break;
    case 'admin-param':
        $ac->Categorie(8);
        break;
}