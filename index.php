<?php
require ('./controllers/AcceuilController.php');
if (!isset($_GET['action'])){
    main_page();
}
