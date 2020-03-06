


<!DOCTYPE html>

<html lang ="fr">

	<head>
		<meta charset = "utf-8" name="viewport">
		
		<title>ajouter une publication à mon compte</title>
		
		<link rel="stylesheet" type="text/css" href="bouton_ajouter_pub.css">
		<script type="text/javascript" src="mon_site_web.js"></script>  
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script>
	    
	</head>
	
	<body>
	
  




		<div id = "corps"> 

		<header>  
					
			 
						<div class="connexion" >
				<!--			<div>
										<a  class="bouton_connexion" href="connexion.html">Connexion</a>	"Gère le Bouton de connexion"
								</div>
				-->		
						
									<a id="bouton_accueil" href="mon_site_web.html"> Accueil </a>	 <!--Le Bouton d'accueil -->
					
						</div>
						
						
						<div class="menu">
								
										<div class="auteurs">Auteurs</div>
										<div class="livres">Livres</div>    <!-- Affiche le menu et les multiples choix  -->
 										<div class="revues">Revues</div>
										<div class="conferences">Conférences</div>
								
								<div>
									<form method="post" action="">	
									<label for="search">Recherche</label>			<!-- Gère le champs de recherche -->
									<input type="search" size="15"  name="email"  >
								</div>
						</div>
		</header>
		

				
		<section> 
					

					<fieldset>     <!-- mettre la liste déroulannte dans une boite -->

						<legend><h2> Choix de la publication à ajouter </h2></legend>
							
							<!-- affichage de la liste déroulante -->
							<label> 
									<for= "publication"> <strong> Sélectionnez votre publication : </strong> <br> 
							</label>
								
							
			<SELECT name="publication">
					<OPTION value= "ajout_livre">Livre </OPTION>
					<OPTION value="ajout_conférence">Conférence</OPTION>
					<OPTION value="ajout_article">Article</OPTION>
					<OPTION value="ajout_revue" >Revue</OPTION>
			</SELECT> <br>
			
						<input type="submit" id="valider" value="Valider"> <br>					


				</fieldset>


<?php

 	if(isset($_POST['publication']) && !empty($_POST['publication'])){
 		$choix = $_POST['publication'];
 		
 		if($choix == 'ajout_livre') 
 		{
 		  header("Location: ajout_livre.html"); 
 		}
 			elseif ($choix == 'ajout_conférence')
 			{
 				header("Location: ajout_conférence.html");
 			}
 			elseif ($choix == 'ajout_article') 
 			{
 				header("Location: ajout_article.html");
 			}
 			else
 			{
 				header("Location: ajout_revue.html");
 			}
 	}
?>
			

			


				<?php 

 	//  require_once "BD.php"   connexion a la base de donnée
	// require_once "fonction.php"    generer les erreurs 


	// connexion a la base de donnée

		$pdo = new PDO('mysql:dbname=database;host=localhost','root','');

	// préparer les requetes de la selection de la base de donnée
	

		$afficheArticle= $pdo-> prepare('SELECT * FROM article order by titre_article ASC');

	// éxécuter les requetes préparées

		$executeArticle=$afficheArticle-> execute();

		$articles = $afficheArticle-> fetchAll();



?>

<!-- affichge de la liste des livres, articles, conférences et revues qui possède l'utilisateur -->


<center> <h1> La liste de vos publications : </h1> </center>

 <!-- affichage de la liste d'article -->

<ol>
		<h2> La liste de vos articles : </h2>
</ol>


	<strong>		
 <?php
 			// message pour dire qu'il n y a pas de publications de ce type 
 if (empty($articles))
			{
				echo "vous n'avez pas des publications de type articles.";
			}
			
				// affichage des articles publiés par l'utilisateur

 				 foreach ($articles as $article):?>  
     	
     

					<li>

						<?= $article['nom_auteur'] ?> - <?= $article['nom_coauteurs'] ?> - <?= $article['titre_article'] ?> - 
						<?=$article['type_article'] ?> - <?= $article['date_pub'] ?> - <?= $article['langue'] ?>
					
						<a href="supprimer.php?numArticle=<?= $article['id_article'] ?>" onclick="if(window.confirm('Voulez-vous vraiment supprimer l\'article ?')){return true;}else{return false;}">supprimer</a> <!-- un lien pour supprimer un article-->
						<a href="forme_modification_article.php?numArticle=<?= $article['id_article'] ?>" onclick="if(window.confirm('Voulez-vous vraiment modifier cet article ?')){return true;}else{return false;}" >modifier</a>
						  <!-- un lien pour modifier un article-->

					</li>

				<?php endforeach; ?>
				
<br><hr>

   
   <?php
	// préparer les requetes de la selection de la base de donnée


$afficheLivre= $pdo-> prepare ('SELECT * FROM livre');

// éxécuter les requetes préparées

$executeLivre=$afficheLivre-> execute();

$livres = $afficheLivre-> fetchAll();


?>


<ol>

	<h2> La liste de vos livres : </h2> 
</ol>


	
	<?php  

		if (empty($livres)) {
			echo "vous n'avez pas des publications de type livres.";
		}
	

	foreach ($livres as $livre): ?>
		

		<li>
			<?="nom d'auteur:".$livre['nom_auteur']?> - <?= "noms des co-auteurs :".$livre['nom_coauteurs'] ?> - <?= "titre :".$livre['titre_livre'] ?> - <?= "édition : ".$livre['edition'] ?> - <?="date de publication : ".$livre['date_pub'] ?> - <?= "type du livre : ".$livre['type_livre'] ?> - <?= "langue : ".$livre['langue'] ?> - <?= "nombre de chapitres : ".$livre['nombre_chapitres'] ?>

					<!-- un lien pour supprimer un livre -->
					<a href="supprimer.php?numLivre=<?=$livre['id_livre'] ?>" onclick="if(window.confirm('Voulez-vous vraiment supprimer ce livre ?')){return true;}else{return false;}" >supprimer</a>
					<!-- un lien pour modifier un livre -->
					<a href="forme_modification_livre.php?numLivre=<?=$livre['id_livre'] ?> " onclick="if(window.confirm('Voulez-vous vraiment modifier ce livre ?')){return true;}else{return false;}" >modifier</a>
		</li>

		<?php endforeach; ?>
	




	<br><hr>

   	
   	<?php

$afficheConference= $pdo-> prepare ('SELECT * FROM conference order by titre_conf ASC');

// éxécuter les requetes préparées

$executeConference=$afficheConference-> execute();

$conferences = $afficheConference-> fetchAll();


?>


<ol>

	<h2> La liste de vos conférences : </h2> 
</ol>


	
	<?php  

		if (empty($conferences)) {
			echo "vous n'avez pas des publications de type conferences.";
		}
		

	foreach ($conferences as $conference): ?>
		

		<li>
			<?="Nom d'auteur :".$conference['nom_auteur'] ?> - <?="Nom des co-auteurs :".$conference['nom_coauteurs'] ?> - <?="Titre :".$conference['titre_conf']  ?> - <?="Thème :".$conference['theme'] ?> - <?="Type :".$conference['type_conf'] ?> - <?="Date de publication :".$conference['date_conf'] ?> - <?="Lieu :".$conference['lieu'] ?> - <?="Langue :".$conference['langue'].'.' ?>

						<!-- un lien pour supprimer une conference-->
					<a href="supprimer.php?numConference=<?= $conference['id_conf'] ?>" onclick="if(window.confirm('Voulez-vous vraiment supprimer cette conférence ?')){return true;}else{return false;}" >supprimer</a>

						<!-- un lien pour modifier un article-->
					<a href="forme_modification_conference.php?numConference=<?= $conference['id_conf'] ?>" onclick="if(window.confirm('Voulez-vous vraiment modifier cette conférence ?')){return true;}else{return false;}" >modifier</a>
		</li>

		<?php endforeach; ?>



   	<br><hr>


<?php

$afficheRevue= $pdo-> prepare ('SELECT * FROM revue');

// éxécuter les requetes préparées

$executeRevue=$afficheRevue-> execute();

$revues = $afficheRevue-> fetchAll();


?>


<ol>

	<h2> La liste de vos revues : </h2> 
</ol>


	
	<?php  

		if (empty($revues)) {
			echo "vous n'avez pas des publications de type revues.";
		}
	

	foreach ($revues as $revue): ?>
		

		<li>
			<?="Noms des co-auteurs: ".$revue['nom_coauteurs'] ?> - <?="Titre: '".$revue['titre_revue']."'" ?> - <?="Date de parution: ".$revue['date_de_parution'] ?> - <?="Type: ".$revue['type_revue'] ?> - <?="Langue: ".$revue['langue'] ?> - <?="Numéro de revue: ".$revue['numero_revue'] ?>

					<!-- un lien pour supprimer une revue-->
					<a href="supprimer.php?numRevue=<?= $revue['id_revue'] ?>" onclick="if(window.confirm('Voulez-vous vraiment supprimer cette revue ?')){return true;}else{return false;}" >supprimer</a>
					<!-- un lien pour modifier une revue -->
					<a href="forme_modification_revue.php?numRevue=<?= $revue['id_revue'] ?> " onclick="if(window.confirm('Voulez-vous vraiment modifier cette revue ?')){return true;}else{return false;}" >modifier</a>
		</li>


		<?php endforeach; ?>



</section>

		<footer>

			<br><hr>
			
				<div class="site">Notre site</div>
				 
				 <div class="nous"> À propos de nous :  
				 									 
													<a href="https://www.facebook.com/"><img src="facebook.png"></a>
													<a href="http://ent-ng.parisdescartes.fr/"><img src="descarte.jpeg"></a>
													<a href="https://twitter.com/"><img src="twitter.png"></a>

					</div>	
			

			</footer>
			
	
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


		</div>

	</body>	
</html>	
