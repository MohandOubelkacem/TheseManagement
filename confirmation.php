<?php

$user_id = $_GET['id'];
$token = $_GET['token'];
require 'BD.php'; 
$req = $pdo->prepare('SELECT * FROM Auteur where  id= ?');
$req->execute([$user_id]);


if ($user && $user->confirmation_token == $token) {
	die('ça marche');
}
else {
	die('ça ne marche pas');
}
?>