<?php 
	session_start();

    if (isset($_SESSION['profil'])) {
        header('Location: ../accueil.php');
        exit();
    }

	if (isset($_POST['OUT'])) {
		session_destroy();
	}
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Connexion</title>

    <link rel="icon" href="../assets/svg/logo/icon.svg">

    <link href="../css/generics.css" rel="stylesheet">
    <link href="../css/connexion.css" rel="stylesheet">
    <link href="../css/form.css" rel="stylesheet">
</head>
<body>


    <div class="main-container">


        <?php include("../layouts/navigation.php"); ?>  

        <div class="container-1440" style="margin-bottom: 0!important;">


            <div class="content-container content-center content-page">

                <form action="../src/verificationConnexion.php" method="POST" class="form-connection">
                    <h1 class="form-connection-title">Content de vous revoir !</h1>
                    <div class="form-connection-input-container">
                        <label for="id" class="form-connection-label">Identifiant</label>
                        <input type="text" name="id" id="id" class="form-connection-input" placeholder="Entrez votre identifiant" required>
                    </div>
                    <div class="form-connection-input-container">
                        <label for="password" class="form-connection-label">Mot de passe</label>
                        <input type="password" name="password" id="password" class="form-connection-input" placeholder="Entrez votre mot de passe" required>
                    </div>
                    <div class="form-connection-input-container">
                        <button type="submit" class="button button--dark">
                            <p class="button-text">Connexion</p>
                        </button>
                    </div>
                </form>


                <div class="illustration-connection-container">
                    <img class="illustration-connection" src="../assets/svg/illustrations/illustration_connection.svg">
                </div>

                
            </div>

        </div>

    </div>

</body>
</html> 