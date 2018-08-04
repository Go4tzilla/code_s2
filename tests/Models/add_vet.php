<?php
        /*  Insert dans vets + ajout du jour de travail obligatoire. OUIOUI, 1 SEUL JOUR */
        $query = "INSERT INTO vets (
            ID,
            last_name,
            first_name,
            vet_init,
            email,
            phone_number,
            users_ID
        ) VALUES (
            :ID,
            :last_name,
            :first_name,
            :vet_init,
            :email,
            :phone_number,
            (SELECT ID FROM users WHERE email = :email))";
        $query_params = array(
            ':ID' => NULL,
            ':email' => $email,
            ':last_name' => $last_name,
            ':first_name' => $first_name,
            ':vet_init' => $vet_init,
            ':phone_number' => $phone);
            try {
                $stmt = $db->prepare($query);
                $result = $stmt->execute($query_params);
            }catch(PDOException $ex){
                die("Failed to run query: " . $ex->getMessage());
            }
            $query = 
    "INSERT INTO schedule (
                    ID,
                    from_time,
                    to_time,
                    working_day,
                    vets_ID
                ) VALUES (
                    NULL,
                    :from_time,
                    :to_time,
                    :working_day,
                    (SELECT ID FROM vets WHERE email = :email))
                    ";
        $query_params = array(':from_time' => '08:30:00',
                            ':to_time' => '19:00:00',
                            ':working_day' => $days_free,
                            ':email' => $email);
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
            $successmsg = "Votre nouveau collègue possède un compte!";
        }catch(PDOException $ex){
            $errormsg = "Une erreur est survenue, essayez plus tard";
        }
            
?>