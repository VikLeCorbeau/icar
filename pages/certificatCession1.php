<?php
    session_start();
    require_once("../src/fonctions.php");

	verificationType(array('assure'));

if (isset($_POST['voitureA'])) {
    $voiture = $_POST['voitureA'];

    $string = htmlentities($voiture, null, 'utf-8');
    $voiture = str_replace("&nbsp;", " ", $string);
    $voiture = html_entity_decode($voiture);

    if ($fa = verificationFichier("../db/InfoAssure/".$_SESSION['identifiants']."/contrats.csv", 'r')) {
        while ($data = fgetcsv($fa, 1000, ';')) {
            if ($data[9] == $voiture) {
                $marque = $data[9];
                $immatriculation = $data[7];
                $date = $data[8];
            }
        }

        fclose($fa);
    }
}
?>

<!DOCTYPE html>
<html>
    <head>    
    
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cession véhicule</title>

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
                        <h1 class="content-title">Certificat de cession d'un véhicule d'occasion</h1>
                        <h1 class="content-subtitle">1 - Le véhicule (à remplir par l’ancien propriétaire)</h1>
                    </div>
                </div>

                <form id="car-selection" action="certificatCession1.php" method="POST">

                    <div class="form-title-container">
                        <h1 class="form-title">sélection du véhicule concerné</h1>
                    </div>

                    <div class="grid-form">

                        <div class="input-container">

                            <div class="select-container">

                                <select class="select" name="voitureA">
                                    <?php
                                    echo ('../db/InfoAssure/'.$_SESSION['identifiants'].'/contrats.csv');

                                    if ($fa = verificationFichier('../db/InfoAssure/'.$_SESSION['identifiants'].'/contrats.csv', 'r')) {

                                        while ($data = fgetcsv($fa, 1000, ';')) {
											if (!empty($data[9])) {
												echo "<option value=".str_replace(" ","&nbsp;",$data[9]).">".$data[9]." ".$data[7]."</option>";
											}
                                            
                                        }
                                        fclose($fa);

                                    }
                                    ?>

                                </select>

                            </div>

                        </div>

                        <div class="input-container">

                            <button form="car-selection" type="submit" class="button button--light">
                                <p class="button-text">Choisir</p>
                            </button>

                        </div>

                    </div>

                </form>

				<form id="cession1" class="form" action="../src/enregistrerCession1.php" method="POST">

					<div class="form-title-container">
						<h1 class="form-title">informations sur le véhicule</h1>
					</div>

					<div class="grid-form">
						<div class="input-container">
							<label for="immatriculation" class="form-label">numéro d'immatriculation</label>
							<input type="text" name="immatriculation" class="form-slim-input" placeholder="Numéro d'immatriculation" value="<?php if (isset($immatriculation)) { echo $immatriculation; }?>" required>
						</div>

						<div class="input-container">
							<label for="identification" class="form-label">numéro d'identification du véhicule</label>
							<input type="text" name="identification" class="form-slim-input" placeholder="Numéro d'identification du véhicule" required>
						</div>

						<div class="input-container">
							<label for="date" class="form-label">date de première immatriculation du véhicule</label>
							<input type="date" name="date" class="form-slim-input" placeholder="Date de première immatriculation du véhicule" required>
						</div>

						<div class="input-container">
							<label for="marque" class="form-label">marque</label>
							<input type="text" name="marque" class="form-slim-input" placeholder="Marque" value="<?php if (isset($marque)) { echo $marque; }?>" required >
						</div>

						<div class="input-container">
							<label for="type" class="form-label">type, variante, version</label>
							<input type="text" name="type" class="form-slim-input" placeholder="Type, variante, version" required>
						</div>

						<div class="input-container">
							<label for="genre" class="form-label">genre national</label>
							<input type="text" name="genre" class="form-slim-input" placeholder="Genre national" required>
						</div>

						<div class="input-container">
							<label for="denomination" class="form-label">dénomination commerciale</label>
							<input type="text" name="denomination" class="form-slim-input" placeholder="Dénomination commerciale" required>
						</div>

						<div class="input-container">
							<label for="kilometrage" class="form-label">kilométrage inscrit au compteur</label>
							<input type="text" name="kilometrage" class="form-slim-input" placeholder="Kilométrage inscrit au compteur" required>
						</div>

					</div>

					<div class="form-title-container">
						<h1 class="form-title">certificat d'immatriculation</h1>
					</div>

					<div class="grid-form">

						<div class="input-container">
							<p class="radio-title">possedez-vous un certificat d’immatriculation</p>
							<div class="input-radio-container">
								<label for="certificat" class="radio-container">
									<input type="radio" name="certificat" value="oui" class="input-radio" id="radio-show-on" checked>
									<p class="input-radio-text">Oui</p>
								</label>
								<label for="certificat" class="radio-container">
									<input type="radio" name="certificat" value="non" class="input-radio" id="radio-show-off">
									<p class="input-radio-text">Non</p>
								</label>
							</div>
						</div>

						<div class="input-container" id="on">
							<label for="formule" class="form-label">numéro de formule</label>
							<input type="text" name="formule" class="form-slim-input" placeholder="numéro de formule">
						</div>

						<div class="input-container" id="on">
							<label for="dateCertificat" class="form-label">date du certificat d'immatriculation</label>
							<input type="date" name="dateCertificat" class="form-slim-input" placeholder="date du certificat d'immatriculation"  value="<?php if (isset($date)) { echo $date; }?>">
						</div>

						<div class="input-container span-2 display-none" id="off">
							<label for="observation" class="form-label">motif d’absence de certificat d’immatriculation</label>
							<textarea name="observation" class="form-textarea" placeholder="Mes observations ..." style="height: 95px;"></textarea>
						</div>

					</div>

					<div class="buttons-container">

						<button form="cession1" type="submit" class="button button--yellow">
                            <p class="button-text">Continuer</p>
                            <img class="button-svg" src="../assets/svg/icons/back.svg" style="transform: rotate(180deg);">
                        </button>

                    </div>

				</form>


            </div>
        </div>

        <?php include("../layouts/footer.php"); ?>  

    </div> 

	<script src="../assets/js/radio.js"></script>

</body>
</html>