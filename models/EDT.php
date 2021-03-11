<?php
require_once 'models/Model.php';
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
        $query = $this->db->prepare("SELECT edt.*, edt.cycle AS cycle_id, cycles.cycle, classes.classe FROM (edt JOIN cycles ON edt.cycle = cycles.id JOIN classes ON classes.id = edt.class) ORDER BY cycles.id");
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
        $t1 = empty($_POST['tMAJ1'])?NULL:$_POST['tMAJ1'];
        $t2 = empty($_POST['tMAJ2'])?NULL:$_POST['tMAJ2'];
        $t3 = empty($_POST['tMAJ3'])?NULL:$_POST['tMAJ3'];
        $t4 = empty($_POST['tMAJ4'])?NULL:$_POST['tMAJ4'];
        $t5 = empty($_POST['tMAJ5'])?NULL:$_POST['tMAJ5'];
        $t6 = empty($_POST['tMAJ6'])?NULL:$_POST['tMAJ6'];
        $t7 = empty($_POST['tMAJ7'])?NULL:$_POST['tMAJ7'];
        $t8 = empty($_POST['tMAJ8'])?NULL:$_POST['tMAJ8'];
        $query = $this->db->prepare("SELECT id FROM edt WHERE cycle = ? AND class=? AND jour = ?");
        $query->execute([$_POST['cycleMAJ'], $_POST['classMAJ'], $_POST['jourMAJ']]);
        $exist = $query->fetch(PDO::FETCH_ASSOC);
        if(!$exist){
            $query = $this->db->prepare("UPDATE edt SET cycle=?, class=?, jour=?, t1=?, t2=?, t3=?, t4=?, t5=?, t6=?, t7=?, t8=? WHERE id=?");
            $query->execute([$_POST['cycleMAJ'], $_POST['classMAJ'], $_POST['jourMAJ'], $t1, $t2, $t3, $t4, $t5, $t6, $t7, $t8, $_POST['id']]);
        }else{
            $query = $this->db->prepare("UPDATE edt SET t1=?, t2=?, t3=?, t4=?, t5=?, t6=?, t7=?, t8=? WHERE id=?");
            $query->execute([$t1, $t2, $t3, $t4, $t5, $t6, $t7, $t8, $exist['id']]);
        }
    }
    public function delete($id)
    {
        $query = $this->db->prepare("DELETE FROM edt WHERE id=?");
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