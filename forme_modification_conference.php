


<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport">
		<title>forme modification</title>

		<link rel="stylesheet" type="text/css" href="style_formulaire_ajout.css">

</head>

<body>

<?php

	// connexion a la base de donnée
$pdo = new PDO('mysql:dbname=database;host=localhost','root','');


// préparation de la requête de modification de la revue

$modifierConference= $pdo-> prepare('SELECT * from conference Where id_conf= :num ');

// liason du paramètre ':num'

$modifierConference-> bindValue(':num', $_GET['numConference'], PDO::PARAM_INT); 

// executer la requete

$executeIsOk = $modifierConference->execute();


// on récupère l'article

$conference= $modifierConference->fetch();




?>


<div id="corps">

				<!-- le formulaire de publication d'une conférence -->
			
			<fieldset>
				<legend> <h2> Modifier une 'Conférence': </h2></legend>
				
				<h3> Veuillez modifier les informations nécessaires pour cette conférence :</h3>
							
					<form method = "post" action = "modifier_conference.php" enctype="multipart/form-data">
						
						<input type="hidden" name="numConference" value=" <?= $conference['id_conf'] ?> "> <br>

						<label for= "titre"> <b> Titre de votre conférence: </b> </label>
							<input type="text" id ="titre" name ="titre_conference" size ="30" maxlength = "100"  value=" <?= $conference['titre_conf'] ?>" required> <br>
						
						<label for= "nom_auteur"> <b> Nom de l'auteur : </b> </label>
							<input type="text" id ="nom_auteur" name ="nom_auteur" size ="25" maxlength = "100" value=" <?= $conference['nom_auteur'] ?>" required> <br>
						
						<label for= "nom_coauteurs"> <b> Noms des co-auteurs : </b> </label>
							<input type="text" id ="nom_coauteurs" name ="nom_coauteurs" size ="25" maxlength = "100"  value=" <?= $conference['nom_coauteurs'] ?>" > <br>										
						
						<label for= "date"> <b> Date de la publication : </b> </label>
							<input type="date" id ="date" name ="date_pub" size ="25" maxlength = "100"  value=" <?= $conference['date_conf'] ?>" required> <br>	
						
						<label for= "lieu"> <b> Lieu de la conférence : </b> </label>
							<input type="text" id ="lieu" name ="lieu_conf" size ="25" maxlength = "100" value=" <?= $conference['lieu'] ?>" required> <br>	
						
						<label for= "theme"> <b> Thème de la conférence : </b> </label>
							<input type="text" id ="theme" name ="theme_conf" size ="25" maxlength = "100"  value=" <?= $conference['theme'] ?>" required> <br>
						
						<label for= "type_conf"> <strong> <b> Le type de votre publication : </b> </strong>  </label>
							<input type="text" name="type_conf"  value="<?= $conference['type_conf'] ?>">	<br>	


						<label for= "edit"> <strong> Edition de la conférence(si elle est écrite dans un livre : </strong> </label>
							<input type="text" id ="edit" name ="edition" size ="25" maxlength = "100" value=" <?= $conference['edition'] ?>" required> <br>	
							
						<label for = "fichier_joint"> <b> Joindre votre fichier à publier : </b></label>
							<input type ="file" id="fichier_joint" name ="fichier" value=" <?= $conference['fichier'] ?>"> <br>
					
							
							<input type="reset" id ="Recommencer" name ="Recommencer" value ="Recommencer"> <br>
							<input type="submit" id ="enregistrer" name ="enregistrer" value ="Enregistrer les modifications"> <br>						
								
					</form>
        </fieldset>
		
		
		</div>

	</body>

</html>	