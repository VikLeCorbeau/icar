<?php
    session_start();

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $tel = $_POST['tel'];

    /* PARTIE SUPPRESSION EN DB A FAIRE !!!!! L'AJAX EST FAIT. */

    echo($nom . $prenom . $adresse . $tel)

?>