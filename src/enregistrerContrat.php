<?php 
session_start();
if (!isset($_SESSION['identifiants'])) {
	header('Location: connexion.php');
	exit();
}else if ($_SESSION['identifiants'] != 'gestionnaire') {
	header('Location: ../accueil.php');
	exit();
}
include('../phpqrcode/qrlib.php');

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$adresse = $_POST['adresse'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$nomAssurance = $_POST['nomAssurance'];
$numeroAssurance = $_POST['numeroAssurance'];
$immatriculation = $_POST['immatriculation'];
$dateValidite = $_POST['dateValidite'];
$modele = $_POST['modele'];
$typeA = $_POST['typeAssurance'];
$bonus = $_POST['bonus'];
$paiement = $_POST['paiement'];

$lien = "http://localhost/Projet_Car/icar/pages/visiteur.php?assure=".$nom.$prenom."&immatriculation=".$immatriculation;
QRcode::png($lien, "../db/InfoAssure/".$nom.$prenom."/contrat-".$nom.$prenom.$immatriculation.".png");


$contrat = array(array($nom,$prenom,$adresse,$tel,$email,$nomAssurance,$numeroAssurance,$immatriculation,$dateValidite,$modele,$typeA,$bonus,$paiement));

$f = fopen("../db/InfoAssure/".$nom.$prenom."/contrats.csv", 'a+');
foreach ($contrat as $element) {
	fputcsv($f, $element, ';');
}
fclose($f);
$fl = fopen("../db/logs.csv", 'a+');
$date = date('d-m-y h:i:s');
$donnees = array(array($date, 'contrat', $_SESSION['profil'].':'.$_SESSION['identifiants'], 'assure:'.$prenom.$nom, 'nouveau contrat'));
foreach ($donnees as $element) {
	fputcsv($fl, $element, ';');
}
fclose($fl);
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Contrat</title>
 </head>
 <body>
 	<p>Le contrat a bien été créé, le qr code est : </p>
 	<img src=<?php echo "../db/InfoAssure/".$nom.$prenom."/contrat-".$nom.$prenom.$immatriculation.".png"; ?>>
 </body>
 </html>