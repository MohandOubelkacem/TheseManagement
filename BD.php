<?php 

try{


$pdo = new PDO('mysql:dbname=database;host=localhost','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);


}

catch(PDOException $e){
	echo 'la base de donnee n\'est pas disponible, merci de réessayer plus tard'; 
}

?>
