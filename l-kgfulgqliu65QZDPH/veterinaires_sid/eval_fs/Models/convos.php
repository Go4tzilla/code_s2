<?php
    $query = "
    SELECT
    sent_to, sent_by, dates, content
    FROM messages
    WHERE
    sent_by = (SELECT email FROM users WHERE ID = :ID)
    ORDER BY dates ASC
    LIMIT 11";
        $query_params = array(':ID' => $_SESSION['ID']);
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }catch(PDOException $ex){
            die("Failed to run query: " . $ex->getMessage());
        }
?>