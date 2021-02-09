<?php
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
      $_SESSION["id_client"] = $client['ID_CLI'];
      
      header("Location:modifClient.php");
      exit();
    }
    else 
    {
      echo ('<script type="text/javascript"> alert( "Ce nom de client existe déjà, choisissez en un autre !"); </script>');
    }
  }
}
?>