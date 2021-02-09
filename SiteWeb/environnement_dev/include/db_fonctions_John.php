<?php
/* *******************************
// Page des fonctions de John-Davy
   ******************************* */

/* ******************************************************************
 * Connexion à la base
 * @staticvar type $dbc
 * @return \PDO
 * *******************************************************************/
function myConnection() {
    static $dbc = null;
    if ($dbc == null) {
        try {
            $dbc = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
        } catch (PDOException $e) {
            header("Location:error.php?message=".$e->getMessage());
            exit();
        }
    }
    return $dbc;
}
/* ******************************************************************
 * Récupère la table paramètre avec l'email
 * @param string $email email
 * @return array tableau des valeur paramètre
 * ******************************************************************
 */
function getAdmin($email) {
    $email = strtolower($email);
    try {
        $request = myConnection()->prepare("SELECT * FROM db_parametre WHERE email_par = :email");
        $request->bindParam(':email', $email, PDO::PARAM_STR);
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
        exit();
    }
    return $request->fetch(PDO::FETCH_ASSOC);
}
/* ******************************************************************
 * Récupère un utilisateur avec le nom
 * @param string $nom nom
 * @return array tableau des informations d'un client
 * ******************************************************************
 */
function getClientParNom($nom) {
    $nom = strtolower($nom);
    try {
        $request = myConnection()->prepare("SELECT * FROM db_client WHERE nom_cli = :nom");
        $request->bindParam(':nom', $nom, PDO::PARAM_STR);
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
        exit();
    }
    return $request->fetch(PDO::FETCH_ASSOC);
}
/* ******************************************************************
 * Récupère un utilisateur avec l'ID
 * @param string $id id
 * @return array tableau des informations d'un client
 * ******************************************************************
 */
function getClient($id) {
    $id = strtolower($id);
    try {
        $request = myConnection()->prepare("SELECT * FROM db_client WHERE id_cli = :id");
        $request->bindParam(':id', $id, PDO::PARAM_STR);
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
        exit();
    }
    return $request->fetch(PDO::FETCH_ASSOC);
}
/* ******************************************************************
 * Récupère l'identifiant d'un utilisateur
 * @param string $nom du client
 * @return array tableau des informations d'un client
 * ******************************************************************
 */
function getIdClient($nom) {
    try {
        $request = myConnection()->prepare("SELECT ID_CLI FROM db_client WHERE NOM_CLI = :NOM_CLI");
        $request->bindParam(':NOM_CLI', $nom, PDO::PARAM_STR);
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
    }return $request->fetch(PDO::FETCH_ASSOC);
}
/* ******************************************************************
 * Crée un CLIENT
 * @param string $nom nom
 * @param string $details details
 * ******************************************************************
*/
function newClient($nom) {
    try {
        $request = myConnection()->prepare("INSERT INTO db_client (NOM_CLI) VALUES (:nom)");
        $request->bindParam(':nom', $nom, PDO::PARAM_STR);
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
        exit();
    }
}
/* ******************************************************************
*   enregistre les modifications dans la table client
*   @param  string  $id, $nom, $tel, $details, $insta, $face, $retard, $valide
*           date    $anni
*  ******************************************************************
*/
// TODO ajouter attribut valide_cli
function updateClient($id, $nom, $tel, $anni, $details, $insta, $face, $retard){
    try {
        $request = myConnection()->prepare("UPDATE db_client SET 
                                                                NOM_CLI = :nom, 
                                                                TEL_CLI = :tel, 
                                                                DETAILS_CLI = :details, 
                                                                ANNIVERSAIRE_CLI = :anni, 
                                                                INSTA_CLI = :insta, 
                                                                FACE_CLI = :face, 
                                                                RETARD_CLI = :retard
                                                                WHERE ID_CLI = :id");       
        $request->bindParam(':nom',     $nom,       PDO::PARAM_STR);
        $request->bindParam(':tel',     $tel,       PDO::PARAM_STR);
        $request->bindParam(':details', $details,   PDO::PARAM_STR);
        $request->bindParam(':anni',    $anni,      PDO::PARAM_STR);
        $request->bindParam(':insta',   $insta,     PDO::PARAM_STR);
        $request->bindParam(':face',    $face,      PDO::PARAM_STR);
        $request->bindParam(':retard',  $retard,    PDO::PARAM_STR);
        $request->bindParam(':id',      $id,        PDO::PARAM_STR);
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
        exit();
    }
}
/* ******************************************************************
*   CRÉER LA LISTE DES CLIENT DE LA RECHERCHE RAPIDE
*   @param  null
*   @return array liste table client
*  ******************************************************************
*/
function CréerListeClient($id) {
    try {
        $request = myConnection()->prepare("SELECT ID_CLI, NOM_CLI FROM db_client");
        $request->bindParam(':id', $id, PDO::PARAM_STR);
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
    }
    return $request->fetch(PDO::FETCH_ASSOC);
}
/* ******************************************************************
*   Affiche la liste des client et permet d'en sélectionner un ET
*   Redirige vers la page client sélectionnée 
*   @param  array liste table client
*   @return 
*  ******************************************************************
*/
function afficherListeClient($id){

    try {
        $clients = myConnection()->prepare("SELECT ID_CLI, NOM_CLI FROM db_client");
        $clients->bindParam(':id', $id, PDO::PARAM_STR);
        $clients->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
    }
    $classbtn   = "btn btn-warning";
    $type       = "button";
    $classdiv   = "col-md-3 m-3";
    foreach ($clients as $client) {
        $id         = $client['0'];
        $nom        = $client['1'];
        $onclick    = "afficherClient(" . $id . ")";
        echo "<div class=" . $classdiv . ">
                        <button   
                            class   =" . $classbtn . "
                            type    =" . $type . "
                            onclick =" . $onclick . "
                            >" . $nom . "</button>
                        </div>";
    }
}
/* ******************************************************************
*   VéRIFIE SI LE NOM CLIENT EST PRIS PAR UN AUTRE CLIENT
*   @param id_client nom_client
*   @return $count (combien d'autres clients avec le même nom_client)
*  ******************************************************************
*/
function verifNomClient($id, $nom){
    try {
        $countNom = myConnection()->prepare("SELECT count(NOM_CLI) FROM db_client WHERE (:id != ID_CLI) AND (:nom = NOM_CLI)");
        $countNom->bindParam(':id', $id, PDO::PARAM_STR);
        $countNom->bindParam(':nom', $nom, PDO::PARAM_STR);
        $countNom->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
    }
    $count = $countNom->fetchColumn();
    return $count;
}
/* ******************************************************************
*   CRÉE CODE DE SÉCURITÉ et le TIME() de sa création
*   Et APPELLE les fonctions UPDATECODES et EnvoieMailRecup()
*   @param $longueurCode
*   @return 
*  *****************************************************************/
function passgen($longueurCode){
    // ligne inspirée de https://phpsources.net/code_s.php?id=397  ***************************************
    $code       =  substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCEFGHIJKLMNOPQRSTUVWXYZ0123456789'),1, $longueurCode);
    // fin ligne inspirée ********************************************************************************
    
    // enregistrement de l'heure et date courante
    $t = time();
    // Requête pour sauvegarde des code et de leur heure de création
    updateCodes ($code, $t);
    // Envoie email de récupération
    EnvoieMailRecup($code);
}
/* ******************************************************************
*   UPDATE DU CODE_PAS ET T_CODE_PAR
*   @param $code, $t
*   @return 
*  *****************************************************************/
function updateCodes ($code, $t) {
    try {
        $request = myConnection()->prepare("UPDATE db_parametre SET CODE_PAR = :code, T_CODE_PAR = :t ");
        $request->bindParam(':code',    $code,  PDO::PARAM_STR);
        $request->bindParam(':t',       $t,     PDO::PARAM_STR);
        $request->execute();
    }
    catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
        exit();
    }
}
/* ******************************************************************
*   ENVOIE UN EMAIL avec le code de récup à l'adresse de la table PARAMETRE
*   @param $longueurCode
*   @return $code
*  *****************************************************************/
function EnvoieMailRecup($code) {
    // RÉCUPÈRE l'EMAIL de la table PARAMÈTRE
    $request = myConnection()->prepare("SELECT EMAIL_PAR FROM db_parametre");
        $request->execute();
    $email = $request->fetchColumn();
    // ENVOI EMAIL AVEC CODE
    $sujet      ="Votre code de récupération de password";
    $message    ="Votre code de récupération est : " . $code  . "\n Cliquez ici : " . 'http://www.esig-sandbox.ch/team2020_3/environnement_dev/code_verification.php';
    mail($email, $sujet, $message);
}
/* ******************************************************************
*   MODIFIE le MOT DE PASSE dans la BDD
*   @param $password
*   @return $code
*  *****************************************************************/
function updateMDP($password) {
    $password = sha1($password);
    $request = myConnection()->prepare("UPDATE db_parametre SET PASSWORD_PAR = :password");
    $request->bindParam(':password',    $password,  PDO::PARAM_STR);
    $request->execute();
}
/* ******************************************************************
*   UPDATE PHOTO PROFIL CLIENT
*   @param $img
*   @return 
*  *****************************************************************/
function updatePhotoProfil($id, $img) {
    $request = myConnection()->prepare("UPDATE db_client SET PHOTO_PROFIL_CLI = :img WHERE id_cli = :id");
    $request->bindParam(':id',     $id,   PDO::PARAM_STR);
    $request->bindParam(':img',    $img,  PDO::PARAM_STR);
    $request->execute();
}
?>