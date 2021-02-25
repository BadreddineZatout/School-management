<?php
require 'models/Model.php';
class Eleve extends Model{

    public function getInfo($user){
        $query = $this->db->prepare("SELECT * FROM eleves JOIN eleve_class AS ec ON ec.eleve_id = eleves.id JOIN classes ON classes.id = ec.class_id WHERE user_id = ? ");
        $query->execute([$user]);
        $eleve = $query->fetch(PDO::FETCH_ASSOC);
        return $eleve;
    }
}