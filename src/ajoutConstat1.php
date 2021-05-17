<?php
    session_start();
    $filename = "../db/InfoAssure/".$_SESSION['identifiants']."/constats";
    if (!file_exists($filename)) {
        mkdir($filename, 0777, true);
    }
?>

<!DOCTYPE html>
<html>
    <head>    
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Constat</title>

        <link href="../css/generics.css" rel="stylesheet">
        <link href="../css/visiteur.css" rel="stylesheet">
        <link href="../css/boxes.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">


        <script type="text/javascript" src="ajoutConstat1.js"></script>
    </head>
<body>

    <div class="main-container">

        <div class="nav-container">
            <div class="nav-container-1440">

                <div class="nav-logo-container">
                    <svg aria-hidden="true" class="logo">
                        <use xlink:href="../assets/svg/logo/logo.svg#logo"></use>
                    </svg>
                </div>

                <div class="nav-right-container">

                    <div class="nav-side-container">

                        <div class="nav-side-links-container">

                            <div class="nav-side-link-container">

                                <div class="nav-side-link">
                                    <p class="nav-side-svg-text">Actions</p>
                                    <img src="../assets/svg/icons/down_arrow.svg" class="nav-side-arrow">
                                </div>

                                <div class="nav-side-link-dropdown-container">
                                    <ul class="nav-side-link-dropdown-ul">
                                        <li class="nav-side-link-dropdown-li"><a href="">Déclarer un constat</a></li>
                                        <li class="nav-side-link-dropdown-li"><a href="">Voir mes cartes vertes</a></li>
                                        <li class="nav-side-link-dropdown-li"><a href="">Je vends mon véhicule</a></li>
                                        <li class="nav-side-link-dropdown-li"><a href="">Contacter mon assurance</a></li>
                                        <li class="nav-side-link-dropdown-li"><a href="">Mes déclarations de constat</a></li>
                                    </ul> 
                                </div>

                            </div>

                            <div class="nav-side-link-container">

                                <div class="nav-side-link">
                                    <svg aria-hidden="true" class="nav-side-svg">
                                        <use xlink:href="../assets/svg/type/type.svg#type_insured"></use>
                                    </svg>
                                    <p class="nav-side-svg-text">Prénom Nom</p>

                                </div>

                                <div class="nav-side-link-dropdown-container">
                                    <ul class="nav-side-link-dropdown-ul">
                                        <li class="nav-side-link-dropdown-li"><a href="">Changer mes coordonnées</a></li>
                                        <li class="nav-side-link-dropdown-li"><a href="">Déconnexion</a></li>
                                    </ul> 
                                </div>

                            </div>

                        </div>
                        
                    </div>
                </div>

            </div>
        </div>

        <div class="container-1440">
            <div class="content-container content-column">

                <div class="content-banner">
                    
                    <div class="content-titles-container">
                        <h1 class="content-title">Déclaration de constat</h1>
                        <h1 class="content-subtitle">1-Informations générales</h1>
                    </div>

                </div>

                    <form id="ajoutConstat1" class="form" action="enregistrerPartie1.php" method="POST">

                        <div class="section-form-container">

                            <div class="form-container form-container-3">
                            
                                <div class="input-container input-container-3">
                                    <label for="date" class="form-label">date de l'accident</label>
                                    <input type="date" name="date" class="form-slim-input" placeholder="Date de l'accident">
                                </div>

                                <div class="input-container input-container-3">
                                    <label for="heure" class="form-label">heure de l'accident</label>
                                    <input type="time" name="heure" class="form-slim-input" placeholder="Heure de l'accident">
                                </div>

                                <div class="input-container input-container-3">
                                    <label for="localisation" class="form-label">localisation exacte</label>
                                    <input type="text" name="localisation" class="form-slim-input" placeholder="Localisation exacte">
                                </div>

                            </div>

                            <div class="form-container form-container-2">

                                <div class="input-container input-container-2">
                                    <p class="radio-title">autres dégats matériels</p>
                                    <div class="input-radio-container">
                                        <label for="oui" class="radio-container">
                                            <input type="radio" name="degat" value="oui" class="input-radio">
                                            Oui
                                        </label>
                                        <label for="oui" class="radio-container">
                                            <input type="radio" name="degat" value="non" class="input-radio">
                                            Non
                                        </label>
                                    </div>
                                </div>

                                <div class="input-container input-container-2">
                                    <p class="radio-title">bléssé(s) même léger(s)</p>
                                    <div class="input-radio-container">
                                        <label for="oui" class="radio-container">
                                            <input type="radio" name="blesse" value="oui" class="input-radio">
                                            Oui
                                        </label>
                                        <label for="non" class="radio-container">
                                            <input type="radio" name="blesse" value="non" class="input-radio">
                                            Nom
                                        </label>
                                    </div>
                                </div>

                            </div>

                        </div>  

                        <div class="section-form-container">

                            <div class="form-container form-container-1">

                                <div class="form-title-container">
                                    <h1 class="form-title">ajout de témoin</h1>
                                </div>

                                <div class="input-container input-container-1">
                                    <label for="nomT" class="form-label">nom du témoin  </label>
                                    <input type="text" id="nomT" name="nomT" placeholder="Nom du témoin" class="form-slim-input">
                                </div>

                                 <div class="input-container input-container-1">
                                    <label for="prenomT" class="form-label">prénom du témoin</label>
                                    <input type="text" id="prenomT" name="prenomT" placeholder="Prénom du témoin" class="form-slim-input">  
                                </div>

                                <div class="input-container input-container-1">
                                    <label for="adresseT" class="form-label">adresse du témoin</label>
                                    <input type="text" id="adresseT" name="adresseT" placeholder="Adresse du témoin" class="form-slim-input">  
                                </div>

                                <div class="input-container input-container-1">
                                    <label for="telephoneT" class="form-label">téléphone du témoin</label>
                                    <input type="text" id="telephoneT" name="telephoneT" placeholder="Téléphone du témoin" class="form-slim-input">  
                                </div>

                                <div class="input-container input-container-1">
                                    <button id="buttonT" class="button button--light" type="button" onclick="ajouterT()">
                                        <p class="button-text">Ajouter le témoin</p>
                                        <img class="button-svg" src="../assets/svg/icons/add.svg">
                                    </button>
                                </div>

                            </div>

                        </div>

                    </form>

                    <div class="buttons-container">

                        <button form="ajoutConstat1" type="submit" class="button button-3 button--yellow">
                            <p class="button-text">Continuer</p>
                            <img class="button-svg" src="../assets/svg/icons/back.svg" style="transform: rotate(180deg);">
                        </button>

                    </div>



                   

                    <h3>Liste des témoins</h3>
                    <table id="listeT">
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Adresse</th>
                            <th>Téléphone</th>
                            <th></th>
                        </tr>
                        <?php
                        if ($ft = fopen("../db/InfoAssure/".$_SESSION['identifiants']."/constats/tempTemoin.csv", 'r')) {
                            while ($data = fgetcsv($ft, 1000,';')) {
                                echo "<tr>";
                                echo "<td>".$data[0]."</td>";
                                echo "<td>".$data[1]."</td>";
                                echo "<td>".$data[2]."</td>";
                                echo "<td>".$data[3]."</td>";
                                echo "<td><img src='../db/croix.png' alt='croix' onclick='retirerT()'></img></td>";
                                echo "</tr>";
                            }
                        }
                        fclose($ft);
                        ?>
                    </table>
            </div>
        </div>

        <footer>
            <div class="footer-center">
                <div class="footer-box">
                    <h1 class="footer-title">contact</h1>
                    <h2 class="footer-text">05 67 34 56 78 - icar@contact.fr</h2>
                </div>
                <div class="footer-box">
                    <h1 class="footer-title">support</h1>
                    <h2 class="footer-text"><a href="#">Signaler une erreur aux adminstrateurs</a></h2>
                </div>
            </div>
        </footer>

    </div> 

</body>
</html>
