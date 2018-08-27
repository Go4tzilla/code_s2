<?php
    $query = "
        SELECT
        1
        FROM clients
        WHERE
        email = :email";
        $query_params = array(':email' => $email);
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }catch(PDOException $ex){
            die("Failed to run query: " . $ex->getMessage());
        }
?>