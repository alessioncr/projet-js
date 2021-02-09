<?php
include('header.php');


if ($_GET['btnCodeRecup'] == $code_link_par)
  {
    // Empêche de réafficher le form RÉCUP MDP
    $flag = false;
    // Sécuriser l'input
    $code_post = htmlspecialchars(trim($_POST['codeRecup']));
    $user = getParametre();
    $code_par   = $user['CODE_PAR'];
    $t_code_par = $user['T_CODE_PAR'];

    if (($code_par == $code_post) AND ((time()-$t_code_par)<$tempsValiditeCode)) { 
?>
        <div class="col col-md-7 col-lg-6 col-xl-3 container p-5 mt-5 bg-dark shadow">
            <div class="jumbotron input-group">
                <legend>Redéfinissez votre mot de passe</legend>
                <form method="post" action="recupMDP.php">
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
