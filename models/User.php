<?php
require 'Model.php';
class User extends Model{
    private $id;
    private $username;
    private $password;
    private $type;

    public function login($user, $pdw)
    {
        $query = $this->db->prepare("SELECT id, type FROM users WHERE username = ? AND password = ? ");
        $query->execute([$user, $pdw]);
        $rows = $query->fetch(PDO::FETCH_ASSOC);
        return [!empty($rows), $rows];
    }
}