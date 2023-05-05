<?php
include ("../config.php");
include ("../entities/client.php");
class clientC
{
	function ajouterClient($client)
	{
       $sql = "INSERT INTO client (nom,prenom,age,num,email,mdp,role) values (:nom,:prenom,:age,:num,:email,:mdp,:role)";//requete sql
        $db= config::getConnexion();
        try {

        	$nom=$client->getNom();
            $prenom=$client->getPrenom(); 
            $age=$client->getAge();
            $num=$client->getNum();
        	$email=$client->getEmail();
        	$mdp=$client->getMdp();
            $mdp=password_hash($mdp,PASSWORD_DEFAULT);
        	$role=$client->getRole();
            $req = $db->prepare($sql);
            $req->bindValue(':nom', $nom);
            $req->bindValue(':prenom', $prenom);
            $req->bindValue(':age', $age);
            $req->bindValue(':num', $num);
            $req->bindValue(':email', $email);
            $req->bindValue(':mdp', $mdp);
            $req->bindValue(':role', $role);
            $req->execute();
        } catch (Exception $e) {
            echo 'erreur: ' . $e->getMessage();
        }
    }
    function nombreclient(){
		$sql="SELECT count(*) AS nclient FROM client";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());}}
    function afficher_return()
        {
            $config=new config();
            $instance=$config->getConnexion();

           $response=$instance->query('SELECT * FROM client');
            return $response;
        }
}
?>