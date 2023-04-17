<?php
require_once "../model/users.php";
$users = new users();
$email = $_POST["email"];
$password = $_POST["password"];
$user = $users->getUser($email,$password);
header("Location: ../view/" . (isset($user) ? "table.php" : "dist/index.html"));