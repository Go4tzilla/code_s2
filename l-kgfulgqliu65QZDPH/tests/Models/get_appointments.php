<?php
    /* JOINTURE TECHNIQUUUU récupération des rdv pour un client */
    $query =
    "SELECT
    appointment.start,
    appointment.app_day,
    patients.pet_name,
    vets.last_name,
    vets.first_name,
    appointment.type,
    appointment.canceled
    FROM appointment
    JOIN patients
    JOIN vets
    WHERE vets.ID = appointment.vets_ID
    AND patients.ID = appointment.patients_ID
    AND patients.owner_ID = :ID
    AND appointment.canceled = 'n'";
    $query_params = array(':ID' => $_SESSION['ID']);
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }catch(PDOException $ex){
        die("Failed to run query: " . $ex->getMessage());
    }
?>