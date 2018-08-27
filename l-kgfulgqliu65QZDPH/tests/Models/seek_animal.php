<?php
    /* Je récupère les fiches patients d'un propriétaire */
    $query = "SELECT ID as patient_ID, colour, pet_name, breed, date_of_birth
            FROM patients
            WHERE owner_ID = :ID";
    $query_params = array(':ID' => $_SESSION['ID']);
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch (PDOException $ex) {
        die("Failed to run query: " . $ex->getMessage());
    }
?>