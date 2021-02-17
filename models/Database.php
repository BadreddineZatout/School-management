<?php
class Database{
    private static $db;

    private function __construct()
    {
        
    }
    public static function getInstance(){
        if (self::$db == null)
        {
            self::$db = new PDO('mysql:host=localhost;dbname=ecole;charset=utf8', 'root', '');
        }
        return self::$db;
    }
}