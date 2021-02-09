<?php

$title = "Medias";
include('header.php');
// Vérifie si une SESSION est active
if (isset($_SESSION["idUser"])) {
    // RÉCUPÈRE ID CLIENT 
    //$id = $_GET['id'];
    $id = $_SESSION['id_client'];
    $rep=getClient($id); 
    $name=$rep['NOM_CLI']; 
    ?>
    <div class="container jumbotron p-5 my-5 bg-dark shadow text-dark">
        <div class="container jumbotron">
            <div class="text-center">
                <form  action="media.php" method ="post" enctype="multipart/form-data" class="" >
                    <h1 >Ajouter une image à 
                        <?php echo $name; ?> 
                    </h1>
                    <div class="form-group row  ">
                        <label for="img">                         </label>
                        <input type="file" name="upload_file" id="fileToUpload" class="col-md-4">  
                        <button type  ="submit" class ="btn btn-outline-warning" name  ="btnAjouterImage" class="col-md-4"> Ajouter l'image </button>      
                    </div><br>
                </form>
            </div>                              
        </div>
        <a  href="client.php?id=<?php echo$id ?>" class="btn btn-outline-warning shadow sticky-top m-auto " >Retour au client</a> 
    </div>

    <?php
    if (isset ($_POST["btnAjouterImage"])){
       //recuperation des images
       $StockageMedias = "medias/uploads/";
       $image=$_FILES["upload_file"];
       $valExt=array('.jpg','.jpeg','.png');
       $maxSize=10000000;
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
       $final= "medias/miniature/";
       $imageAjoute=$uniqueName .$fileExt;
            
        // Requete sql d ajout 
        $dates= date("Y-m-d ");
        $valide= "0";
        
        saveMedias($id,$imageAjoute,$dates,$valide);
        echo  ('<script type="text/javascript"> alert("Image ajoutée avec succès !"); </script>');
        echo '<meta http-equiv="refresh" content="0; url=client.php?id='. $id.' ">'; 
        $file_name2 = $final . $uniqueName .$fileExt;
        // Retaille l'image et l'enregistre dans le dossier miniature
        if ($fileExt=="png"){                
            $destination=$final . $uniqueName .$fileExt;
            convertImagePng($file_name,$destination,"500",100);            
        }
        else{
            $destination=$final . $uniqueName .$fileExt;
            convertImageJpg($file_name,$destination,"500",100);
        
        }     
    }
}
else {
    echo ('<script type="text/javascript"> alert("Vous n\'êtes pas connecté !"); </script>');
}
include('footer.php'); 
?>
