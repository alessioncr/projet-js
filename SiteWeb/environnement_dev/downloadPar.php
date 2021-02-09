<?php
    $iduser=$_GET['iduser'];
    if (!empty($iduser))
    {    
        include('parametres_de_connection.php'); 
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
        $filename="journal.csv";    
        //Creation du fichier    
        $file=fopen($filename,"w");
        $date1=$_GET['date1'];
        $date2=$_GET['date2'];
        $arrayjournal=getJournalAvec($date1,$date2)->fetchAll();
        $journal[]= array("DateJournal","LibelleJournal","TypeJournal","ValeurJournal");
        foreach($arrayjournal as $line ){
            $dateRel=  $line['DATE_JOU']; 
            $typeJou= $line['TYPE_JOU'] ;  
            $montant= $line['VALEUR_JOU']; 
            $libelle= $line['LIBELLE_JOU'];
            $journal=array($dateRel,$libelle,$typeJou,$montant); 
            fputcsv($file,$journal,$delimiter = ";");
        }  
        fclose($file);
        //Telechargement         
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename='.$filename);
        header('Content-Type: application/csv;');
        readfile($filename);
        //supprression
        unlink($filename);
        exit; 
    }
    else {
    echo ('<script type="text/javascript"> alert("Vous n\'êtes pas connecté !"); </script>');
    }   
?>