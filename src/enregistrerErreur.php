<!DOCTYPE html>
<html>
    <head>
	    <title>Enregistrer Erreur</title>
    </head>
<body>
    <?php

    // Crée un fichier 
        $var = "../db/erreur.csv";

        // Ouvre le fichier en écriture seule
        $fp = fopen($var, 'a+');

        // Complète le fichier avec les statistique de but et de temps de jeu
        $stats = array(
            array($_POST["nom"], $_POST["prenom"], $_POST["mail"], $_POST["titre"], $_POST["urgence"], $_POST["type"], $_POST["erreur"])
        );

        // Place des virgules
    foreach($stats as $fields) {
        fputcsv($fp, $fields, ";");
    }

    // Ferme le fichier
    fclose($fp);
    header('Location: ../pages/signalerErreur.php?value=ok');
    exit();
    ?>
</body>
</html>