<?php 
	session_start();
 	$nom = $_POST['nom'];
 	$prenom = $_POST['prenom'];
 	$email = $_POST['email'];
 	$titre = $_POST['titre'];
 	$urgence = $_POST['urgence'];
 	$type = $_POST['type'];
 	$explication = $_POST['explication'];


 	$erreur = array(array(date("d.m.y"), $urgence, $type, $prenom.' '.$nom, $email, $_SESSION['profil'], $titre, $explication));
 	$fe = fopen("../db/erreurs.csv", 'a+');
 	foreach ($erreur as $element) {
 		fputcsv($fe, $element, ';');
 	}
 	fclose($fe);
 	header('Location: ../accueil.php');
 	exit();


 ?>

