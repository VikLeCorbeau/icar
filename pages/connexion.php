<?php 
	session_start();
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
    
    <link href="../css/generics.css" rel="stylesheet">
    <link href="../css/connexion.css" rel="stylesheet">
</head>
<body>


    <div class="main-container">


        <div class="nav-container" style="border: none;">
            <div class="nav-container-1440">
                <div class="nav-logo-container">
                    <svg aria-hidden="true" class="logo">
                        <use xlink:href="../assets/svg/logo/logo.svg#logo"></use>
                    </svg>
                </div>
            </div>
        </div>

        <div class="container-1440" style="margin-bottom: 0!important;">


            <div class="content-container content-center content-page">

                <form action="../src/verificationConnexion.php" method="get" class="form-connection">
                    <h1 class="form-connection-title">Content de vous revoir !</h1>
                    <div class="form-connection-input-container">
                        <label for="name" class="form-connection-label">E-mail</label>
                        <input type="text" name="name" id="name" class="form-connection-input" placeholder="Entrez votre adresse mail" required>
                    </div>
                    <div class="form-connection-input-container">
                        <label for="password" class="form-connection-label">Mot de passe</label>
                        <input type="password" name="password" id="password" class="form-connection-input" placeholder="Entrez votre mot de passe" required>
                    </div>
                    <div class="form-connection-input-container">
                        <input type="submit" class="button button--dark" value="Connexion">
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