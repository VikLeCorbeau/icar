<?php 
session_start();
require_once("fonctions.php");

verificationType(array('gestionnaire'));

include('../phpqrcode/qrlib.php');

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$adresse = $_POST['adresse'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$nomAssurance = $_SESSION['assurance'];
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
    
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ajout contrat d'assurance</title>

        <link rel="icon" href="../assets/svg/logo/icon.svg">

        <link href="../css/generics.css" rel="stylesheet">
        <link href="../css/visiteur.css" rel="stylesheet">
        <link href="../css/boxes.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">

    </head>
<body>

    <div class="main-container">

        <?php include("../layouts/navigation.php"); ?> 

        <div class="container-1440">
            <div class="content-container content-column">

                <div class="content-banner"> 
                    <div class="content-titles-container">
                        <h1 class="content-title">Ajout contrat d'assurance</h1>
                        <h1 class="content-subtitle">Le contrat a bien été créé son QR code associé est</h1>
                    </div>
                </div>

				<div class="qr-code-container">
					<img src=<?php echo "../db/InfoAssure/".$nom.$prenom."/contrat-".$nom.$prenom.$immatriculation.".png";?> class="qr-code">
				</div>
            </div>
        </div>

        <?php include("../layouts/footer.php"); ?>  

    </div> 

</body>
</html>