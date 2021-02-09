<?php
  
  include('header.php');
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
<div class=" container jumbotron p-5 my-5 bg-dark shadow text-dark" >
  <div class="jumbotron ">
    <form action="affichageJournalPar.php" method ="post">
      <div class="form-group row " style="margin-left: 1.5%;">
        <label class=" col-md-2 " for="date"> Voir journal du  : </label>
        <input class=" col-md-2 " type="date"  name="date1" required>
        <label class=" col-md-1 " for="date"> au   : </label>
        <input class=" col-md-2 " type="date"  name="date2" required>
        <label class=" col-md-1 " for="date"> valider</label>
        <button type  ="submit" class ="btn btn-outline-warning col-md-2" name  ="btnOk" >Oui </button>
      </div>      
    </form>
    <div class="col-sm " style="overflow-x:auto;">
      <table class="table " >
        <thead>
            <tr >
                <th scope="col">Date </th>
                <th scope="col">Libellé</th>
                <th scope="col">Recette</th>
                <th scope="col">Depense</th>                
            </tr>
        </thead>
        <tbody>
          <?php
          $totalRecette=0;
          $totalDepense=0;
          $date1=0;
          $date2=0;
          if (isset ($_POST["btnOk"])) {
            //On recupere les données du formulaire 
            $dates1 =date('Y-m-d', strtotime($_POST["date1"]));
            $date1= $dates1;
            $dates2 =date('Y-m-d', strtotime($_POST["date2"]));
            $date2= $dates2;
            $arrayjournal=getJournalAvec($dates1,$dates2)->fetchAll();
          
            if (empty($arrayjournal)){
              echo   ('<script type="text/javascript"> alert(" Les dates selectionnés ne contiennent auccune information  "); </script>');
            }
            else{ ?>
              <h6 class="text-center" style="margin-left: 1.5%;margin-top: 25px;" >Le journal des operations du <?php echo date('d-m-y', strtotime($date1));?> au <?php echo date('d-m-y', strtotime($date2));?></h6><?php 
              foreach($arrayjournal as $texttab ){ ?>
                
                <tr>
                  <td> <?php $date_jou=date('d-m-y', strtotime($texttab['DATE_JOU']));   echo $date_jou; ?>  </td>
                  <td> <?php $libelle_jou=$texttab['LIBELLE_JOU']; echo $libelle_jou;?> </td>
                  <td><?php $type=$texttab['TYPE_JOU']; if($type=="Recette"){ $recette_jou=$texttab['VALEUR_JOU']; echo $recette_jou; $totalRecette=$totalRecette+$recette_jou;?>  <?php } else{ $recette_jou=0;echo $recette_jou;}?> </td>
                  <td> <?php $type=$texttab['TYPE_JOU'];if($type=="Depense"){$depense_jou=$texttab['VALEUR_JOU'];echo $depense_jou; $totalDepense=$totalDepense+$depense_jou;?>  <?php  }else{$depense_jou=0;echo $depense_jou; } ?> </td>                     
                </tr>
                <?php 
              }
            }
          }
          ?>    
          <tr>
              <th class="text-center" colspan="2" scope="col" >Total</th>
              <th scope="col" >  <?php echo $totalRecette; ?> </th>
              <th scope="col" >  <?php echo $totalDepense;$solde=$totalRecette-$totalDepense;?></th>              
          </tr> 
        </tbody>
      </table>
    </div>
    <div>
        <h1 class="text-center display-9">Le solde  est de <?php  echo $solde;?> CHF</h1>
        <a  href="downloadPar.php?date1=<?=$date1?>&amp;date2=<?=$date2?>&amp;iduser=<?=($_SESSION["idUser"])?>" class="btn btn-outline-warning  " >Telecharger votre journal</a>
    </div>
  </div>   
</div>

<?php
  }
  else {
    echo ('<script type="text/javascript"> alert("Vous n\'êtes pas connecté !"); </script>');
  }
  include('footer.php'); 
?>
