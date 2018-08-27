<?php
    $query = 
    "INSERT INTO users (
        ID,
        email,
        password, 
        role) VALUES (
            :ID,
            :email,
            :password,
            client)";
            $query_params = array(
                ':ID' => NULL,
                ':password' => $password,
                ':email' => $email);
                try {
                    $stmt = $db->prepare($query);
                    $result = $stmt->execute($query_params);
                    $check = true;
                }catch(PDOException $ex){
                    $check =false;
                }
                if($check){
                    $query = "INSERT INTO clients (
                ID,
                email,
                last_name,
                first_name,
                address,
                postal_code,
                city,
                phone_number,
                users_ID
            ) VALUES (
                :ID,
                :email,
                :last_name,
                :first_name,
                :address,
                :postal_code,
                :city,
                :phone_number,
                (SELECT ID FROM users WHERE email = :email))";
            $query_params = array(
                ':ID' => NULL,
                ':email' => $email,
                ':last_name' => $last_name,
                ':first_name' => $first_name,
                ':address' => $address,
                ':postal_code' => $postal_code,
                ':city' => $city,
                ':phone_number' => $phone_number);
            try {
                $stmt = $db->prepare($query);
                $result = $stmt->execute($query_params);
                $query = null;
            }catch(PDOException $ex){
                echo "Une erreur est survenue, essayez plus tard";
            }
    }
?>