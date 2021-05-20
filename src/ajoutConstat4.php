<?php 
session_start();
 ?>
<<<<<<< HEAD
<!DOCTYPE html>
<html lang="fr">
<script type="text/javascript" src="../src/ajoutConstat4.js"></script>
<head>
    <meta charset="UTF-8">
    <title>Déclaration de constat</title>
</head>
<body>
	<h1>Déclaration de constat</h1>
	<p>4 - Photos de l’accident</p>

    <form action="uploadConstat4.php" method="post" enctype="multipart/form-data">
        <h2>Upload Fichier</h2>
        <label for="fileUpload">Fichier:</label>
        <p><input type="file" name="fichier" id="fileUpload"></p>
        <p><input type="submit" name="submit" value="Upload"></p>
        <p><strong>Note:</strong> Seuls les .jpg .jpeg .png sont autorisés</p>
=======
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Constat</title>
 </head>
 <body>
 	<form action="enregistrerPartie4.php" method="POST" enctype="multipart/form-data">
        Photos : <input type="file" name="photo[]" multiple>
        <button type="submit" name="submit" >Enregistrer</button>
>>>>>>> c05d9e6e0d675d8bf8036b1fb0727b213e26d898
    </form>

	<div id="info"></div>
</body>
</html>

