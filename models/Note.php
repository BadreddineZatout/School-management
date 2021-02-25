<?php
require_once 'models/Model.php';
class Note extends Model{

    public function getEleveNotes($eleve)
    {
        $query = $this->db->prepare('SELECT notes.*, matieres.nom FROM (notes JOIN matieres ON notes.matiere = matieres.code_mat)  WHERE notes.eleve_id = ?');
        $query->execute([$eleve]);
        $rows = $query->fetchAll();
        return $rows;
    }
}