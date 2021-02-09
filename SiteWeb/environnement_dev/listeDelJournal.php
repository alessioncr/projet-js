
<?php
    include('header.php');
    // Vérifie si une SESSION est active
    if (isset($_SESSION["idUser"])){  
        if(isset($_POST['btnvalider'])){
            foreach($_POST['check'] as $value){
                activeJournalDel($value);               
            } echo   ('<script type="text/javascript"> alert(" L\'ecriture supprimée a été rajouté au journal "); </script>');
            echo '<meta http-equiv="refresh" content="0; url=comptabilite.php">';
            
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

<form id="form1" method="POST" action="listeDelJournal.php">
    <div class="modal-content container jumbotron p-5 my-5 bg-dark shadow text-dark" >
        <div class="jumbotron input-group px-5">
                <div class="col-sm " style="overflow-x:auto;">
                <table class="table " >
                    <thead>                        
                        <h4  style="margin-top: 25px;margin-bottom:-15px ;text-decoration: underline;" >Liste des operations supprimées</h4><br>
                        <tr >
                            <th scope="col">Date</th>
                            <th scope="col">Libellé</th>
                            <th scope="col">Recette</th>
                            <th scope="col">Depense</th> 
                            <th scope="col"><input type="checkbox"  id="select-all">  Supprimer tout</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php                
                            $arrayjournal=getJournalDel()->fetchAll();                
                            $idJou=0;                
                            if (empty($arrayjournal)){
                                echo   ('<script type="text/javascript"> alert(" Votre journal des opérations est vide  "); </script>');
                            }
                            else{
                                foreach($arrayjournal as $texttab ){
                                    ?>
                                        <tr>
                                            <td> <?php $date_jou=date('d-m-y', strtotime($texttab['DATE_JOU']));   echo $date_jou; ?>  </td>
                                            <td> <?php $libelle_jou=$texttab['LIBELLE_JOU']; echo $libelle_jou;?> </td>
                                            <td><?php $type=$texttab['TYPE_JOU']; if($type=="Recette"){ $recette_jou=$texttab['VALEUR_JOU']; echo $recette_jou; ?>  <?php } else{ $recette_jou=0;echo $recette_jou;}?> </td>
                                            <td> <?php $type=$texttab['TYPE_JOU'];if($type=="Depense"){$depense_jou=$texttab['VALEUR_JOU'];echo $depense_jou; ?>  <?php  }else{$depense_jou=0;echo $depense_jou; } ?> </td>                                
                                            <td> <input type="checkbox" name="check[]" value="<?php echo $texttab['ID_JOU']; ?>"></td>
                                        </tr>                            
                                    <?php
                                }                    
                            }
                        ?>
                        
                    </tbody>
                </table>
                <button type="submit" class="btn btn-secondary" name="btnvalider">Valider</button>
            </div>    
        </div>  
        <a  href="comptabilite.php" class="btn btn-outline-warning shadow sticky-top m-auto" >Retour au journal</a>  
    </div> 
</form> 

<?php
}
else {
echo ('<script type="text/javascript"> alert("Vous n\'êtes pas connecté !"); </script>');
}
include('footer.php'); 
?>