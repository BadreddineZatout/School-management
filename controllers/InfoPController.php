<?php
require 'models/info-pratique.php';
class InfoPController{

    public function infoPratiquePage(){
        $ip = new InfoPratique();
        $infos = $ip->getInfos($_GET['cycle']);
        require 'views/cycle/info-pratique.php';
    }
}