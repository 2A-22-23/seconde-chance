<?php
class config {
    private $db;
    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=web_gym;charset=utf8', 'root', '');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function __destruct()
    {
        $this->db = null;
    }
    public function getDb()
    {
        return $this->db;
    }
}