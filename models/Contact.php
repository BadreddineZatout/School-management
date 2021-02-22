<?php
require 'models/Model.php';

class Contact extends Model{
    private $id;
    private $adresse;
    private $telphone;
    private $fax;

    public function get_contact(){
        $sql = 'SELECT * FROM contact';
        return $this->db->query($sql);
    }
}