<?php 
	session_start();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Constat</title>
 </head>
 <body>
 	<form action="enregistrerPartie4.php" method="POST" enctype="multipart/form-data">
        Photos : <input type="file" name="photo[]" multiple>
        <button type="submit" name="submit" >Enregistrer</button>
    </form>
 </body>
 </html>