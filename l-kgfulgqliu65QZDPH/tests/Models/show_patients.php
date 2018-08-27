<?php
    /* Montre les animaux d'un client */
    $query = 
    "SELECT pet_name, ID, breed, colour, sex, date_of_birth,microchip_tatoo, history
    FROM patients
    WHERE
    owner_ID = :ID
    ORDER BY breed";

    $query_params = array(':ID' => $_SESSION['ID']);

    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }catch(PDOException $ex){
        die("Failed to run query: " . $ex->getMessage());
    }
?>