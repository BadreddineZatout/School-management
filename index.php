<?php
session_start();
if (!isset($_GET['action'])){
    require_once ('./controllers/AcceuilController.php');
    $ac = new AcceuilController();
    $ac->main_page();
}else{
    switch($_GET['action']){
        case 'ecole':
            require_once ('./controllers/EcoleController.php');
            $ec = new EcoleController();
            $ec->ppt_page();
            break;
        case 'ap':
            require_once ('./controllers/PrimaireController.php');
            $pc = new PrimaireController();
            $pc->primaire_page();
            break;
        case 'am':
            require_once ('./controllers/CEMController.php');
            $cc = new CEMController();
            $cc->cem_page();
            break;
        case 'as':
            require_once ('./controllers/LyceeController.php');
            $lc = new LyceeController();
            $lc->lycee_page();
            break;
        case 'eleve':
            require_once ('./controllers/EleveController.php');
            $ec = new EleveController();
            $ec->eleve_page();
            break;
        case 'parent':
            require_once ('./controllers/ParentController.php');
            $pc = new ParentController();
            $pc->parent_page();
            break;
        case 'admin':
            require_once ('./controllers/AdminController.php');
            $ac = new AdminController();
            $ac->admin_page();
            break;
        case 'contact':
            require_once ('./controllers/ContactController.php');
            $cc = new ContactController();
            $cc->contact_page();
            break;
        case 'eleve_login':
            require_once ('./controllers/UserController.php');
            $us = new UserController(0);
            $us->login_page();
            break;
        case 'parent_login':
            require_once ('./controllers/UserController.php');
            $us = new UserController(1);
            $us->login_page();
            break;
        case 'admin_login':
            require_once ('./controllers/UserController.php');
            $us = new UserController(2);
            $us->login_page();
            break;
        case 'edt':
            require_once ('./controllers/EDTController.php');
            $ec = new EDTController();
            $ec->edt_page();
            break;
        case 'ens':
            require_once ('./controllers/EnsController.php');
            $ec = new EnsController();
            $ec->EnsPage();
            break;
        case 'info-pratique':
            require_once ('./controllers/InfoPController.php');
            $ic = new InfoPController();
            $ic->infoPratiquePage();
            break;
        case 'restau':
            require_once ('./controllers/RestauController.php');
            $rc = new RestauController();
            $rc->RestauPage();
            break;
        case 'article':
            require('./controllers/AcceuilController.php');
            $ac = new AcceuilController();
            $ac->article_page();
            break;
        case 'notes':
            require_once ('./controllers/EleveController.php');
            $ec = new EleveController();
            echo ($ec->getNotes());
            break;
    }
}
