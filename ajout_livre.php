<!DOCTYPE html>

<html lang="fr">

	<head>

		<meta charset= "utf-8">
		
<?php	require_once "BD.php";  // inclure le fichier de connexion a la base de donnée 
	require_once "fonction.php";	// inclure le fichier de generation d'erreurs
	?>	

			<title>
				remplir le formulaire d'ajout d'une publication
			</title>

			<!-- inclure les fichiers nécessaires pour mettre la même forme du site -->

		<link rel="stylesheet" type="text/css" href="style_formulaire_ajout.css">
		<script type="text/javascript" src="mon_site_web.js"></script>  
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script>
	    
	</head>
	
	<body>

		<?php 

if (!empty($_POST)) {
	

		$errors=array();
		if (empty($_POST['titre_livre'])) {
			$errors['titre_livre']='Inserez un titre pour votre livre';
		}else
		{
			$req=$pdo->prepare('SELECT id_livre from livre where titre_livre=?');
			$livre=$req->fetchAll();
		}

		if (empty($errors)) 
		{
		$req=$pdo->prepare ("INSERT INTO livre set titre_livre=?");
		$req->execute([$_POST['titre_livre']]);	
		}
	 	
	 	$pdo->commit();
		
}

	
		?>

	
		<div id="corps">
		
			<header>  
				
			<!--		<div class="connexion" >
								<div>
									<a  class="bouton_connexion" href="connexion.html">Connexion</a>	 "Gère le Bouton de connexion"
								</div>
						</div>
			-->		
					
					<div class="accueil" >
								<div>
									<a class="bouton_accueil" href="mon_site_web.html"> Accueil </a>	 <!--Le Bouton d'accueil -->
								</div>
					</div>
							
							
						<div class="menu">
								
										<div class="auteurs">Auteurs</div>
										<div class="livres">Livres</div>   			 <!-- Affiche le menu et les multiples choix  -->
 										<div class="revues">Revues</div>
										<div class="conferences">Conférences</div>
								
								<div>
									<form method="post" action="traitement.php">	
										<label for="search">Recherche</label>			<!-- Gère le champs de recherche -->
										<input type="search" size="15"  name="email"  >
									</form>
								</div>
					</div>
		</header>
			
			<div class= "formulaire_livre"> 
			
			<fieldset>
				<legend> <h2> Publier un 'Livre': </h2></legend>
				
				<h3> Veuillez remplir les informations relatives à votre publication de ce livre :</h3>
							
					<form method = "POST" action="">
						
						<label for= "titre_livre"> <strong> Titre : </strong> </label> 
							<input type="text" id ="titre_livre" name ="titre_livre" size ="30" maxlength = "100" placeholder = "Ex. Les misérables" > <br>
						
						<label for= "nomauteur"> <strong>Nom de l'auteur : </strong> </label>
							<input type="text" id ="nom_auteur" name ="nom_auteur" size ="25" maxlength = "100" placeholder = "Ex. Victor Hugo" > <br>
						
						<label for= "nom_co_auteur"> <strong> Noms des co-auteurs : </strong> </label>
							<input type="text" id ="nom_coauteur" name ="nom_coauteur" size ="25" maxlength = "100" placeholder = "Ex. Victor Hugo" > <br>										
							
						
						<label for= "date"> <strong> Date de la publication : </strong> </label>
							<input type="date" id ="date" name ="date_pub" size ="25" maxlength = "100" placeholder = "EX. 01/01/2018" > <br>	
						
						<label for= "edition"> <strong> Edition du livre : </strong> </label>
							<input type="text" id ="edition" name ="edition" size ="25" maxlength = "100" placeholder = "EX. " > <br>	
						
						<label for= "type_publication"> <strong> Sélectionnez le type de votre publication : </strong>
							<input type="text" id ="type_pub" name ="type_pub" size ="25" maxlength = "100" placeholder = "Ex. Les misérables"/><br> 
						
						
						<label for= "number"> <strong> Nombre de chapitre (livre) : </strong> </label>
							<input type="number" id ="nombre_chap" name ="nombre_chap" size ="25" maxlength = "100" placeholder = "EX. 12"> <br>	
							
						<label for= "langue"> <strong> Langue de la publication: </strong> </label>
							<input type="text" id ="langue" name ="langue" size ="25" maxlength = "100" placeholder = "EX. Francais" > <br>		
						
						
						<label for = "fichier_joint :"> <strong> Joindre votre fichier à publier : </strong></label>
							<input id="fichier_joint" type ="file" name ="fichier"> <br>
	
							
							<input type="reset" value ="Recommencer"/> <br>
							<input type="submit" name="Sauvgarder" value ="Sauvgarder" /> <br>						
								
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
	</body>
	
	
</html>
