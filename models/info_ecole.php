<?php
require 'models/Model.php';

class info_ecole extends Model{
    private $id;
    private $paragrahe;
    private $image;

    public function get_info(){
        $sql = 'SELECT * FROM info_ecole';
        return $this->db->query($sql);
    }
}