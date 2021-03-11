<?php
require_once 'models/Model.php';
require_once 'models/Eleve.php';
require_once 'Parent.php';
require_once 'Enseignant.php';
class User extends Model{

    public function login($user, $pdw)
    {
        $query = $this->db->prepare("SELECT id, type FROM users WHERE username = ? AND password = ? ");
        $query->execute([$user, $pdw]);
        $rows = $query->fetch(PDO::FETCH_ASSOC);
        return [!empty($rows), $rows];
    }
    public function getAll()
    {
        $sql1 = "(SELECT admin.*, users.*, users.id AS user_id FROM admin JOIN users ON admin.user_id=users.id) ";
        $sql2 = "UNION (SELECT parents.*, users.*, users.id AS user_id FROM parents JOIN users ON parents.user_id=users.id) ";
        $sql3 = "UNION (SELECT enseignants.id, enseignants.nom, enseignants.prenom, enseignants.adresse, enseignants.email, enseignants.telephone1, enseignants.telephone2, enseignants.telephone3, enseignants.user_id, users.*, users.id AS user_id FROM enseignants JOIN users ON enseignants.user_id=users.id) ";
        $sql4= "UNION (SELECT eleves.id, eleves.nom, eleves.prenom, eleves.adresse, eleves.email, eleves.telephone1, eleves.telephone2, eleves.telephone3, eleves.user_id, users.*, users.id AS user_id FROM eleves JOIN users ON eleves.user_id=users.id) ";
        $query = $this->db->prepare($sql1.$sql2.$sql3.$sql4);
        $query->execute();
        $rows = $query->fetchAll();
        return $rows;
    }
    public function existe()
    {
        $query = $this->db->prepare("SELECT id FROM users WHERE username = ?");
        $query->execute([$_POST['userMAJ']]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function store()
    {
        $query = $this->db->prepare("INSERT INTO users (username, password, type) VALUES (?, ?, ?)");
        $query->execute([$_POST['user'],$_POST['pdw'],$_POST['type']]);
        $query = $this->db->prepare("SELECT max(id) as id FROM users");
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC)['id'];
    }
    public function storeEleve($id)
    {
        $eleve = new Eleve();
        $eleve->store($id);   
    }
    public function storeParent($id)
    {
        $parent = new Tuteur();
        $parent->store($id);
    }
    public function storeEns($id)
    {
        $ens = new Enseignant();
        $ens->storeEns($id);
    }
    public function storeAdmin($id)
    {
        $query = $this->db->prepare("INSERT INTO admin (nom, prenom, adresse, email, telephone1, telephone2, telephone3, user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $query->execute([$_POST['nom'],$_POST['prenom'],$_POST['adresse'], $_POST['email'], $_POST['tele1'], $_POST['tele2'], $_POST['tele3'], $id]);
    }
    public function update()
    {
        $query = $this->db->prepare("UPDATE users SET username=?, password= ? WHERE id=?");
        $query->execute([$_POST['userMAJ'], $_POST['pdwMAJ'], $_POST['id']]);
    }
    public function updateEleve()
    {
        $eleve = new Eleve();
        $eleve->update();  
    }
    public function updateParent()
    {
        $parent = new Tuteur();
        $parent->update();   
    }
    public function updateEns()
    {
        $ens = new Enseignant();
        $ens->updateEns();
    }
    public function updateAdmin()
    {
        $query = $this->db->prepare("UPDATE admin SET nom=?, prenom= ?, adresse=?, email=?, telephone1=?, telephone2=?, telephone3=? WHERE user_id=?");
        $query->execute([$_POST['nomMAJ'], $_POST['prenomMAJ'], $_POST['adresseMAJ'], $_POST['emailMAJ'], $_POST['tele1MAJ'], $_POST['tele2MAJ'], $_POST['tele3MAJ'], $_POST['id']]);   
    }
    public function delete($id)
    {
        $query = $this->db->prepare("DELETE FROM users WHERE id=?");
        $query->execute([$id]);
    }
    public function deleteEleve($id)
    {
        $eleve = new Eleve();
        $eleve->delete($id);
    }
    public function deleteParent($id)
    {
        $parent = new Tuteur();
        $parent->delete($id);
    }
    public function deleteEns($id)
    {
        $ens = new Enseignant();
        $ens->deleteEns($id);
    }
    public function deleteAdmin($id)
    {
        $query = $this->db->prepare("DELETE FROM admin WHERE user_id=?");
        $query->execute([$id]);
    }
}