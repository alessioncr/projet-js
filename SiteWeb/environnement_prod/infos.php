



<article class="container my-3" id="infos">
    <div class="row">
    <! -- Informations -->
    <div class="col-none-3 bg-light p-5 m-auto rounded" style="color:black">
        <h1 class="h2 display">Informations</h1>
        <br>
        <p class="lead"> &#x1F4CD;<?php echo($adresse)?> </p>
        <p class="lead font-weight-normal">&#x2706; <?php echo($telephone)?></p>
        <div class="row">
            <div class="col">
            <p>Horaires:  </p>
            </div>
            <div class="col" style="color:black">
            <p>Lu-Sa</p>
            <p>Di</p>
            </div>
            <div class="col" style="color:black">
            <p> <?php echo($horaire)?></p>
            <p  class="text-danger">fermé</p>
            </div>
        </div>
    </div>
    <! -- MAP google -->
    <div class="col-none-3 mx-auto my-5 ">
        <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2761.5765953735604!2d6.145752615582205!3d46.19898367911641!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478c652ce46bbfe1%3A0xe3cedd46f94acc32!2sMulette%20Coiffure!5e0!3m2!1sfr!2sch!4v1595475315206!5m2!1sfr!2sch"
        width=380 height=380 frameborder="0" style="border:0;"
        class="embed-responsive   rounded" allowfullscreen="true" aria-hidden="false" tabindex="0">
        </iframe>
    </div>
    </div>
</article>
