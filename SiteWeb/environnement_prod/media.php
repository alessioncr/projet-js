<?php

    $title = "Medias";
    include('header.php');
    $MessageError="";

// Vérifie si une SESSION est active
if (isset($_SESSION["idUser"])) {
    // RÉCUPÈRE ID CLIENT 
    $id = $_GET['id'];
?>
<div class="container jumbotron p-5 my-5 bg-dark shadow text-dark">
    <div class="container jumbotron">
        <div class="text-center">
            <form  action="media.php" method ="post" enctype="multipart/form-data" class="" >
                <h1>Ajouter une image à 
                    <?php  
                        $rep=getClient($id);
                        $name=$rep['NOM_CLI'];
                        echo $name;
                    ?> 
                </h1>
                <div class="form-group">
                    <label for="img">Choisir une image:</label>
                    <input type="file" name="upload_file" id="fileToUpload">        
                </div><br>
                <div class="form-group row m-0">
                    <div class="col">
                        <button type  ="submit" class ="btn btn-outline-warning" name  ="btn" > Ajouter l'image </button>
                    </div>
                </div> 
            </form>
        </div><br>
        
        <?php
            include('galerie.php');
        ?> 
        <a  href="client.php?id=<?= $id ?>"class="btn btn-outline-warning   mt-5" >Retour au client
            <?php  
                $rep=getClient($id);
                $name=$rep['NOM_CLI'];
                echo $name;
            ?> 
        </a>    
    </div>
</div> 
 
<?php
    if (isset ($_POST["btn"])){
       //recuperation des images
       $StockageMedias = "medias/uploads/";
       $image=$_FILES["upload_file"];
       $valExt=array('.jpg','.jpeg','.png');
       $maxSize=500000;
       // Recuperation des messages  d'erreur 
       if ($image['error'] > 0){
         echo ('<script type="text/javascript"> alert("Auccune image n a ete selectionnee veuillez choisir une imge"); </script>');
           die;
       }
       // On teste la taille de l'image 
       $imageSize=$image['size'];
       if ($imageSize>$maxSize){
           echo  ('<script type="text/javascript"> alert(" La taille de votre image est  grande "); </script>');
           die;
       }
       // On recuperere l'extension de l'image 
       $file_name= $image['name'];
       $fileExt=".".strtolower(substr(strrchr($file_name,'.'),1));
       // On teste l 'extension d'une image 
       if (!in_array($fileExt,$valExt)){
           echo   ('<script type="text/javascript"> alert("Le fichier n est pas une image ! "); </script>');
           die;
       }
       // On genere automatiquement un nom à l'image 
       $tmpName=$image['tmp_name'];
       $uniqueName=md5(uniqid(rand(),true ));
       $file_name = $StockageMedias . $uniqueName .$fileExt;
       move_uploaded_file($tmpName,$file_name);
       $imageAjoute=$uniqueName .$fileExt;
       // Requete sql d ajout 
       $dates= date("Y-m-d ");
       $valide= "0";
       saveMedias($id,$imageAjoute,$dates,$valide);
       echo  ('<script type="text/javascript"> alert("Image ajoutée avec succès !"); </script>');
       
    }
}
else {
  
  header("Location:error.php?message=Vous n'êtes pas connecté !");
}



include('footer.php'); 
?>