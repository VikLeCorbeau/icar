<!DOCTYPE html>
<html lang="fr">
<script type="text/javascript" src="../src/ajoutConstat3.js"></script>

<body>
<?php
if ($_FILES['fileToUpload']['error']  > 0 ) {
  echo 'Erreur:'.$_FILES['fileToUpload']['error'].'<br/>';
} else {
  $res = move_uploaded_file( 
           $_FILES['fileToUpload']['tmp_name'], 
           $uploadDir.$_FILES['fileToUpload']['name']);
    header("uploadConstat4.php");
}
?>
</body>