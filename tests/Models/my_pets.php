<?php
    /* Montre les animaux d'un client */
    $query = 
    "SELECT pet_name, ID, breed, colour, sex, date_of_birth,microchip_tatoo, history
    FROM patients
    WHERE
    owner_ID = :ID
    AND pet_name LIKE :name
    ORDER BY breed";

    $query_params = array(':ID' => $_SESSION['ID'],
                           ':name' => "$search%" );

    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
        $patients_rows = $stmt -> fetchAll();
    }catch(PDOException $ex){
        die("Failed to run query: " . $ex->getMessage());
    }
?>