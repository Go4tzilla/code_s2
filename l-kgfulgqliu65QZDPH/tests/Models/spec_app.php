<?php
    /* Jointure sama RDV des vets */
    $query_params = array(':ID' => $_SESSION['ID'],
                            ':date' => $date,
                            ':time' =>$time);
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }catch(PDOException $ex){
        die("Failed to run query: " . $ex->getMessage());
    }
?>