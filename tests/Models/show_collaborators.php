<?php
    /* Affiche les collaborateurs */
    $query = 
    "SELECT email, last_name, first_name, vet_init
    FROM vets
    WHERE users_ID != :ID
    ORDER BY vet_init ASC";
        $query_params = array(':ID'=>$_SESSION['ID']);
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }catch(PDOException $ex){
            die("Failed to run query: " . $ex->getMessage());
        }
?>  