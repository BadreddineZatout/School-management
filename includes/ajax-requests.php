<?php
switch ($_GET['action']) {
    case 'notes':
        require_once('./controllers/EleveController.php');
        $ec = new EleveController();
        echo($ec->getNotes());
        break;
    case 'activites':
        require_once('./controllers/EleveController.php');
        $ec = new EleveController();
        echo($ec->getActivites());
        break;
    case 'remarques':
        require_once('./controllers/EleveController.php');
        $ec = new EleveController();
        echo($ec->getRemarques());
        break;
    }