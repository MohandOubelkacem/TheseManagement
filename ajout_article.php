<!DOCTYPE html>

<html lang="fr">

	<head>

		<meta charset= "utf-8" name="viewport">
			<title>
				remplir le formulaire d'ajout d'une publication
			</title>

			<!-- inclure les fichiers nécessaires pour mettre la même forme du site -->

<?php 
 	require_once "BD.php"; 
 	require_once "fonction.php";
?>


		<link rel="stylesheet" type="text/css" href="style_formulaire_ajout.css">
		<script type="text/javascript" src="mon_site_web.js"></script>  
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script>
	    <script type="text/javascript" src="button_add.js"></script>
	</head>
	
	<body>
	
		<div id="corps">
		

<?php

if (isset($_POST['Sauvgarder']) && !empty($_POST['Sauvgarder'])) {
 
		$error=array();

		if (empty($_POST['titre_article'])) {
			$errors['titre_article']='Inserez un titre pour votre article';
		}else
		{
			$req=$pdo->prepare('SELECT id_article from article where titre_article=?');
			$article=$req->fetch(); 
		
		}

		if (empty($errors)) 
		{
		$req=$pdo->prepare ("INSERT INTO article set titre_article=?");
		$req->execute([$_POST['titre_article']]);	
		}
	 	

}

?>


			<header>  
				
				
			<!--		<div class="connexion" >
								<div>
									<a  class="bouton_connexion" href="connexion.html">Connexion</a>	"Gère le Bouton de connexion"
								</div>
					</div> 
			-->	
						<div class="Accueil">					
								<a id="bouton_accueil" href="mon_site_web.html"> Accueil </a>	 <!--Le Bouton d'accueil -->
						</div>	
					
						
						<div class="menu">
								
										<div class="auteurs">Auteurs</div>
										<div class="livres">Livres</div>   	 <!-- Affiche le menu et les multiples choix  -->
 										<div class="revues">Revues</div>
										<div class="conferences">Conférences</div>
								
								<div>
									<form method="post" action="">	
										<label for="search">Recherche</label>			<!-- Gère le champs de recherche -->
										<input type="search" size="15"  name="email"  >
									</form>
								</div>
						</div>
			</header>


		<div> 
			
		
				
				<fieldset>
				<legend> <h2> Pubier un 'Article' </h2></legend>
				
				<h3> Veuillez remplir les informations relatives à votre article :</h3>
					
					<form method = "post" action = "">
						
						<label for= "titre"> <b> Titre : </b> </label> <br>
							<input type="text" id ="titre_article" name ="titre_article" size ="30" maxlength = "100" placeholder = "Ex. Les meilleurs langages de programmation"required> <br>
						
						<label for= "nom_auteur"> <b>Nom de l'auteur : </b> </label>
							<input type="text" id ="nom_auteur" name ="nom_auteur" size ="25" maxlength = "100" placeholder = "Ex. Victor Hugo" required> <br>

						
						<label for= "nom_co_auteur"> <b> Noms des co-auteurs : </b> </label>
							<input type="text" id ="nom_co_auteur" name ="nom_co_auteur" size ="25" maxlength = "100" placeholder = "Ex. Victor Hugo">  <br>	
						
						<label for= "date"> <b> Date de publication de l'article: </b> </label>
							<input type="date" id ="date_pub" name ="date_pub" size ="25" maxlength = "100" placeholder = "EX. 01/01/2018" required> <br>	
						
						<label for= "type_article"> <strong> Sélectionnez le type de votre article : </strong> 
						</label><br>
							<input type="text" name="type_article" id="type_article" size="25" maxlength="100" placeholder="Ex. littéraire"> <br>	

						<label for = "Joindre votre fichier à publier :"> <b> Joindre votre fichier à publier : </b></label>
							<input type ="file" name ="fichier"> <br>
					
							
							<input type="reset" id ="Recommencer" name ="Recommencer" value ="Recommencer"> <br>
							<input type="submit" id ="enregistrer" name ="enregistrer" value ="Sauvgarder"> <br>						
								
					</form>
        </fieldset>


				

		
		</div>
		
	<footer>
			
	
	<div id="login-PopUp">
					<div id="login-PopUp-bg" class="close"></div>
					
					<div id="login-PopUp-main">
					<img src="/root/Projet/close.png" class="close close">
						
						<div class="texte_site">
						Notre site, est une plateforme qui permet principalement de crée un compte pour gérer des publications scientifiques ou littéraires, et de permettre à un public de les visionner et de les consulter.<br>
						Il fut créé par quatre étudiants de la faculté de mathématique et d'informatique de Paris Descartes (Paris5), et encadrer par <a href="http://www.math-info.univ-paris5.fr/~jmailly/">M. Jean-Guy Mailly</a>.Notre site perm
						 </div>
						
					</div>
			
	</div>


	 <script type="text/javascript" src="mon_site_web.js"></script> 
	 
	 </footer>
</div>

	</body>

</html>