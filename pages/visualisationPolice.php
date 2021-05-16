<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Police - Index</title>

    <link href="../css/generics.css" rel="stylesheet">
    <link href="../css/connexion.css" rel="stylesheet">
    <link href="../css/boxes.css" rel="stylesheet">
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
                    <div class="nav-search-container">
                        <div class="nav-search">
                            <label class="nav-search-label" for="site-search"></label>
                            <input class="nav-search-input" type="search" id="site-search" name="site-search"
                                aria-label="Rechercher ..." placeholder="Rechercher ...">
                            <button class="nav-search-button" type="submit" id=button-search>
                                <img src="../assets/svg/icons/search.svg">
                            </button>
                        </div>
                    </div>

                    <div class="nav-side-container">

                        <div class="nav-side-links-container">

                            <div class="nav-side-link-container">

                                <div class="nav-side-link">
                                    <svg aria-hidden="true" class="nav-side-svg">
                                        <use xlink:href="../assets/svg/type/type.svg#type_police"></use>
                                    </svg>
                                    <p class="nav-side-svg-text">Pierre Martin</p>

                                </div>

                                <div class="nav-side-link-dropdown-container">
                                    <ul class="nav-side-link-dropdown-ul">
                                        <li class="nav-side-link-dropdown-li"><a href="">Déconnexion</a></li>
                                    </ul> 
                                </div>

                            </div>

                        </div>
                        
                    </div>
                </div>

            </div>
        </div>
        <?php
            $tabAssure = array();
            $fa = fopen("../db/assure.csv", 'r');
            while ($data = fgetcsv($fa, 1000, ';')) {
                array_push($tabAssure, $data[0].$data[1]);
            }
            fclose($fa);
        ?>
        <div class="container-1440">
            <div class="content-container content-column">

                <div class="content-banner">
                    
                    <div class="content-titles-container">
                        <h1 class="content-title">Liste des assurés</h1>
                    </div>

                </div>
                <?php 
                    foreach ($tabAssure as $element) {
                        $fileLines=file("../db/InfoAssure/".$element."/contrats.csv");
                        $nombreVoitureAssure = count($fileLines);
                        $fa = fopen("../db/InfoAssure/".$element."/informations.csv", 'r');
                        while ($data = fgetcsv($fa, 1000, ';')) {
                            echo "<div class='boxes-container'>";
                            echo "<div class='boxes-row'>";
                            echo "<div class='box box-446'>";
                            echo "<div class='box-title-container'>";
                            echo "<h2 class='box-title'>".$data[3].' '.$data[2]."</h2>";
                            echo "</div>";
                            echo "<div class='box-informations-container'>";
                            echo "<div class='box-informations'>";
                            echo "<h3 class='box-information box-information--primary'>Nom :</h3>";
                            echo "<h3 class='box-information box-information--secondary'>".$data[2]."</h3>";
                            echo "</div>";
                            echo "<div class='box-informations'>";
                            echo "<h3 class='box-information box-information--primary'>Prénom :</h3>";
                            echo "<h3 class='box-information box-information--secondary'>".$data[3]."</h3>";
                            echo "</div>";
                            echo "<div class='box-informations'>";
                            echo "<h3 class='box-information box-information--primary'>Adresse mail :</h3>";
                            echo "<h3 class='box-information box-information--secondary'>".$data[5]."</h3>";
                            echo "</div>";
                            echo "<div class='box-informations'>";
                            echo "<h3 class='box-information box-information--primary'>Téléphone :</h3>";
                            echo "<h3 class='box-information box-information--secondary'>".$data[4]."</h3>";
                            echo "</div>";
                            echo "</div>";
                            echo "<div class='box-separator box-separator-446'></div>";
                            echo "<div class='box-vehicles-container'>";
                            echo "<div class='box-informations'>";
                            echo "<h3 class='box-information box-information--primary'>Véhicules :</h3>";
                            echo "<h3 class='box-information box-information--secondary'>".$nombreVoitureAssure."</h3>";
                            echo "</div>";                                        
                            echo "<div class='box-vehicles'>";
                            $fv = fopen("../db/InfoAssure/".$element."/contrats.csv", 'r');
                            while ($elem = fgetcsv($fv, 1000, ';')) {
                                echo "<div class='box-vehicle'>";
                                echo "<a href='visualiserContrats.php?assure=".$element."&immatriculation=".$elem[7]."&voiture=".$elem[9]."' class='box-vehicle-a'>";
                                echo "<p class='box-vehicle-svg-text'>".$elem[9]."</p>";
                                echo "<img src='../assets/svg/icons/contract_enter.svg'>";
                                echo "</a>";
                                echo "</div>";
                            }
                            fclose($fv);
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        }
                        fclose($fa);
                    } 
                ?>
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