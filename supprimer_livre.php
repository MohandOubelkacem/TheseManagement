<?php


// ouvrir une connexion à la base de donnée 'database'

		$pdo = new PDO('mysql:dbname=database;host=localhost','root','');



// Suppression d'un livre 

	// préparation de la requète de suppression du livre 

$supprimerLivre= $pdo-> prepare('DELETE from livre Where id_livre= :num LIMIT 1');


	// liason du paramètre ':num'

$supprimerLivre-> bindValue(':num', $_GET['numLivre'], PDO::PARAM_INT); 

	// exécution de la requete delete 

$suppressionOk = $supprimerLivre-> execute();	


	// message de suppression ou echec de suppression du livre 
if ($suppressionOk) {
			$message= 'Le livre à été supprimé';
		}
		else
		{
			$message= 'echec de la suppression du livre';
		}

?>
