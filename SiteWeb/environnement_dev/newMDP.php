<?php
    include('header.php');
    
    // initialisation de variable
    $tempsValiditeCode    = 300   ; // Temps de validité du code en seconde

    // Si SUBMIT form CODE_recup
    if (isset($_POST['btnCodeRecup']))
    {
        // Sécuriser l'input
        $code_post = htmlspecialchars(trim($_POST['codeRecup']));
        $user = getParametre();
        $code_par   = $user['CODE_PAR'];
        $t_code_par = $user['T_CODE_PAR'];

        if (($code_par == $code_post) AND ((time()-$t_code_par)<$tempsValiditeCode)) 
        { 
?>
            <!-- Div RÉCUPÉRATION du MOT DE PASSE  -->
            <div class="col col-md-7 col-lg-6 col-xl-3 container p-5 mt-5 bg-dark shadow">
                <div class="jumbotron input-group">
                    <legend>Redéfinissez votre mot de passe</legend>
                    <form method="post" action="login.php">
                        <label for="password1">Nouveau mot de passe :</label>
                        <input class="form-control" type="password" name="password1" required>
                        <label for="password2">Confirmez le mot de passe :</label>
                        <input class="form-control" type="password" name="password2" required>
                        <button class="btn btn-outline-warning mt-2" type="submit" name="btnNewMDP">Envoyer</button><br>
                    </form>
                </div>
            </div>
<?php
        }
    }
    include('footer.php');
?>
