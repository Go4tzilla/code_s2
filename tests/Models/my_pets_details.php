<?php
    $query =
    "SELECT patients.pet_name, consultations.date, consultations.reason, consultations.exam, consultations.diagnosis,
    consultations.treatment, consultations.weight, consultations.notes
    FROM patients, consultations 
    WHERE consultations.patients_ID = :pet
    AND patients.ID = :pet1
    AND patients.owner_ID = :ID
    ORDER BY date DESC";

    $query_params = array(':pet' => $pet,
                            ':pet1' => $pet,
                           ':ID' => $_SESSION['ID']);
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
            $patients_rows = $stmt -> fetchAll();
        }catch(PDOException $ex){
            die("Failed to run query: " . $ex->getMessage());
        }
        
?>