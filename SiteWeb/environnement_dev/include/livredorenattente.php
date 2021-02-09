<?php

if(isset($_POST['btnvalider'])){
    foreach($_POST['check'] as $value){
        validationlivredor($value);
    }
}

if(isset($_POST['btnrefuser'])){
    foreach($_POST['check'] as $value){
        refulivredor($value);
    }
}

?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--inspiration : https://www.youtube.com/watch?v=CHfwkekNIYo -->
<script>
    $(document).ready(function(){
        var n = 0;
        $("#form1 #select-all").click(function(){
            $("#form1 input[type='checkbox']").prop('checked',this.checked);
            if $("#form1 input[type='checkbox']").prop('checked',this.checked);{
                n += 1;
            }
        });
    });

</script>


<form action="validationLivredor.php" id="form1" method="POST">
<table class="table">
    <thead>
    <tr>
        <th><input type="checkbox"  id="select-all"> Tous</th>
        <th>Date</th>
        <th>Auteur</th>
        <th>Commentaire</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $arraylivredorenattente=getLivredorenattente()->fetchAll();

        if (empty($arraylivredorenattente)){
            echo   ('<script type="text/javascript"> alert(" Il n\'y a pas de commentaire en attente... "); </script>');
        }
        else{
            foreach($arraylivredorenattente as $texttab ){
                ?>
                <tr>
                    <td> 
                        <input type="checkbox" name="check[]" value="<?php echo $texttab['ID_LIV']; ?>">
                    </td>
                    <td> <?php $date_liv=date('d-m-y', strtotime($texttab['DATE_LIV']));   echo $date_liv; ?>  </td>
                    <td> <?php $auteur=ucfirst($texttab['AUTEUR_LIV']); echo $auteur;?> </td>
                    <td> <?php $commentaire=$texttab['COMMENTAIRE_LIV']; echo $commentaire;?> </td> 
                </tr>
                      
            <?php 
                }   
            }
            ?>
    </tbody>
</table>
    <button type="submit" class="btn btn-primary" name="btnvalider">Valider</button>
    <button type="submit" class="btn btn-secondary" name="btnrefuser">Refuser</button>
    <div><script>console.log('il y a:${n} commentaire selectionné');</script></div>
</form> 



