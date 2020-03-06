
<?php


	// ouvrir une connexion à la base de donnée 'database'

		$pdo = new PDO('mysql:dbname=database;host=localhost','root','');




 //Suppression d'un article


	// préparation de la requête de suppression de l'article

$supprimerArticle= $pdo-> prepare('DELETE from article Where id_article= :num LIMIT 1');


	// liason du paramètre ':num'

$supprimerArticle-> bindValue(':num', $_GET['numArticle'], PDO::PARAM_INT); 

	// exécution de la requete

$suppArticleOk = $supprimerArticle-> execute();	

// un message de réussite de suppression ou bien echec
/*	if ($suppArticleOk) {
			$message= 'L\'article à été supprimé';
		}
		else
		{
			$message= 'Echec de la suppression de l\'article';
		} 

*/


 //Suppression d'une revue

	// préparer la requête de suppression de la revue

$supprimerRevue= $pdo-> prepare('DELETE from revue Where id_revue= :num LIMIT 1');


	// liason du paramètre nommé

$supprimerRevue-> bindValue(':num', $_GET['numRevue'], PDO::PARAM_INT); 

	// exécution de la requete

$suppRevueOk = $supprimerRevue-> execute();	

// un message de réussite de suppression ou bien echec

/*	if ($suppRevueOk) 
		{
			$message= 'La revue à été supprimé';
		}
		else{ 
			$message= 'Echec de la suppression de la revue';
			}
*/

// Suppression d'un livre 

	// préparation de la requète de suppression du livre 

$supprimerLivre= $pdo-> prepare('DELETE from livre Where id_livre= :num LIMIT 1');


	// liason du paramètre ':num'

$supprimerLivre-> bindValue(':num', $_GET['numLivre'], PDO::PARAM_INT); 

	// exécution de la requete delete 

$suppLivreOk = $supprimerLivre-> execute();	

// un message de réussite de suppression ou bien echec
   /* if ($suppLivreOk) 
		{
			$message= 'Le livre à été supprimé';
		}
		else{ 
			$message= 'Echec de la suppression du livre';
			}

*/


// Suppression d'une conférence

	// préparer la requête de suppression de la conférence

$supprimerConference= $pdo-> prepare('DELETE from conference Where id_conf= :num LIMIT 1');


	// liason du paramètre nommé

$supprimerConference-> bindValue(':num', $_GET['numConference'], PDO::PARAM_INT); 

	// exécution de la requete

$suppConferenceOk = $supprimerConference-> execute();	

// un message de réussite de suppression ou bien echec

 /* if ($suppConferenceOk)
		{
			$message="La conférence a été supprimé";	
		}
		else
		{
			$message="Echec de la suppression de la conférence" ;
		}
		*/
	
		
	if ($suppArticleOk) 
	{
		$message= "L'article a été supprimé."; 
	}		
	elseif (!$suppArticleOk) 
	{
		$message= "Echec de suppression de l'article.";		
	}
	elseif ($suppRevueOk) 
	{
		$message="La revue a été supprimé.";
	}
	elseif (!$suppRevueOk) 
	{
		$message="Lchec de suppression de la revue.";
	}
	elseif ($suppLivreOk) 
	{
		$message="Le livre a été supprimé.";
	}
	elseif (!$suppLivreOk)
	{
		$message="Echec de suppression du livre."; 
	}
	elseif ($suppConferenceOk) 
	{
		$message="La conférence a été supprimé.";
	}
	elseif (!$suppConferenceOk) 
	{
		$message="Echec de suppression de la conférence."; 
	}

 

?>


<!DOCTYPE html>
<html lang="fr">
<head>

	<meta charset="utf-8">
	<meta name="viewport">

	<link rel="stylesheet" type="text/css" href="style_formulaire_ajout.css">
	<title>Mes documents</title>
</head>


<body>
	<div id="corps">
	<h1>Suppression</h1>

	<p><?= $message ?></p>

<p>cliquer ici pour revenir à votre bibliothèque: <a href="bouton_ajouter_pub.php">bibliothèque</a> </p>
 	</div>

</body>
</html>
