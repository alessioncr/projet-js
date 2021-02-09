<?php
  $title = "Client";
  include('header.php');

// Vérifie si une SESSION est active
if (isset($_SESSION["idUser"])) {

  // Affiche la barre de recherche si aucun client n'est selectionné
  if (empty($_GET["id"])){
    $_SESSION = null;
    include('include/rechercherapide.php');
  }

  // Vérifie si un client est selectionné
  if (isset($_SESSION["id_client"]) OR isset($_GET['id']))
  {

    // permet de garder la bonne id client pour fonctionner avec le travail de Pierre et les medias
    if (isset($_GET['id'])){
      $id     = $_GET['id'];
      $_SESSION["id_client"] = $id;
    }
    else {
      $id     = $_SESSION["id_client"];
    }

    $client   = getClient($id);

    $nom          = ucfirst ($client['NOM_CLI']);     // ucfirst = initcap ;
    $tel          = $client['TEL_CLI'];
    $anni         = date('d.m.Y', strtotime($client['ANNIVERSAIRE_CLI']));
    $details      = $client['DETAILS_CLI'];
    $valide       = $client['VALIDE_CLI'];
    $retard       = $client['RETARD_CLI'];
    $insta        = $client['INSTA_CLI'];
    $face         = $client['FACE_CLI'];
    // PHOTO PROFIL
    if (isset($_POST['btnPhotoProfil'])){
      $photoProfil = $_POST['photoProfil'];
      // TODO UPDATE PHOTO PROFIL CLIENT DANS BDD
      updatePhotoProfil($id, $photoProfil);
    }
    else {
      $photoProfil  = $client['PHOTO_PROFIL_CLI'];    
    }
?>

    <!-- FICHE CLIENT -->
    <div class="col col-lg-6 container p-5 my-5 bg-dark shadow text-dark" id="ficheClient">
      <div class="jumbotron px-5 text-center">
        <!-- INFOS CLIENT -->
        <div class="row">
          <div class="col">
            <h3 id="nom"><?php echo($nom) ?></h3>
          </div>
        </div>

      <!-- ALERTE ANNNIVERSAIRE -->
      <div class="row mt-1">
          <div class="col">
            <?php
              if ((date('d.m')) ==  date('d.m', strtotime($anni))) 
              {
                ?> <span style="font-size:18px;color:red">&#127874; Happy Birthday</span> <?php
              }
            ?>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col">
            <p id= "tel">&phone; <?php echo($tel) ?></p>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <p id="anni"><?php echo ($anni); ?></p>
          </div>
        </div>

          <!-- LIENS RESEAUX SOCIAUX -->
        <div class="row ">
          <div class="col">
            <a class="btn btn-social-icon btn-instagram fa-lg" href= <?php echo($insta) ?>> <i class='fa fa-instagram'></i></a>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <a class="btn btn-social-icon btn-facebook fa-lg" href= <?php echo($face) ?>> <i class='fa fa-facebook'></i></a><br>
          </div>
        </div>
        
        <!-- ALERTE RETARD -->
        <div class="row">
          <div class="col">
            <?php
              $style = 'font-size:24px;color:red';
              if ($retard) {
                echo("<br><span style=" . $style . ">&#128336; !!!</span>");
              }
            ?>
          </div>
        </div>
      
        <!-- PHOTO DE PROFIL -->
        <div class="row mt-3">
          <div class="col">
              <img class="img-thumbnail img-fluid" width ="180" alt="Photo de profil vide" src="medias/uploads/<?php if($photoProfil){echo $photoProfil;}?>" alt="Photo de profil ">
          </div>
        </div>

        <!-- DETAILS de la FICHE CLIENT -->
        <div class="row pt-4">
          <div class="col">
            <label for="details">Détails :</label>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <textarea  name="details" id="details" cols="25" rows="5" DISABLED><?php echo($details); ?></textarea>
          </div>
        </div>

          <!-- BUTTON MODIFIER -->
          <a  href="modifClient.php"
              class="btn btn-outline-warning  m-3"
          >Modifier</a>
          <?php
            include('include/galerieSlide.php');           
          ?> 
      </div> 
      <a  href="listeDelMedias.php?idMed=<?php echo$id ?>" class="btn btn-outline-warning shadow sticky-top m-auto " >Corbeille image</a>  
    </div>     
    <?php 
  }
}
else {
  echo ('<script type="text/javascript"> alert("Vous n\'êtes pas connecté !"); </script>');
}
  include('footer.php'); 
?>
