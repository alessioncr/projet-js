<?php

/* **************************************** 
    paramètre connexion WAMP localhost 
*******************************************
 
    DEFINE('DB_USER', 'root');
    DEFINE('DB_PASSWORD', '');
    DEFINE('DB_HOST', 'localhost');
    DEFINE('DB_NAME', 'hhva_team2020_3');
*/
/* ****************************************
    paramètre connexion esig-sandbox.ch 
*******************************************
*/ 
    DEFINE('DB_USER', 'hhva_team2020_3');
    DEFINE('DB_PASSWORD', 'J1hseB6e3F');
    DEFINE('DB_HOST', 'hhva.myd.infomaniak.com');
    DEFINE('DB_NAME', 'hhva_team2020_3');

/* ******************************************************************
 * Connexion à la base
 * @staticvar type $dbc
 * @return \PDO
 * ******************************************************************
 */
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
/* ****************************************
 * Affiche une variable pour déboggage
 * Non respect du MVC ici, car affichage du HTML dans la zone dédiée aux données
 * @param string $data donnée à afficher
 * ****************************************
 */
function debug($mode, $data) {
    if ($mode == "verbose")
        echo "<center><small><font color='#CCCCCC'>" . $data . "</font></small></center><br>";
}
/* ******************************************************************
 * Récupère la table paramètre
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
 * Enregistre l'image dans la base de donnee 
 * ******************************************************************
 */
function saveMedias($id_cli, $images, $dates, $valide) {
    try {
        $request = myConnection()->prepare("INSERT INTO db_media (ID_CLI, NOM_MED, DATE_MED, VALIDE_MED) VALUES ( :ID_CLI, :NOM_MED, :DATE_MED, :VALIDE_MED)");
        $request->bindParam(':ID_CLI', $id_cli, PDO::PARAM_INT);
        $request->bindParam(':NOM_MED', $images, PDO::PARAM_STR);
        $request->bindParam(':DATE_MED', $dates, PDO::PARAM_STR);
        $request->bindParam(':VALIDE_MED', $valide, PDO::PARAM_STR);
        
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
        exit();
    }   
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
/* 
 * Cherche  l'image dans la base de donnee  pour l afficher dans la galerie 
 ************************************
 */
function getImage($id) {
    $id = strtolower($id);
    try {
        $request = myConnection()->prepare("SELECT NOM_MED FROM db_media WHERE ID_CLI = :id");
        $request->bindParam(':id', $id, PDO::PARAM_STR);
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
    }
    return $request;
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
// , $valide  est retirer pour manque d'utilité
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
*   Redirige vers la page client sélectionné 
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
*   @return nombre d'autre client avec ce nom
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
*   RENVOI LA TABLE LIVRE D'OR DANS UN ORDRE ALÉATOIRE
*   @param
*   @return réponse de la requête sql
*  ******************************************************************
*/
function getLoAleatoire() {
    try {
        $request = myConnection()->prepare("SELECT COMMENTAIRE_LIV, AUTEUR_LIV, DATE_LIV  FROM db_livredor ORDER BY RAND()" );
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
        exit();
    }
    return $request;
}
/* ******************************************************************
 * Récupère les informations de la table paramètre
 * @param 
 * @return array tableau des informations paramètre
 * ******************************************************************
 */
function getParametre() {
    try {
        $request = myConnection()->prepare("SELECT * FROM db_parametre ");
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
        exit();
    }
    return $request->fetch(PDO::FETCH_ASSOC);
}
/* ******************************************************************
*   ENREGISTRE les elements dans la table journal
*   @param
*   @ insert
*  ******************************************************************
*/
function AddJournal($type,$montant,$date_jou,$libelle,$valide_jou) {
    try {
        $request = myConnection()->prepare("INSERT INTO db_journal_comptable(TYPE_JOU, VALEUR_JOU, DATE_JOU, LIBELLE_JOU, VALIDE_JOU )
         VALUES  (:TYPE_JOU, :VALEUR_JOU, :DATE_JOU, :LIBELLE_JOU, :VALIDE_JOU)");
        $request->bindParam(':TYPE_JOU', $type, PDO::PARAM_STR);
        $request->bindParam(':VALEUR_JOU', $montant, PDO::PARAM_INT);
        $request->bindParam(':DATE_JOU', $date_jou, PDO::PARAM_STR);
        $request->bindParam(':LIBELLE_JOU', $libelle, PDO::PARAM_STR);
        $request->bindParam(':VALIDE_JOU', $valide_jou, PDO::PARAM_STR);
        $request->execute();
    } 
    catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
        exit();
    }
}

/* ******************************************************************
*   Recupere toutes les valeurs dans la tables journals
*   @param
*   @return réponse de la requête sql
*  ******************************************************************
*/
function getJournal() {
    try {
        $request = myConnection()->prepare("SELECT * FROM db_journal_comptable ORDER BY DATE_JOU" );
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
    }
    return $request;
}
/* ******************************************************************
*   SUPPRIME L'ELEMENT SELECTIONNER DE LA TABLE JOURNAL
*  ******************************************************************
*/
function delJournal($id) {
    try {
        $id = strtolower($id);
        $request = myConnection()->prepare("DELETE * FROM db_journal_comptable WHERE ID_JOU = :id " );
        $request->bindParam(':id', $id, PDO::PARAM_STR);
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
    }
    return $request;   
}
/* ******************************************************************
*   enregistre les modifications dans la table Journal
*   
*  ******************************************************************
*/// , $valide  est retirer pour manque d'utilité
function updateJournal($type_up,$montant_up,$date_jou_up,$libelle_up){
    try {
        $request = myConnection()->prepare("UPDATE db_journal_comptable SET 
                                                                TYPE_JOU=:TYPE_JOU, 
                                                                VALEUR_JOU=:VALEUR_JOU, 
                                                                DATE_JOU=:DATE_JOU, 
                                                                LIBELLE_JOU=:LIBELLE_JOU"
                                                                );
        $request->bindParam(':TYPE_JOU', $type_up, PDO::PARAM_STR);
        $request->bindParam(':VALEUR_JOU', $montant_up, PDO::PARAM_INT);
        $request->bindParam(':DATE_JOU', $date_jou_up, PDO::PARAM_STR);
        $request->bindParam(':LIBELLE_JOU', $libelle_up, PDO::PARAM_STR);
        $request->execute();                                                            
        
        
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
        exit();
    }
}
/* ******************************************************************
*   ENREGISTRE les modification dans la table parametre
*   @param
*   @return réponse de la requête sql
*  ******************************************************************
*/
function updateParametre($adresse, $description_par, $horaire, $prix_barbe, $prix_coupe, $prix_dreadlocks, $prix_coupe_et_barbe, $email, $telephone, $vacances, $insta_par, $face_par){
    try {
        $request = myConnection()->prepare("UPDATE db_parametre SET 
                                                                ADRESSE_PAR = :adresse, 
                                                                DESCRIPTION_PAR = :description_par, 
                                                                MA_SA_PAR = :horaire, 
                                                                PRIX_BARBE_PAR = :prix_barbe,
                                                                PRIX_COUPE_PAR = :prix_coupe, 
                                                                PRIX_DREADLOCKS_PAR = :prix_dreadlocks,
                                                                PRIX_C_ET_B_PAR = :prix_coupe_et_barbe,   
                                                                EMAIL_PAR = :email, 
                                                                TEL_PAR = :telephone, 
                                                                -- POUR FONCTIONNALITé MODIFIER PASSWORD --
                                                                -- PASSWORD_PAR = :password_par,  --
                                                                VACANCES_PAR = :vacances,
                                                                INSTAGRAM_PAR = :insta_par,
                                                                FACEBOOK_PAR = :face_par
                                                                ");
        
        $request->bindParam(':adresse',                 $adresse,               PDO::PARAM_STR);
        $request->bindParam(':description_par',         $description_par,       PDO::PARAM_STR);
        $request->bindParam(':horaire',                 $horaire,               PDO::PARAM_STR);
        $request->bindParam(':prix_barbe',              $prix_barbe,            PDO::PARAM_INT);
        $request->bindParam(':prix_coupe',              $prix_coupe,            PDO::PARAM_INT);
        $request->bindParam(':prix_dreadlocks',         $prix_dreadlocks,       PDO::PARAM_INT);
        $request->bindParam(':prix_coupe_et_barbe',     $prix_coupe_et_barbe,   PDO::PARAM_INT);
        $request->bindParam(':email',                   $email,                 PDO::PARAM_STR);
        $request->bindParam(':telephone',               $telephone,             PDO::PARAM_STR);
        // POUR FONCTIONNALITé MODIFIER PASSWORD
        //$request->bindParam(':password_par',            $password_par,          PDO::PARAM_STR);
        $request->bindParam(':vacances',                $vacances,              PDO::PARAM_STR);
        $request->bindParam(':insta_par',               $insta_par,             PDO::PARAM_STR);
        $request->bindParam(':face_par',                $face_par,              PDO::PARAM_STR);
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
        exit();
    }   
}