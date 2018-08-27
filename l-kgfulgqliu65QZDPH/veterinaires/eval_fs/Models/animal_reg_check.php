<?php
$query = "
        SELECT
            *
        FROM patients
        WHERE
            pet_name = :pet_name
        AND ID =
            (SELECT patients_ID
                FROM clients_has_patients
                WHERE clients_ID = :ID)";
        $query_params = array(':pet_name' => $pet_name,
                ':ID' => $_SESSION['ID']);
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }catch(PDOException $ex){
            die("Failed to run query: " . $ex->getMessage());
        }
?>