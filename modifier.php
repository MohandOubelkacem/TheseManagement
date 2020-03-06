<?php


// connexion a la base de donnée
$pdo = new PDO('mysql:dbname=database;host=localhost','root','');

// préparer les requetes de la selection de la base de donnée


$afficheArticle= $pdo-> prepare ('UPDATE article set titre_article= :titre_article, nom_auteur=:nom_auteur, nom_coauteurs=:nom_coauteurs , date_pub=:date_pub, type_article=:type_article, langue=:langue WHERE id_article= :num LIMIT 1');


  

	// liason des parametres nommés
$afficheArticle-> bindValue(':num', $_POST['numArticle'], PDO::PARAM_INT);

$afficheArticle-> bindValue(':titre_article', $_POST['titre_article'], PDO::PARAM_STR);

$afficheArticle-> bindValue(':nom_auteur', $_POST['nom_auteur'], PDO::PARAM_STR);

$afficheArticle-> bindValue(':nom_coauteurs', $_POST['nom_co_auteur'], PDO::PARAM_STR);

$afficheArticle-> bindValue(':date_pub', $_POST['date'], PDO::PARAM_STR);

$afficheArticle-> bindValue(':type_article', $_POST['type_article'], PDO::PARAM_STR);

$afficheArticle-> bindValue(':langue', $_POST['langue'], PDO::PARAM_STR);



//executer la requete:

$executeIsOk = $afficheArticle->execute();


if ($executeIsOk) {
	$msg= "l'article a été mis à jour.";
}
else{
	$msg= "echec de la mise à jour de l'article.";
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="Viewport">
	<link rel="stylesheet" type="text/css" href="style_formulaire_ajout.css">

	<title>Modification : resultat</title>
</head>

<body>
	<div id="corps">

<h1>Résultat de la modification :</h1>

<p>  <?= $msg ?>  </p>

<p>	cliquez ici pour revenir à vos documents : <a href="bouton_ajouter_pub.php">Bibliothèque</a>	</p>

</div>

</body>
</html>







