<?php
    /* Je check si un patients exists */
    $query = 
    "SELECT
            *
        FROM patients
        WHERE
            pet_name = :pet_name
        AND owner_ID = :ID";
        $query_params = array(':pet_name' => $pet_name,
                ':ID' => $_SESSION['ID']);
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }catch(PDOException $ex){
            die("Failed to run query: " . $ex->getMessage());
        }
?>