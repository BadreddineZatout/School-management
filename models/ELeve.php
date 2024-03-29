<?php
require_once 'models/EDT.php';
require_once 'models/Model.php';
require_once 'models/Note.php';
require_once 'models/Activite.php';
require_once 'models/Remarque.php';
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
    public function getRemarques($eleve_id)
    {
        $rque = new Remarque();
        return $rque->getEleveRque($eleve_id);
    }
    public function getID($user)
    {
        $query = $this->db->prepare("SELECT id FROM eleves WHERE user_id = ? ");
        $query->execute([$user]);
        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    public function store($id)
    {
        $query = $this->db->prepare("INSERT INTO eleves (nom, prenom, adresse, email, telephone1, telephone2, telephone3, user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $query->execute([$_POST['nom'],$_POST['prenom'],$_POST['adresse'], $_POST['email'], $_POST['tele1'], $_POST['tele2'], $_POST['tele3'], $id]);
    }
    public function update()
    {
        $query = $this->db->prepare("UPDATE eleves SET nom=?, prenom= ?, adresse=?, email=?, telephone1=?, telephone2=?, telephone3=? WHERE user_id=?");
        $query->execute([$_POST['nomMAJ'], $_POST['prenomMAJ'], $_POST['adresseMAJ'], $_POST['emailMAJ'], $_POST['tele1MAJ'], $_POST['tele2MAJ'], $_POST['tele3MAJ'], $_POST['id']]);
    }
    public function delete($id)
    {
        $query = $this->db->prepare("SELECT id FROM eleves WHERE user_id = ?");
        $query->execute([$id]);
        $eleve = $query->fetch(PDO::FETCH_ASSOC)['id'];
        $query = $this->db->prepare("DELETE FROM eleve_activite WHERE eleve=?");
        $query->execute([$eleve]);
        $query = $this->db->prepare("DELETE FROM eleve_class WHERE eleve_id=?");
        $query->execute([$eleve]);
        $query = $this->db->prepare("DELETE FROM eleves WHERE id=?");
        $query->execute([$eleve]);
    }
}