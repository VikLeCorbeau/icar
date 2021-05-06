<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Assure</title>
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
<?php echo "<p>Bonjour ".$_SESSION['identifiants']."</p>";
?>
<br><a href="declarer_sinistre.php">Déclarer un sinistre</a></br>
<br><a href="declarer_changementcoordonnees.php">Déclarer un changement de coordonnées</a></br>
<br><a href="visualisercontrats.php">Visualiser son ou ses contrat(s) d’assurance</a></br>
<br><a href="declarationvente.php">Remplir la déclaration de vente de véhicule</a></br>
<br><a href="contacterassurance.php">Contacter l’assurance</a></br>
<br><a href="historique_declarationsinistre.php">Historique des déclaration de sinistre</a></br>
</body>

<br><form action="../pages/connexion.php" method="POST">
		<input type="submit" name="OUT" value="déconnexion">
</form></br>
</html>