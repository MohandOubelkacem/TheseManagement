
<!DOCTYPE html>
<html lang="fr">
<meta charset="utf-8" name="viewport">
<head>
	<title>Modifier livre </title>

	<link rel="stylesheet" type="text/css" href="style_formulaire_ajout.css">


</head>

<body>
	<div id="corps">

		<?php

	
			//ouverture d'une connexion a la bdd imsr_bd

			$pdo= new PDO('mysql:host=localhost;dbname=database','root', '');

		// on prépare la requete:	
$modifLivre= $pdo->prepare('UPDATE livre set titre_livre=:titre, nom_auteur=:nom_auteur, nom_coauteurs=:nom_coauteurs, edition=:edition, date_pub=:date_pub, type_livre=:type, langue=:langue, nombre_chapitres=:nbr WHERE id_livre=:num LIMIT 1');

		// liason des parametres nommés:

$modifLivre->bindValue(':num', $_POST['numLivre'], PDO::PARAM_INT);

$modifLivre-> bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);

$modifLivre-> bindValue(':nom_auteur', $_POST['nom_auteur'], PDO::PARAM_STR);

$modifLivre-> bindValue(':nom_coauteurs', $_POST['nom_coauteurs'], PDO::PARAM_STR);

$modifLivre-> bindValue(':edition', $_POST['edition'], PDO::PARAM_STR);

$modifLivre-> bindValue(':date_pub', $_POST['date_pub'], PDO::PARAM_STR);

$modifLivre-> bindValue(':type', $_POST['type_pub'], PDO::PARAM_STR);

$modifLivre-> bindValue(':langue', $_POST['langue'], PDO::PARAM_STR);

$modifLivre-> bindValue(':nbr', $_POST['nombre_chapitre'], PDO::PARAM_INT);


// execution de la requete:

$modifLivreIsOk=$modifLivre->execute();


if ($modifLivreIsOk) 
{
	$message= " Le livre a été mis à jour. ";
}
else
{
	$message= " Echec de mise a jour du livre. ";
}

?>


<p>	<?= $message ?>	<br>
	Cliquez ici pour revenir à votre bibliothèque: <a href="ajout_supp.php">Bibliothèque</a>	
</p>

	
		



	</div>
		


</body>
</html>
