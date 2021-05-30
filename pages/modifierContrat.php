<?php
session_start();
require_once("../src/fonctions.php");

verificationType(array('gestionnaire'));
?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier contrat</title>

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
            <?php
            $fa = fopen("../db/InfoAssure/".$_GET['assure']."/contrats.csv", 'r');
            while ($data = fgetcsv($fa, 1000, ';')) {
                if ($data[7] == $_GET['immatriculation']) {
                    ?>
                    <div class="content-banner">
                        <div class="content-titles-container">
                            <h1 class="content-title">Modifier contrat d'assurance</h1>
                            <h1 class="content-subtitle"><?php echo $data[9]; ?></h1>
                        </div>
                    </div>

                    <?php
                    echo "<form id='modificationContrat' class='form' action='../src/modificationContrat.php?donnees=".serialize($data)."' method='POST'>"
                    ?>
                    <div class="form-title-container">
                        <h1 class="form-title">informations générales</h1>
                    </div>

                    <div class="grid-form">
                        
                        <div class="input-container">
                            <label for="numeroContrat" class="form-label">numéro du contrat d'assurance</label>
                            <input type="text" name="numeroContrat" class="form-large-input" placeholder="Numéro du contrat d'assurance" value="<?php echo $data[6]; ?>" required>
                        </div>

                        <div class="input-container">
                            <label for="immatriculation" class="form-label">numéro d'immatriculation</label>
                            <input type="text" id="immatriculation" name="immatriculation" class="form-large-input" placeholder="Numéro d'immatriculation" value="<?php echo $data[7]; ?>" required>
                        </div>

                        <div class="input-container">
                            <label for="validite" class="form-label">validité</label>
                            <input type="date" name="validite" class="form-large-input" placeholder="Validité" value="<?php echo $data[8]; ?>" required>
                        </div>

                        <div class="input-container">
                            <label for="modele" class="form-label">modèle du véhicule</label>
                            <input type="text" name="modele" class="form-large-input" placeholder="Modèle du véhicule" value="<?php echo $data[9]; ?>" required>
                        </div>

                    </div>

                    <div class="form-title-container">
                        <h1 class="form-title">conducteur principal</h1>
                    </div>

                    <div class="grid-form">

                        <div class="input-container">
                            <label for="nomConducteur" class="form-label">nom</label>
                            <input type="text" name="nomConducteur" id="nomConducteur" class="form-large-input" placeholder="Nom" value="<?php echo $data[0]; ?>" required>
                        </div>

                        <div class="input-container">
                            <label for="prenomConducteur" class="form-label">prénom</label>
                            <input type="text" name="prenomConducteur" id="prenomConducteur" class="form-large-input" placeholder="Prénom" value="<?php echo $data[1]; ?>" required>
                        </div>

                        <div class="input-container">
                            <label for="mail" class="form-label">adresse mail</label>
                            <input type="email" name="mail" class="form-large-input" placeholder="Adresse mail" value="<?php echo $data[4]; ?>" required>
                        </div>

                        <div class="input-container">
                            <label for="telephone" class="form-label">téléphone</label>
                            <input type="text" name="telephone" class="form-large-input" placeholder="Téléphone" value="<?php echo $data[3]; ?>" required>
                        </div>
                        <?php
                        $adresse = explode(',', $data[2]);
                        ?>
                        <div class="input-container">
                            <label for="adresse" class="form-label">adresse</label>
                            <input type="text" name="adresse" class="form-large-input" placeholder="Adresse" value="<?php echo $adresse[0]; ?>" required>
                        </div>

                        <div class="input-container">
                            <label for="ville" class="form-label">ville</label>
                            <input type="text" name="ville" class="form-large-input" placeholder="Ville" value="<?php echo $adresse[1]; ?>" required>
                        </div>

                        <div class="input-container">
                            <label for="codePostal" class="form-label">code postal</label>
                            <input type="text" name="codePostal" class="form-large-input" placeholder="Code postal" value="<?php echo $adresse[2]; ?>" required>
                        </div>

                        <div class="input-container">
                            <label for="pays" class="form-label">pays</label>
                            <input type="text" name="pays" class="form-large-input" placeholder="Pays" value="<?php echo $adresse[3]; ?>" required>
                        </div>

                    </div>

                    <div class="form-title-container">
                        <h1 class="form-title">assurance</h1>
                    </div>

                    <div class="grid-form">

                        <div class="input-container">
                            <label for="typeAssurance" class="form-label">type d'assurance</label>
                            <input type="text" name="typeAssurance" class="form-large-input" placeholder="Type d'assurance" value="<?php echo $data[10]; ?>" required>
                        </div>

                        <div class="input-container">
                            <label for="bonus" class="form-label">bonus</label>
                            <input type="text" name="bonus" class="form-large-input" placeholder="Bonus" value="<?php echo $data[11]; ?>" required>
                        </div>

                        <div class="input-container">
                            <label for="paiement" class="form-label">paiement</label>
                            <input type="text" name="paiement" class="form-large-input" placeholder="Paiement" value="<?php echo $data[12]; ?>" required>
                        </div>

                    </div>

                    <?php
                }
            }
            fclose($fa);
            ?>
            <div class="buttons-container">

                <button form="modificationContrat" type="submit" class="button button--dark">
                    <p class="button-text">Appliquer les changements</p>
                </button>

                <button id="supprimerContrat" type="button" class="button button--yellow" onclick="suppCont()">
                    <p class="button-text">Supprimer le contrat d'assurance</p>
                </button>

            </div>

            </form>


        </div>
    </div>

    <?php include("../layouts/footer.php"); ?>

</div>
<script type="text/javascript">
    function suppCont(){
        nom = document.getElementById('nomConducteur').value;
        prenom = document.getElementById('prenomConducteur').value;
        immatriculation = document.getElementById('immatriculation').value;
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if (this.readyState==4 && this.status==200) {
                document.location.href="../pages/mesAssures.php";
            }
        };
        xhttp.open("POST", "../src/supprimerContrat.php",true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.send("nom="+nom+"&prenom="+prenom+"&immatriculation="+immatriculation);
    }

</script>
</body>
</html>