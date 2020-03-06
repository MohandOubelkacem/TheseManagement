<?php
			session_start();
			require 'fonction.php';
			function login(){  //Vérifier qu'il y'a qu'une seule session d'ouverte
			if (session_status() ==PHP_SESSION_NONE ) {	
				session_start();
				}
				if (!isset($_SESSION['auth'])) {
					$_SESSION['flash']['error']="Vous n'avez le droit de rentrer dans cette page";
					header('Location: connexion.php');	
					exit();
				}


			} 

login();
		?>
<h1>Votre compte</h1>
<h1>Bonjour <?= $_SESSION['auth']->nom; ?></h1>

<p>Bienvenu a votre compte merci d'ajouer ou de supprimer un livre une conférence ou bien un article </p>