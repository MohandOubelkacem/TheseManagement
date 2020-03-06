<?php

// connexion a la base de donnée 


$pdo= new PDO('mysql:host=localhost;dbname=database', 'root', '');

//préparation de la requete update

$afficheConference = $pdo-> prepare('UPDATE conference set titre_conf=:titre, nom_auteur=:nom_auteur, nom_coauteurs=:coauteurs, theme=:theme, type_conf=:type, edition=:edition, date_conf= :date_conf, lieu=:lieu, langue=:langue, fichier=:fichier WHERE id_conf= :num');



// liason des parametres nommés
$afficheConference-> bindValue(':num', $_POST['numConference'], PDO::PARAM_INT);

$afficheConference-> bindValue(':titre', $_POST['titre_conf'], PDO::PARAM_STR);

$afficheConference-> bindValue(':nom_auteur', $_POST['nom_auteur'], PDO::PARAM_STR);

$afficheConference-> bindValue(':coauteurs', $_POST['nom_coauteurs'], PDO::PARAM_STR);

$afficheConference-> bindValue(':theme', $_POST['theme'], PDO::PARAM_STR);

$afficheConference-> bindValue(':type', $_POST['type_conf'], PDO::PARAM_STR);

$afficheConference-> bindValue(':edition', $_POST['edition'], PDO::PARAM_STR);

$afficheConference-> bindValue(':date_conf', $_POST['date_conf'], PDO::PARAM_STR);

$afficheConference-> bindValue(':lieu', $_POST['lieu'], PDO::PARAM_STR);

$afficheConference-> bindValue(':langue', $_POST['langue'], PDO::PARAM_STR);

$afficheConference-> bindValue(':fichier', $_POST['fichier'], PDO::PARAM_STR);

//executer la requete:

$executeIsOk = $afficheConference->execute();


if ($executeIsOk) {
	$msg= "la conférence à été mis à jour.";
}
else{
	$msg= "echec de la mise à jour de la conférence.";
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






