<?php
require_once 'models/Parent.php';
class ParentController{
    private $type =1;
    function parent_page()
    {
        $infos = $this->getInfo($_SESSION['id']);
        $parent = $infos[0];
        $enfants = $infos[1];
        require_once 'views/parent.php';
    }
    public function getInfo($user_id)
    {
        $parent = new Tuteur();
        return $parent->getInfo($user_id);
    }
}