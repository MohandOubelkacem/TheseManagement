

<!DOCTYPE html>
<html lang="fr">
<head>

	<meta charset="utf-8" name="viewport">
	<title> Mes documents </title>
	<link rel="stylesheet" type="text/css" href="style_formulaire_ajout.css">



</head>
<body>

	<div id="corps">

<?php 

 	//  require_once "BD.php"   connexion a la base de donnée
	// require_once "fonction.php"    generer les erreurs 


	// connexion a la base de donnée

		$pdo = new PDO('mysql:dbname=database;host=localhost','root','');

	// préparer les requetes de la selection de la base de donnée
	// $afficheAuteur= $pdo->prepare('SELECT * FROM article WHERE id = ?  ') 

		$afficheArticle= $pdo-> prepare('SELECT * FROM article order by titre_article ASC');

	// éxécuter les requetes préparées

		$executeArticle=$afficheArticle-> execute();

		$articles = $afficheArticle-> fetchAll();



?>



<center> <h1> La liste de vos publications : </h1> </center>


<ol>
		<h2> La liste de vos articles : </h2>
</ol>


	<strong>		
 <?php

 if (empty($articles))
			{
				echo "vous n'avez pas des publications de type articles.";
			}
			
 				 foreach ($articles as $article):?>  
     	
     

					<li>

							<?= $article['nom_auteur'] ?> - <?= $article['nom_coauteurs'] ?> - <?= $article['titre_article'] ?> -<?= $article['date_pub'] ?> - <?= $article['type_article'] ?> - <?= $article['langue'] ?>

							<a href="supprimer.php?numArticle=<?= $article['id_article'] ?>" onclick="if(window.confirm('Voulez-vous vraiment supprimer l\'article ?')){return true;}else{return false;}">supprimer</a>

							<a href="form_modifier.php">modifier</a>	

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
			<?="nom :'".$livre['nom_auteur']."'"?> - <?= "noms des co-auteurs :".$livre['nom_coauteurs'] ?> - <?= "titre : '".$livre['titre_livre']."'" ?> - <?= "édition : ".$livre['edition'] ?> - <?= "date de publication : ".$livre['date_pub'] ?> - <?= "type du livre : ".$livre['type_livre'] ?> - <?= "langue : ".$livre['langue'] ?> - <?= "nombre de chapitres : ".$livre['nombre_chapitres'] ?>

					<!-- un lien pour supprimer un livre -->
					<a href="supprimer.php?numLivre=<?=$livre['id_livre'] ?> " onclick="if(window.confirm('Voulez-vous vraiment supprimer l\'article ?')){return true;}else{return false;}">supprimer</a>
					<!-- un lien pour modifier un livre -->
					<a href="forme_modification_livre.php.php?numLivre=<?=$livre['id_livre'] ?> ">modifier</a>
		</li>

		<?php endforeach; ?>

<br><hr>

   	
   	<?php
$afficheConference= $pdo-> prepare ('SELECT * FROM conference');

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
			<?= $conference['nom_auteur'] ?> - <?= $conference['nom_coauteurs'] ?> - <?= $conference['titre_conf']  ?> - <?= $conference['theme'] ?> - <?= $conference['type_conf'] ?> - <?= $conference['date_conf'] ?> - <?= $conference['lieu'] ?> - <?= $conference['langue'] ?>

					<a href="supprimer.php?numConference=<?= $conference['id_conf'] ?>" onclick="if(window.confirm('Voulez-vous vraiment supprimer l\'article ?')){return true;}else{return false;}" >supprimer</a>
					<a href="form_modifier.php" onclick="if(window.confirm('Voulez-vous vraiment modifier cette conférence ?')){return true;}else{return false;}">modifier</a>
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
			echo "vous n'avez pas des publications de type revue.";
		}
	

	foreach ($revues as $revue): ?>
		

		<li>
			<?="Noms des co-auteurs: ".$revue['nom_coauteurs'] ?> - <?="Titre: '".$revue['titre_revue']."'" ?> - <?="Date de parution: ".$revue['date_de_parution'] ?> - <?="Type: ".$revue['type_revue'] ?> - <?="Langue: ".$revue['langue'] ?> - <?="Numéro de revue: ".$revue['numero_revue'] ?>

					<a href="supprimer.php" onclick="if(window.confirm('Voulez-vous vraiment supprimer l\'article ?')){return true;}else{return false;}">supprimer</a>

					<a href="form_modifier.php" onclick="if(window.confirm('Voulez-vous vraiment modifier cette revue ?')){return true;}else{return false;}" >modifier</a>
					
		</li>

		<?php endforeach; ?>


   	
	

	
</div>

</body>
</html>