<?php
    include('header.php');

    $title = "delMedias";
    // Vérifie si une SESSION est active
    if (isset($_SESSION["idUser"])) 
    {
        // RÉCUPÈRE ID CLIENT 
        $id = $_SESSION['id_client'];
        if(isset($_POST['btnActiver'])){
            foreach($_POST['check'] as $value){
                activateMediasDel($value);               
            } 
            echo   ('<script type="text/javascript"> alert(" L\'image a été réactiver  avec succes"); </script>');    
            echo '<meta http-equiv="refresh" content="0; url=client.php?id='. $id.' ">';
        }
?>
<!--inspiration : Sur les validations du code de Alessio -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--inspiration : https://www.youtube.com/watch?v=CHfwkekNIYo -->
<script>
    $(document).ready(function(){
        $("#form1 #select-all").click(function(){
            $("#form1 input[type='checkbox']").prop('checked',this.checked);
        });
    });
</script> 
<!--Creation de la fonction supprimer une image -->
<div class="container jumbotron p-5 my-5 bg-dark shadow text-dark">
    <div class="jumbotron">
        <form id="form1" method="POST" action="listeDelMedias.php">   
            <h1 class="text-center">Choisir l' image à réactiver</h1><br>                          
            <div class="row">                       
                <?php 
                    $arrayGalerie=getImageDel($id)->fetchAll();
                    if (empty($arrayGalerie)){
                        $rep=getClient($id);
                        $name=$rep['NOM_CLI'];
                        echo " La Galerie de ".$name. " est vide !";
                    }
                    else{                       
                        foreach($arrayGalerie as $texttab ){
                            $img = $texttab['NOM_MED']; ?>
                            <div class="col-sm-4">
                                <div class="card" style="width: 18rem;">                            
                                    <img class="card-img-top" src="medias/miniature/<?php echo$img; ?> "  alt="Card image cap">                                          
                                    <input type="checkbox" name="check[]" class="card-text" value="<?php echo $texttab['ID_MED']; ?>">                           
                                </div>
                            </div>
                            <?php
                        }   ?>                    
                                        
                        <?php   
                    } 
                ?>
            </div>
        <button type="submit" class="btn btn-success mt-5 " name="btnActiver">Activer</button>    
        </form>
    </div> 
    <a  href="client.php?id=<?php echo$id ?>" class="btn btn-outline-warning shadow sticky-top m-auto " >Retour au client</a>
</div>
<?php
    }
    else {
        echo ('<script type="text/javascript"> alert("Vous n\'êtes pas connecté !"); </script>');
  }
  include('footer.php'); 
?>
