<?php

	// connexion a la base de donnée
$pdo = new PDO('mysql:dbname=database;host=localhost','root','');


// préparation de la requête de modification de l'article

$modifierArticle= $pdo-> prepare('SELECT from article Where id_article= :num ');

// liason du paramètre ':num'

$modifierArticle-> bindValue(':num', $_GET['numArticle'], PDO::PARAM_INT); 

// executer la requete

$executeIsOk = $modifierArticle->execute();


// on récupère l'article

$article= $modifierArticle->fetch();


?>



<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport">
		<title>forme modification</title>

		<link rel="stylesheet" type="text/css" href="style_formulaire_ajout.css">

</head>

<body>

<div id="corps">
		<fieldset>
				<legend> <h2> Modifier un 'Article' </h2></legend>
				
				<h3> Veuillez modifier les informations nécessaires :</h3>
					
					<form method = "post" action = "modifier.php" enctype="multipart/form-data">
						
						<input type="hidden" name="numArticle" value="<?= $article['id_article'] ?>">

						<label for= "titre"> <b> Titre : </b> </label> 
							<input type="text" id ="titre_article" name ="titre_article" size ="30" maxlength = "100"  value="<?= $article['titre_article'] ?> " required> <br>
						
						<label for= "nom_auteur"> <b>Nom de l'auteur : </b> </label>
							<input type="text" id ="nom_auteur" name ="nom_auteur" size ="25" maxlength = "100"  value="<?= $article['nom_auteur'] ?> " required> <br>

						
						<label for= "nom_co_auteur"> <b> Noms des co-auteurs : </b> </label>
							<input type="text" id ="nom_co_auteur" name ="nom_co_auteur" size ="25" maxlength = "100"  value="<?= $article['nom_coauteurs'] ?> " >  <br>	
						
						<label for= "date"> <b> Date de publication de l'article: </b> </label>
							<input type="date" id ="date_pub" name ="date_pub" size ="25" maxlength = "100" value="<?= $article['date_pub'] ?> "  required> <br>	
						
						<label for= "date"> <strong> Le type de votre article : </strong> 
						</label>
							<input type="text" name="type_article" id="date" size="25" maxlength="100" value="<?= $article['type_article'] ?>" > <br>	

						<label for= "langue"> <strong> Langue : </strong> 
						</label>
							<input type="text" name="langue" id="langue" size="25" maxlength="100" value="<?= $article['langue'] ?>" > <br>	
	

						<label for = "Joindre votre fichier à publier :"> <b> Joindre votre fichier à publier : </b></label>
							<input type ="file" name ="fichier" value="<?= $article['fichier'] ?>"> <br>
					
							
							<input type="reset" name ="Recommencer" value ="Recommencer"> <br>
							<input type="submit" name ="enregistrer" value ="Enregistrer les modifications"> <br>						
								
					</form>
        </fieldset>
	</div>

</body>
</html>

