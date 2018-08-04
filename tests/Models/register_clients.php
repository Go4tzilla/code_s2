<?php

    $query = "INSERT INTO users (
        ID,
        password,
        email,
        connected
        ) VALUES (
            :ID,
            :password,
            :email,
            'y')";
            // Security measures
            
            $query_params = array(
                ':ID' => NULL,
                ':password' => $password,
                ':email' => $email);
                try {
                    $stmt = $db->prepare($query);
                    $result = $stmt->execute($query_params);
                }catch(PDOException $ex){
                    $check_error = false;
                    $flag_name_taken = true;
                    $flag_email_taken = true;
                    /* Contrainte unique en action */
                    $name_taken = "Vous possédez déjà un compte <br>" . $first_name . " " . $last_name."!";
                }

                /** Utilisation du lastInsertId() pour éviter une sous-requête dans l'insert suivant 
                 * #smartass
                */

                if(!isset($check_error)){
                    $id = $db ->lastInsertId();
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
                                :users_ID)";
                            $query_params = array(
                                ':ID' => NULL,
                                ':email' => $email,
                                ':last_name' => $last_name,
                                ':first_name' => $first_name,
                                ':address' => $address,
                                ':postal_code' => $postal_code,
                                ':city' => $city,
                                ':phone_number' => $phone_number,
                                ':users_ID' => intval($id));
            try {
                $stmt = $db->prepare($query);
                $result = $stmt->execute($query_params);
                $query = null;
                $check = true;
            }catch(PDOException $ex){
                echo "Une erreur est survenue, essayez plus tard";
            }
    }
?>