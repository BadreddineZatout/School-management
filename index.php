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
            require_once ('./controllers/PrimaireController.php');
            primaire_page();
            break;
        case 'am':
            require_once ('./controllers/CEMController.php');
            cem_page();
            break;
        case 'as':
            require_once ('./controllers/LyceeController.php');
            lycee_page();
            break;
        case 'eleve':
            require_once ('./controllers/EleveController.php');
            eleve_page();
            break;
        case 'parent':
            require_once ('./controllers/ParentController.php');
            parent_page();
            break;
        case 'contact':
            require_once ('./controllers/ContactController.php');
            contact_page();
            break;
    }
}
