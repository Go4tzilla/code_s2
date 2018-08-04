<?php
    $query =
    "SELECT DISTINCT patients.pet_name, patients.breed, patients.date_of_birth, patients.colour, patients.ID, clients.last_name, clients.first_name, clients.email, clients.phone_number
    FROM patients, consultations, clients
    WHERE patients.pet_name LIKE :search
    AND patients.owner_ID = clients.users_ID
    ORDER BY patients.pet_name";

    $query_params = array(':search' => $search.'%');
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
            $patients_rows = $stmt -> fetchAll();
        }catch(PDOException $ex){
            die("Failed to run query: " . $ex->getMessage());
        }
        
?>