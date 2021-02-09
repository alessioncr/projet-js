<?php
  $title = "Comptabilité";
  include('header.php');
// Vérifie si une SESSION est active
if (isset($_SESSION["idUser"])) 
{
  if (isset ($_POST["btnAjout"]))
  {
    //Verifie si tous les champs ont été rempli
    if(!empty($_POST["date"]) AND !empty($_POST["type"]) AND !empty($_POST["libelle"]) AND !empty($_POST["montant"]) ){
      //On recupere les données du formulaire et on enleve les balise html
      $date_jou =date('Y-m-d', strtotime($_POST["date"]));
      $type= htmlspecialchars($_POST["type"]) ;
      $libelle=htmlspecialchars($_POST["libelle"]) ;
      $montant=htmlspecialchars($_POST["montant"]) ;
      //On teste la longueur du libellé pour
      $libellelength=strlen($libelle);
      if($libellelength<=255){
        $valide_jou=1;
        AddJournal($type,$montant,$date_jou,$libelle,$valide_jou);
          echo   ('<script type="text/javascript"> alert(" L ajout au journal à été éffectué avec succès  "); </script>');
      }
      else{
        echo   ('<script type="text/javascript"> alert("Le libellé ne doit pas depasser 255 caractères ! "); </script>');
      }
    }
    else{
      echo   ('<script type="text/javascript"> alert("Tous les champs doivent être complétés ! "); </script>');
    }
  }
?>

<div class=" container jumbotron p-5 my-5 bg-dark shadow text-dark" >
  <div class="jumbotron ">
    <h1 style="margin-left: 1.5%;">Ajouter au journal</h1>

    <form  action="comptabilite.php" method ="post">
      <div class="form-row ">
        <div class="form-group col-md-6 " style="margin-left: 1.5%;">
          <label for="date"> Date : </label>
          <input type="date" class="form-control" name="date" required>
        </div>
        <div class="form-group col-md-6" style="margin-left: 1.5%;">
          <label for="type">Type d'entree :</label>
          <select class="form-control"  name="type" required>
            <option>Recette</option>
            <option>Depense  </option>  
          </select>
        </div>
      </div>
      
      <div class="form-group row" style="margin-left: 1.5%;">
        <label for="libelle">Libellé</label>
        <textarea class="form-control"   name="libelle" placeholder="Le libellé" required></textarea>
      </div>

      <div class="form-group row" style="margin-left: 1.5%;">
        <label for="montant">Montant  </label>
        <input type="text" class="form-control" placeholder="0.00" name  ="montant" required>
      </div> 
      <div class="form-group row m-0">
        <div class="col-6">
          <button type  ="submit" class ="btn btn-outline-warning" name  ="btnAjout" >Ajouter au journal </button>
        </div>
      </div>
    </form><br>
    <h6 class="text-center" style="margin-left: 1.5%;">Le journal des operations </h1><br>
    <?php
      include('affichageJournal.php');
    ?>

  </div>   
</div>




















<?php 
  /*
  <?php
      include('affichageJournal.php');
    ?>
  */

  }
  else {
    
    header("Location:error.php?message=Vous n'êtes pas connecté !");
  }
  include('footer.php'); 
?>
