<?php
    $query = "INSERT INTO schedule (
                    ID,
                    from_time,
                    to_time,
                    working_day,
                    vets_ID
                ) VALUES (
                    NULL,
                    :from_time,
                    :to_time,
                    :working_day,
                    (SELECT ID FROM vets WHERE users_ID = :users_ID))
                    ";
    $query_params = array(':from_time' => $from_time,
                         ':to_time' => $to_time,
                         ':working_day' => $days_free,
                         ':users_ID' => $_SESSION['ID']);
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
        $successmsg = "Repos Ajouté !";
        header('Location: index.php?page=Rest');
    }catch(PDOException $ex){
        die("Failed to run query: " . $ex->getMessage());
    }
?>