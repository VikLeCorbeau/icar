<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Visiteur</title>

    <link href="../css/generics.css" rel="stylesheet">
    <link href="../css/visiteur.css" rel="stylesheet">
    <link href="../css/boxes.css" rel="stylesheet">
    <script type="text/javascript" src="../src/visiteur.js"></script>
</head>
<body>

    <div class="main-container">

        <div class="nav-container">
            <div class="nav-container-1440">
            <div class="nav-logo-container">
                    <svg aria-hidden="true" class="logo">
                        <use xlink:href="../assets/svg/logo.svg#logo"></use>
                    </svg>
                </div>
                <div class="nav-side-container">
                    <div class="nav-side-link-container">
                        <a href="connexion.php" class="nav-side-a">
                            <svg aria-hidden="true" class="nav-side-svg">
                                <use xlink:href="../assets/svg/icons.svg#signin"></use>
                            </svg>
                            <p class="nav-side-svg-text">Connexion</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-1440">
            <div class="content-container content-column">
                <h1 class="content-title">Visiteur - QR Code</h1>

                <div class="boxes-container">

                    <div class="box box-610">
                        <div class="box-title-container">
                            <h2 class="box-title">Carte verte d'assurance</h2>
                        </div>
                        <div class="box-informations-container">
                            <div class="box-informations">
                                <h3 class="box-information box-information--primary">Nom de l'assurance :</h3>
                                <h3 class="box-information box-information--secondary">Pacifica</h3>
                            </div>
                            <div class="box-informations">
                                <h3 class="box-information box-information--primary">Numéro du contrat d'assurance :</h3>
                                <h3 class="box-information box-information--secondary">6765432</h3>
                            </div>
                            <div class="box-informations">
                                <h3 class="box-information box-information--primary">Numéro d'immatriculation :</h3>
                                <h3 class="box-information box-information--secondary">ZZ-564-FR</h3>
                            </div>
                            <div class="box-informations">
                                <h3 class="box-information box-information--primary">Date de validité :</h3>
                                <h3 class="box-information box-information--secondary">23/03/2024</h3>
                            </div>
                        </div>

                    </div>

                </div>

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