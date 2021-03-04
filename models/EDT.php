<?php
require 'models/Model.php';
class edt extends Model{

    public function getEdt($cycle){
        if ($cycle < 1 || $cycle > 3) return NULL;
        else{
            $query = $this->db->prepare('SELECT edt.*, cycles.cycle, classes.classe FROM (edt JOIN cycles ON edt.cycle = cycles.id JOIN classes ON classes.id = edt.class)  WHERE cycles.id = ?');
            $query->execute([$cycle]);
            $rows = $query->fetchAll();
            return $rows;
        }
    }
    public function getEleveEDT($class)
    {
        $query = $this->db->prepare('SELECT edt.*, classes.classe FROM (edt JOIN classes ON classes.id = edt.class)  WHERE edt.class = ?');
        $query->execute([$class]);
        $rows = $query->fetchAll();
        return $rows;
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
        $query->execute([$_POST['paraMAJ'], $_POST['id']]);
    }
    public function delete($id)
    {
        $query = $this->db->prepare("DELETE FROM info_ecole WHERE id=?");
        $query->execute([$id]);
    }
}