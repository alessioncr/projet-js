

<!--inspiration forum-->
<!--https://openclassrooms.com/forum/sujet/afficher-un-texte-aleatoire-87459-->



<div class="shadow border border-warning rounded text-center bg-light">
    <p class="m-auto p-2">
    <?php 
    $arrayAleatoire = getLoAleatoire();

    $auteur         = "";
    $commentaire    = "";
    $date           = date('d.m.y');

    foreach($arrayAleatoire as $comliv){
        $commentaire    = $comliv['0'];
        $auteur         = $comliv['1'];
        $date           = date('d.m.y', strtotime($comliv['2'])) ;
    }
    echo ($auteur . " :   " . $commentaire . " " .  $date);
    ?>
    </p>
</div>


