<?php
    include('header.php');
    // Vérifie si une SESSION est active
    if (isset($_SESSION["idUser"])){
        $id=$_GET['idJour']; 
        //Fait la supression(Remplace l'attribut valide 1 par 2)
        if (isset ($_POST["btnYes"])){  
            $valide=2 ;                                                        
            delJournal($id,$valide);
            echo ('<script type="text/javascript"> alert(" Ecriture supprimer avec succes!"); </script>');
            echo '<meta http-equiv="refresh" content="0; url=listeDelJournal.php">';
        }            
?>
<div class="modal-content container jumbotron p-5 my-5 bg-dark shadow text-dark" >
    <div class="jumbotron input-group px-5">
        <div class="col-sm " style="overflow-x:auto;">
            <table class="table " >
                <thead>   
                    <tr >
                        <th scope="col">Date</th>
                        <th scope="col">Libellé</th>
                        <th scope="col">Recette</th>
                        <th scope="col">Depense</th>
                        <th>Statut</th>               
                    </tr>
                </thead>
                <tbody>
                    <?php $arrayjournal=getJournalMod($id);?>
                    <tr>
                        <td> <?php $date_jou=date('d-m-y', strtotime($arrayjournal['DATE_JOU']));   echo $date_jou ;?>  </td>
                        <td> <?php $libelle_jou=$arrayjournal['LIBELLE_JOU']; echo $libelle_jou;?> </td>
                        <td><?php $type=$arrayjournal['TYPE_JOU']; if($type=="Recette"){ $recette_jou=$arrayjournal['VALEUR_JOU']; echo $recette_jou; ?>  <?php } else{ $recette_jou=0;echo $recette_jou;}?> </td>
                        <td> <?php $type=$arrayjournal['TYPE_JOU'];if($type=="Depense"){$depense_jou=$arrayjournal['VALEUR_JOU'];echo $depense_jou; ?>  <?php  }else{$depense_jou=0;echo $depense_jou; } ?> </td>  <br>                                                   
                        <td> <?php $valide_jou=$arrayjournal['VALIDE_JOU']; echo $valide_jou;?> </td>
                    </tr>                                     
                </tbody>
            </table>
        </div>
        
        <!-- Formulaire pour confirmer la suppression-->
        <div class="modal" id="modaldelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content container jumbotron p-5 my-5 bg-dark shadow text-dark" >
                    <div class="jumbotron input-group px-5">
                        <!-- Formulaire suppression -->
                        <legend>Voulez-vous vraiment supprimer cette ecriture ?</legend>
                        <form method="post" action="delJournal.php?idJour=<?php echo$id ?>">
                            <a  href="comptabilite.php" class="btn btn-outline-warning shadow sticky-top m-auto" >Non</a>
                            <button class="btn btn-outline-warning" type="submit" name="btnYes">Oui </button><br>                                    
                        </form>
                        <?php ?>
                    </div>
                </div>
            </div>
        </div>   
    </div> 
    <a  href="#" class="btn btn-outline-warning shadow sticky-top m-auto" data-toggle="modal" data-target="#modaldelete">Delete</a>  <br> 
</div>        
<?php
}
else {
echo ('<script type="text/javascript"> alert("Vous n\'êtes pas connecté !"); </script>');
}
include('footer.php');
?>
