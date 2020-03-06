<?php


// ouvrir une connexion à la base de donnée 'database'

		$pdo = new PDO('mysql:dbname=database;host=localhost','root','');


// Suppression d'une conférence

	// préparer la requête de suppression de la conférence

$supprimerConference= $pdo-> prepare('DELETE from conference Where id_conf= :num LIMIT 1');


	// liason du paramètre nommé

$supprimerConference-> bindValue(':num', $_GET['numConference'], PDO::PARAM_INT); 

	// exécution de la requete

$suppOk = $supprimerConference-> execute();	

	// message de suppression ou echec de suppression de la conférence

if ($suppOk) {
			$message= 'La conférence à été supprimé';
		}
		else
		{
			$message= 'echec de la suppression de la conférence';
		}

?>