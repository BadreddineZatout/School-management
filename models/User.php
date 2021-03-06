<?php
require 'Model.php';
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
    public function store()
    {
        $query = $this->db->prepare("INSERT INTO info_ecole (paragraphe, image) VALUES (?, ?)");
        $query->execute([$_POST['paragraphe'], 'data/images/'.$_FILES['image_add']['name']]);
    }
    public function update()
    {
        $query = $this->db->prepare("UPDATE info_ecole SET paragraphe=?WHERE id=?");
        $query->execute([$_POST['paraMAJ'], $_POST['id']]);
    }
    public function delete($id)
    {
        $query = $this->db->prepare("DELETE FROM info_ecole WHERE id=?");
        $query->execute([$id]);
    }
}