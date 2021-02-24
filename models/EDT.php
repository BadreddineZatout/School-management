<?php
require 'models/Model.php';
class edt extends Model{

    public function getEdt($cycle){
        if ($cycle < 1 || $cycle > 3) return NULL;
        else{
            $query = $this->db->prepare('SELECT edt.*, cycles.cycle, classes.classe FROM (edt JOIN cycles ON edt.cycle = cycles.id JOIN classes ON classes.id = edt.class)  WHERE cycles.id = ?');
            $query->execute([$cycle]);
            $rows = $query->fetchAll();
            return $rows;
        }
    }
}