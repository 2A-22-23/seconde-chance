<?php
require_once "../model/users.php";

$users = new users();
$users->deleteUser($_GET['id']);
header("Location: ../view/table.php");