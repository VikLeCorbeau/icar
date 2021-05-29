<?php
    session_start();
    require_once("fonctions.php");

    verificationType(array('assure'));

    $filename = "../db/InfoAssure/".$_SESSION['identifiants']."/constats";
?>

<!DOCTYPE html>
<html>
    <head>    

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Constat</title>

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
                        <h1 class="content-title">Déclaration de constat</h1>
                        <h1 class="content-subtitle">1 - Informations générales</h1>
                    </div>

                </div>

                    <form id="ajoutConstat1" class="form" action="enregistrerPartie1.php" method="POST">

                        <div class="form-title-container">
                            <h1 class="form-title">accident</h1>
                        </div>

                        <div class="grid-form">
                            
                            <div class="input-container">
                                <label for="date" class="form-label">date de l'accident</label>
                                <input type="date" name="date" class="form-slim-input" placeholder="Date de l'accident" required>
                            </div>

                            <div class="input-container">
                                <label for="heure" class="form-label">heure de l'accident</label>
                                <input type="time" name="heure" class="form-slim-input" placeholder="Heure de l'accident" required>
                            </div>

                            <div class="input-container">
                                <label for="localisation" class="form-label">localisation exacte</label>
                                <input type="text" name="localisation" class="form-slim-input" placeholder="Localisation exacte" required>
                            </div>

                            <div class="input-container">
                                <p class="radio-title">autres dégats matériels</p>
                                <div class="input-radio-container">
                                    <label for="degat" class="radio-container">
                                        <input type="radio" name="degat" value="oui" class="input-radio">
                                        <p class="input-radio-text">Oui</p>
                                    </label>
                                    <label for="degat" class="radio-container">
                                        <input type="radio" name="degat" value="non" class="input-radio" checked>
                                        <p class="input-radio-text">Non</p>
                                    </label>
                                </div>
                            </div>

                            <div class="input-container">
                                <p class="radio-title">bléssé(s) même léger(s)</p>
                                <div class="input-radio-container">
                                    <label for="blesse" class="radio-container">
                                        <input type="radio" name="blesse" value="oui" class="input-radio">
                                        <p class="input-radio-text">Oui</p>
                                    </label>
                                    <label for="blesse" class="radio-container">
                                        <input type="radio" name="blesse" value="non" class="input-radio" checked>
                                        <p class="input-radio-text">Non</p>
                                    </label>
                                </div>
                            </div>

                        </div>  

                        <div class="form-title-container">
                            <h1 class="form-title">ajout de témoin</h1>
                        </div>

                        <div class="grid-form">

                            <div class="input-container">
                                <label for="nomT" class="form-label">nom du témoin  </label>
                                <input type="text" id="nomT" name="nomT" placeholder="Nom du témoin" class="form-slim-input">
                            </div>

                                <div class="input-container">
                                <label for="prenomT" class="form-label">prénom du témoin</label>
                                <input type="text" id="prenomT" name="prenomT" placeholder="Prénom du témoin" class="form-slim-input">
                            </div>

                            <div class="input-container">
                                <label for="adresseT" class="form-label">adresse du témoin</label>
                                <input type="text" id="adresseT" name="adresseT" placeholder="Adresse du témoin" class="form-slim-input">
                            </div>

                            <div class="input-container">
                                <label for="telephoneT" class="form-label">téléphone du témoin</label>
                                <input type="text" id="telephoneT" name="telephoneT" placeholder="Téléphone du témoin" class="form-slim-input">
                            </div>

                        </div>

                    </form>

                    <div class="form-title-container">
                        <h1 class="form-title">liste des témoins</h1>
                    </div>

                    <table>
                        <thead>
                            <th>nom</th>
                            <th>prénom</th>
                            <th>adresse</th>
                            <th>téléphone</th>
                            <th>supprimer ?</th>
                        </thead>
                        <tbody id="table-body">
                        <?php
                            if ($ft = verificationFichier("../db/InfoAssure/".$_SESSION['identifiants']."/constats/tempTemoin.csv", 'r')) {

                                    while ($data = fgetcsv($ft, 1000,';')) {
                                        echo "
                                        <tr>
                                            <td>" . $data[0] . "</td>
                                            <td>" . $data[1] . "</td>
                                            <td>" . $data[2] . "</td>
                                            <td>" . $data[3] . "</td>
                                            <td><img src='../assets/svg/icons/delete.svg' class='datas-svg line-delete'></td>
                                        </tr>
                                        ";
                                    }

                                    fclose($ft);
                            }
                        ?>
                        </tbody>
                    </table>

                    <div class="buttons-container">

                        <button id="buttonT" class="button button--light" type="button" onclick="ajouterT()">
                            <p class="button-text">Ajouter le témoin</p>
                                <img class="button-svg" src="../assets/svg/icons/add.svg">
                        </button>

                        <button form="ajoutConstat1" type="submit" class="button button--yellow">
                            <p class="button-text">Continuer</p>
                            <img class="button-svg" src="../assets/svg/icons/back.svg" style="transform: rotate(180deg);">
                        </button>

                    </div>
            </div>
        </div>

        <?php include "../layouts/footer.php"; ?>

    </div>

    <script type="text/javascript" src="table.js"></script>

</body>
</html>
