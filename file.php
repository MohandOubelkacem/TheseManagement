
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>get file</title>
</head>
<body>
	
	<form method="POST" action="" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="12345" >

<label for="pdf">selcetionner votre fichier a joindre : </label>
<input type="file" id="pdf" name="fichier">

<input type="submit" name="envoyer">

</form>


<?php
// verification de l'upload du fichier
if ($_FILES['pdf']['error'] > 0) $erreur = "Erreur lors du transfert";



if ($_FILES['pdf']['size'] > $maxsize) $erreur = "Le fichier est trop gros";


$extensions_valides = array( 'pdf' , 'odt' , 'doc' , 'docx' );
//1. strrchr renvoie l'extension avec le point (« . »).
//2. substr(chaine,1) ignore le premier caractère de chaine.
//3. strtolower met l'extension en minuscules.
$extension_upload = strtolower(  substr(  strrchr($_FILES['pdf']['name'], '.')  ,1)  );
if ( in_array($extension_upload,$extensions_valides) ) echo "Extension correcte";


//Créer un dossier 'doss/1/'
  mkdir('doss/1/', 0777, true);
 
//Créer un identifiant difficile à deviner
  $nom = md5(uniqid(rand(), true));

$nom = "avatars/{$id_membre}.{$extension_upload}";
$resultat = move_uploaded_file($_FILES['pdf']['tmp_name'],$nom);
if ($resultat) echo "Transfert réussi";

?>

</body>
</html>

