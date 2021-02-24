<?php
require 'models/Model.php';
class Enseignant extends Model{

    public function getEns($cycle)
    {
        if ($cycle < 1 || $cycle > 3) return NULL;
        else{
            $query = $this->db->prepare('SELECT nom, prenom, temps_recep FROM enseignants WHERE cycle = ?');
            $query->execute([$cycle]);
            $rows = $query->fetchAll();
            return $rows;
        }
    }
}