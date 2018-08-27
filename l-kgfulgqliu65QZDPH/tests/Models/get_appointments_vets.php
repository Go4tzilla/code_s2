<?php
    /* Jointure sama RDV des vets */
    $query =
    "SELECT
    appointment.start,
    appointment.app_day,
    patients.pet_name,
    patients.breed,
    patients.ID,
    clients.last_name,
    clients.first_name,
    appointment.type,
    appointment.canceled
    FROM appointment
    JOIN patients
    JOIN clients
    WHERE clients.users_ID = patients.owner_ID
    AND appointment.app_day = date(CURRENT_TIMESTAMP())
    AND patients.ID = appointment.patients_ID
    AND appointment.vets_ID = (SELECT ID FROM vets WHERE users_ID = :ID)
    AND appointment.canceled = 'n'";
    $query_params = array(':ID' => $_SESSION['ID']);
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }catch(PDOException $ex){
        die("Failed to run query: " . $ex->getMessage());
    }
?>