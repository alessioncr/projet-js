<?php
  $title = "modifClient";
  include('header.php');


  
// Vérifie si une SESSION est active
if (isset($_SESSION["idUser"])) {
  // ENREGISTRER LES MODIFICATION DE LA FICHE CLIENT
  if (isset($_POST["btnEnregistrer"]))
  {
    
    // CHARGEMENT DES VALEUR $_POST
    $id       = $_SESSION["id_client"];
    $nom      = $_POST['nom'];
    $tel      = $_POST['tel'];
    $anni     = date('Y-m-d', strtotime($_POST['anni']));
    $details  = $_POST['details'];
    $insta    = $_POST['insta'];
    $face     = $_POST['face'];
    // Initialisation $retard
    $retard = (isset($_POST['retard'])) ? "1" : "0";

    // vérification que le nom client soit unique
    if (verifNomClient($id, $nom)) 
    {
      echo (' <script type="text/javascript"> alert("Le nom choisi est déjà utilisé !"); </script>');
    }
    else
    {
      // MISE à JOUR DE LA BDD
      updateClient($id, $nom, $tel, $anni, $details, $insta, $face, $retard);  /*, $valide*/
      header("Location:client.php?id=$id");
      exit();
    }
    // SUPRESSION $valide_cli  PAS D'UTILITé DE FAIRE UNE SUPPRESSION LOGIQUE (pour l'instant)
    /*
    $valide   = $_POST['valide'];
    if (empty($valide)){
      $valide = "0";
    }
    */ 
  }
  // CHARGEMENT DES DONNÉES CLIENT BDD
  if (!empty($_SESSION["id_client"]))
  {
    $id       = $_SESSION["id_client"];
    $client   = getClient($id);
    $nom      = ucfirst ($client['NOM_CLI']);     // ucfirst = initcap ;
    $tel      = $client['TEL_CLI'];
    $anni     = date('Y-m-d', strtotime($client['ANNIVERSAIRE_CLI']));
    $details  = $client['DETAILS_CLI']; 
    $retard   = $client['RETARD_CLI'];
    /*
    $valide   = $client['VALIDE_CLI'];
    */
    $insta    = $client['INSTA_CLI'];
    $face     = $client['FACE_CLI'];

?>
    <!-- PAGE CLIENT -->
    <div class="container jumbotron p-5 my-5 bg-dark shadow text-dark">
      <!-- FORMULAIRE CLIENT -->
      <form action  ="modifClient.php" 
            method  ="post" 
            class   ="form jumbotron px-5"
            >
        <div class="row">
          <!-- INFOS CLIENT -->
          <div class="col">
            <label for="nom">Nom :</label>
            <div class="row"></div>
            <input name="nom" value="<?php echo($nom)?>" >
            <div class="row"></div>

            <label for="tel">Téléphone :</label>
            <div class="row"></div>
            <input name= "tel" value="<?php echo($tel)?>" >
            <div class="row"></div>

            <label for="anni">Anniversaire :</label>
            <div class="row"></div>
            <input type=date name="anni" value="<?php echo date('Y-m-d', strtotime($anni));?>">
          </div>
          
          <!-- LIENS RESEAUX SOCIAUX -->
          <div class="col mt-4">
            <label for="insta">Instagram:</label>
            <input name="insta" type="text" class="form-control" value="<?php echo($insta)?>" >
            <br>
            <label for="face">Facebook:</label>
            <input name="face" type="text" class="form-control" value="<?php echo($face)?>" >
          </div>
        
          <!-- PHOTO DE PROFIL -->
          <div class="col pt-3">
            <div>
              <img  style=" size: cover;
                            max-height: 170px;
                            position: relative"
                    src="./images/photo/Adriano.jpg" alt="Photo de profil ">
            </div>
          </div>
        </div>
        
        <!-- DETAILS de la FICHE CLIENT -->
        <div class="row pt-4">
          <div class="col-5">
            <label for="details">Détails :</label>
          </div>
        </div>          
        <div class="row">
          <div class="col-12">
            <textarea class="shadow" name="details" id="details" cols="20" rows="5"><?php echo($details); ?> </textarea>
          </div>
          <!-- CHECKBOX VALIDE ET EN RETARD -->
          <div class="col-12 mt-4">
            <label for="retard">Souvent en retard :</label>
            <input type="checkbox" name="retard" <?php if ($retard){echo("checked");}?>>
            <small></small> 
          </div>
          <!--
          <div class="col-12">
            <label for="valide">Client actif :</label>
            <input type="checkbox" name="valide" checked value="1">
           </div>
          -->
        </div>

        <!-- BUTTON ENREGISTRER -->
        <input class="btn btn-outline-warning mt-5" type="submit" name="btnEnregistrer" value="Enregistrer">

      <!-- FIN FORM --> 
      <!-- GALLERIE PHOTO CLIENT -->
      <a  href="media.php?id=<?=$id?>" class="btn btn-outline-warning mt-5"> Ajouter une image </a>
      <?php
            include('galerie.php');
      ?>        
      </form>
    </div>

<?php 
  }
}
else {
  
  header("Location:error.php?message=Vous n'êtes pas connecté !");
}
  include('footer.php'); 
?>