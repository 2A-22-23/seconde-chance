<?php
require_once "../model/users.php";
$users = new users();
if(isset($_GET['update']))
{
    $users->updateUser($_POST);
    header("Location: ../view/table.php");
}
$user = $users->getUserById($_GET['id']);
var_dump($user);
?>

<form method="post" action="./update.php?update=ok">
					<input type="text" name="nom" placeholder="nom"  value="<?= $user['nom']?>"required="">
					<input type="text" name="prenom" placeholder="prenom"  value="<?= $user['prenom']?>"required="">
					<input type="email" name="email" placeholder="Email"  value="<?= $user['email']?>"required="">
						<input type="password" name="password" placeholder="Password" value="<?= $user['password']?>" required="">
					<input type="password" name="id" placeholder="id" value="<?= $user['id']?>" required="">>
					<button type="submit">Sign up</button>
</form>
