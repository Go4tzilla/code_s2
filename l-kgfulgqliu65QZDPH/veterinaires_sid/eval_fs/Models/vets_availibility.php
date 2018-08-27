<?php
    $query = "
    SELECT last_name, first_name 
    FROM vets 
    WHERE ID LIKE ANY (SELECT vets_ID 
    FROM schedule 
    WHERE working_day = DAYNAME(:date))";
    $query_params = array(':date' => $date);
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }catch(PDOException $ex){
        die("Failed to run query: " . $ex->getMessage());
    }
?>