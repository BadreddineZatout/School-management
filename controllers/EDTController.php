<?php
require 'models/EDT.php';
class EDTController{
    private $edt;
    
    public function __construct()
    {
        $this->edt = new edt();
    }
    public function edt_page(){
        $edt_rows = $this->edt->getEdt($_GET['cycle']);
        require 'views/cycle/edt.php';
    }
    public function getAll()
    {
        return json_encode($this->edt->getAll());
    }
    public function store()
    {   
        if ($_POST['cycle']!=0){
            $this->edt->store();
        }
        header('location:/?action=admin-edt');
    }
    public function update()
    {
        $this->edt->update();
        header('location:/?action=admin-edt');
    }
    public function delete()
    {
        $this->edt->delete($_GET['id']);
    }
    public function getClasses()
    {
        return json_encode($this->edt->getClasses());
    }
    public function getMatieres()
    {
        return json_encode($this->edt->getMatieres());
    }
    
}