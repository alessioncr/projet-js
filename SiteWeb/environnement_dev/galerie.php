<?php
    $title = "Galerie";
    // Vérifie si une SESSION est active
    if (isset($_SESSION["idUser"])) 
    {
        // RÉCUPÈRE ID CLIENT 
        $id = $_SESSION['id_client'];
?>     
        <h1 class="text-center">La Galerie</h1><br>
        <div class="row" style="color : #9c640c ; font-size:30px">
            <div >
                <?php 
                    $arrayGalerie=getImage($id)->fetchAll();
                    if (empty($arrayGalerie)){
                        $rep=getClient($id);
                        $name=$rep['NOM_CLI'];
                        echo " La Galerie de ".$name. " est vide !";
                    }
                    else{
                        foreach($arrayGalerie as $texttab ){
                            $img = $texttab['NOM_MED'];
                ?>
                            <img  src="medias/uploads/<?php echo$img; ?> " width ="180" height="200" /> 
                <?php                             
                        }
                    }
                ?>
            </div>
             
        </div>
<?php
    }
    else {
        echo ('<script type="text/javascript"> alert("Vous n\'êtes pas connecté !"); </script>');
  }
?>

  