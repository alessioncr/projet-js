<?php
    include('header.php');    
    // Si SUBMIT form CODE_recup
    if (isset($_POST['btnNewMDP']))
    {
        // Empêche de réafficher le form RÉCUP MDP
        $flag       = false;
        // Sécuriser les inputs
        $password1  = htmlspecialchars(trim($_POST['password1']));
        $password2  = htmlspecialchars(trim($_POST['password2']));
        // Vérifier si les MDP sont pareil
        if ($password1 === $password2) {
            // mise à jour du novueau MDP dans la BDD
            updateMDP($password1);
            echo ('<script type="text/javascript"> alert("Votre mot de passe a bien été changé !"); </script>');
        }
    }
?>

<!-- NOUVEAU MOT DE PASSE -->
<div class="modal-content container col col-md-7 col-lg-6 col-xl-3 p-5 mt-5 bg-dark shadow">
    <div class="jumbotron input-group">
        <!-- FORM  -->
        <legend>Login</legend>
        <br>
        <form method="post" action="index.php">
            <label for="email">Email:</label>
            <input class="form-control" type="email" name="email" required>
            <label for="password">Password:</label>
            <input class="form-control" type="password" name="password" required>
            <a class="d-block" href="recupMDP.php"><small>mot de passe oublié</small></a>
            <button class="btn btn-outline-warning" type="submit" name="btnLogin">Login</button>
        </form>
    </div>
</div>