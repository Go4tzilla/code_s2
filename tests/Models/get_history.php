<?php
    /* Modification historique via AJAX côté clients */

    include('./db_connect.php');
    if($_GET['d'] != ""){
        $a = explode(" ",$_GET['d']);
        $o = $_GET['o'];
        
        $query =
        "SELECT history
        FROM patients
        WHERE ID = :pet_id
        AND owner_ID = :owner_id";

        $query_params = array(":pet_id" => intval($a[1]),
                            ":owner_id" => $o);
                            try {
                                $stmt = $db->prepare($query);
                                $result = $stmt->execute($query_params);
                                $successmsg = $stmt ->fetchAll();
                                $successmsg[0]['history'] = strtr($successmsg[0]['history'],array("."=>".\r\r",":"=>" :\r","-"=>"\r -"));
                                if(!empty($successmsg[0]['history'])){
                                    echo $successmsg[0]['history'];
                                } else {
                                    echo 'Aucun historique à afficher';
                                }
                            }catch(PDOException $ex){
                                die("Failed to run query: " . $ex->getMessage());
                            }
                            
        unset($a,$o,$db);
    }
?>