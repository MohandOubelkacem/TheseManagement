<?php

	// connexion a la base de donnée
$pdo = new PDO('mysql:dbname=database;host=localhost','root','');


// préparation de la requête de modification du livre

$modifierLivre= $pdo-> prepare('SELECT from livre Where id_livre= :num ');

// liason du paramètre ':num'

$modifierLivre-> bindValue(':num', $_GET['numLivre'], PDO::PARAM_INT); 

// executer la requete

$executeIsOk = $modifierLivre->execute();


// on récupère l'article

$livre= $modifierLivre->fetch();


?>


<!DOCTYPE html>
<html lang="fr">
<head>

	<meta charset="utf-8">
	<meta name="viewport">

	<link rel="stylesheet" type="text/css" href="style_formulaire_ajout.css">
	<title>Forme modification</title>
</head>


<body>
	<div id="corps">
		<div class= "formulaire_livre"> 
			
			<fieldset>
				<legend> <h2> Modifier un 'Livre': </h2></legend>
				
				<h3> Veuillez modifier les informations nécessaires :</h3>
							
					<form method = "POST" action="modifier_livre.php" enctype="multipart/form-data">
						
						<input type="hidden" name="numLivre" value=" <?= $livre['id_livre'] ?> "><br>

						<label for= "titre_livre"> <strong> Titre : </strong> </label> 
							<input type="text" id ="titre_livre" name ="titre" size ="30" maxlength = "100"  value=" <?= $livre['titre'] ?>" required> <br>
						
						<label for= "nom_auteur"> <strong>Nom de l'auteur : </strong> </label>
							<input type="text" id ="nom_auteur" name ="nom_auteur" size ="25" maxlength = "100"  value=" <?= $livre['nom_auteur'] ?>" required> <br>
						
						<label for= "nom_coauteur"> <strong> Noms des co-auteurs : </strong> </label>
							<input type="text" id ="nom_coauteur" name ="nom_coauteurs" size ="25" maxlength = "100" value=" <?= $livre['nom_coauteurs'] ?>" required> <br>										
							
						
						<label for= "date"> <strong> Date de la publication : </strong> </label>
							<input type="date" id ="date" name ="date_pub" size ="25" maxlength = "100"  value=" <?= $livre['date_pub'] ?>" required> <br>	
						
						<label for= "edit"> <strong> Edition du livre : </strong> </label>
							<input type="text" id ="edit" name ="edition" size ="25" maxlength = "100" value=" <?= $livre['edition'] ?>" required> <br>	
						
						<label for= "type_publication"> <strong>Le type de votre publication : </strong>
							<input type="text" id ="type_publication" name ="type_pub" size ="25" maxlength = "100"  value=" <?= $livre['type_pub'] ?>"><br> 
						
						
						<label for= "number"> <strong> Nombre de chapitre (livre) : </strong> </label>
							<input type="number" id ="number" name ="nombre_chapitre" size ="25" maxlength = "100"  value="<?= $livre['nombre_chapitre'] ?>"> <br>	
							
						<label for= "langue"> <strong> Langue de la publication: </strong> </label>
							<input type="text" id ="langue" name ="langue" size ="25" maxlength = "100" value=" <?= $livre['langue'] ?>" required> <br>		
						
						
						<label for = "Joindre votre fichier à publier :"> <strong> Joindre votre fichier à publier : </strong></label>
							<input type ="file" name ="fichier" value=" <?= $livre['fichier'] ?>"> <br>
					
							
							<input type="reset" value ="Recommencer"/> <br>
							<input type="submit" id="Sauvgarder" value ="Enregistrer les modifications" /> <br>						
								
					</form>
        </fieldset>
		
		</div>





		</div>

	</body>
</html>
