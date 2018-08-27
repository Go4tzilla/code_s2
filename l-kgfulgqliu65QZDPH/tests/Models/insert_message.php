<?php
    /* J'envoie un petit message */
    include('./db_connect.php');
    $d = $_GET['d'];
    $e = $_GET['e'];
    $msg = $_GET['msg'];
    $query = 
    "INSERT INTO messages(
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
                           ':sent_to' => $d,
                          ':ID' => intval($e),
                          ':content' => $msg);
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
            $successmsg = "Message envoyé";
        echo "<div class='alert alert-danger alert-dismissible fade show' style='background:#decba4;text-align:center;margin:auto;left:300%;
        display:inline-block;font-size:13px;width:auto;height:auto;color:#FFFFFF;margin-top:20px;border:0.5px solid #decba4'>
        ".$successmsg."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button></div>";
        }catch(PDOException $ex){
            die("Failed to run query: " . $ex->getMessage());
        }
?>