<?php 
session_start();
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

$texte = $nom.','.$prenom.','.$adresse.','.$tel.','.$email.','.$nomAssurance.','.$numeroAssurance.','.$immatriculation.','.$dateValidite.','.$modele.','.$typeA.','.$bonus.','.$paiement;
QRcode::png($texte, "../db/InfoAssure/".$nom.$prenom."/contrat-".$nom.$prenom.$immatriculation.".png");


$contrat = array(array($nom,$prenom,$adresse,$tel,$email,$nomAssurance,$numeroAssurance,$immatriculation,$dateValidite,$modele,$typeA,$bonus,$paiement));
$f = fopen("../db/InfoAssure/".$nom.$prenom."/contrats.csv", 'a+');
foreach ($contrat as $element) {
	fputcsv($f, $element, ';');
}
fclose($f);

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<p>Le qrCode du contrat est : </p>
 	<img src="../db/InfoAssure/<?php echo $nom.$prenom; ?>/contrat-<?php echo $nom.$prenom.$immatriculation; ?>.png" width="150px">
 </body>
 </html>
