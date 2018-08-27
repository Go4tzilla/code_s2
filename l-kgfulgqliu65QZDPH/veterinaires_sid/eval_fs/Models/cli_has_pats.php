<?php
    $query = "
    INSERT INTO clients_has_patients
        (ID,
        clients_has_patients.clients_ID,
        clients_has_patients.patients_ID)
    VALUES
        (NULL,
        :clients_ID,
        (SELECT ID FROM patients WHERE owner_ID = :clients_ID AND pet_name = :pet_name))";
        $query_params = array(':clients_ID' => $_SESSION['ID'],
                        ':pet_name' => $pet_name);
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
        $successmsg = "Votre animal est enregistré !";
        $_SESSION['animal'] = $pet_name;
    }catch(PDOException $ex){
        $errormsg = "Une erreur est survenue, essayez plus tard";
        die("Failed to run query: " . $ex->getMessage());
    }
?>