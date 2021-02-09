<?php

$title = "Medias";
include('header.php');

// Vérifie si une SESSION est active
if (isset($_SESSION["idUser"])) {
    
    

    ?>
    <div class="container jumbotron p-5 my-5 bg-dark shadow text-dark">
        <div class="container jumbotron">
            <div class="text-center">
                <form  action="imageWall.php" method ="post" enctype="multipart/form-data" class="" >
                    <h1 >Ajouter une image  </h1>
                    <div class="form-group row  ">
                        <label for="img">                         </label>
                        <input type="file" name="upload_file" id="fileToUpload" class="col-md-4">  
                        <button type  ="submit" class ="btn btn-outline-warning" name  ="btnAjouterImage" class="col-md-4"> Ajouter l'image </button>      
                    </div><br>
                </form>
            </div>                              
        </div>        
    </div>

    <?php
    if (isset ($_POST["btnAjouterImage"])){
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
       // On génère automatiquement un nom à l'image 
       $tmpName=$image['tmp_name'];
       $uniqueName=md5(uniqid(rand(),true ));
       $file_name = $StockageMedias . $uniqueName .$fileExt;
       move_uploaded_file($tmpName,$file_name);
       $imageAjoute=$uniqueName .$fileExt;
       // Requete sql d ajout 
       $dates= date("Y-m-d ");
       $valide= "0";
       // RÉCUPÈRE ID DU WAL OF FAME 
        $arrwall=getLastWallId();
        $idwall=$arrwall['ID_WALL'];
        saveMediasWall($idwall,$imageAjoute,$dates,$valide);
        echo  ('<script type="text/javascript"> alert("Image ajoutée avec succès !"); </script>');
        echo '<meta http-equiv="refresh" content="0; url=crudWall.php">';  
    }
}
else {
    echo ('<script type="text/javascript"> alert("Vous n\'êtes pas connecté !"); </script>');
}
include('footer.php'); 
?>
