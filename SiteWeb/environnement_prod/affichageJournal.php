<?php
    $title = "journal";
    
    // Vérifie si une SESSION est active
    if (isset($_SESSION["idUser"]))
    {
?>
<style>
    table {       
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #ddd;
        letter-spacing: 1px;  
    }
    th {
        color: white;
        background: #666;
    }
    th,td {
        text-align: left;
        padding: 8px;
        border-right: 1px solid black;
    }
    td{
        background:cornsilk ;
    }    
</style>
<div class="col-sm " style="overflow-x:auto;">
    <table class="table " >
        <thead>
            <tr >
                <th scope="col">Date</th>
                <th scope="col">Libellé</th>
                <th scope="col">Recette</th>
                <th scope="col">Depense</th>
                <th scope="col">modif</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $arrayjournal=getJournal()->fetchAll();
                $totalRecette=0;
                $totalDepense=0;
                if (empty($arrayjournal)){
                    echo   ('<script type="text/javascript"> alert(" Votre journal des opérations est vide  "); </script>');
                }
                else{
                    foreach($arrayjournal as $texttab ){
                        ?>
                            <tr>
                                <td> <?php $date_jou=date('d-m', strtotime($texttab['DATE_JOU']));   echo $date_jou; ?>  </td>
                                <td> <?php $libelle_jou=$texttab['LIBELLE_JOU']; echo $libelle_jou;?> </td>
                                <td><?php $type=$texttab['TYPE_JOU']; if($type=="Recette"){ $recette_jou=$texttab['VALEUR_JOU']; echo $recette_jou; $totalRecette=$totalRecette+$recette_jou;?>  <?php } else{ $recette_jou=0;echo $recette_jou;}?> </td>
                                <td> <?php $type=$texttab['TYPE_JOU'];if($type=="Depense"){$depense_jou=$texttab['VALEUR_JOU'];echo $depense_jou; $totalDepense=$totalDepense+$depense_jou;?>  <?php  }else{$depense_jou=0;echo $depense_jou; } ?> </td>                     
                                <td  class="text-center"><a href="#" data-toggle="modal" data-target="#modaldelete"><span class="glyphicon glyphicon-trash text-danger"></span></a></td>
                                <!-- Formulaire pour confirmer la suppression-->
                                <div class="modal" id="modaldelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content container jumbotron p-5 my-5 bg-dark shadow text-dark" >
                                        <div class="jumbotron input-group px-5">
                                            <!-- Formulaire suppression -->
                                            <legend>Voulez-vous vraiment supprimer cette ecriture ?</legend>
                                            <form method="post" action="affichageJournal.php">
                                                <a href="comptabilite.php" >  Nom</a>
                                                <button class="btn btn-outline-warning" type="submit" name="btnYes">Oui </button><br>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </tr>                            
                        <?php
                    }
                }
            ?>
            <tr>
                <th class="text-center" colspan="2" scope="col" >Total</th>
                <th scope="col" > <?php echo $totalRecette; ?> </th>
                <th scope="col" > <?php echo $totalDepense; ?>  </th>
                <th></th>
            </tr> 
        </tbody>
    </table>
</div>
<?php 
    }
    else {
     header("Location:error.php?message=Vous n'êtes pas connecté !");
    }
?>
