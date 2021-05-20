<?php 
include('phpqrcode/qrlib.php');
<<<<<<< HEAD
<<<<<<< HEAD
$lien = "http://localhost/icar/pages/visiteur.php";
=======
$lien = "localhost/Projet_Car/icar/pages/visteur.php";
>>>>>>> 446a1eca480fe6a03812a255009744b4ce55010f
=======
$lien = "http://localhost/icar/pages/visiteur.php";
>>>>>>> c05d9e6e0d675d8bf8036b1fb0727b213e26d898
QRcode::png($lien, 'image-qrcode.png');
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Qr code</title>
	<script type="text/javascript" src="../src/visiteur.js"></script>
 </head>
 <body>
 	<p>Le qrCode de la page est : </p>
 	<img src="image-qrcode.png" width="150px">
 </body>
 </html>