<?php
require_once 'models/Model.php';
class Remarque extends Model{
    public function getEleveRque($eleve)
    {
        $query = $this->db->prepare('SELECT remarques.*, enseignants.nom, enseignants.prenom, matieres.nom AS mat FROM (remarques JOIN enseignants ON remarques.ens_id = enseignants.id JOIN matieres ON matieres.code_mat=remarques.code_mat)  WHERE remarques.eleve_id = ?');
        $query->execute([$eleve]);
        $rows = $query->fetchAll();
        return $rows;
    }
}