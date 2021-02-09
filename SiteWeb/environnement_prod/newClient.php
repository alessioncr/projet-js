<?php
  $title = "newClient";
  include("header.php");

// Vérifie si une SESSION est active
if (isset($_SESSION["idUser"])) {
  
// si btnCreer CRéER
  if (isset($_POST["btnCreer"])) 
  {
    // récupération du nom du nouveau client
    $n_nom = $_POST["nom_client"];

    // vérification si le nom client existe déjà
    $client = getClientParNom($n_nom);
    if (empty($client))
    {
      // Crée le client dans la BDD
      newClient($n_nom);
      // récupère la table du nouveau client
      $client = getClientParNom($n_nom);
      // créer une variable id_client dans $_SESSION
      $id_client = $client['ID_CLI'];
      $_SESSION["id_client"] = $id_client;
      
      header("Location:modifClient.php");
      exit();
    }
    else 
    {
      $_SESSION["message"] = "Ce nom de client existe déjà, choisissez en un autre !";
    }
  }
  else
  {
    $_SESSION["message"] = "";
  }


?>

<!-- Formulaire nouveau client -->
<form method="post" 
      action="newClient.php"
      class="form container jumbotron bg-dark border my-5 p-5"
      >
  
  <!-- MESSAGE ERREUR -->
  <div class="form-group row my-3">
    <legend><?= empty($_SESSION["message"])?"Nouveau client":$_SESSION["message"] ?></legend>
  
  </div>

  <div class="row">
    <div class="col">
      <small>*champs obligatoires</small>
    </div>
  </div>
  
  <br>
  
  <fieldset>
  <!-- INPUT NOM -->
    <div class="form-group row">
      <div class="col-3">  
        <label for="nom">
          <strong>Nom* : </strong>
        </label>
      </div>
      <div class="col-2">
        <input tabindex="1" class="rounded input-lg" size="15" type="text" placeholder="Nom client" name="nom_client" required>
      </div>
    </div>


  </fieldset>

  <!-- BOUTON SUBMIT -->
  <div class="form-group row m-0">
    <div class="col-2">
      <button type  ="submit" 
              class ="btn btn-outline-warning"
              name  ="btnCreer"
              >        
              Créer
      </button>
    </div>
  </div>

  

</form>


<?php

}
 
else {
  
  header("Location:error.php?message=Vous n'êtes pas connecté !");
}
include("footer.php");
?>