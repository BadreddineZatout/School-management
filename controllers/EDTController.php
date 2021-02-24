<?php
require 'models/EDT.php';
class EDTController{
    public function edt_page(){
        $edt = new edt();
        $edt_rows = $edt->getEdt($_GET['cycle']);
        require 'views/cycle/edt.php';
    }
}