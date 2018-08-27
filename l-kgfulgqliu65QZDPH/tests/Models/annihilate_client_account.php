<?php
   /** ON SUPPRIME TOUT MAMèNE, SAUF LES CONSULTATIONS POUR LA COMPTA */
    $query[0] = 
    "DELETE FROM patients_has_appointment WHERE patients_ID = (SELECT ID FROM patients WHERE owner_ID = :ID)";

    $query[1] = 
    "DELETE FROM appointment WHERE patients_ID = (SELECT ID from patients WHERE owner_ID = :ID)";

    $query[2] = 
    "DELETE FROM patients WHERE owner_ID = :ID";

    $query[3] = 
    "DELETE FROM clients WHERE users_ID = :ID";

    $query[19] = 
    "DELETE FROM users WHERE ID = :ID";
    
    for($i = 0; $i < count($query); $i++){
        $query_params = array(':ID' => $_SESSION['ID']);
            
            try {
                $stmt = $db->prepare($query[$i]);
                $result = $stmt->execute($query_params);
            }catch(PDOException $ex){
                $errormsg = "Une erreur est survenue";
            }
    }

    $successmsg = "Compte supprimé, redirection à l'accueil en cours";
    unset($_SESSION['ID'],$_SESSION['role']);
?>