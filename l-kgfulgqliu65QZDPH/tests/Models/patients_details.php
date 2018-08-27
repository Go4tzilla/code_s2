<?php
    $query = 
    "SELECT patients.pet_name, consultations.date, consultations.reason, consultations.exam,
    consultations.diagnosis, consultations.treatment, consultations.weight, consultations.notes
    FROM patients, clients, consultations
    WHERE patients.ID = :ID
    AND patients.ID = consultations.patients_ID
    AND patients.owner_ID = clients.users_ID
    AND consultations.vets_ID = (SELECT ID FROM vets WHERE users_ID = :session)
    ORDER BY consultations.date ASC";

    $query_params = array(":ID" => $pet,
                          ":session" => $_SESSION['ID']);
                          try {
                            $stmt = $db->prepare($query);
                            $result = $stmt->execute($query_params);
                            $patients_rows= $stmt -> fetchAll();
                            
                        }catch(PDOException $ex){
                            die("Failed to run query: " . $ex->getMessage());
                        }
?>