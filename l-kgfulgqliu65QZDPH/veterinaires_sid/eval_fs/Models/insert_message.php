<?php
    $query = "
    INSERT INTO messages(
        ID,
        sent_to, 
        sent_by,
        content, 
        dates) VALUES(
            :msg_id, 
            :sent_to, 
            (SELECT email FROM users WHERE ID = :ID), 
            :content, 
            CURRENT_TIMESTAMP);";
     $query_params = array(':msg_id' => NULL,
                           ':sent_to' => $_POST['target'],
                          ':ID' => intval($_SESSION['ID']),
                          ':content' => $_POST['content']);
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }catch(PDOException $ex){
            die("Failed to run query: " . $ex->getMessage());
        }
?>