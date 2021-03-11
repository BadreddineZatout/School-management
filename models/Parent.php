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
        $query = $this->db->prepare('SELECT eleves.user_id, eleves.nom, eleves.prenom FROM (eleves JOIN parent_eleve AS pe ON pe.enfant = eleves.id)  WHERE pe.parent = ?');
        $query->execute([$parent]);
        $enfants = $query->fetchall();
        return $enfants;
    }
    public function store($id)
    {
        $query = $this->db->prepare("INSERT INTO parents (nom, prenom, adresse, email, telephone1, telephone2, telephone3, user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $query->execute([$_POST['nom'],$_POST['prenom'],$_POST['adresse'], $_POST['email'], $_POST['tele1'], $_POST['tele2'], $_POST['tele3'], $id]);
    }
    public function update()
    {
        $query = $this->db->prepare("UPDATE parents SET nom=?, prenom= ?, adresse=?, email=?, telephone1=?, telephone2=?, telephone3=? WHERE user_id=?");
        $query->execute([$_POST['nomMAJ'], $_POST['prenomMAJ'], $_POST['adresseMAJ'], $_POST['emailMAJ'], $_POST['tele1MAJ'], $_POST['tele2MAJ'], $_POST['tele3MAJ'], $_POST['id']]);
    }
    public function delete($id)
    {
        $query = $this->db->prepare("SELECT id FROM parents WHERE user_id = ?");
        $query->execute([$id]);
        $parent = $query->fetch(PDO::FETCH_ASSOC)['id'];
        $query = $this->db->prepare("DELETE FROM parent_eleve WHERE parent=?");
        $query->execute([$parent]);
        $query = $this->db->prepare("DELETE FROM parents WHERE id=?");
        $query->execute([$parent]);
    }
}