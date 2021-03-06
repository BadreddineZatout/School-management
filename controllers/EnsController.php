<?php
require 'models/Enseignant.php';
class EnsController{
    private $ens;
    public function __construct()
    {
        $this->ens = new Enseignant();   
    }
    public function EnsPage()
    {
        $ens_rows = $this->ens->getEns($_GET['cycle']);
        require 'views/cycle/ens.php';
    }
    public function getAll()
    {
        if(isset($_GET['ens'])){
            return json_encode($this->ens->getInfo($_GET['ens']));
        }else return json_encode($this->ens->getAll());
    }
    public function getClasses()
    {
        return json_encode($this->ens->getClasses());
    }
    public function store()
    {
        var_dump($_POST);
        $this->ens->store();
        header('location:/?action=admin-ens');
    }
    public function update()
    {
        $this->ens->update();
        header('location:/?action=admin-ens');
    }
    public function delete()
    {
        $this->ens->delete($_GET['id']);
    }
}