
  <!-- HEADER -->
  <?php 
    include("header.php"); 
    $_SESSION["id_client"] = null;

    // CHARGEMENT DES DONNÉES PARAMETRE BDD
    $parametre                    = getParametre();

    $adresse                      = ($parametre['ADRESSE_PAR']);
    $description_par              = ($parametre['DESCRIPTION_PAR']);
    $horaire                      = ($parametre['MA_SA_PAR']);
    $prix_barbe                   = ($parametre['PRIX_BARBE_PAR']);
    $prix_coupe                   = ($parametre['PRIX_COUPE_PAR']);
    $prix_dreadlocks              = ($parametre['PRIX_DREADLOCKS_PAR']);
    $prix_coupe_et_barbe          = ($parametre['PRIX_C_ET_B_PAR']);
    $email                        = ($parametre['EMAIL_PAR']);
    $telephone                    = ($parametre['TEL_PAR']);
    // $password_par                 = ($parametre['PASSWORD_PAR']);
    /* Bouton Vacance */
    $vacances                     = ($parametre['VACANCES_PAR']);
    $insta_par                    = ($parametre['INSTAGRAM_PAR']);
    $face_par                     = ($parametre['FACEBOOK_PAR']);
   
  ?>

  <!-- BODY -->
  <div class="container jumbotron bg-dark shadow p-3 mt-2" id="ficheClient">

      <!-- div VIDEO -->
        <!-- VIDEO responsive -->
        <div class="embed-responsive rounded shadow embed-responsive-16by9 mb-3" id="myVideo">
          <video class="rounded" src="images/accueil/videopresentation.mp4" autoplay loop controls muted poster>
          </video>
        </div>

    <!-- DESCRIPTION -->
    <div class="shadow border bg-light border-warning rounded text-center">
        <p class="p-3" ><?php echo($description_par)?></p>
    </div>

    <!--Galerie Wall of fame-->
    <?php include("walloffame.php"); ?>
    <!--message aléatoire du Livre d'or-->
    <?php include("livredor.php"); ?>
    <!--infos-->
    <?php include("infos.php"); ?>
    <!--tarif-->
    <?php include("tarif.php"); ?>
    </div>
  </div>
    <!-- FOOTER -->
    <?php include("footer.php"); ?>
    