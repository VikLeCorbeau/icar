<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="../css/visiteur.css" media="screen" type="text/css" />
    </head>
<body>
    <h1>Carte verte de l'assurance</h1>
    <p>Dates de validité de l’assurance :</p>
    <p>Identification du véhicule : </p>
    <p>Numéro de contrat d’assurance : </p>
    <p>Nom de l’assurance : </p>
    <p>Identifiez vous pour accedez a vos informations !</p>
    <a href="connexion.php">Accedez à votre espace</a>

    <form action="verification.php" method="POST">
        <h1>Connexion</h1>      
        <label><b>E-mail</b></label>
            <input type="text" placeholder="Entrer votre adresse mail" name="username" required><br>
            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer votre mot de passe" name="password" required><br>
            <input type="submit" id='submit' value='LOGIN' >
            <?php
            if(isset($_GET['erreur'])){
                $err = $_GET['erreur'];
                if($err==1 || $err==2)
                    echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
    </form>
    <p>CONTACT</p><br>
    <p>Num  mail</p>
    <p>SUPPORT</p><br>
    <a href="">Signaler une erreur aux administrateurs</a>
</body>
</html>