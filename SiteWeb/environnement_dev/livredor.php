

<!--inspiration forum-->
<!--https://openclassrooms.com/forum/sujet/afficher-un-texte-aleatoire-87459-->



<div class="shadow border border-warning rounded text-center bg-light">
    <h1>Livre d'or</h1>
    <h5 class="m-auto p-2">
    <?php 
    $arrayAleatoire = getLoAleatoire();

    $auteur         = "";
    $commentaire    = "";
    $date           = date('d.m.y');

    foreach($arrayAleatoire as $comliv){
        $commentaire    = $comliv['0'];
        $auteur         = ucfirst($comliv['1']);
        $date           = date('d.m.y', strtotime($comliv['2'])) ;
    }
    echo ($auteur . " :   " . "'$commentaire'" . " " .  $date);
    ?>
    </h5>
</div> 

<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Laisser un message</button>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Laisser un message</h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="index.php" method="post">
            <h5 class="mt-2">Votre nom : </h5> <input type="text" name="auteur" required/>
            <h5 class="mt-2">Commentaire : </h5> <textarea class="shadow" name="commentaire" id="commentaire" cols="22" rows="8" required></textarea>
            <p class="mt-3"><input type="submit" value="Envoyer" name="btnlivredor"></p>
        </form>
      </div> 
    </div>
  </div>
</div>


<?php 
if (isset ($_POST["btnlivredor"]))
{
  //Verifie si tous les champs ont été rempli
  if(!empty($_POST["auteur"]) AND !empty($_POST["commentaire"]) ){
    //On recupere les données du formulaire et on enleve les balise html
    
    $auteur= htmlspecialchars($_POST["auteur"]) ;
    $commentaire=htmlspecialchars($_POST["commentaire"]) ;

    $lengthauteur=strlen($auteur);
    $lengthcommentaire=strlen($commentaire);
    if($lengthauteur==1 or $lengthcommentaire==1){
      echo   ('<script type="text/javascript"> alert("Tous les champs doivent être complétés ! "); </script>');
      echo '<meta http-equiv="refresh" content="0; url=index.php">';
      die;
    }

    $commentairelength=strlen($commentaire);
    if($commentairelength<=255){
      $check = getCheckLO($_POST["commentaire"], $_POST["auteur"]);
      if(empty($check)){
        $valide_liv=2;
        $date_liv =date("Y-m-d ");
        Addlivredor($auteur,$commentaire,$date_liv, $valide_liv);
        echo   ('<script type="text/javascript"> alert(" L\'ajout au Livre d\'or à été éffectué avec succès  "); </script>');
        echo '<meta http-equiv="refresh" content="0; url=index.php">';
      }
      else{
        echo ('<script type="text/javascript"> alert( "Ce nom ou ce commentaire existe déjà, choisissez en un autre !"); </script>');
      }
    }
    else{
      echo   ('<script type="text/javascript"> alert("Le message ne doit pas depasser 255 caractères ! "); </script>');
    }
  }
  else{
    echo   ('<script type="text/javascript"> alert("Tous les champs doivent être complétés ! "); </script>');
  }
}


?>