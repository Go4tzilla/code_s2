<?php
    $query = "UPDATE
    appointment
    SET
    canceled = 'y'
    WHERE vets_ID = 
    (SELECT
    ID
    FROM vets
    WHERE users_ID = :users_ID)
    AND working_day = :working_day";
    $query_params = array(':new_from' => $from_time,
                ':new_to' => $to_time,
                ':users_ID' => $_SESSION['ID'],
                ':working_day' => $days_free);
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
        $successmsg = "Repos Modifié !";
        header('Location: index.php?page=Rest');
    }catch(PDOException $ex){
        die("Failed to run query: " . $ex->getMessage());
    }
?>