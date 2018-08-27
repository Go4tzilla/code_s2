<?php
    $query = "SELECT pet_name, breed, colour
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