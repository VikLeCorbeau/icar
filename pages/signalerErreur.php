<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Signaler Erreur</title>
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
<?php
    if(isset($_GET['value'])){
        if($_GET['value'] == 'ok'){
            echo '<p>Votre erreur a bien été enregistrée</p>';
        }
    }
?>
    <h1>Signaler une erreur aux administrateurs</h1>
    <h2>Qui êtes-vous ?</h2>
    <form action = "../src/enregistrerErreur.php" method="POST">
        <p>Nom <input type="text" name="nom" placeholder="Nom" required></p>
        <p>Prenom <input type="text" name="prenom" placeholder="Prénom" required></p>
        <p>Adresse mail <input type="text" name="mail" placeholder="Adresse mail" required></p>
    <h3>Informations sur l’erreur</h3>
        <p>Titre <input type="text" id="titre" name="titre" placeholder="Titre" required></p>

        <label for="urgence">Urgence</label>
        <select name="urgence" id="urgence">
            <option value="dog">Faible</option>
            <option value="cat">Moyenne</option>
            <option value="hamster">Haute</option>
        </select>

        <p>Type <input type="text" id="type" name="type" placeholder="Type" required></p>

        <label for="erreur">Explication de l'erreur</label><br>
        <textarea placeholder="Explication de l'erreur..." id="erreur" name="erreur" rows="5" cols="50" required></textarea>
        <br>
        <input type="submit" value="Signaler l'erreur à l'administration">
    </form>
</body>
</html>