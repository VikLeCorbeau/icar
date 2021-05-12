function upload(){
    // Recupère les info du formulaire
    fileUpload = document.getElementById("fileUpload");
    echo .fileUpload;
    echo .fichier;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            document.getElementById("info").innerHTML = this.responseText;
        }
    };

    /* Envoyer des informations au serveur pour un traitement */
    xhttp.open("POST", "../src/uploadConstat4.php", true);

    /* Ne pas oublier l'encodage des caractères */
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    /* Format de la donnée lorsque l'on envoi avec la méthode post */
    xhttp.send("fileUpload="+fileUpload);
}