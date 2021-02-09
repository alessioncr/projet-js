<?php
/****************************************************************************************************************************************************************************************************
 Gestion Medias
 *****************************************************************************************************************************************************************************************************/
/* ******************************************************************
 * Retaille l'image  et l'enregistre dans le dossier miniature
 * source :https://www.https://www.youtube.com/watch?v=u6adna5zSwA
 * ******************************************************************
 */
//Pour Jpeg et jpg
function convertImageJpg($source,$destination,$maxResolution,$qualité){
    //imagex=largeur ;imagey= hauteur 
    if (file_exists($source)){
        $imageOriginal=imagecreatefromjpeg($source);
        //  resolution image
        $largeur=imagesx($imageOriginal);
        $hauteur=imagesy($imageOriginal); 
        
        //Creation des nouvelles resolution
        $ratio=$maxResolution/$largeur;
        $nouvelleLargeur=$largeur*$ratio;
        $nouvellehauteur=$hauteur*$ratio;

        if($nouvellehauteur>$maxResolution){
            $ratio=$maxResolution/$hauteur;
            $nouvelleLargeur=$largeur*$ratio;
            $nouvellehauteur=$maxResolution;

        }
        if($imageOriginal){
            $imageFinal=imagecreatetruecolor($nouvelleLargeur,$nouvellehauteur);
            imagecopyresampled($imageFinal, $imageOriginal,0,0,0,0,$nouvelleLargeur,$nouvellehauteur,$largeur,$hauteur);
            imagejpeg($imageFinal,$destination,$qualité);  

        }

    }
}

//pour PNG 
function convertImagePng($source,$destination,$maxResolution,$qualité){
    //imagex=largeur ;imagey= hauteur 
    if (file_exists($source)){
        $imageOriginal=imagecreatefrompng($source);
        //  resolution image
        $largeur=imagesx($imageOriginal);
        $hauteur=imagesy($imageOriginal);
        
        //Creation des nouvelles resolution
        $ratio=$maxResolution/$largeur;
        $nouvelleLargeur=$largeur*$ratio;
        $nouvellehauteur=$hauteur*$ratio;

        if($nouvellehauteur>$maxResolution){
            $ratio=$maxResolution/$hauteur;
            $nouvelleLargeur=$largeur*$ratio;
            $nouvellehauteur=$maxResolution;

        }
        if($imageOriginal){
            $imageFinal=imagecreatetruecolor($nouvelleLargeur,$nouvellehauteur);
            imagecopyresampled($imageFinal, $imageOriginal,0,0,0,0,$nouvelleLargeur,$nouvellehauteur,$largeur,$hauteur);
            imagepng($imageFinal,$destination,$qualité);  

        }

    }
}
 /* ******************************************************************************************************
 * Verifie si dans la base de donnée le pour le client l'image existe déja
 ********************************************************************************************************
 */
function checkImage($id,$img) {
    $id = strtolower($id);
    try {
        $request = myConnection()->prepare("SELECT * FROM db_media WHERE ID_CLI = :id AND VALIDE_MED= 0 AND NOM_MED = :img");
        $request->bindParam(':id', $id, PDO::PARAM_STR);
        $request->bindParam(':img', $img, PDO::PARAM_STR);
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
    }
    return $request;
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
/* ******************************************************************************************************
 * Recupere les images liés à un ID
 ********************************************************************************************************
 */
function getImage($id) {
    $id = strtolower($id);
    try {
        $request = myConnection()->prepare("SELECT * FROM db_media WHERE ID_CLI = :id AND VALIDE_MED= 0");
        $request->bindParam(':id', $id, PDO::PARAM_STR);
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
    }
    return $request;
}

/* *********************************************************************************************************
*  Supprime l'image selectionnée dans la base de donnée (Juste desactivée l'image)
*  *********************************************************************************************************
*/
function delMedias($id) {
    try {
         
        $request = myConnection()->prepare("UPDATE db_media SET VALIDE_MED=1  WHERE ID_MED = (:id) LIMIT 1" );
        $request->bindParam(':id', $id, PDO::PARAM_STR);        
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
    }
    return $request;   
    
}

/* ******************************************************************************************************
 * Recupere les images liés à un ID
 ********************************************************************************************************
 */
function getImageDel($id) {
    $id = strtolower($id);
    try {
        $request = myConnection()->prepare("SELECT * FROM db_media WHERE ID_CLI = :id AND VALIDE_MED= 1");
        $request->bindParam(':id', $id, PDO::PARAM_STR);
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
    }
    return $request;
}
/* *********************************************************************************************************
*  Supprime l'image selectionnée dans la base de donnée (Juste desactivée l'image)
*  *********************************************************************************************************
*/
function activateMediasDel($id) {
    try {
         
        $request = myConnection()->prepare("UPDATE db_media SET VALIDE_MED=0  WHERE ID_MED = (:id) LIMIT 1" );
        $request->bindParam(':id', $id, PDO::PARAM_STR);        
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
    }
    return $request;   
    
}

/* ******************************************************************
 * Supprime definitivement de la base de données 
 * toutes les images d'un client
 * ******************************************************************
 */
function delMediasDef($id_cli) {
    try {
        $request = myConnection()->prepare("DELETE FROM db_media WHERE ID_CLI = (:ID_CLI) ");
        $request->bindParam(':ID_CLI', $id_cli, PDO::PARAM_INT);
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
        exit();
    }   
}
/******************************************************************************************************************************************************************** 
Gestion comptabilité
/******************************************************************************************************************************************************************** */
/* ******************************************************************
*   ENREGISTRE les élements dans la table journal
*   @param
*   @ insert
*  ******************************************************************
*/
function AddJournal($type,$montant,$date_jou,$libelle,$valide_jou) {
    try {
        $request = myConnection()->prepare("INSERT INTO db_journal_comptable(TYPE_JOU, VALEUR_JOU, DATE_JOU, LIBELLE_JOU, VALIDE_JOU )
         VALUES  (:TYPE_JOU, :VALEUR_JOU, :DATE_JOU, :LIBELLE_JOU, :VALIDE_JOU)");
        $request->bindParam(':TYPE_JOU', $type, PDO::PARAM_STR);
        $request->bindParam(':VALEUR_JOU', $montant, PDO::PARAM_STR);
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
*   Recupere toutes les valeurs du mois courant dans la tables journals
*   @param
*   @return réponse de la requête sql
*  ******************************************************************
*/
function getJournal() {
    try {
        $mois=date('m');//recupere uniquement le mois courant 
        $annee=date('Y');// recupere l'annee courante
        $sqlstring = "SELECT * FROM db_journal_comptable WHERE month(DATE_JOU)=".$mois." and year(DATE_JOU)=".$annee." and VALIDE_JOU= 1 ORDER BY DATE_JOU  ";
        $request = myConnection()->prepare( $sqlstring );
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
    }
    return $request;
} 

/* ******************************************************************
*   Recupere toutes les valeurs dans la tables journals 
*    qui sont entre les 2 dates selectionnéé
*   @param
*   @return réponse de la requête sql
*  ******************************************************************
*/
function getJournalAvec($dates1,$dates2) {
    try {
        $request = myConnection()->prepare("SELECT * FROM db_journal_comptable WHERE DATE_JOU BETWEEN (:dates1) AND (:dates2) AND VALIDE_JOU= 1 ORDER BY DATE_JOU"  );
        $request->bindParam(':dates1', $dates1, PDO::PARAM_STR);
        $request->bindParam(':dates2', $dates2, PDO::PARAM_STR);
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
    }
    return $request;
}
/* ******************************************************************
*   Recupere un élement de la table journal pour l'afficher 
*  ******************************************************************
*/
function getJournalMod($id) {
    try {
        $id = strtolower($id); 
        $request = myConnection()->prepare("SELECT * FROM db_journal_comptable WHERE ID_JOU = (:id) " );
        $request->bindParam(':id', $id, PDO::PARAM_STR);
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
        exit();
    }
    return $request->fetch(PDO::FETCH_ASSOC);  
}
/* ******************************************************************
*   enregistre les modifications dans la table Journal
*   
*  ******************************************************************
*/// , $valide  est retirer pour manque d'utilité
function updateJournal($id,$type_up,$montant_up,$date_jou_up,$libelle_up){
    try {
        
        $request = myConnection()->prepare("UPDATE db_journal_comptable SET 
                                                                TYPE_JOU=:TYPE_JOU, 
                                                                VALEUR_JOU=:VALEUR_JOU, 
                                                                DATE_JOU=:DATE_JOU, 
                                                                LIBELLE_JOU=:LIBELLE_JOU WHERE ID_JOU = (:id)"
                                                                );
        $request->bindParam(':TYPE_JOU', $type_up, PDO::PARAM_STR);
        $request->bindParam(':VALEUR_JOU', $montant_up, PDO::PARAM_STR);
        $request->bindParam(':DATE_JOU', $date_jou_up, PDO::PARAM_STR);
        $request->bindParam(':LIBELLE_JOU', $libelle_up, PDO::PARAM_STR);
        $request->bindParam(':id', $id,PDO::PARAM_STR);
        $request->execute();                                                                            
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
        exit();
    }
}
/* ******************************************************************
*   SUPPRIME L'ELEMENT SELECTIONNER DE LA TABLE JOURNAL
*  ******************************************************************
*/
function delJournal($id,$valide) {
    try {
         
        $request = myConnection()->prepare("UPDATE db_journal_comptable SET VALIDE_JOU=:VALIDE_JOU WHERE ID_JOU = (:id)" );
        $request->bindParam(':id', $id, PDO::PARAM_STR);
        $request->bindParam(':VALIDE_JOU', $valide, PDO::PARAM_STR);
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
    }
    return $request;   
}

/* ******************************************************************
*   Recupere toutes les valeurs du mois courant dans la tables journals
*   @param
*   @return réponse de la requête sql
*  ******************************************************************
*/
function getJournalDel() {
    try {
        $sqlstring = "SELECT * FROM db_journal_comptable WHERE   VALIDE_JOU= 2 ORDER BY DATE_JOU  ";
        $request = myConnection()->prepare( $sqlstring );
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
function activeJournalDel($id) {
    try {
         
        $request = myConnection()->prepare("UPDATE db_journal_comptable SET VALIDE_JOU=1  WHERE ID_JOU = (:id) LIMIT 1" );
        $request->bindParam(':id', $id, PDO::PARAM_STR);        
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error.php?message=".$e->getMessage());
    }
    return $request;   
}


?>