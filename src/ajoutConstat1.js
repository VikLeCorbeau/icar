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