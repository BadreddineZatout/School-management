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
        $query = $this->db->prepare("SELECT restauration.*, restauration.cycle AS cycle_id, cycles.cycle FROM restauration JOIN cycles ON restauration.cycle = cycles.id ORDER BY cycle_id");
        $query->execute();
        $rows = $query->fetchAll();
        return $rows;
    }
    public function store()
    {
        $query = $this->db->prepare("SELECT id FROM restauration WHERE cycle = ? AND jour = ?");
        $query->execute([$_POST['cycle'], $_POST['jour']]);
        $exist = $query->fetch(PDO::FETCH_ASSOC);
        if(!$exist){
            $query = $this->db->prepare("INSERT INTO restauration (repas, jour, cycle) VALUES (?, ?, ?)");
            $query->execute([$_POST['repas'], $_POST['jour'], $_POST['cycle']]);
        }
    }
    public function update()
    {
        $query = $this->db->prepare("SELECT id FROM restauration WHERE cycle = ? AND jour = ?");
        $query->execute([$_POST['cycleMAJ'], $_POST['jourMAJ']]);
        $exist = $query->fetch(PDO::FETCH_ASSOC);
        if(!$exist){
            $query = $this->db->prepare("UPDATE restauration SET repas=?, jour=?, cycle=? WHERE id=?");
            $query->execute([$_POST['repasMAJ'], $_POST['jourMAJ'], $_POST['cycleMAJ'], $_POST['id']]);
        }else{
            $query = $this->db->prepare("UPDATE restauration SET repas=? WHERE id=?");
            $query->execute([$_POST['repasMAJ'], $exist['id']]);
        }
    }
    public function delete($id)
    {
        $query = $this->db->prepare("DELETE FROM restauration WHERE id=?");
        $query->execute([$id]);
    }
}