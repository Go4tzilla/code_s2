<?php
    /* Grand écran conseillé. Je vérifie si un vet travaille le jour désiré */
    $query = 
    "SELECT vets_ID 
    FROM schedule 
    WHERE :h BETWEEN from_time
    AND to_time 
    AND working_day 
    LIKE DAYNAME(:date)
    ORDER BY RAND()
    LIMIT 1";

    $query_params = array(':h' => $start_time,
                        ':date' => $datas[2]);
        
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }catch(PDOException $ex){
            $errormsg = "Aucun vétérinaire n'est disponible ce jour là";
        }
    $row = $stmt -> fetch();

    $id =  $row['vets_ID'];
    if(!empty($row)){
        /* Je vérifie si il a un rdv à ma date désirée */
        $query = 
            "SELECT 1
            FROM appointment
            WHERE start = :start
            AND app_day = :date 
            AND vets_ID = :ID
            AND canceled = 'n'
            LIMIT 1";
        $query_params = array(':start' => $start_time,  
                            ':date' => $datas[2],
                            ':ID' => $id);
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }catch(PDOException $ex){
            $errormsg = "L'horaire n'est pas disponible";
        }
        $check = $stmt->fetch();

        if(empty($check)){
            /* C'est libre!  insert */
            $query = 
            "INSERT INTO appointment
            (ID,details,type,vet_init,start,app_day,canceled,vets_ID,patients_ID)
            VALUES
            (NULL,:details,:type,(SELECT vet_init FROM vets WHERE ID = :vet_ID),:start,:app_day,'n',:ID,:patients_ID)";

            $query_params = array(':details' => $details,
                                    ':type' => $datas[3],
                                    ':vet_ID' => $id,
                                    ':start' => $start_time,
                                    ':app_day' => $datas[2],
                                    ':ID' => $id,
                                    ':patients_ID' => $datas[0]);
            try {
                $stmt = $db->prepare($query);
                $result = $stmt->execute($query_params);
                $check = true;
                $app_id = $db->lastInsertId();
            }catch(PDOException $ex){
                $errormsg = "L'horaire a été réservé entre temps";
            }
        } 
        if(!$check || !isset($app_id)){
            /* Le mec a pas trouvé d'heure qui convient :'(  */
            $errormsg = "Il n'y a pas de rendez-vous disponible pour cette combinaison date/heure";
        } else {
            /* Il a son RDV! Je lui fais un rappel avec l'heure et le nom du médecin :) */
            $query = 
                "SELECT last_name,first_name 
                FROM vets 
                WHERE ID = :id";
            $query_params = array(':id' => $id);

            try {
                $stmt = $db->prepare($query);
                $result = $stmt->execute($query_params);
            }catch(PDOException $ex){
                $errormsg = "Une erreur est survenue, essayez plus tard";
                die("Failed to run query: " . $ex->getMessage());
            }
        $name = $stmt -> fetchAll();
        $successmsg = "Le rendez vous à bien été pris pour le ".$datas[2]." à ".$start_time." pour ".$datas[1]." 
        avec le docteur ".$name[0]['last_name']." ".$name[0]['first_name'];
        /* Cardinalité mamène.  */
        $query = 
        "INSERT INTO patients_has_appointment (ID,patients_ID,appointment_ID) VALUES (:ID,:patients_id,:appointment_ID)";

        $query_params =array(':ID' => NULL,
                            ':patients_id' => $datas[0],
                                ':appointment_ID' => $app_id);

            try {
                $stmt = $db->prepare($query);
                $result = $stmt->execute($query_params);
            }catch(PDOException $ex){
                $errormsg = "Une erreur est survenue, essayez plus tard";
                die("Failed to run query: " . $ex->getMessage());
            }
        }
            

    } else if(!$row){
        $errormsg = "L'horaire n'est pas disponible";

    }
?>