<?php
require 'models/Model.php';
class Restau extends Model{

    public function getRestau($cycle)
    {
        if ($cycle < 1 || $cycle > 3) return NULL;
        else{
            $query = $this->db->prepare('SELECT repas, jour FROM restauration WHERE cycle = ?');
            $query->execute([$cycle]);
            $rows = $query->fetchAll();
            return $rows;
        }
    }
}