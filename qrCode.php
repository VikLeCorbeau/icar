<?php 
include('phpqrcode/qrlib.php');
$lien = $_SERVER;
QRcode::png($lien, 'image-qrcode.png');
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Qr code</title>
 </head>
 <body>
 	<p>Le qrCode de la page est : </p>
 	<img src="image-qrcode.png" width="150px">
 </body>
 </html>