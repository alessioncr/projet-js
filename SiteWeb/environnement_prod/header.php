<?php
  require 'db_fonctions.php';
  session_start();
  
  // LOGIN
  if (isset($_POST["btnLogin"])) 
  {
    $email = htmlspecialchars(trim($_POST["email"]));
    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
        $user = getAdmin($email);
    }
    else {
        $user = null;
    }
    $pswrd = sha1($_POST["password"]);    
    // Contrôle l'email
    if (!empty($user)) 
    { 
      try 
      {
        // Contrôle mot de passe
        if ($user["PASSWORD_PAR"] == $pswrd) 
        {
          $_SESSION["idUser"]  = "1" ;
          echo ('<script type="text/javascript"> alert("Vous êtes connecté !"); </script>');
        } 
        else 
        { // mot de passe faux
          $_SESSION["idUser"]  = null ;
          echo ('<script type="text/javascript"> alert("Login ou mot de passe faux !"); </script>');
        }
      }
      // Erreur inconnue 
      catch (Exception $e) 
      {
        echo ('<script type="text/javascript"> alert("erreur inconnue !"); </script>');
        $_SESSION["idUser"]  = null ; // Not connected
        header("Location:error.php?message=".$e->getMessage());
        exit();
      }
    }
    else{
        echo ('<script type="text/javascript"> alert("Login ou mot de passe faux !"); </script>');
    }
  }

  // LOGOUT
  if (isset($_POST["btnLogout"])) {
    $_SESSION["idUser"]  = null ;
    session_destroy();
    echo ('<script type="text/javascript"> alert("Vous êtes déconnecté !"); </script>');
  }
?>
<!--
 * * * * * * * * * * * * * * * * * *
 * v.0 -2020 - Pierre , Alexio , John  - ESIG
 * * * * * * * * * * * * * * * * * *
-->
<!DOCTYPE html>
<html class="bg-dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="./css/style.css">

        <title>Dreadz Barber</title>
    </head>
        <header>
            <!-- NAVBAR -->
            <nav class="navbar shadow navbar-light rounded bg-light">
                <!-- logo -->
                <a class="navbar-brand" href="index.php"><img class="img-fluid" src="./images/logo/logo5" alt="Dreadz Barber" width="80px" height="max"></a>
                <!-- toggle button -->
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarColor02">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- collapse div -->
                <div class="collapse navbar-collapse" id="navbarColor02">
                    <!-- links -->
                    <ul class="navbar-nav mr-auto">
                        <!-- homepage -->
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Dreadz Barber</a>
                        </li>
                        <!-- admin links -->
                        <?php if (!empty($_SESSION["idUser"])) { ?>        
                            <li class="nav-item">
                                <a class="nav-link" href="client.php">Clients</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="crudparametre.php">Paramètres</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="comptabilite.php">Comptabilité</a>
                            </li>
                        <?php } ?>
                        <!-- informations -->
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#infos">Informations</a>
                        </li>
                        
                        <!-- tarifs -->
                            <a class="nav-link" href="index.php#tarif">Tarifs</a>
                        
                        <!-- wall of fame -->
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#wall">Wall of fame</a>
                        </li>
                        <!-- 
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#livre">Livre d'or</a>
                        </li>                
                        -->
                        <!-- connecter/déconnecter"  alterner si SESSION ACTIVE -->
                        <?php 
                            if (!empty($_SESSION["idUser"])) { ?>  
                                <form method="post" action="index.php">
                                    <button class="nav-link btn btn-link" type="submit" name="btnLogout">Se déconnecter</button>    
                                </form>   
                        <?php 
                            } else 
                            { ?>
                                <a href="#" class="nav-link" data-toggle="modal" data-target="#modalLogin">Se connecter</a>
                                <!-- LOGIN popup formulaire -->
                                <div class="modal" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content jumbotron p-5 bg-dark shadow">
                                            <div class="jumbotron input-group">
                                                <!-- FORM login -->
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
                                    </div>
                                </div>
                        <?php
                            } ?>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Boutton AJOUTER CLIENT -->                        
        <?php if (!empty($_SESSION["idUser"])) { ?>
            <a  href="newClient.php"
                class="btn btn-outline-warning shadow sticky-top m-auto"
            >Nouveau client
            </a>
        <?php } 
        ?>

    <body class="bg-dark">
            

