
 <?php  

//  include "BD.php";

$pdo = new PDO('mysql:dbname=database;host=localhost','root','');

// préparer les requetes de la selection de la base de donnée
// $afficheAuteur= $pdo->prepare('SELECT * FROM article WHERE id = ?  ') 

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
			<?= $revue['nom_coauteurs'] ?> - <?= $revue['titre_revue'] ?> - <?= $revue['date_de_parution'] ?> - <?= $revue['type_revue'] ?> - <?= $revue['langue'] ?> - <?= $revue['numero_revue'] ?>

					<a href="form_modifier.php">modifier</a>
					<a href="supprimer.php">supprimer</a>
		</li>

		<?php endforeach; ?>