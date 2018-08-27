<?php
    $query = "INSERT INTO users (
            ID,
            password,
            email,
            role
        ) VALUES (
            :ID,
            :password,
            :email,
            :role)";
        // Security measures
    $query_params = array(
        ':ID' => NULL,
        ':password' => $password,
        ':email' => $email,
        ':role' => 'vet');
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
        var_dump($result);
        $check = true;
    }catch(PDOException $ex){   
        $check = false;
        die("Failed to run query: " . $ex->getMessage());
    }
?>