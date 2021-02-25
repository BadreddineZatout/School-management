<?php
require_once 'models/Model.php';
class Activite extends Model{

    public function getEleveActivites($eleve)
    {
        $query = $this->db->prepare('SELECT activites.* FROM (activites JOIN eleve_activite AS ea ON activites.id = ea.activite)  WHERE ea.eleve = ?');
        $query->execute([$eleve]);
        $rows = $query->fetchAll();
        return $rows;
    }
}