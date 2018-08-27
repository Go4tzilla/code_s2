<?php  
        $query = "
        Update
        users
        SET
        connected = 'y'
        WHERE
        ID = :ID
        AND
        connected = 'n'";
        echo $email;
        $query_params = array(':ID' => $row['ID']);
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
                
        }catch(PDOException $ex){
            die("Failed to run query: " . $ex->getMessage());
        }
        unset($db);
        unset($stmt);
?>