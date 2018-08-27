<?php
    /* Settings compte (mail) */
    $query =
    "SELECT email
    FROM users
    WHERE ID = :ID";

    $query_params = array(":ID" => $_SESSION['ID']);
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
            $successmsg = "Adresse modifiée, la nouvelle est $email";
        }catch(PDOException $ex){
            $errormsg = "Raté";
        }

    $mail = $stmt ->fetchAll();
    $query =
    "UPDATE users
    SET email = :mail
    WHERE ID = :ID";

    $query_params = array(":mail" => $email,
                        ":ID" => $_SESSION['ID']);
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
        $successmsg = "Adresse modifiée, la nouvelle est $email";
    }catch(PDOException $ex){
        $errormsg = "Cette adresse posséde déjà un compte chez nous";
    }
    if($_SESSION['role'] == 'vet'){
        $query =
        "UPDATE vets
        SET email = :mail
        WHERE users_ID = :ID";

    } else if($_SESSION['role'] == 'client') {
        $query =
        "UPDATE clients
        SET email = :mail
        WHERE users_ID = :ID";

    }
    $query_params = array(":mail" => $email,
                        ":ID" => $_SESSION['ID']);
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
            $successmsg = "Adresse modifiée, la nouvelle est $email";
        }catch(PDOException $ex){
            $errormsg = "Cette adresse posséde déjà un compte chez nous";
        }
    $query =
    "UPDATE messages
    SET sent_by = :mail
    WHERE sent_by = :old_mail";

    $query_params = array(":mail" => $email,
                        ":old_mail" => $mail[0]['email']);
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
            $successmsg = "gg";
        }catch(PDOException $ex){
            $errormsg = "Bof";
        }
    $query =
    "UPDATE messages
    SET sent_to = :mail
    WHERE sent_to = :old_mail";

    $query_params = array(":mail" => $email,
                        ":old_mail" => $mail[0]['email']);
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
            $successmsg = "gg";
        }catch(PDOException $ex){
            $errormsg = "Bof";
        }
?>