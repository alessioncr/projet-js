<?php
  $title = "Parametre";
  include('header.php');


  
// Vérifie si une SESSION est active
if (isset($_SESSION["idUser"])) {
?>
		
        
<div class="container jumbotron bg-dark shadow text-dark">
<h1 style="color:white">Validation Livre d'or</h1> 
<br>          
<main role="main" class="container">
    <div class="row">
        <div class="col-md-12 blog-main">
            <div class=" cascading-modal" role="document">
                <!--Content-->
                <div class="modal-content">
                    <!--Modal cascading tabs-->
                    <div class="modal-c-tabs">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#panel1" role="tab">En attente</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#panel2" role="tab">Validé</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#panel3" role="tab">Refusé</a>
                            </li>
                        </ul>
                        <!--./ Nav tabs -->
                        <!-- Tab panels -->
                        <div class="tab-content">
                            <!--Panel 1-->
                            <div class="tab-pane fade in show active" id="panel1" role="tabpanel">
                                <div class="modal-body mb-3" style="overflow-x:auto;">
                                    <?php include('include/livredorenattente.php'); ?>
                                </div>
                            </div>
                            <!--/.Panel 1-->

                            <!--Panel 2-->
                            <div class="tab-pane fade " id="panel2" role="tabpanel">
                                <div class="modal-body mb-3" style="overflow-x:auto;">
                                    <?php include('include/livredorvalide.php'); ?>
                                </div>
                            </div>
                            <!--/.Panel 2-->

                            <!--Panel 3-->
                            <div class="tab-pane fade" id="panel3" role="tabpanel">
                                <div class="modal-body mb-3" style="overflow-x:auto;">
                                    <?php include('include/livredorrefuser.php'); ?>
                                </div>
                            </div>
                            <!--/.Panel 3-->
                        </div>
                    </div>
                    <!--/.Content-->
                </div>
            </div>
    </div>
</main><!-- /.container -->
</div>

<?php
  
}
else {
  
  header("Location:error.php?message=Vous n'êtes pas connecté !");
}
  include('footer.php'); 
?>