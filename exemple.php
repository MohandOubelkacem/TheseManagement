


<?php 

if (!empty($_POST)) {
	

		$error=array();
		if (empty($_POST['titre_article'])) {
			$errors['titre_article']='Inserez un titre pour votre livre';
		}
		else
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



