<?php
include('header.php');

// Si SUBMIT form EMAIL
if (isset($_POST['btnEnvoyerEmail']) OR isset($_POST['btnNewCode']))
{
    // Initialisation des variables
    $longueurCode         = 10    ; // taille du code de récupération
    $email = htmlspecialchars(trim($_POST["emailRec"]));

    if (filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $user = null;
        // Récupère la table paramètre
        $user = getAdmin($email);
        // Contrôle l'email
        if ($user['EMAIL_PAR']==$email)
        {
            // Empêche de réafficher le form RÉCUP MDP
            $flag = false;
            $code_par = passgen($longueurCode);
        }
    }
?>
        <!-- FORM CODE_RÉCUP -->
        <div class="col col-md-7 col-lg-6 col-xl-3 container p-5 mt-5 bg-dark shadow">
            <div class="jumbotron input-group">
                <legend>Entrez votre code de validation</legend>
                <small class="container p-0 mb-3">Enovoyé à :<strong> <?php echo($email); ?> </strong> </small>
                
                <form method="post" action="newMDP.php">
                    <label for="codeRecup">Code :</label>
                    <input class="form-control" type="text" name="codeRecup" required>
                    <button class="btn btn-outline-warning mt-2" type="submit" name="btnCodeRecup">Envoyer</button>
                </form>

                <form method="post" action="code_verification.php">
                    <input type="hidden" name="emailRec" value= <?php echo($email); ?> >
                    <button class="btn btn-link p-0 mt-3" type="submit" name="btnNewCode"><small>Demandez un nouveau code</small></button>
                </form>
            </div>
        </div>

<?php
} 
include('footer.php');
?>