<?php
require 'models/Model.php';

class Contact extends Model{

    public function get_contact(){
        $sql = 'SELECT * FROM contact';
        return $this->db->query($sql);
    }
    public function getAll()
    {
        $query = $this->db->prepare("SELECT * FROM contact");
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function store()
    {
        $query = $this->db->prepare("SELECT count(*) AS count FROM contact");
        $query->execute();
        $count = $query->fetch(PDO::FETCH_ASSOC);
        if ($count['count']<1){
            $query = $this->db->prepare("INSERT INTO contact (id, adresse, telephone, fax) VALUES (0, ?, ?, ?)");
            $query->execute([$_POST['adresse'], $_POST['phone'], $_POST['fax']]);
        }
        else{
            $query = $this->db->prepare("UPDATE contact SET adresse=?, telephone=?, fax=? WHERE id=0");
            $query->execute([$_POST['adresse'], $_POST['phone'], $_POST['fax']]);
        }
    }
    public function delete()
    {
        $query = $this->db->prepare("DELETE FROM contact WHERE id=0");
        $query->execute();
    }
}