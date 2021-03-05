<?php
require 'models/Model.php';
class Restau extends Model{

    public function getRestau($cycle)
    {
        if ($cycle < 1 || $cycle > 3) return NULL;
        else{
            $query = $this->db->prepare('SELECT repas, jour FROM restauration WHERE cycle = ?');
            $query->execute([$cycle]);
            $rows = $query->fetchAll();
            return $rows;
        }
    }
    public function getAll()
    {
        $query = $this->db->prepare("SELECT restauration.*, restauration.cycle AS cycle_id, cycles.cycle FROM restauration JOIN cycles ON restauration.cycle = cycles.id");
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