
    <div class="nav-container <?php if (!isset($_SESSION['profil'])) {
        echo "nav-no-border";
    } ?>">
    <div class="nav-container-1440">

        <div class="nav-logo-container">
            <a href="../accueil.php">
                <svg aria-hidden="true" class="logo">
                    <use xlink:href="../assets/svg/logo/logo.svg#logo"></use>
                </svg>
            </a>
        </div>

        <?php if (isset($_SESSION['profil'])) { ?>
        
            <div class="nav-right-container">
                <?php if ($_SESSION['profil'] === 'police' || $_SESSION['profil'] === 'gestionnaire') { ?>

                    <div class="nav-search-container">
                        <div class="nav-search">
                            <label class="nav-search-label" for="site-search"></label>
                            <input class="nav-search-input" type="search" id="site-search" name="site-search"
                                aria-label="Rechercher ..." placeholder="Rechercher ...">
                            <button class="nav-search-button" type="submit" id=button-search>
                                <img src="../assets/svg/icons/search.svg">
                            </button>
                        </div>
                    </div>

                <?php } ?>

                <div class="nav-side-container">

                    <div class="nav-side-links-container">

                        <?php if ($_SESSION['profil'] === "assure" || $_SESSION['profil'] === "gestionnaire" || $_SESSION['profil'] === "admin") { ?>

                            <div class="nav-side-link-container">

                                    <div class="nav-side-link">
                                        <p class="nav-side-svg-text">Actions</p>
                                        <img src="../assets/svg/icons/down_arrow.svg" class="nav-side-arrow">
                                    </div>

                                    <div class="nav-side-link-dropdown-container">
                                        <ul class="nav-side-link-dropdown-ul">
                                            <?php 
                                            switch ($_SESSION['profil']) {
                                                case "assure":?>
                                                    <li class="nav-side-link-dropdown-li"><a href="../src/ajoutConstat1.php">Déclarer un constat</a></li>
                                                    <li class="nav-side-link-dropdown-li"><a href="../pages/mesContrats.php">Voir mes contrats d'assurance</a></li>
                                                    <li class="nav-side-link-dropdown-li"><a href="../pages/certificatCession1.php">Je vends mon véhicule</a></li>
                                                    <li class="nav-side-link-dropdown-li"><a href="../pages/contacterassurance.php">Contacter mon assurance</a></li>
                                                    <li class="nav-side-link-dropdown-li"><a href="../pages/mesConstats.php">Mes déclarations de constat</a></li>
                                                <?php break;
                                                case "gestionnaire":?>
                                                    <li class="nav-side-link-dropdown-li"><a href="../pages/mesAssures.php">Voir mes assurés</a></li>
                                                    <li class="nav-side-link-dropdown-li"><a href="../pages/">Voir mes messages</a></li>
                                                    <li class="nav-side-link-dropdown-li"><a href="../pages/traitements.php">Voir les traitements en attente</a></li>
                                                    <li class="nav-side-link-dropdown-li"><a href="../pages/creerAssure.php">Ouvrir un nouveau compte assuré</a></li>
                                                    <?php break;
                                                case "admin":?>
                                                    <li class="nav-side-link-dropdown-li"><a href="../pages/logs.php">Logs de modifications</a></li>
                                                    <li class="nav-side-link-dropdown-li"><a href="../pages/listeErreurs.php">Erreurs signalées</a></li>
                                                    <?php break;
                                            }
                                            ?>
                                        </ul> 
                                    </div>
                                    

                            </div>

                        <?php } ?>

                        <div class="nav-side-link-container">

                            <div class="nav-side-link">
                                <svg aria-hidden="true" class="nav-side-svg">
                                    <?php 
                                        switch ($_SESSION['profil']) {
                                            case "assure":?>
                                                <use xlink:href="../assets/svg/type/type.svg#type_insured"></use>
                                            <?php break;
                                            case "police":?>
                                                <use xlink:href="../assets/svg/type/type.svg#type_police"></use>
                                            <?php break;
                                            case "gestionnaire":?>
                                                <use xlink:href="../assets/svg/type/type.svg#type_gestionnaire"></use>
                                                <?php break;
                                            case "admin":?>
                                                <use xlink:href="../assets/svg/type/type.svg#type_admin"></use>
                                                <?php break;
                                            case "visiteur":?>
                                                <img src="../assets/svg/icons/signin.svg"">
                                                <?php break;
                                        }
                                    ?>
                                </svg>
                                <p class="nav-side-svg-text">
                                    <?php 
                                        if (isset($_SESSION['identifiants'], $_SESSION['profil'])) {
                                            if ($_SESSION['profil'] != "visiteur") {
                                                echo ($_SESSION['identifiants']);  
                                            } else {
                                                echo "<a href='../src/deconnexion.php' style='margin-left: 10px;'>Connexion</a>";
                                            }
                                        } 
                                    ?>
                                </p>

                            </div>
                            <?php if ($_SESSION['profil'] !== 'visiteur') { ?>
                            <div class="nav-side-link-dropdown-container">
                                <ul class="nav-side-link-dropdown-ul">
                                    <?php 
                                        if ($_SESSION['profil'] === 'assure') { ?>    
                                        <li class="nav-side-link-dropdown-li"><a href="../pages/declarer_changementcoordonnees.php">Changer mes coordonnées</a></li>
                                    <?php } ?>
                                      
                                    <li class="nav-side-link-dropdown-li"><a href="../src/deconnexion.php">Déconnexion</a></li>
                                    
                                </ul> 
                            </div>
                            <?php } ?>

                        </div>

                    </div>
                    
                </div>

            </div>

        <?php } ?>

    </div>
</div>

