<?php
require 'models/Model.php';

class info_ecole extends Model{

    public function get_info(){
        $sql = 'SELECT * FROM info_ecole';
        return $this->db->query($sql);
    }
    public function getAll()
    {
        $query = $this->db->prepare("SELECT * FROM info_ecole ORDER BY id DESC");
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
        $query->execute([$_POST['titreMAJ'], $_POST['id']]);
    }
    public function delete($id)
    {
        $query = $this->db->prepare("DELETE FROM info_ecole WHERE id=?");
        $query->execute([$id]);
    }
}