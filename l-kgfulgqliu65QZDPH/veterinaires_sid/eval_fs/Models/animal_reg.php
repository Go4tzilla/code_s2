<?php
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
                             ':microchip_tatoo' => $microship_tatoo,
                             ':comment' => $comment,
                             ':owner_ID' => $_SESSION['ID']);
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
            $check = true;
            include('./Models/cli_has_pats.php');
        }catch(PDOException $ex){
            $check = false;
            die("Failed to run query: " . $ex->getMessage());
        }

        
?>