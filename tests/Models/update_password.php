<?php
    $query = 
    "SELECT password FROM users WHERE ID = :ID";

    $query_params = array(":ID" => $_SESSION['ID']);

    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
        $res = $stmt -> fetchAll();
    }catch(PDOException $ex){
        die("Failed to run query: " . $ex->getMessage());
    }

    if(!empty($res)){
        $query =
        "UPDATE users
        SET password = :pw
        WHERE ID = :ID";

        $query_params = array(":pw" => $password,
                            ":ID" => $_SESSION['ID']);
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
            $successmsg = "Mot de Passe modifié, le nouveau est $password";
        }catch(PDOException $ex){
            $errormsg = "Une erreur nous a empêché de procéder à la requête. Veuillez nous excuser.";
        }
    }
?>