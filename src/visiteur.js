function rechercher(){
    // Recupère les info du formulaire
    nom = document.getElementById("nom").value;
    prenom = document.getElementById("prenom").value;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            document.getElementById("info").innerHTML = this.responseText;
        }
    };

    /* Envoyer des informations au serveur pour un traitement */
    xhttp.open("GET", "../src/afficherCarteVerte.php?nom="+nom+"&prenom="+prenom, true);

    /* Ne pas oublier l'encodage des caractères */
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    /* Format de la donnée lorsque l'on envoi avec la méthode post */
    xhttp.send();
}