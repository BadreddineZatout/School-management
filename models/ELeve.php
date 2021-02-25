<?php
require_once 'models/EDT.php';
require_once 'models/Model.php';
require_once 'models/Note.php';
require_once 'models/Activite.php';
class Eleve extends Model{

    public function getInfo($user){
        $query = $this->db->prepare("SELECT * FROM eleves JOIN eleve_class AS ec ON ec.eleve_id = eleves.id JOIN classes ON classes.id = ec.class_id WHERE user_id = ? ");
        $query->execute([$user]);
        $eleve = $query->fetch(PDO::FETCH_ASSOC);
        return $eleve;
    }
    public function getEDT($class)
    {
        $edt = new edt();
        return $edt->getEleveEDT($class);
    }
    public function getNotes($eleve_id)
    {
        $notes = new Note();
        return $notes->getEleveNotes($eleve_id);
    }
    public function getActivites($eleve_id)
    {
        $activites = new Activite();
        return $activites->getEleveActivites($eleve_id);
    }
}