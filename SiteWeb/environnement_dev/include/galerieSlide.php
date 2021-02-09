
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">    
        <?php 
            $arrayGalerie=getImage($id)->fetchAll(); 
                $n=1;           
                foreach($arrayGalerie as $texttab ){
                    $img = $texttab['NOM_MED'];
                    if ($n==1){?>
                        <div class="carousel-item active">
                            <img class="d-block img-fluid " src="medias/miniature/<?php echo$img; ?>" width="100%">
                        </div> <?php 
                        $n=$n+1;
                    }
                    else{ ?>
                        <div class="carousel-item ">
                            <img class="d-block img-fluid " src="medias/miniature/<?php echo$img; ?> "  width="100%">
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