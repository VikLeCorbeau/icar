<?php
    session_start();
    require_once("../src/fonctions.php");

    verificationType(array('assure'));
?>

<!DOCTYPE html>
<html>
    <head>    
        
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Justificatif Changement de Coordonnées</title>

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
                        <h1 class="content-title">Ajouter un nouveau justificatif</h1>
                    </div>

                </div>
                <?php 
                	echo "<form action='../src/enregistrerImageChangement.php' method='POST' enctype='multipart/form-data' id='ajoutConstat4'>";
                 ?>
                    <div class="grid-form">

                        <div class="input-container">

                            <div class="form-images-container">
                                <div class="form-images-illustration-container">
                                    <img class="form-images-illustration" src="../assets/svg/illustrations/illustration_add_images.svg">
                                </div>
                                <div class="form-images-input-file-container">
                                    <input class="form-images-input-file" id="photos-input" type="file" name="photo[]" required>
                                    <label class="form-images-input-file-label" for="photos-input">Selectionner une photo</label>
                                </div>
                            </div>

                        </div>

                        <div class="input-container">

                            <div id="photos-choosen" class="photo-choosen-container">

                                <div class="photo-choosen">
                                    <p id="no-photo" class="photo-choosen-text">pas de photos sélectionnées</p>
                                </div>
                                
                            </div>

                        </div>

                        <div class="input-container">
                            <button type="button" class="button button--light" id="supprimer-photos">
                                <p class="button-text">Supprimer les photos</p>
                            </button>
                        </div>

                    </div>

                    <div class="buttons-container">
						<button form="ajoutConstat4" type="submit" class="button button--yellow" name="submit">
                            <p class="button-text">Changer le justificatif</p>
                        </button>

                    </div>

                </form>

            </div>
        </div>

        <?php include "../layouts/footer.php"; ?>

    </div> 

    <script src="../assets/js/inputfiles.js"></script>

</body>
</html>