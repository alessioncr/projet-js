<?php 

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

    <footer>
        <div class="container-fluid bg-light mt-5">
            <p class="text-center">© Copyright 2020-2021 realisé par  Alessio & John & Pierre</p>
            <div class="row">
                <div class="col">
                    <a  href="index.php"><img src="./images/logo/logo5"  width="100" height="100" ></a><br>
                    Contact:<br>
                    
                    Telephone : <?php echo($telephone)?> <br>
                    
                </div>
                <div class="col" >
                    <a class="nav-link text-dark" href="index.php" >Dreadz Barber  </a>
                    <a class="nav-link text-dark" href="index.php#infos">Nous Contacter </a>
                    <a class="nav-link text-dark" href="index.php#tarif">Nos tarifs</a>
                    <a class="nav-link text-dark" href="index.php#wall">Wall of fame</a>
                </div>
                <div class="col">
                    Suivez nous sur:
                    <div class="icons">
                    <a href="<?php echo($insta_par) ?>"><i class='fa fa-instagram'></i></a>
                    <a href="<?php echo($face_par) ?>"><i class='fa fa-facebook'></i></a>
                    </div>
                </div>
            </div>  
        </div>
    </footer>
    <!-- JS, Popper.js, and jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/693819749c.js" crossorigin="anonymous"></script>
    <script src="bootbox.min.js"></script>
    <script src="bootbox.locales.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    
</html>