
<?php  

$pdo = new PDO('mysql:dbname=database;host=localhost','root','');


// préparer les requetes de la selection de la base de donnée
// $afficheAuteur= $pdo->prepare('SELECT * FROM article WHERE id = ?  ') 

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

					<a href="form_modifier.php">modifier</a>
					<a href="supprimer.php">supprimer</a>
		</li>

		<?php endforeach; ?>


