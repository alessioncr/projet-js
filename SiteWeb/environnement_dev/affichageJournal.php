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
    <form method="POST" action="download.php" >
        <table class="table " >
            <thead>
                <?php
                    //Je creer un tableau php avec comme valeur tous les mois d'une année
                    $Dico = array("Janvier", "Fevrier","Mars" ,"Avril","Mai","Juin","Juillet","Août","Septembre","Octobre", "Novembre","Decembre");
                    //Recupere le mois courant comme un integer
                    $mois=date("n");
                    //assigne le mois en integer à une valeur du tableau 
                    //$mois-1 car un tableau commence toujours à 0
                    $moiString=$Dico[$mois-1];
                ?>
                <h4  style="margin-top: 25px;margin-bottom:-15px ;text-decoration: underline;" >Journal des operations du mois de  <?php echo $moiString." ".date("Y"); ?> .</h4><br>
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Libellé</th>
                    <th scope="col">Recette</th>
                    <th scope="col">Depense</th>
                    <th scope="col">Supprimer </th>
                    <th scope="col">Modifier </th>
                </tr>
            </thead>
            <tbody>
                <?php                
                    $arrayjournal=getJournal()->fetchAll();
                    $totalRecette=0;
                    $totalDepense=0;
                    $idJou=0;                
                    if (empty($arrayjournal)){
                        echo   ('<script type="text/javascript"> alert(" Votre journal des opérations est vide  "); </script>');
                    }                    
                    else{
                        
                        foreach($arrayjournal as $texttab ){
                            $ID=$texttab['DATE_JOU'];
                            $valide=$texttab['VALIDE_JOU']; 
                            $dateRel=  $texttab['DATE_JOU']; 
                            $typeJou=$texttab['TYPE_JOU'] ;  
                            $montant= $texttab['VALEUR_JOU'];                
                            ?>
                                <tr>
                                    <td> <?php $date_jou=date('d-m-y', strtotime($texttab['DATE_JOU']));   echo $date_jou; ?>  </td>
                                    <td> <?php $libelle_jou=$texttab['LIBELLE_JOU']; echo $libelle_jou;?> </td>
                                    <td class="text-right"><?php $type=$texttab['TYPE_JOU']; if($type=="Recette"){ $recette_jou=$texttab['VALEUR_JOU']; echo $recette_jou; $totalRecette=$totalRecette+$recette_jou;?>  <?php } else{ $recette_jou=0;}?> </td>
                                    <td  class="text-right"> <?php $type=$texttab['TYPE_JOU'];if($type=="Depense"){$depense_jou=$texttab['VALEUR_JOU'];echo $depense_jou; $totalDepense=$totalDepense+$depense_jou;?>  <?php  }else{$depense_jou=0;} ?> </td>                     
                                    <td  <?php $idJou=$texttab['ID_JOU']?>class="text-center"><a href="delJournal.php?idJour=<?php echo$idJou ?>" ><i class="icon-fixed-width icon-trash text-danger"></i></a></td>                                
                                    <td class="text-center"><a href="modifierCompta.php?idJour=<?php echo$idJou ?> " > <i class="icon-fixed-width icon-pencil"></i></a></td>
                                </tr>                            
                            <?php
                           
                        }                    
                    }
                ?>
                <tr>
                    <th class="text-center" colspan="2" scope="col" >Total</th>
                    <th class="text-right" scope="col" > <?php echo $totalRecette; ?> </th>
                    <th class="text-right" scope="col" > <?php echo $totalDepense;$solde=$totalRecette-$totalDepense; ?>  </th>
                    <th colspan="2"></th>                    
                </tr> 
            </tbody>
        </table>
        
        <a  href="download.php?iduser=<?php echo($_SESSION["idUser"]); ?>" class="btn btn-outline-warning  " >Telecharger votre journal</a>  
        
    </form>
</div>
<div>
    <h1 class="text-center display-9">Votre solde est de <?php echo $solde;?> CHF</h1>
</div>
<?php
}
else {
echo ('<script type="text/javascript"> alert("Vous n\'êtes pas connecté !"); </script>');
}
?>
