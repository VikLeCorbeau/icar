<?php
session_start();
require_once("../src/fonctions.php");

verificationType(array('gestionnaire', 'police'));
?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche</title>

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
                    <h1 class="content-title">Recherche</h1>
                </div>
            </div>


            <div class="form-title-container">
                <h1 class="form-title">Informations sur l'assuré</h1>
            </div>

            <p id="erreur" class="error"></p>

            <div class="grid-form">

                <div class="input-container">
                    <label for="prenom" class="form-label">prénom</label>
                    <input type="text" name="prenom" class="form-large-input" placeholder="Prénom" id="prenom">
                </div>

                <div class="input-container">
                    <label for="nom" class="form-label">nom</label>
                    <input type="text" name="nom" class="form-large-input" placeholder="Nom" id="nom">
                </div>

                <div class="input-container">
                    <label for="tel" class="form-label">numéro de téléphone</label>
                    <input type="text" name="tel" class="form-large-input" placeholder="Numéro de téléphone" id="tel">
                </div>

                <div class="input-container">
                    <label for="mail" class="form-label">adresse mail</label>
                    <input type="mail" name="mail" class="form-large-input" placeholder="Adresse mail" id="mail">
                </div>

                <div class="input-container">
                    <label for="contrat" class="form-label">numéro de contrat</label>
                    <input type="text" name="contrat" class="form-large-input" placeholder="Numéro de contrat" id="contrat">
                </div>

            </div>

            <div class="buttons-container">

                <button id="buttonRecherche" class="button button--yellow" type="button" onclick="rechercher()">
                    <p class="button-text">Rechercher</p>
                </button>

            </div>

            <table>
                <thead>
                <th>Nom</th>
                <th>Prénom</th>
                <th>E-mail</th>
                <th>Numéro de téléphone</th>
                <th>Numéro de contrat</th>
                <th>Nom Assurance</th>
                </thead>
                <tbody id="affichage">
                </tbody>
            </table>


        </div>
    </div>

    <?php include("../layouts/footer.php"); ?>

</div>

<script type="text/javascript">

    function rechercher(){
        document.getElementById('affichage').innerHTML = "";
        document.getElementById('erreur').innerHTML = "";
        nom = document.getElementById('nom').value;
        prenom = document.getElementById('prenom').value;
        mail = document.getElementById('mail').value;
        tel = document.getElementById('tel').value;
        contrat = document.getElementById('contrat').value;
        erreur = 0;
        if (nom !== "" && prenom !== "") {
            element = {'nom':nom, 'prenom':prenom};
            params = JSON.stringify(element);
        }else if (mail !== "") {
            element = {'mail':mail};
            params = JSON.stringify(element);
        }else if (tel !== "") {
            element = {'tel':tel};
            params = JSON.stringify(element);
        }else if (contrat !== "") {
            element = {'contrat':contrat};
            params = JSON.stringify(element);
        }else{
            document.getElementById('erreur').innerHTML = "pas assez d'informations pour la recheche";
            erreur = 1;
        }
        if (erreur != 1) {
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if (this.readyState==4 && this.status==200) {
                    let infos = JSON.parse(this.responseText);
                    if(infos[0] == "mauvais"){
                        document.getElementById('erreur').innerHTML = "Pas de résultat pour votre recherche";
                    }else{
                        liste = document.getElementById('affichage');
                        for(let i = 0; i < infos.length; i++){
                            tr = document.createElement('tr');
                            let champ = infos[i];
                            for(let j = 0; j < champ.length; j++){
                                let element = document.createElement("td");
                                tr.appendChild(element);
                                tr.cells[j].appendChild(document.createTextNode(champ[j]));
                            }
                            liste.appendChild(tr);
                        }
                    }
                }
            };

            xhttp.open("POST", "../src/chercher.php", true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send("chaine="+params);
        }
    }

</script>

</body>
</html>