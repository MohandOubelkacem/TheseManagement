 

 <?php  

//  include "BD.php";


// connexion a la base de donnée
$pdo = new PDO('mysql:dbname=database;host=localhost','root','');

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
					<a href="supprimer.php?numLivre=<?=$livre['id_livre'] ?> " onclick="if(confirm('Etes vous sur de bien vouloir supprimer ce livre ?')){	document.location.href = url;} else {}" >supprimer</a>
					<!-- un lien pour modifier un livre -->
					<a href="forme_modification_livre.php.php?numLivre=<?=$livre['id_livre'] ?> ">modifier</a>
		</li>

		<?php endforeach; ?>
	



