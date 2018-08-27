<?php
    /* CI pas pareil */
    $query = 
    "SELECT
    email, last_name, first_name, vet_init
    FROM vets
    ORDER BY vet_init ASC";
        $query_params = null;
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }catch(PDOException $ex){
            die("Failed to run query: " . $ex->getMessage());
        }
?>