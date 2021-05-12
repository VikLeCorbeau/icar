<?php 
<<<<<<< HEAD
	session_start();
=======
session_start();
>>>>>>> 446a1eca480fe6a03812a255009744b4ce55010f
 ?>
<!DOCTYPE html>
<html>
<head>
<<<<<<< HEAD
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="../css/visiteur.css" media="screen" type="text/css" />
    <script type="text/javascript" src="../src/visiteur.js"></script>
</head>
<body>


<!-- Récupère les info du joueur voulu et appelle la fonction rechercher -->
<p>Nom : <input type="text" name="nom" id="nom" required></p>
    <p>Prenom : <input type="text" name="prenom" id="prenom" required></p>
    <p><input type="button" value="rechercher" onclick="rechercher()"></p>

    <h1>Carte verte de l'assurance</h1>

<!-- div ou seront écrit les statistiques -->
    <div id="info"></div>
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
=======
	<title></title>
</head>
<body>
	<style type="text/css">
		div{
			border:1px solid black;
			margin-left: 15px;
			width: 30%;
		}
	</style>
	<?php 
		$nomAssure = $_GET['assure'];
		$immatriculation = $_GET['immatriculation'];
	 ?>
	<p>Bonjour <?php echo $nomAssure; ?> </p>
	<?php 
		$fa = fopen("../db/InfoAssure/".$nomAssure."/contrats.csv", 'r');
		while ($data = fgetcsv($fa, 1000, ';')) {
			if ($immatriculation == $data[7]) {
				echo "<div>";
				echo "<p>Nom de l'assurance : ".$data[5]."</p>";
				echo "<p>Numéro de contrat d'assurance : ".$data[6]."</p>";
				echo "<p>Numéro d'immatriculation : ".$data[7]."</p>";
				echo "<p>date de validité : ".$data[8]."</p>";
				echo "<p>Modèle du véhicule : ".$data[9]."</p>";
				echo "</div>";
			}
		}
		fclose($fa);
	 ?>
>>>>>>> 446a1eca480fe6a03812a255009744b4ce55010f
</body>
</html>