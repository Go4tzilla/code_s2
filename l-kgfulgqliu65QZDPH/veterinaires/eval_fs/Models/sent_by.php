<?php
    $query = "
    SELECT
    sent_to, dates, content
    FROM messages
    WHERE
    sent_by = (SELECT email FROM users WHERE ID = :ID)
    ORDER BY dates";
        $query_params = array(':ID' => $_SESSION['ID']);
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }catch(PDOException $ex){
            die("Failed to run query: " . $ex->getMessage());
        }
?>