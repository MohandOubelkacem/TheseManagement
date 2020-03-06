<!DOCTYPE html>
<html lang="fr">
<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="connexion.css">
		<script type="text/javascript" src="mon_site_web.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script>
		
		<title>Connexion</title>
</head>
	<body>





	
		<div id="corps">
		
					<header>
				
								<h1>Se connecter :</h1>      <!-- Le titre du header et de la page -->
		
					</header>
		
					<section>
								<div class="login">         <!--'login' est le block contenant le titre de ce dernier et tout les éléments jusu'aux footer, on y trouve les champs de l'idantifiant avec mot de passe, et les boutons de connexion et s'inscrire   -->
						
												<legend class="titre_id">S'identifier</legend>   <!--est le titre du block de login  -->
									
									<div class="idantifiant">
									
										<form method="POST" action="">

							
				<?php  
							if(!empty($_POST) && !empty($_POST['email']) && !empty($_POST['password'])){
								require 'BD.php';
							require_once 'fonction.php';
							session_start();	
							$req = $pdo->prepare('SELECT * FROM Auteur WHERE email= ? ');
								$req->execute([$_POST['email']]);
								$user=$req->fetch();
					
							if (password_verify ($_POST ['password'] ,$user->mot_de_passe )) {
					
						$_SESSION ['auth']=$user;			
						$_SESSION['flash']['succes']='Vous êtes maintenant connecter à notre site ';
						header ('Location: compte.php');
						exit();	
						
						}else {
					
							$_SESSION['flash']['danger']='Email ou mot de passe incorrectes !';

						}
					}




					?>

									  <!-- Les deux formulaires qui doivent être remplis obligatoirement pour se connecter sur notre site -->

													<label class="email" for="email">Login :</label>
										
														<input type="email" name="email" id="email" placeholder="azerty@yahoo.fr"  required>
														<br><br>
														<label class="password" for="password">Mot de passe :</label>
										
														<input   type="password" name="password" id="password" required>
														<br>

														<input class="soumettre"   type="submit" value="Connexion" >	
														
														<a class="inscription"href="Inscription.php">S'inscrire</a>

											
										</form>
									</div>
							</div>
					</section>
						
				
				<div> 
								
				</div>
		
					
					
						<footer>
						<!--Le footer contient deux blocs : "une bref introduction sur notre site" et 'le moyen de contacter les développeurs'  -->
			
				<div class="site">Notre site</div> 
				 
				 <div class="nous"> À propos de nous : 
				 <!--la classe "nous" contient nous adresse facebook,twitter et ent pour nous contacter  --> 
				 									 
				 									 <a href="https://www.facebook.com/"><img src="/root/Projet/facebook.png"></a>
													<a href="http://ent-ng.parisdescartes.fr/"><img src="/root/Projet/descarte.jpeg"></a>
													<a href="https://twitter.com/"><img src="/root/Projet/twitter.png"></a>

					</div>
					<!--


	<div id="login-PopUp">
					<div id="login-PopUp-bg" class="close"></div>
					
					<div id="login-PopUp-main">
						
						<div class="texte_site">
						Notre site, est une plateforme qui permet principalement de crée un compte pour gérer des publications scientifiques ou littéraires, et de permettre à un public de les visionner et de les consulter.<br>
						Il fut créé par quatre étudiants de la faculté de mathématique et d'informatique de Paris Descartes (Paris5), et encadrer par <a href="http://www.math-info.univ-paris5.fr/~jmailly/">M. Jean-Guy Mailly</a>.
						 </div>
						
					</div>
			
	</div>


		<script type="text/javascript" src="mon_site_web.js"></script>	
				

			</footer>
		</div>
	</body>
					
</html>

	 