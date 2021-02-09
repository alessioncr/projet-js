<?php
  $title = "Gérer Wall of fame";
  include('header.php');


  
// Vérifie si une SESSION est active
if (isset($_SESSION["idUser"])) {

  // ENREGISTRER LES MODIFICATION DE LA FICHE PARAMETRE
  if (isset($_POST["btnEnregistrerWOF"]))
  {
    if(!empty($_POST["nom_wof"]) AND !empty($_POST["profession_wof"]) ){
      //On recupere les données du formulaire et on enleve les balise html
      
      $nom=htmlspecialchars($_POST["nom_wof"]) ;
      $proffession= htmlspecialchars($_POST["profession_wof"]) ;
      AddWOF($nom,$proffession);
      echo   ('<script type="text/javascript"> alert(" L\'ajout du nom et de la profession a été faites avec succès "); </script>');
      echo '<meta http-equiv="refresh" content="0; url=imageWall.php">';
    }
      else{
        echo   ('<script type="text/javascript"> alert("Tous les champs doivent être complétés ! "); </script>');
      }
    


    
  }

?>


    <!-- PAGE CLIENT -->
    <div class="container jumbotron bg-dark shadow text-dark">
      <h1 style="color:white">Ajouter Wall of fame</h1>
      <!-- FORMULAIRE PARAMETRE -->
      <form action  ="ajoutWOF.php" 
            method  ="post" 
            class   ="form jumbotron px-5"
            >
         
          <div><!-- Informations -->
            <h4>Images  :</h4>
            <div class="row-5" >
                <!-- Nom -->
                <div class="col  mt-2">
                <div class="row-5">
                    <label for="nom_wof">Nom :</label>
                </div>        
                <div class="row-5">
                    <input name="nom_wof" >
                </div>
                </div>
                <!-- Profession -->
                <div class="col  mt-2">
                <div class="row-5">
                    <label for="profession_wof">Profession :</label>
                </div>        
                <div class="row-5">
                    <input name="profession_wof" >
                </div>
                </div>
            </div>
            <!-- images -->
            
          </div><!-- Informations -->


          
        

        <!-- BUTTON ENREGISTRER -->
        <input class="btn btn-outline-warning mt-5" type="submit" name="btnEnregistrerWOF" value="Ajouter">
        
      </form>
    </div> 
<?php
  
}
else {
  
  echo ('<script type="text/javascript"> alert("Vous n\'êtes pas connecté !"); </script>');
}
  include('footer.php'); 
?>
