<?php

	// connexion a la base de donnée
$pdo = new PDO('mysql:dbname=database;host=localhost','root','');


// préparation de la requête de modification de la revue

$modifierRevue= $pdo-> prepare('SELECT from revue Where id_revue= :num ');

// liason du paramètre ':num'

$modifierRevue-> bindValue(':num', $_GET['numRevue'], PDO::PARAM_INT); 

// executer la requete

$executeIsOk = $modifierRevue->execute();


// on récupère l'article

$revue= $modifierRevue->fetch();


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
				<legend> <h2> Modifier une 'Revue' </h2></legend>
				
				<h3> Veuillez modifier les informations nécessaires pour cette revue :</h3>
					
					<form method = "post" action = "modifier_revue.php" enctype="multipart/form-data">
						<input type="hidden" name="numRevue" value="<?= $revue['id_revue'] ?>"><br>
						
						<label for= "titre"> <b> Titre : </b> </label> 
							<input type="text" id ="titre_revue" name ="titre_revue" size ="30" maxlength = "100"  value=" <?= $revue['titre_revue'] ?>" required> <br>						
						
						<label for= "nom_coauteurs"> <b> Noms des co-auteurs : </b> </label>
							<input type="text" id ="nom_coauteurs" name ="nom_coauteurs" size ="25" maxlength = "100"  value=" <?= $revue['nom_coauteurs'] ?>" > 	<br>									
						
						
						<label for= "type_revue" > <strong> <b> Le type de la revue : </b> </strong> </label>
						<input type="text" id="type_revue" name="type_revue" value=" <?= $revue['type_revue'] ?>" > <br>							
						<label for= "date"> <b> Date de publication de la revue: </b> </label>
							<input type="date" id="date" name="date_pub" value=" <?= $revue['date_pub'] ?>" required> <br>	
						
						<label for= "edition"> <b> Edition de la revue : </b> </label>
							<input type="text" id ="edition" name ="edition" size ="25" maxlength = "100"  value=" <?= $revue['edition'] ?>" > <br>	
						
						<label for= "text"> <b> La langue de la publication: </b> </label>
							<input type="text" id ="langue" name ="langue" size ="25" maxlength = "100"  value=" <?= $revue['langue'] ?>" required> <br>	
							
							
						<label for= "numero"> <b> Numéro de la revue : </b> </label>
							<input type="number" id ="numero" name ="numero_revue" size ="25" maxlength = "100" value=" <?= $revue['numero_revue'] ?>" > <br>
				
			
							
						<label for = "Joindre votre fichier à publier :"> <b> Joindre votre fichier à publier : </b></label>
							<input type ="file" name ="fichier"> <br>
					
							
							<input type="reset" name ="recommencer" value ="Recommencer"> <br>
							<input type="submit" name ="enregistrer" value ="Enregistrer les modifications"> <br>						
								
					</form>
        </fieldset>
		
		</div>
		

</body>

</html>