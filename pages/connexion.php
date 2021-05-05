<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
	<?php 
		if (isset($_POST['OUT'])) {
			session_destroy();
		}
	 ?>
	<form action="../src/verificationConnexion.php" method="POST">
		<p>Nom d'utilisateur : <input type="text" name="id" required></p>
		<p>Mot de passe : <input type="password" name="password" required></p>
		<input type="submit" value="Connexion">
	</form>
</body>
</html> 