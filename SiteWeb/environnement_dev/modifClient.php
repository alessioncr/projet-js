<?php
  $title = "modifClient";
  include('header.php');


  
// Vérifie si une SESSION est active
if (isset($_SESSION["idUser"])) {
  // ************************************************************
  // CHARGEMENT DES DONNÉES CLIENT BDD
  // ************************************************************
  if (isset($_SESSION["id_client"]))
  {
    $id       = $_SESSION["id_client"];
    $client   = getClient($id);
    $nom      = ucfirst ($client['NOM_CLI']);     // ucfirst = initcap ;
    $tel      = $client['TEL_CLI'];
    $anni     = date('Y-m-d', strtotime($client['ANNIVERSAIRE_CLI']));
    $details  = $client['DETAILS_CLI']; 
    $retard   = $client['RETARD_CLI'];
    $insta    = $client['INSTA_CLI'];
    $face     = $client['FACE_CLI'];

    if (isset($_POST['delete'])){
      delMediasDef($id);
      echo ('<script type="text/javascript"> alert("Toute les images de votre clients ont été supprimé"); </script>');
    }
    // PHOTO PROFIL
    if (isset($_POST['btnPhotoProfil'])){
      $photoProfil = $_POST['photoProfil'];
      updatePhotoProfil($id, $photoProfil);
    }
    else {
      $photoProfil  = $client['PHOTO_PROFIL_CLI'];    
    }
    
    /*
    $valide   = $client['VALIDE_CLI'];
    */
?>
    <!-- PAGE CLIENT -->
    <div class="col-lg-5 container my-5 p-5 bg-dark shadow text-dark">
      <div class="jumbotron px-5 text-center">

        <!-- FORMULAIRE CLIENT -->
        <form action="modifClient.php" method="post">
          <legend>Fiche Client</legend>

          <!-- nom client -->
          <div class="row mt-3">
            <div class="col">
              <label for="nom">Nom :</label>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <input name="nom" value="<?php echo($nom)?>">
            </div>
          </div>
          <!-- tel client -->
          <div class="row mt-3">
            <div class="col">            
              <label for="tel">Téléphone :</label>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <input name="tel" value="<?php echo($tel)?>" >
            </div>
          </div>
          <!-- anni client -->
          <div class="row mt-3">
            <div class="col">
              <label for="anni">Anniversaire :</label>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <input type=date name="anni" value="<?php echo date('Y-m-d', strtotime($anni));?>"> 
            </div>
          </div>
          <!-- lien instagram -->
          <div class="row mt-3">
            <div class="col">
              <label for="insta">Instagram:</label>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <input name="insta" value="<?php echo($insta)?>" >
            </div>
          </div>
          <!-- lien facebook -->
          <div class="row mt-3">
            <div class="col">
              <label for="face">Facebook:</label>
            </div>
          </div>
          <div class="row">
            <div class="col">
            <input name="face" value="<?php echo($face)?>" >
            </div>
          </div>
          
          <!-- PHOTO DE PROFIL -->
          <!-- TODO AJOUTER UNE DIV POUR LA PHOTO, AFFICHER LA PHOTO EN BACKGROUD OU COVER / faire la photo deborder de la div, mais ne laisser apparaitre que la photo a l'intérieur la taille de la div -->
          <div class="row mt-3">
            <div class="col">
              <img class="img-thumbnail img-fluid" width ="180" alt="Photo de profil vide" src="medias/uploads/<?php echo$photoProfil ?>" alt="Photo de profil ">
            </div>
          </div>
          
          <div class="row m-0">
            <div class="col">
              <button type="button" class="btn btn-link p-0 mt-3" data-toggle="modal" data-target="#modalPhotoProfil">Changez de photo de profil</button>
              
              <!-- MODAL SELECT PHOTO ou CHARGER PHOTO-->
              <div class="modal fade" id="modalPhotoProfil" tabindex="-1" role="dialog" aria-labelledby="photoProfilModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="photoProfilModalLabel">Galerie photo</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <!-- TODO UNIFORMISER LA DIV p-5 bg-dark shadow text-dark -->
                    <div class="modal-body p-5 bg-dark"> 
                      <a href=""></a>
                      <style>
                          input[type=radio]:checked + label>img {
                          border: 1px solid #fff;
                          box-shadow: 0 0 3px 3px #090;
                      }</style>
                        <!-- GALERIE reprise du travail de Pierre -->
                        <?php 
                            $arrayGalerie=getImage($id)->fetchAll();
                            if (empty($arrayGalerie)) {
                                $rep=getClient($id);
                                $name=$rep['NOM_CLI'];
                                echo " La Galerie de ".$name. " est vide !";
                            }
                            else{
                                foreach($arrayGalerie as $texttab ){
                                    $img = $texttab['NOM_MED']; ?>
                                    <input type="radio" name="photoProfil" id="<?php echo$img;?>" value="<?php echo$img;?>" style="display:none" autocomplete="off" checked>
                                    <label for="<?php echo$img; ?>">
                                      <img src="medias/uploads/<?php echo$img; ?> " width ="180" height="200" />
                                    </label>      
                            <?php }
                            }?>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" name="btnPhotoProfil" class="btn btn-primary text-center">Choisir photo</button>
                    </div>
                  </div>
                </div>
              </div>
              </div>
          </div>

          <!-- BUTTON AJOUTER UNE IMAGE -->
          <div class="row mt-0">
            <div class="col">
              <input class="btn btn-link mt-3" type="submit" name="btnAjouter" value="Ajouter une image">
            </div>
          </div>
          
          <!-- DETAILS de la FICHE CLIENT -->
          <div class="row mt-3">
            <div class="col">
              <label for="details">Détails :</label>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <textarea class="shadow" name="details" id="details" cols="20" rows="5"><?php echo($details);?> </textarea>
            </div>
          </div>

          <!-- CHECKBOX VALIDE ET EN RETARD -->
          <div class="row mt-3">
            <div class="col">
              <label for="retard">Souvent en retard :</label>    
              <input type="checkbox" name="retard" <?php if ($retard){echo("checked");}?>>
            </div>
          </div>

          <!-- TODO
          <div class="col-12">
            <label for="valide">Client actif :</label>
            <input type="checkbox" name="valide" checked value="1">
          </div>
          -->

          <!-- BUTTON ENREGISTRER -->
          <input class="btn btn-outline-warning m-3" type="submit" name="btnEnregistrer" value="Enregistrer">
          <button type="submit" class="btn btn-outline-warning " name="delete">Supprimer toute les images du client</button>
        </form>
        
        <!-- GALLERIE PHOTO CLIENT -->
        <?php include('include/galerieSlide.php'); ; ?>   

      </div>  
      <a  href="delMedias.php" class="btn btn-outline-warning shadow sticky-top m-auto " >Retirer une image</a>       
      
    </div>
<?php 
  }
}
else {
  echo ('<script type="text/javascript"> alert("Vous n\'êtes pas connecté !"); </script>');
}
  include('footer.php'); 
?>