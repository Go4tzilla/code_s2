<?php
    /* Je regarde si un vétérinaire est dispo, peu importe lequel */
    $query =
    "SELECT 1
    FROM schedule
    WHERE working_day = DAYNAME(:date)";

    $query_params =array(':date' => $_POST['appointment_date']);

    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }catch(PDOException $ex){
        die("Failed to run query: " . $ex->getMessage());
    }

?>