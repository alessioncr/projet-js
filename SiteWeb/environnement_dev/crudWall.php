<?php
  $title = "Gérer Wall of fame";
  include('header.php');


  
// Vérifie si une SESSION est active
if (isset($_SESSION["idUser"])) {
    
       
?>

    <!-- PAGE  -->
    <div class="container jumbotron bg-dark shadow text-dark">
      <h1 style="color:white">Gestion Wall of fame</h1>
       <!-- BUTTON AJOUTER -->   
      <a  href="ajoutWOF.php" class="btn btn-outline-warning  " >Ajouter personnalité</a>  
      <!-- FORMULAIRE PARAMETRE -->
      <form action  ="crudWall.php" 
            method  ="post" 
            class   ="form jumbotron px-5"
            id      ="form1" 
            >           
<?php   
     //inspiration travail Romain pour le bouton supprimer
     if (isset($_GET['action'])){ 
        $idwall = $_GET['id_wall'];  
        if ($_GET['action'] == 'delete'){    
            delWOF($idwall);
            delmedia($idwall);
            echo  ('<script type="text/javascript"> alert(" La personnalité a été supprimé avec succès "); </script>');
            echo '<meta http-equiv="refresh" content="0; url=crudWall.php">'; 
        }
    }
                      
    ?>
<div class="row">

    <?php 
    $arrayGalerie=getWOF()->fetchAll();
        $i=1; //variable pour numéroter les personnalitées
        // CHARGEMENT DES DONNÉES PARAMETRE BDD         
        foreach($arrayGalerie as $texttab ){
            $img = $texttab['NOM_MED'];
            $nom                          = ($texttab['NOM_WAL']);
            $profession                   = ($texttab['PROFESSION_WAL']);
            $idwall                       = ($texttab['ID_WALL']);
            
            
            
            ?>
                <div class="col-sm-4" >
                    <h4 class="card-title">Personnalité <?= $i; ?> :</h4> 
                    <div class="card" style="width: 16rem;">
                        <img class="card-img-top" src="medias/uploads/<?php echo$img; ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Nom :</h5>
                            <p class="card-text"><?= $nom; ?></p>
                            <br>
                            <h5 class="card-title">Profession :</h5>
                            <p class="card-text"><?= $profession; ?></p>
                            <a class="btn btn-danger"  href="?action=delete&id_wall=<?=$texttab['ID_WALL']?>" onclick="return confirm('Voulez-vous supprimer cette personnalité ?')"><i class="fas fa-trash"></i></a>
                        </div>
                    </div>
                </div>   
          <br>
        <?php   
            $i+=1;
            }
        ?>  
        </div> <!--fermeture div row--> 
      </form>
     
    </div>
     
<?php 
}
else {
  
  echo ('<script type="text/javascript"> alert("Vous n\'êtes pas connecté !"); </script>');
}
  include('footer.php'); 
?>
