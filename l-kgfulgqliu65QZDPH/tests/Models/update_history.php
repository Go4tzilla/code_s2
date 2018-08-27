<?php
    /* update historique patient */
    include('./db_connect.php');
    $a = explode(' ',$_GET['a']);
    $o = $_GET['o'];
    $h = $_GET['h'];
    
    $query =
    "UPDATE patients
    SET history = :history
    WHERE ID = :pet_id
    AND owner_id = :owner_id";

    $query_params = array(":history" => $h,
                         ":pet_id" => $a[1],
                         ":owner_id" => $o);
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
            $successmsg = "Historique modifié";
            echo "<div class='alert alert-danger alert-dismissible fade show' style='background:#decba4;text-align:center;margin:auto;margin-top:80px;display:inline-block;margin-left:500px;max-height:80px;font-size:13px;width:180px;color:#FFFFFF;border:0.5px solid #decba4'>
            ".$successmsg."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button></div>";
        }catch(PDOException $ex){
            die("Failed to run query: " . $ex->getMessage());
            $msg = $ex;
            echo $ex;
        }
?>