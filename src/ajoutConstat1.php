<?php
    /*session_start();
    $filename = "../db/InfoAssure/".$_SESSION['identifiants']."/constats";
    if (!file_exists($filename)) {
        mkdir($filename, 0777, true);
    }*/
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

                    <form action="enregistrerPartie1.php" method="POST">

                        <div class="form-container">
        
                            <h1 class="form-title"></h1>

                            <div class="form-container-3">
                            
                                <div class="input-container">
                                    <label for="" class="form-label">date de l'accident</label>
                                    <input type="date" name="date" class="form-slim-input">
                                </div>

                                <div class="input-container">
                                    <label for="" class="form-label">Heure de l'accident</label>
                                    <input type="time" name="heure" class="form-slim-input">
                                </div>

                                <div class="input-container">
                                    <label for="" class="form-label">Localisation exacte</label>
                                    <input type="text" name="localisation" class="form-slim-input">
                                </div>

                            </div>
                        </div>

                        
                        <div class="form-container">

                            <h1 class="form-title"></h1>

                            <div class="form-container-3">

                                <div class="input-container">
                                    <p class="radio-title">Autres dégats matériels</p>
                                    <div class="input-radio-container">
                                        <div class="input-radio">
                                            <input type="radio" name="degat" value="oui">
                                            <label for="oui" class="label-radio">Oui</label>
                                        </div>
                                        <div class="input-radio">
                                            <input type="radio" name="degat" value="non">
                                            <label for="non" class="label-radio">Non</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-container">
                                    <p class="radio-title">Bléssé(s) même léger(s)</p>
                                    <div class="input-radio-container">
                                        <div class="input-radio">
                                            <input type="radio" name="blesse" value="oui">
                                            <label for="oui" class="label-radio">Oui</label>
                                        </div>
                                        <div class="input-radio">
                                            <input type="radio" name="blesse" value="non">
                                            <label for="non" class="label-radio">Non</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>    

                        <h3>Ajout de témoin</h3>

                        <label for="">Nom du témoin</label>
                        <input type="text" id="nomT" name="nomT" placeholder="nom du témoin">
                        
                        <label for="">Prénom du témoin</label>
                        <input type="text" id="prenomT" name="prenomT" placeholder="prénom du témoin">

                        <label for="">Adresse du témoin</label>
                        <input type="text" id="adresseT" name="adresseT" placeholder="adresse du témoin">

                        <label for="">Téléphone du témoin</label>
                        <input type="text" id="telephoneT" name="telephoneT" placeholder="Téléphone du témoin">

                        <label for=""><input type="button" value="Ajouter le témoin" onclick="ajouterT()">
                        <input type="submit" value="continuer">

                    </form>

                    <h3>Liste des témoins</h3>
                    <table id="listeT">
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Adresse</th>
                            <th>Téléphone</th>
                            <th></th>
                        </tr>
                        <?php /*
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
                        fclose($ft);*/
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

    <script type="text/javascript">
        function ajouterT(){
            nom = document.getElementById("nomT").value;
            prenom = document.getElementById("prenomT").value;
            adresse = document.getElementById("adresseT").value;
            tel = document.getElementById("telephoneT").value;

            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if (this.readyState==4 && this.status==200) {
                    tr = document.createElement('tr');
                    tr.appendChild(document.createElement('td'));
                    tr.appendChild(document.createElement('td'));
                    tr.appendChild(document.createElement('td'));
                    tr.appendChild(document.createElement('td'));
                    tr.appendChild(document.createElement('td'));
                    tr.cells[0].appendChild(document.createTextNode(nom));
                    tr.cells[1].appendChild(document.createTextNode(prenom));
                    tr.cells[2].appendChild(document.createTextNode(adresse));
                    tr.cells[3].appendChild(document.createTextNode(tel));
                    var croix = document.createElement('IMG');
                    croix.alt = 'croix';
                    croix.src = '../db/croix.png';
                    croix.onclick = retirerT();
                    tr.cells[4].appendChild(croix);

                    element = document.getElementById("listeT");
                    element.appendChild(tr);
                }
            };
            xhttp.open("POST", "ajouterTemoin.php",true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send("nom="+nom+"&prenom="+prenom+"&adresse="+adresse+"&tel="+tel);
        }
        function retirerT(){
            $tab = document.getElementById('listeT');
        }
    </script>

</body>
</html>
