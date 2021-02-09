<?php
  $title = "Mot de passe oublié";
  include('header.php');
?>

    <!-- EMAIL de RÉCUPÉRATION -->
    <div class="col col-md-7 col-lg-6 col-xl-3 container p-5 mt-5 bg-dark shadow">
        <div class="jumbotron input-group">
            <!-- FORM Recup MDP -->
            <legend>Récupérer votre mot de passe</legend>
            <form method="post" action="code_verification.php">
                <label for="email">Email:</label>
                <input class="form-control" type="email" name="emailRec" required>
                <button class="btn btn-outline-warning mt-2" type="submit" name="btnEnvoyerEmail">Envoyer</button><br>
            </form>
        </div>
    </div>

<?php  
  include('footer.php'); 
?>