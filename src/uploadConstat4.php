<!DOCTYPE html>
<html lang="fr">
<script type="text/javascript" src="../src/ajoutConstat3.js"></script>

<body>
<?php
if ($_FILES['fileToUpload']['error']  > 0 ) {
  echo 'Erreur:'.$_FILES['fileToUpload']['error'].'<br/>';
} else if ($_FILES['fileToUpload']['type']  != 'jpeg' | $_FILES['fileToUpload']['type']  != 'jpg' | $_FILES['fileToUpload']['type']  != 'png'){
  echo 'Erreur:'.$_FILES['fileToUpload']['name']."n'est pas du bon type<br/>";
} else {
  $res = move_uploaded_file( 
           $_FILES['fileToUpload']['tmp_name'], 
           $uploadDir.$_FILES['fileToUpload']['name']);
    header("uploadConstat4.php");
}
?>
</body>