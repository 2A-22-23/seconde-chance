<?php
require_once "../model/users.php";
require_once "../model/user.php";

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$password = $_POST['password'];
$user = new user($nom,$prenom,$email,$password);
$users = new users();
$users->addUser($user);
header("Location: ../view/table.php");