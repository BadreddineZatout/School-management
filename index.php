<?php
if (!isset($_GET['action'])){
    require_once ('./controllers/AcceuilController.php');
    main_page();
}else{
    switch($_GET['action']){
        case 'ecole':
            require_once ('./controllers/EcoleController.php');
            ppt_page();
            break;
        case 'ap':
            primaire_page();
            break;
        case 'am':
            cem_page();
            break;
        case 'as':
            lycee_page();
            break;
        case 'eleve':
            eleve_page();
            break;
        case 'parent':
            parent_page();
            break;
        case 'contact':
            contact_page();
            break;
    }
}
