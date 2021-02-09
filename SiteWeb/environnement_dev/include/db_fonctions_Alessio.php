<?php

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
*   ENREGISTRE les modifications dans la table PARAMETRE
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

/* ******************************************************************
*   RENVOI LA TABLE LIVRE D'OR DANS UN ORDRE ALÉATOIRE
*   @param
*   @return réponse de la requête sql
*  ******************************************************************
*/
function getLoAleatoire() {
    try {
        $request = myConnection()->prepare("SELECT COMMENTAIRE_LIV, AUTEUR_LIV, DATE_LIV  FROM db_livredor WHERE VALIDE_LIV='1' ORDER BY RAND() ");
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
        exit();
    }
    return $request;
}

/* ******************************************************************
*   ENREGISTRE les élements dans la table db_livredor
*   @param 
*   @insert 
*  *****************************************************************/
function Addlivredor($auteur,$commentaire,$date_liv, $valide_liv) {
    try {
        $request = myConnection()->prepare("INSERT INTO db_livredor(AUTEUR_LIV, COMMENTAIRE_LIV, DATE_LIV, VALIDE_LIV )
         VALUES  (:AUTEUR_LIV, :COMMENTAIRE_LIV, :DATE_LIV, :VALIDE_LIV)");
        $request->bindParam(':AUTEUR_LIV', $auteur, PDO::PARAM_STR);
        $request->bindParam(':COMMENTAIRE_LIV', $commentaire, PDO::PARAM_STR);
        $request->bindParam(':DATE_LIV', $date_liv, PDO::PARAM_STR);
        $request->bindParam(':VALIDE_LIV', $valide_liv, PDO::PARAM_STR);
        $request->execute();
    } 
    catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
        exit();
    }
}


/* ******************************************************************
 * Récupère les informations avec le critère de validation 2 de la table db_livredor 
 * @param 
 * @return array tableau des informations db_livredor
 * ******************************************************************
 */
function getLivredorenattente() {
    try {
        $request = myConnection()->prepare("SELECT * FROM db_livredor WHERE VALIDE_LIV='2' ORDER BY DATE_LIV DESC ");
        $request->execute();

    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
    }
    return $request;
}

/* ******************************************************************
 * Récupère les informations avec le critere de validation 1 de la table db_livredor 
 * @param 
 * @return array tableau des informations db_livredor
 * ******************************************************************
 */
function getLivredorvalide() {
    try {
        $request = myConnection()->prepare("SELECT * FROM db_livredor WHERE VALIDE_LIV='1' ORDER BY DATE_LIV DESC ");
        $request->execute();

    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
    }
    return $request;
}

/* ******************************************************************
 * Récupère les informations avec le critere de validation 3 de la table db_livredor 
 * @param 
 * @return array tableau des informations db_livredor
 * ******************************************************************
 */
function getLivredorrefuser() {
    try {
        $request = myConnection()->prepare("SELECT * FROM db_livredor WHERE VALIDE_LIV='3' ORDER BY DATE_LIV DESC ");
        $request->execute();

    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
    }
    return $request;
}

/* ******************************************************************
*   Transforme les commentaire en attente à validé
*  ******************************************************************
*/
function validationlivredor($value) {
    try {
         
        $request = myConnection()->prepare("UPDATE db_livredor SET VALIDE_LIV= '1' WHERE ID_LIV = :id LIMIT 1" );
        $request->bindParam(':id', $value, PDO::PARAM_STR);
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
    }
    return $request;   
}

/* ******************************************************************
*   Transforme les commentaire en attente à refusé
*  ******************************************************************
*/
function refulivredor($value) {
    try {
         
        $request = myConnection()->prepare("UPDATE db_livredor SET VALIDE_LIV= '3' WHERE ID_LIV = :id LIMIT 1" );
        $request->bindParam(':id', $value, PDO::PARAM_STR);
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
    }
    return $request;   
}

/* ******************************************************************
 * Récupère un commentaire et un auteur
 * @param string $commentaire $auteur
 * @return 
 * ******************************************************************
 */
function getCheckLO($commentaire, $auteur) {
    $commentaire = strtolower($commentaire);
    $auteur = strtolower($auteur);
    try {
        $request = myConnection()->prepare("SELECT * FROM db_livredor WHERE COMMENTAIRE_LIV = :commentaire AND AUTEUR_LIV = :auteur");
        $request->bindParam(':commentaire', $commentaire, PDO::PARAM_STR);
        $request->bindParam(':auteur', $auteur, PDO::PARAM_STR);
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
        exit();
    }
    return $request->fetch(PDO::FETCH_ASSOC);
}



/* ******************************************************************
 * Récupère les informations de la table wall of fame
 * @param 
 * @return array tableau des informations wall of fame
 * ******************************************************************
 */
function getWOF() {
    try {
        $request = myConnection()->prepare("SELECT * FROM db_media INNER JOIN wall_of_fame ON db_media.id_wal = wall_of_fame.id_wall WHERE db_media.VALIDE_MED = 0");
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
        exit();
    }
    return $request;
}

/* ******************************************************************
*   ENREGISTRE les élements dans la table wall_of_fame
*   @param 
*   @insert 
*  *****************************************************************/
function AddWOF($nom, $profession) {
    try {
        $request = myConnection()->prepare("INSERT INTO wall_of_fame(NOM_WAL, PROFESSION_WAL)
         VALUES  (:NOM_WAL,:PROFESSION_WAL)");
        $request->bindParam(':NOM_WAL', $nom, PDO::PARAM_STR);
        $request->bindParam(':PROFESSION_WAL', $profession, PDO::PARAM_STR);
        $request->execute();
    } 
    catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
        exit();
    }
}
function getLastWallId(){
    try {
        $request=myConnection()->prepare("SELECT ID_WALL FROM wall_of_fame ORDER BY ID_WALL DESC LIMIT 1");
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
function saveMediasWall($id_wall, $images, $dates, $valide) {
    try {
        $request = myConnection()->prepare("INSERT INTO db_media (ID_WAL, NOM_MED, DATE_MED, VALIDE_MED) VALUES ( :ID_WAL, :NOM_MED, :DATE_MED, :VALIDE_MED)");
        $request->bindParam(':ID_WAL', $id_wall, PDO::PARAM_INT);
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
 * Supprime les informations de la table wall of fame
 * @param 
 * @return 
 * ******************************************************************
 */
function delWOF($idwall) {
    try {
        $request = myConnection()->prepare("DELETE FROM wall_of_fame  WHERE ID_WALL = :id_wall ");
        $request->bindParam(':id_wall', $idwall, PDO::PARAM_STR);
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
        exit();
    }
}

/* ******************************************************************
 * Supprime les informations de la table media
 * @param 
 * @return 
 * ******************************************************************
 */
function delmedia($idwal) {
    try {
        $request = myConnection()->prepare("DELETE FROM db_media  where ID_WAl= :id_wal " );
        $request->bindParam(':id_wal', $idwal, PDO::PARAM_STR);
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
        exit();
    }
}


?>