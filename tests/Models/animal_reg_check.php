<?php
    /* Je check si un patients exists */
    $query = 
    "SELECT
            *
        FROM patients
        WHERE
            pet_name = :pet_name
        AND ID = ANY
            (SELECT patients_ID
                FROM clients_has_patients
                WHERE clients_ID = :ID)
        AND microchip_tatoo = :microchip_tatoo
        AND breed = :breed";
        $query_params = array(':pet_name' => $pet_name,
                ':ID' => $_SESSION['ID'],
                        ':microchip_tatoo' => $microchip_tatoo, ':breed' => $breed);
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }catch(PDOException $ex){
            die("Failed to run query: " . $ex->getMessage());
        }
?>