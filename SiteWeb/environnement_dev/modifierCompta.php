<?php
  
  include('header.php');
  // Vérifie si une SESSION est active
  if (isset($_SESSION["idUser"])) 
  {
    $id=$_GET['idJour'];    
    if  (isset ($_POST["btnMod"])){      
      //Recuperations des données post
      $date_jou =date('Y-m-d', strtotime($_POST["date"]));
      $type= htmlspecialchars($_POST["type"]) ;
      $libelle=htmlspecialchars($_POST["libelle"]) ;
      $montant= htmlspecialchars($_POST["montant"]) ;
      //requete update
      updateJournal($id,$type,$montant,$date_jou,$libelle);
      echo   ('<script type="text/javascript"> alert("Modification effectuée avec succès  "); </script>');
      echo '<meta http-equiv="refresh" content="0; url=comptabilite.php">';
    }   
?>
<div class=" container jumbotron p-5 my-5 bg-dark shadow text-dark" >
   <div class="jumbotron ">
   <?php 
        
        $arrayResult=getJournalMod($id);
        //Chargementb des données à modifier
        if (empty($arrayResult)){
            echo   ('<script type="text/javascript"> alert("Erreur de recuperation du journal à modifier "); </script>');
        }
        else{          
          $dates=date('d-m-Y', strtotime($arrayResult['DATE_JOU']));
          $type=$arrayResult['TYPE_JOU'];
          $libelle= $arrayResult['LIBELLE_JOU'];
          $montant=$arrayResult['VALEUR_JOU'];                    
    ?>
    <h1 style="margin-left: 1.5%;"> Modifier l'ecriture du <?php echo $dates;?></h1>
    <form  action="modifierCompta.php?idJour=<?php echo$id ?>" method ="post">
      <div class="form-row ">
        <div class="form-group col-md-6 " style="margin-left: 1.5%;">
          <label for="date"> Date : </label>
          <input type="date" class="form-control" name="date" value="<?php echo date('Y-m-d', strtotime($dates));?>" >
        </div>
        <div class="form-group col-md-6" style="margin-left: 1.5%;">
          <label for="type">Type d'entree :</label>
          <select class="form-control"name="type">            
            <option><?php echo $type ?></option>
            <option><?php if ($type=="Depense"){echo "Recette";}else{echo "Depense";}?> </option>  
          </select>
        </div>
      </div>
      <div class="form- row" style="margin-left: 1.5%;">
        <label for="libelle">Libellé</label>
        <textarea class="form-control"   name="libelle"> <?php echo $libelle ?></textarea>
      </div>
      <div class="form-group row" style="margin-left: 1.5%;">
        <label for="montant">Montant  </label>
        <input type="text" class="form-control" placeholder="0000" name  ="montant" value="<?php echo $montant ;}?>">
      </div> 
      <div class="form-group row m-0">
        <div class="col">
          <button type  ="submit" class ="btn btn-outline-warning" name  ="btnMod" >Modifier </button>
        </div>
      </div>
    </form><br>
  </div>
</div>

<?php
  }
  else {
    echo ('<script type="text/javascript"> alert("Vous n\'êtes pas connecté !"); </script>');
  }
  include('footer.php'); 
?>