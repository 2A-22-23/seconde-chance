<?php
include ("../core/clientC.php");

if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['age']) && isset($_POST['num']) && isset($_POST['email']) && isset($_POST['mdp']))
if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['age']) && !empty($_POST['num']) && !empty($_POST['email']) && !empty($_POST['mdp']))
{
	$client= new client( $_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['age'],$_POST['num'],$_POST['email'],$_POST['mdp'],$_POST['role']);
	$clientC=new clientC();
	$clientC->ajouterClient($client);
	header('Location: '.($client->getRole() == "user" ? 'b.html' : '../../oxygym admin/views/GestionClient.php'));
}
else
{
header('Location:inscription.php?error=1');
}

?>