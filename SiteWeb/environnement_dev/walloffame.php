<!-- inspiration Pierre -->

<?php 



?>

<div class="shadow border bg-light border-warning rounded text-center">
    <h1>Wall of fame</h1>
    <br>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">    
            <?php 
                $arrayGalerie=getWOF()->fetchAll(); 
                    // CHARGEMENT DES DONNÉES PARAMETRE BDD
                    
                    $n=1;           
                    foreach($arrayGalerie as $texttab ){
                        $img = $texttab['NOM_MED'];
                        $nom                          = ($texttab['NOM_WAL']);
                        $profession                   = ($texttab['PROFESSION_WAL']);
                        if ($n==1){?>
                            <div class="carousel-item active">
                                <h5>Nom : <?php echo $nom; ?></h5>
                                <h5>Profession : <?php echo $profession; ?></h5>
                                <img class="d-block img-fluid " src="medias/uploads/<?php echo$img; ?>" width="100%">
                            </div> <?php 
                            $n=$n+1;
                        }
                        else{ ?>
                            <div class="carousel-item ">
                                <h5>Nom : <?php echo $nom; ?></h5>
                                <h5>Profession : <?php echo $profession; ?></h5>
                                <img class="d-block img-fluid " src="medias/uploads/<?php echo$img; ?> "  width="100%">
                            </div>  <?php 
                        }                                    
                    }            
            ?>                                
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </div>
</div>