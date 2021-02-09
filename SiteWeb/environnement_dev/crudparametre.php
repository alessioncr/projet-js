<?php
  $title = "Parametre";
  include('header.php');


  
// Vérifie si une SESSION est active
if (isset($_SESSION["idUser"])) {

  // ENREGISTRER LES MODIFICATION DE LA FICHE PARAMETRE
if (isset($_POST["btnEnregistrerPar"]))
{
  $description_par=htmlspecialchars($_POST["description_par"]) ;
  $descriptionlength=strlen($description_par);
  if($descriptionlength<=255){
    // CHARGEMENT 
    $adresse                        = $_POST['adresse'];
    $description_par                = $_POST['description_par'];
    $horaire                        = $_POST['horaire'];
    $prix_barbe                     = $_POST['prix_barbe'];
    $prix_coupe                     = $_POST['prix_coupe'];
    $prix_dreadlocks                = $_POST['prix_dreadlocks'];
    $prix_coupe_et_barbe            = $_POST['prix_coupe_et_barbe'];
    $email                          = $_POST['email'];
    $telephone                      = $_POST['telephone'];
    // $password_par                   = $_POST['password_par'];
    /* initialisation Vacance */
    $vacances = (isset($_POST['vacances'])) ? "1" : "0";
    $insta_par                      = $_POST['insta_par'];
    $face_par                       = $_POST['face_par'];   
            
  
    updateParametre($adresse, $description_par, $horaire, $prix_barbe, $prix_coupe, $prix_dreadlocks, $prix_coupe_et_barbe, $email, $telephone, $vacances, $insta_par, $face_par);
    
    
    }
    else{
      echo   ('<script type="text/javascript"> alert("Le message ne doit pas depasser 255 caractères ! "); </script>');
    }
}

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


    <!-- PAGE CLIENT -->
    <div class="container jumbotron bg-dark shadow text-dark">
      <h1 style="color:white">Paramètre</h1>
      <!-- FORMULAIRE PARAMETRE -->
      <form action  ="crudparametre.php" 
            method  ="post" 
            class   ="form jumbotron px-5"
            >
        
        
          <div><!-- Index -->
            <h4>Index :</h4>
            <!-- DETAILS DESCIPTION -->
            <div class="row mt-2">
              <div class="col-5">
                <label for="description_par">Description :</label>
              </div>      
              <div class="col-5">
                <textarea class="shadow" name="description_par" id="description_par" cols="21" rows="8"><?php echo($description_par); ?></textarea>
              </div>
            </div>
          </div><!-- Index -->

          <div><!-- infos -->
            <h4>Informations :</h4>
            <!-- DETAILS ADRESSE -->
            <div class="row mt-2">
              <div class="col-5">
                <label for="adresse">Adresse : </label>
              </div>     
              <div class="col-5">
                <input name="adresse" value="<?php echo($adresse)?>"  size="17" >
              </div> 
            </div>
            <!-- HORAIRES -->
            <div class="row mt-2">
              <div class="col-5">
                <label for="horaire">Horaires :</label>
              </div>        
              <div class="col-5">
                <input name="horaire" value="<?php echo($horaire)?>"  size="17">
              </div>
            </div>
            <!-- EMAIL -->
            <div class="row  mt-2">
              <div class="col-5">
                <label for="email">Email :</label>
              </div>
              <div class="col-5">
                <input name="email" value="<?php echo($email)?>"  size="17">
              </div>
            </div>
            <!-- TELEPHONE -->
            <div class="row  mt-2">
              <div class="col-5">
                <label for="telephone">Telephone :</label>
              </div>        
              <div class="col-5">
                <input name="telephone" value="<?php echo($telephone)?>"  size="17">
              </div>
            </div>
            <!-- CHECKBOX VACANCES -->
            <div class="row mt-2 ">
              <div class="col-5">
                <label for="retard">Vacances :</label>
              </div>
              <div class="col-5">
                <input type="checkbox" name="vacances" <?php if ($vacances){echo("checked");}?>>
              </div>
            </div>
          </div> <!-- infos -->
          
          <div><!-- Tarifs -->
            <h4>Tarifs :</h4>
            <!-- PRIX BARBE -->
            <div class="row  mt-2">
              <div class="col-5">
                <label for="prix_barbe">Prix barbe :</label>
              </div>         
              <div class="col-5">
                <input name="prix_barbe" value="<?php echo($prix_barbe)?>"  size="17">
              </div>
            </div>
            <!-- PRIX COUPE -->
            <div class="row  mt-2">
              <div class="col-5">
                <label for="prix_coupe">Prix coupe :</label>
              </div>        
              <div class="col-5">
                <input name="prix_coupe" value="<?php echo($prix_coupe)?>"  size="17">
              </div>
            </div>            
            <!-- PRIX DREADLOCKS -->
            <div class="row  mt-2">
              <div class="col-5">
                <label for="prix_dreadlocks">Prix dreadlocks :</label>
              </div>         
              <div class="col-5">
                <input name="prix_dreadlocks" value="<?php echo($prix_dreadlocks)?>"  size="17">
              </div>
            </div> 
            <!-- PRIX COUPE ET BARBE -->
            <div class="row  mt-2">
              <div class="col-5">
                <label for="prix_coupe_et_barbe">Prix coupe et barbe :</label>
              </div>
              <div class="col-5">
                <input name="prix_coupe_et_barbe" value="<?php echo($prix_coupe_et_barbe)?>"  size="17">
              </div>
            </div>
          </div><!-- Tarifs -->

          <div><!-- RESEAUX SOCIAUX -->
            <h4>Réseaux sociaux :</h4>
            <!-- INSTAGRAM -->
            <div class="row  mt-2">
              <div class="col-5">
                <label for="insta_par">Instagram :</label>
              </div>        
              <div class="col-5">
                <input name="insta_par" value="<?php echo($insta_par)?>"  size="17">
              </div>
            </div>
            <!-- FACEBOOK -->
            <div class="row  mt-2">
              <div class="col-5">
                <label for="face_par">Facebook :</label>
              </div>        
              <div class="col-5">
                <input name="face_par" value="<?php echo($face_par)?>"  size="17">
              </div>
            </div>
          </div><!-- RESEAUX SOCIAUX -->


          <!-- WALL OF FAME ? -->
          
        

        <!-- BUTTON ENREGISTRER -->
        <input class="btn btn-outline-warning mt-5" type="submit" name="btnEnregistrerPar" value="Enregistrer">
        
      </form>
    </div> 
<?php
  
}
else {
  
  header("Location:error.php?message=Vous n'êtes pas connecté !");
}
  include('footer.php'); 
?>