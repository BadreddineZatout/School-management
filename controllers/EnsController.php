<?php
require 'models/Enseignant.php';
class EnsController{

    public function EnsPage()
    {
        $ens = new Enseignant();
        $ens_rows = $ens->getEns($_GET['cycle']);
        require 'views/cycle/ens.php';
    }
}