<?php
  $title = "Parametre";
  include('header.php');


  
// Vérifie si une SESSION est active
if (isset($_SESSION["idUser"])) {

  // ENREGISTRER LES MODIFICATION DE LA FICHE PARAMETRE
if (isset($_POST["btnEnregistrer"]))
{
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
      <!-- FORMULAIRE PARAMETRE -->
      <form action  ="crudparametre.php" 
            method  ="post" 
            class   ="form jumbotron px-5"
            >
        <div class="row"> <!-- pour la page -->
        
        <!-- DETAILS ADRESSE -->
        <div class="row">
          <div class="col">
            <label for="adresse">Adresse : </label>
          </div>     
          <div class="col">
            <input name="adresse" value="<?php echo($adresse)?>" >
          </div> 
        </div>
      
        <!-- DETAILS DESCIPTION -->
        <div class="row">
          <div class="col">
            <label for="description_par">description :</label>
          </div>      
          <div class="col">
            <textarea class="shadow" name="description_par" id="description_par" cols="20" rows="5"><?php echo($description_par); ?> </textarea>
          </div>
          </div>
        
        <!-- HORAIRES -->
        <div class="row">
          <div class="col">
            <label for="horaire">Horaires :</label>
          </div>        
          <div class="col">
            <input name="horaire" value="<?php echo($horaire)?>">
          </div>
        </div>
        
        <!-- PRIX BARBE -->
        <div class="row">
          <div class="col">
            <label for="prix_barbe">Prix barbe :</label>
          </div>         
          <div class="col">
            <input name="prix_barbe" value="<?php echo($prix_barbe)?>">
          </div>
        </div>
        
        <!-- PRIX COUPE -->
        <div class="row">
          <div class="col">
            <label for="prix_coupe">Prix coupe :</label>
          </div>        
          <div class="col">
            <input name="prix_coupe" value="<?php echo($prix_coupe)?>">
          </div>
        </div>
        
        <!-- PRIX DREADLOCKS -->
        <div class="row">
          <div class="col">
            <label for="prix_dreadlocks">Prix dreadlocks :</label>
          </div>         
          <div class="col">
            <input name="prix_dreadlocks" value="<?php echo($prix_dreadlocks)?>">
          </div>
        </div>
        
        <!-- PRIX COUPE ET BARBE -->
        <div class="row">
          <div class="col">
            <label for="prix_coupe_et_barbe">Prix coupe et barbe :</label>
          </div>
          <div class="col">
            <input name="prix_coupe_et_barbe" value="<?php echo($prix_coupe_et_barbe)?>">
          </div>
        </div>
        
        <!-- EMAIL -->
        <div class="row">
          <div class="col">
            <label for="email">Email :</label>
          </div>
          <div class="col">
            <input name="email" value="<?php echo($email)?>">
          </div>
        </div>
         
         <!-- TELEPHONE -->
         <div class="row">
          <div class="col">
            <label for="telephone">Telephone :</label>
          </div>        
          <div class="col">
            <input name="telephone" value="<?php echo($telephone)?>">
          </div>
        </div>

        <!-- INSTAGRAM -->
        <div class="row">
          <div class="col">
            <label for="insta_par">Instagram :</label>
          </div>        
          <div class="col">
            <input name="insta_par" value="<?php echo($insta_par)?>">
          </div>
        </div>

        <!-- FACEBOOK -->
        <div class="row">
          <div class="col">
            <label for="face_par">Facebook :</label>
          </div>        
          <div class="col">
            <input name="face_par" value="<?php echo($face_par)?>">
          </div>
        </div>
        
        <!-- LIENS RESEAUX SOCIAUX ? -->
        
        <!-- CHECKBOX VACANCES -->
          <div class="col-12 mt-4">
            <label for="retard">Vacances :</label>
            <input type="checkbox" name="vacances" <?php if ($vacances){echo("checked");}?>>
            <small></small> 
          </div>

        </div>  <!-- pour la page -->

        <!-- BUTTON ENREGISTRER -->
        <input class="btn btn-outline-warning mt-5" type="submit" name="btnEnregistrer" value="Enregistrer">
        
      </form>
    </div> 
<?php
  
}
else {
  
  header("Location:error.php?message=Vous n'êtes pas connecté !");
}
  include('footer.php'); 
?>
