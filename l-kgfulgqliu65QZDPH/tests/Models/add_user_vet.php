<?php
    /* Basique */
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
        $check = true;
    }catch(PDOException $ex){   
        $errormsg = "Vous possédez déjà un compte!";
        $check = false;
    }
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
        echo 'lol';
?>