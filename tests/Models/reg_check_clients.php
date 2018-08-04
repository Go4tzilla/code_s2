<?php
    /* Client existes-tu? Mais j'ai une contrainte unique sur les utilisateurs donc nique  MAIS O K OU*/
    $query = 
        "SELECT
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