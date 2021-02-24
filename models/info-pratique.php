<?php
require 'models/Model.php';
class InfoPratique extends Model{

    public function getInfos($cycle)
    {
        if ($cycle < 1 || $cycle > 3) return NULL;
        else{
            $query = $this->db->prepare('SELECT * FROM info_pratique WHERE cycle = ?');
            $query->execute([$cycle]);
            $rows = $query->fetchAll();
            return $rows;
        }
    }
}