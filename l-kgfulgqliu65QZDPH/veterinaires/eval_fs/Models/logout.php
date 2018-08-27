<?php  
        $query = "
        Update
        users
        SET
        connected = 'n'
        WHERE
        ID = :ID
        AND
        connected = 'y'";
        $query_params = array(':ID' => $_SESSION['ID']);
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
                
        }catch(PDOException $ex){
            die("Failed to run query: " . $ex->getMessage());
        }
        unset($db);
        unset($stmt);
?>