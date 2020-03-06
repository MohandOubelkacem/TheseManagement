<?php


// ouvrir une connexion à la base de donnée 'database'

		$pdo = new PDO('mysql:dbname=database;host=localhost','root','');



// Suppression d'une revue

	// préparer la requête de suppression de la revue

$supprimerRevue= $pdo-> prepare('DELETE from revue Where id_revue= :num LIMIT 1');


	// liason du paramètre nommé

$supprimerRevue-> bindValue(':num', $_GET['numRevue'], PDO::PARAM_INT); 

	// exécution de la requete

$supprimerOk = $supprimerRevue-> execute();	

	// message de suppression ou echec de suppression

if ($supprimerOk) {
			$message= 'La revue à été supprimé';
		}
		else
		{
			$message= 'echec de la suppression de la revue';
		}


?>