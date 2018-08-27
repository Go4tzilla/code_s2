<?php
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