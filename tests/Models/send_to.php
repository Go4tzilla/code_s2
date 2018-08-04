<?php>
    /* Récupère les dernières conversations */
    $query = 
    "SELECT sent_by, sent_to, dates, content
    FROM messages
    WHERE
    sent_by = (SELECT email FROM users WHERE ID = :ID)
    OR
    sent_to = (SELECT email FROM users WHERE ID = :ID)
    ORDER BY date";
    $query_params = array(':ID' => $_SESSION['ID']);
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }catch(PDOException $ex){
            die("Failed to run query: " . $ex->getMessage());
        }
?>