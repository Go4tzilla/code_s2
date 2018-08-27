<?php
    $query = "DELETE FROM schedule
            WHERE working_day = :working_day";
    $query_params = array(':working_day' => $_POST['optradio']);
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
        $sucessmsg = "Requête executée";
        header(' Location: index.php?page=Rest');
    } catch (PDOException $ex) {
        die("Failed to run query: " . $ex->getMessage());
    }
?>  