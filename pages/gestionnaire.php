<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Gestionnaire</title>
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
<?php echo "<p>Bonjour ".$_SESSION['identifiants']."</p>";
echo "<p>modifier les informations du ou des contrats</p>";
echo "<p>répondre aux messages des assurés</p>";
echo "<p>traiter les différentes déclarations (sinistre, changement de coordonnées, cession de véhicule)</p>";
echo "<p>connaître le nombre de sinistres responsabilité : totale, partielle, non responsable</p>";
echo "<p>remonter des problèmes de fonctionnalités à l'administrateur (sous forme de ticket GLPI)</p>";
echo "<p>recheche dans ses clients</p>";
?>
<a href="creerContrat.php">Créer un nouveau contrat</a>

</body>

<form action="../pages/connexion.php" method="POST">
		<input type="submit" name="OUT" value="déconnexion">
</form>
</html>