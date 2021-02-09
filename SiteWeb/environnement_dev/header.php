<?php
    
    
    require 'db_fonctions.php';
    session_start();
    // ************************************************************
    // LOGIN
    // ************************************************************
    if (isset($_POST["btnLogin"])) 
    {
        $email = htmlspecialchars(trim($_POST["email"]));
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            $user = getAdmin($email);
        }
        else {
            $user = null;
        }
        $pswrd = sha1($_POST["password"]);    // TODO hashpassword
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
            echo '<meta http-equiv="refresh" content="0; url=index.php">';
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
            echo ('<script type="text/javascript"> alert("Erreur inconnue !"); </script>');
            $_SESSION["idUser"]  = null ; // Not connected
        }
        }
        else{
            echo ('<script type="text/javascript"> alert("Login ou mot de passe faux !"); </script>');
        }
    }
    // ************************************************************
    // LOGOUT
    // ************************************************************
    if (isset($_POST["btnLogout"])) {
        $_SESSION["idUser"]  = null ;
        session_destroy();
        echo ('<script type="text/javascript"> alert("Vous êtes déconnecté !"); </script>');
        echo '<meta http-equiv="refresh" content="0; url=index.php">';
    }
    // ************************************************************
    // CRÉER CLIENT si btnCreer
    // ************************************************************
    if (isset($_POST["btnCreer"])) 
    {
        // récupération du nom du nouveau client
        $n_nom = $_POST["nom_client"];

        // vérification si le nom client existe déjà
        $client = getClientParNom($n_nom);
        if (empty($client))
        {
            // Crée le client dans la BDD
            newClient($n_nom);
            // récupère la table du nouveau client
            $client = getClientParNom($n_nom);
            // créer une variable id_client dans $_SESSION
            $_SESSION["id_client"] = $client['ID_CLI'];
        }
        else 
        {
            echo ('<script type="text/javascript"> alert( "Ce nom de client existe déjà, choisissez en un autre !"); </script>');
        }
    }   
    // ************************************************************
    // ENREGISTRER LES MODIFICATION DE LA FICHE CLIENT
    // ************************************************************
    elseif (isset($_POST["btnEnregistrer"]) OR isset($_POST["btnAjouter"]) OR isset($_POST['btnPhotoProfil']))
    { 
        // CHARGEMENT DES VALEURS $_POST
        $id             = $_SESSION["id_client"];
        $nom            = $_POST['nom'];
        $tel            = $_POST['tel'];
        $anni           = date('Y-m-d', strtotime($_POST['anni']));
        $details        = $_POST['details'];
        $insta          = $_POST['insta'];
        $face           = $_POST['face'];
        $photoProfil    = $_POST['photoProfil'];
        $retard         = (isset($_POST['retard'])) ? "1" : "0";
        
        // TODO **********************************************************************************************
        // SUPRESSION $valide_cli  PAS D'UTILITé DE FAIRE UNE SUPPRESSION LOGIQUE (pour l'instant)
        /*
        $valide   = $_POST['valide'];
        if (empty($valide)){
        $valide = "0";
        }
        ******************************************************************************************************* */


        // vérification que le nom client soit unique
        if (verifNomClient($id, $nom)) 
        {
            echo ('<script type="text/javascript"> alert("Le nom choisi est déjà utilisé !"); </script>');
        }
        else
        {
            // MISE à JOUR DE LA BDD
            updateClient($id, $nom, $tel, $anni, $details, $insta, $face, $retard);  /*TODO , $valide*/

            // vérification que le nom client soit unique
            if (verifNomClient($id, $nom)) 
            {
            echo (' <script type="text/javascript"> alert("Le nom choisi est déjà utilisé !"); </script>');
            }
            else
            {
                // MISE à JOUR DE LA BDD
                updateClient($id, $nom, $tel, $anni, $details, $insta, $face, $retard);  /*TODO , $valide*/

                if (isset($_POST["btnEnregistrer"]))
                {
                    header("Location:client.php?id=$id");
                    exit();
                }
                if (isset($_POST["btnAjouter"]))
                {
                    header("Location:media.php?id=$id");
                    exit();
                } 
            }
        }
    }
?>
<!--
 * * * * * * * * * * * * * * * * * *
 * v.0 -2020 - Pierre , Alessio , John  - ESIG
 * * * * * * * * * * * * * * * * * *
-->
<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
         <!-- Pour creer les bouton delete et editer -->
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
        
        <title>Dreadz Barber</title>
    </head>
    <header >
        <!-- NAVBAR -->
        <nav class="navbar shadow navbar-light rounded bg-light">
            <!-- logo -->
            <a class="navbar-brand" href="index.php">
                <img class="img-fluid" src="./images/logo/logo5" alt="Dreadz Barber" width="80px" height="max">
            </a>
            <!-- toggle button -->
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarColor02">
                <span class="navbar-toggler-icon  text-warning"></span>
            </button>
            <!-- collapse div -->
            <div class="collapse navbar-collapse" id="navbarColor02">
                <!-- links -->
                <ul class="navbar-nav mr-auto font-weight-bold">
                    <!-- homepage -->
                    <li class="nav-item active">
                        <a class="nav-link " href="index.php">Dreadz Barber</a>
                    </li>
                    <!-- admin links -->
                    <?php if (!empty($_SESSION["idUser"])) { ?>        
                        <li class="nav-item">
                            <a class="nav-link " href="client.php">Clients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="crudparametre.php">Gérer information site</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="comptabilite.php">Comptabilité</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="affichageJournalPar.php">Voir journal d'une date à une autre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="validationLivredor.php">Validation Livre d'or</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="crudWall.php">Gestion Wall of fame</a>
                        </li>
                    <?php } ?>
                    <!-- informations -->
                    <li class="nav-item">
                        <a class="nav-link " href="index.php#infos">Informations</a>
                    </li>
                    
                    <!-- tarifs -->
                        <a class="nav-link " href="index.php#tarif">Tarifs</a>
                    
                    <!-- wall of fame -->
                    <li class="nav-item">
                        <a class="nav-link  " href="index.php#wall">Wall of fame</a>
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
                                <button class="nav-link btn btn-link font-weight-bold " type="submit" name="btnLogout">Se déconnecter</button>    
                            </form>   
                    <?php 
                        } else 
                        { ?>
                            <a href="#" class="nav-link font-weight-bold " data-toggle="modal" data-target="#modalLogin">Se connecter</a>
                            <!-- LOGIN popup formulaire -->
                            <div class="modal" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content jumbotron p-5 bg-dark shadow">
                                        <div class="jumbotron input-group">
                                            <!-- FORM login -->
                                            <legend>Login</legend>
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
        <?php 
            // Boutton AJOUTER CLIENT si connecté
            if (!empty($_SESSION["idUser"])) { ?>
                <a href="#" class="btn btn-outline-warning shadow sticky-top" data-toggle="modal" data-target="#modalNewClient">Nouveau client</a>
                <!-- POPUP NEW CLIENT -->
                <div class="modal" id="modalNewClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content jumbotron p-5 bg-dark shadow">
                            <div class="jumbotron input-group">
                                <!-- FORM NEW CLIENT -->
                                <legend>Nouveau client</legend>
                                <form method="post" action="modifClient.php">
                                    <label for="nom_client">Nom client :</label>
                                    <input class="form-control" type="text" name="nom_client" required>
                                    <button class="btn btn-outline-warning mt-3" type="submit" name="btnCreer">Créer Client</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        <?php 
            }
        ?>

    <body class="bg-dark">
        <?php
            $parametre  = getParametre();
            $vacances   = ($parametre['VACANCES_PAR']);

            if( ($vacances) AND (!(isset($_SESSION["idUser"])))){
                ?>
                <div class="row sticky-top text-center">
                    <div class="col">
                        <img class="img-fluid" src="./images/vacances/closeT" alt="EN VACANCES" width="" height="max">
                    </div>    
                </div>
                <?php
            }
        ?>  