<?php
require_once 'models/Model.php';
class Tuteur extends Model{

    public function getInfo($user){
        $query = $this->db->prepare("SELECT id, nom, prenom FROM parents WHERE user_id = ? ");
        $query->execute([$user]);
        $parent = $query->fetch(PDO::FETCH_ASSOC);
        $enfants = $this->getEnfant($parent['id']);
        return [$parent, $enfants];
    }
    public function getEnfant($parent)
    {
        $query = $this->db->prepare('SELECT eleves.nom, eleves.prenom FROM (eleves JOIN parent_eleve AS pe ON pe.enfant = eleves.id)  WHERE pe.parent = ?');
        $query->execute([$parent]);
        $enfants = $query->fetchall();
        return $enfants;
    }
}