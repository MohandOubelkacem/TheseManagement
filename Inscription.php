<!DOCTYPE html>
<html lang="fr">
<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="Inscription.css">
		
		<?php require 'fonction.php'; ?>
		<?php require 'BD.php'; ?>

		<title>Inscription</title>
</head>

<body>
					<?php
						function str_random($length){

							$alphabet="0123456789azeryuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
							return substr(str_shuffle(str_repeat($alphabet,$length)),0,$length);
							
						}
	    			  ?>




		<?php 
					if (!empty($_POST)) {
						
						$errors=array();

						if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
							$errors['email']="Votre email est invalide";
						} else 
								
								{
									$req= $pdo->prepare('SELECT id FROM Auteur WHERE email=? ');
									$req->execute([$_POST['email']]);
									$auteur= $req->fetch();
									if ($auteur) {
											$errors['email']='cet email est déja utilisé';
										}	
								}
								
						
						if (empty($_POST['password'] || $_POST['password'] 	!= $_POST['password_confirmed'])) {
							$errors['password']="Vous devez rentrer un mot de passe valide";

						
						}


						if (empty($errors)) {

							$req = $pdo->prepare("INSERT INTO Auteur SET nom= ?, prenom= ?, email=?, mot_de_passe= ?,confirmation_token=? ");						
							$password = password_hash($_POST['password'],PASSWORD_BCRYPT);
							$token=str_random(68);

							$req->execute([$_POST['nom'],$_POST['prenom'],$_POST['email'],$password,$token ]);
							
							$user_id =  $pdo->lastInsertId();	
							mail($_POST['email'],'Confirmation de votre compte',"Afin de valider votre compte merci de cliquer sur ce lien\r\nhttp://localhost/Projet/confirmation.php?id=$user_id&token=$token");
							header('Location: compte.php');
							exit();

						}


						
 								}
			 		?>
		
		<div id="corps">
				
											<!--Le tire du header  -->
			<header>
					<h1>Inscription:</h1>
			
			<?php  if(!empty($errors)) :?> 
		
			<div class="alerte">
				<p>Vous n'avez pas remplis le formulaire correctement</p>
				<ul>
					
					<?php foreach($errors as $error): ?>
					<li>	<?= $error; ?> </li>
					<?php endforeach; ?>
				

				</ul>

			</div>	
		<?php endif;   ?>


					

			</header>

			<section>
								<div class="formulaire_inscription">
						
												<h1>S'inscrire</h1>
									
									<div class="remplissage">
									
										<form method="POST" action="">
										<!--'remplissage' est le block contenant toute les informations que l'utilisateurs doit remplire pour 	s'inscrire à notre site (Formulaire)  -->
									
													<label class="Nom" for="text">Nom :</label>
														<input type="text" name="nom" id="text" required >
														<br>
														<br>
														<label class="text" for="text">Prénom :</label>
														<input   type="text" name="prenom" id="text" required>
														<br>
														<br>
														<label class="email" for="email">Login :</label>	
														<input type="email" name="email" id="email" placeholder="azerty@yahoo.fr"  >
														<br>
														<br>
														<label class="email" for="email">Confirmez votre login :</label>	
														<input type="email" name="email_confirmed" id="email" placeholder="azerty@yahoo.fr"  >
														<br>
														<br>
														<label class="password" for="password">Mot de passe :</label>
										
														<input   type="password" name="password" id="password" >
														<br>
														<br>
														<label class="password_confirmed" for="password_confirmed">Confirmez votre mot de passe :</label>
										
														<input   type="password" name="password_confirmed" id="password_confirmed" >
														<br>	

														<input class="bouton_inscrire"   type="submit" value="S'inscrire" >	
														
														

											
										</form>
									</div>
							</div>

							

						<footer>
						<!--Le footer contient deux blocs : "une bref introduction sur notre site" et 'le moyen de contacter les développeurs'  -->
			
				<div class="site">Notre site</div>
				 
				 <div class="nous"> À propos de nous :  
				 									 
				 									 <a href="https://www.facebook.com/"><img src="/root/Projet/facebook.png"></a>
													<a href="http://ent-ng.parisdescartes.fr/"><img src="/root/Projet/descarte.jpeg"></a>
													<a href="https://twitter.com/"><img src="/root/Projet/twitter.png"></a>

												 <!--la classe "nous" contient nous adresse facebook,twitter et ent pour nous contacter  -->

					</div>	
				

			</footer>




	</div>
</body>