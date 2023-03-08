<?php 
session_start();
require_once("fonctions.php");

verificationType(array('gestionnaire'));

include('../phpqrcode/qrlib.php');

$success = false;

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$nomAssurance = $_SESSION['assurance'];
$numeroAssurance = $_POST['numeroAssurance'];
$immatriculation = $_POST['immatriculation'];
$dateValidite = $_POST['dateValidite'];
$modele = $_POST['modele'];
$typeA = $_POST['typeAssurance'];
$bonus = $_POST['bonus'];
$paiement = $_POST['paiement'];


if (is_dir("../db/InfoAssure/".$nom.$prenom."")) {

    $lien = "http://localhost/Projet_Car/icar/pages/visiteur.php?assure=".$nom.$prenom."&immatriculation=".$immatriculation;
    QRcode::png($lien, "../db/InfoAssure/".$nom.$prenom."/contrat-".$nom.$prenom.$immatriculation.".png");

    if ($informationsAssure = verificationFichier("../db/InfoAssure/".$nom.$prenom."/informations.csv", "r")) {
        while ($data = fgetcsv($informationsAssure, 1000, ';')) {
            $adresse = $data[4]. ", " . $data[5] . ", " . $data[6] . ", " . $data[7];
            $tel = $data[2];
            $email = $data[3];
        }
        fclose($informationsAssure);
    }

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

    $success = true;
}

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
                        <h1 class="content-subtitle">
                        <?php 
                            if ($success) {
                                echo "Le contrat a bien été créé son QR code associé est";
                            } else {
                                echo "Erreur : veuillez selectionner un assuré valide.";
                            }
                        ?>
                        </h1>
                    </div>
                </div>
                <?php 
                    if ($success) { ?>
				<div class="qr-code-container">
					<img src=<?php echo "../db/InfoAssure/".$nom.$prenom."/contrat-".$nom.$prenom.$immatriculation.".png";?> class="qr-code">
				</div>
                <?php } ?>
            </div>
        </div>

        <?php include("../layouts/footer.php"); ?>  

    </div> 

</body>
</html>