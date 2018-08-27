<?php
    $query = 
    "SELECT working_day, from_time, to_time 
    FROM  schedule 
    WHERE vets_ID = ANY (SELECT ID FROM vets WHERE users_ID = :users_ID) 
    ORDER BY working_day";
    $query_params = array(':users_ID' => $_SESSION['ID']);
try{
    $stmt = $db->prepare($query);
    $result = $stmt->execute($query_params);
} catch (PDOException $ex) {
    die("Failed to run query: " . $ex->getMessage());
}
?>