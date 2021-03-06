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
        $query = $this->db->prepare("SELECT edt.*, cycles.cycle, classes.classe FROM (edt JOIN cycles ON edt.cycle = cycles.id JOIN classes ON classes.id = edt.class) ORDER BY cycles.id");
        $query->execute();
        $rows = $query->fetchAll();
        return $rows;
    }
    public function store()
    {
        $query = $this->db->prepare("SELECT id FROM edt WHERE cycle = ? AND class=? AND jour = ?");
        $query->execute([$_POST['cycle'], $_POST['class'], $_POST['jour']]);
        $exist = $query->fetch(PDO::FETCH_ASSOC);
        if(!$exist){
            $query = $this->db->prepare("INSERT INTO edt (cycle, class, jour, t1, t2, t3, t4, t5, t6, t7, t8) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $t1 = empty($_POST['t1'])?NULL:$_POST['t1'];
            $t2 = empty($_POST['t2'])?NULL:$_POST['t2'];
            $t3 = empty($_POST['t3'])?NULL:$_POST['t3'];
            $t4 = empty($_POST['t4'])?NULL:$_POST['t4'];
            $t5 = empty($_POST['t5'])?NULL:$_POST['t5'];
            $t6 = empty($_POST['t6'])?NULL:$_POST['t6'];
            $t7 = empty($_POST['t7'])?NULL:$_POST['t7'];
            $t8 = empty($_POST['t8'])?NULL:$_POST['t8'];
            $query->execute([$_POST['cycle'], $_POST['class'], $_POST['jour'], $t1, $t2, $t3, $t4, $t5, $t6, $t7, $t8]);
        }
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
    public function getClasses()
    {
        $query = $this->db->prepare("SELECT * FROM classes WHERE cycle=?");
        $query->execute([$_GET['cycle']]);
        return $query->fetchAll();
    }
    public function getMatieres()
    {
        $query = $this->db->prepare("SELECT * FROM matieres");
        $query->execute();
        return $query->fetchAll();
    }
}