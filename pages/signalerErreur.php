<?php
    session_start();
    require_once("../src/fonctions.php");

    verificationType(array('assure', 'police', 'gestionnaire', 'visiteur'));
?>

<!DOCTYPE html>
<html>
    <head>    
    
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Signaler une erreur</title>
        
        <link rel="icon" href="../assets/svg/logo/icon.svg">

        <link href="../css/generics.css" rel="stylesheet">
        <link href="../css/boxes.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">

    </head>
<body>

    <div class="main-container">

        <?php include("../layouts/navigation.php"); ?> 

        <div class="container-1440">
            <div class="content-container content-column">

                <div class="content-banner"> 
                    <div class="content-titles-container">
                        <h1 class="content-title">Signaler une erreur aux administrateurs</h1>
                    </div>
                </div>


                <form id="signalerErreur" class="form" action="../src/enregistrerErreur.php" method="POST">

					<div class="form-title-container">
						<h1 class="form-title">qui êtes-vous ?</h1>
					</div>

					<div class="grid-form">
						<?php 
							if ($fi = fopen("../db/InfoAssure/".$_SESSION['identifiants']."/informations.csv", 'r')) {
								while ($data = fgetcsv($fi, 1000, ';')) {
									$nom = $data[0];
									$prenom = $data[1];
									$email = $data[3];
								}
								fclose($fi);
							}
						 ?>
						<div class="input-container">
							<label for="nom" class="form-label">nom</label>
							<input type="text" name="nom" class="form-large-input" placeholder="Nom" value="<?php echo $nom; ?>" required>
						</div>

                        <div class="input-container">
							<label for="prenom" class="form-label">prénom</label>
							<input type="text" name="prenom" class="form-large-input" placeholder="Prénom" value="<?php echo $prenom; ?>" required>
						</div>

                        <div class="input-container">
							<label for="email" class="form-label">Adresse mail</label>
							<input type="email" name="email" class="form-large-input" placeholder="Adresse mail" value="<?php echo $email;?>" required>
						</div>
                    
                    </div>

                    <div class="form-title-container">
						<h1 class="form-title">informations sur l'erreur</h1>
					</div>

					<div class="grid-form">
						
						<div class="input-container">
							<label for="nom" class="form-label">titre</label>
							<input type="text" name="titre" class="form-large-input" placeholder="Titre" required>
						</div>

                        <div class="input-container">

                            <label for="urgence" class="form-label">urgence</label>

							<div class="select-container select-with-label">

								<select class="select" name="urgence">
									<option value="basse">Basse</option>
									<option value="moyenne">Moyenne</option>
									<option value="grande">Grande</option>
								</select>

							</div>

						</div>

                        <div class="input-container">

                            <label for="type" class="form-label">type</label>

							<div class="select-container select-with-label">

								<select class="select" name="type">
									<option value="formulaire">Formulaire</option>
									<option value="affichage">Affichage</option>
									<option value="autre">Autre</option>
								</select>

							</div>

						</div>

                        <div class="input-container">
							<label for="explication" class="form-label">explication de l'erreur</label>
							<textarea name="explication" class="form-textarea" placeholder="Explication de l'erreur ..." required></textarea>
						</div>

                    </div>


                    <div class="buttons-container">

                        <button form="signalerErreur" type="submit" class="button button--yellow">
                            <p class="button-text">Signaler l'erreur à l'administration</p>
                        </button>

                    </div>

                </form>


            </div>
        </div>

        <?php include("../layouts/footer.php"); ?>  

    </div> 

</body>
</html>
