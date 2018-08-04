<?php
        /* INSERTU TECHNIQUUUUUUUUUUUUUU */
        $query = "INSERT INTO patients
                    (ID,
                    pet_name,
                    breed,
                    colour,
                    sex,
                    date_of_birth,
                    microchip_tatoo,
                    comment,
                    owner_ID)
                VALUES
                    (NULL,
                    :pet_name,
                    :breed,
                    :colour,
                    :sex,
                    :date_of_birth,
                    :microchip_tatoo,
                    :comment,
                    :owner_ID)";
        $query_params = array(':pet_name' => $pet_name,
                              ':breed' => $breed,
                             ':colour' => $colour,
                             ':sex' => $sex,
                             ':date_of_birth' => $date_of_birth,
                             ':microchip_tatoo' => $microchip_tatoo,
                             ':comment' => $comment,
                             ':owner_ID' => $_SESSION['ID']);
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
            $check = true;
        }catch(PDOException $ex){
            $check = false;
            die("Failed to run query: " . $ex->getMessage());
        }
        $id = $db ->lastInsertID();
        
        $query = 
        "INSERT INTO clients_has_patients
        (ID,
        clients_ID,
        patients_ID)
    VALUES
        (NULL,
        :clients_ID,
        :animal_ID)";
        $query_params = array(':clients_ID' => $_SESSION['ID'],
                        ':animal_ID' => $id);
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
        $_SESSION['animal'] = $pet_name;
    }catch(PDOException $ex){
        $errormsg = "Une erreur est survenue, essayez plus tard";
        die("Failed to run query: " . $ex->getMessage());
    }
        
?>