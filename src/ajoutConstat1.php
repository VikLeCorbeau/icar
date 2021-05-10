<?php
session_start()
?>

<!DOCTYPE html>
<html>
    <head>
	    <title>Ajouter Constat</title>
    </head>
<body>
    <style type="text/css">
        img{
            width:30px;
        }
    </style>
    <h1>Déclaration de constat</h1>
    <h2>1-Informations générales</h2>

    <form action = "enregistrerPartie1.php" method="POST">
        <p>date de l'accident <input type="date" name="date"></p>
        <p>Heure de l'accident <input type="time" name="heure"></p>
        <p>Localisation exacte <input type="text" name="localisation"></p>
        <p>Autres dégats matériels <input type="radio" name="degat" value="oui">Oui<input type="radio" name="degat" value="non">Non</p>
        <p>Bléssé(s) même léger(s) <input type="radio" name="blesse" value="oui">Oui<input type="radio" name="blesse" value="non">Non</p>
    <h3>Ajout de témoin</h3>
        <p>Nom du témoin : <input type="text" id="nomT" name="nomT" placeholder="nom du témoin"></p>
        <p>Préom du témoin : <input type="text" id="prenomT" name="prenomT" placeholder="prénom du témoin"></p>
        <p>Adresse du témoin : <input type="text" id="adresseT" name="adresseT" placeholder="adresse du témoin"></p>
        <p>Téléphone du témoin : <input type="text" id="telephoneT" name="telephoneT" placeholder="Téléphone du témoin"></p>
        <p><input type="button" value="Ajouter le témoin" onclick="ajouterT()"></p>

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
        <?php 
        if ($ft = fopen("../db/constat/tempTemoin.csv", 'r')) {
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
            $tab = 
        }
    </script>

</body>
</html>