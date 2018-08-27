<?php
    $query = 
    "SELECT last_name, first_name, email FROM vets WHERE users_ID != :ID UNION SELECT last_name, first_name, email FROM clients";
        $query_params = array(':ID' => $_SESSION['ID']);
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }catch(PDOException $ex){
            die("Failed to run query: " . $ex->getMessage());
        }
?>