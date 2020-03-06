


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport">
	<link rel="stylesheet" type="text/css" href="style_formulaire_ajout.css">
	<title>modification : résultat</title>
</head>
<body>


	<div id="corps">


<?php


// connexion a la base de donnée
$pdo = new PDO('mysql:dbname=database;host=localhost','root','');

// préparer les requetes de la selection de la base de donnée


$afficheRevue= $pdo-> prepare ('UPDATE revue set titre_revue=:titre, nom_coauteurs=:coauteurs, type_revue=:type, langue=:langue, date_de_parution=:date_parution, numero_revue=:numero WHERE id_article= :num LIMIT 1');

//liason des parametres només

$afficheRevue-> bindValue(':num', $_POST['numRevue'], PDO::PARAM_INT);

$afficheRevue-> bindValue(':titre', $_POST['titre_revue'], PDO::PARAM_STR);

$afficheRevue-> bindValue(':coauteurs', $_POST['nom_coauteurs'], PDO::PARAM_STR);

$afficheRevue-> bindValue(':type', $_POST['type_revue'], PDO::PARAM_STR);

$afficheRevue-> bindValue(':date_parution', $_POST['date_pub'], PDO::PARAM_STR);

$afficheRevue-> bindValue(':langue', $_POST['langue'], PDO::PARAM_STR);

$afficheRevue-> bindValue(':numero', $_POST['numero_revue'], PDO::PARAM_INT);


//execution de la requete

$executeIsOk= $afficheRevue->execute();


if ($executeIsOk)
{
	$message= "la revue a été lise à jour.";  
}
else
{
	$message= "echec de mise à jour de la revue."; 
}

?>




		
		<?= $message  ?>
		<p>Cliquez ici pour revenir a vos documents:<a href="bouton_ajouter_pub.php" >Bibliothèque</a> </p>


	</div>



</body>
</html>




