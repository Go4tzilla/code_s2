<?php  
        $query = "
        Update
        users
        SET
        connected = 'y'
        WHERE
        ID = :ID
        AND
        connected = 'n'
        OR
        connected ='y'";
        $query_params = array(':ID' => $row[0]['ID']);
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
                
        }catch(PDOException $ex){
            die("Failed to run query: " . $ex->getMessage());
        }
        unset($db);
        unset($stmt);
?>