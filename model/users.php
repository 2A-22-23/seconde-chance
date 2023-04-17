<?php
require_once "config.php";

class users 
{
    private $db;
    public function __construct()
    {
        $this->db = (new config())->getDb();
    }
    public function __destruct()
    {
        $this->db = null;
    }
    public function addUser(user $user)
    {
        $req = $this->db->prepare("INSERT INTO users (nom, prenom, email, password) VALUES (:nom, :prenom, :email, :password)");
        $req->bindValue(":nom", $user->getNom());
        $req->bindValue(":prenom", $user->getPrenom());
        $req->bindValue(":email", $user->getEmail());
        $req->bindValue(":password", $user->getPassword());
        $req->execute();
    }
    public function getUser($email,$password)
    {
        $req = $this->db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        $req->bindValue(":email", $email);
        $req->bindValue(":password", $password);
        $req->execute();
        return $req->rowCount() >0 ? $req->fetch(PDO::FETCH_ASSOC) : null;
        
    }
    public function getUserbyId($id)
    {
        $req = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $req->bindValue(":id", $id);
        $req->execute();
        return $req->rowCount() >0 ? $req->fetch(PDO::FETCH_ASSOC) : null;
    }
    public function afficherUsers()
    {
        $req = $this->db->prepare("SELECT * FROM users");
        $req->execute();
        $users = $req->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
    public function deleteUser($id)
    {
        $req = $this->db->prepare("DELETE FROM users WHERE id = :id");
        $req->bindValue(":id", $_GET['id']);
        $req->execute();
    }
    public function updateUser(array $user)
    {
        $req = $this->db->prepare("UPDATE users SET nom = :nom, prenom = :prenom, email = :email, password = :password WHERE id = :id");
        $req->bindValue(":nom", $user['nom']);
        $req->bindValue(":prenom", $user['prenom']);
        $req->bindValue(":email", $user['email']);
        $req->bindValue(":password", $user['password']);
        $req->bindValue(":id", $user['id']);
        $req->execute();
    }
}