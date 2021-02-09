<?php
  $title = "Client";
  include('header.php');

// Vérifie si une SESSION est active
if (isset($_SESSION["idUser"])) {

// Affiche la barre de recherche si aucun client n'est selectionné
if (empty($_GET["id"])){
  $_SESSION = null;
  include('rechercherapide.php');
}

// Vérifie si un client est selectionné
if (isset($_SESSION["id_client"]) OR isset($_GET['id']))
{

  if (isset($_GET['id'])){
    $id     = $_GET['id'];
    $_SESSION["id_client"] = $id;

  }
  else {
    $id     = $_SESSION["id_client"];
  }

  $client   = getClient($id);
     
  $nom      = ucfirst ($client['NOM_CLI']);     // ucfirst = initcap ;
  $tel      = $client['TEL_CLI'];
  $anni     = date('d.m.Y', strtotime($client['ANNIVERSAIRE_CLI']));
  $details  = $client['DETAILS_CLI'];
  $valide   = $client['VALIDE_CLI'];
  $retard   = $client['RETARD_CLI'];
  $insta    = $client['INSTA_CLI'];
  $face     = $client['FACE_CLI'];

?>

<!-- PAGE CLIENT -->
<div class="container jumbotron p-5 my-5 bg-dark shadow text-dark" id="ficheClient">
  <div class="jumbotron px-5">
    <div class="row">

      <!-- INFOS CLIENT -->
      <div class="col">
        <h3 id="nom"><?php echo($nom) ?></h3> <br>
        <p id= "tel">&phone; <?php echo($tel) ?></p>
        <p id="anni">&#127874; <?php echo ($anni); ?></p>
      </div>

      <!-- LIENS RESEAUX SOCIAUX -->
      <div class="col">
        <br>
        <br>
        <a class="btn btn-social-icon btn-instagram" href= <?php echo($insta) ?>> <i class='fa fa-instagram'></i></a>
        <br>
        <a class="btn btn-social-icon btn-facebook" href= <?php echo($face) ?>> <i class='fa fa-facebook'></i></a><br>
      </div>
    
      <!-- PHOTO DE PROFIL -->
      <div class="col pt-3">
        <div>
          <!-- <img  style=" size: cover;
                        max-height: 170px;
                        position: relative"
                src="./images/photo/Adriano.jpg" alt="Photo de profil ">
          -->
        </div>
      </div>
    </div>
    
    <!-- ALERTEs ANNNIVERSAIRE et RETARD -->
    <div class="row">
      <div class="col">
        <?php
          $class = "fa fa-birthday-cake";
          $style = 'font-size:24px;color:red';

          if ((date('d.m')) ==  date('d.m', strtotime($anni))) {
            echo("<span class=" . $class . " style=" . $style . ">&#127874; C'est l'anniversaire de " . $nom . " !!!</span>");
          }
          
        ?>
      </div>
    </div>

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


    <!-- DETAILS de la FICHE CLIENT -->
    <div class="row pt-4">
      <div class="col">
        <label for="details">Détails :</label>
      </div>
    </div>
      

    <div class="row">
      <div class="col">
        <!-- DETAILS de la FICHE CLIENT -->
        <textarea  name="details" id="details" cols="25" rows="5" DISABLED><?php echo($details); ?></textarea>
      </div>
    </div>

      <!-- BUTTON MODIFIER -->
      <a  href="modifClient.php"
          class="btn btn-outline-warning  m-3"
      >Modifier</a>
      <?php
        include('galerie.php');
      ?> 
  </div> 
</div>     
<?php 
}
}
else {
  
  header("Location:error.php?message=Vous n'êtes pas connecté !");
}
  include('footer.php'); 
?>
