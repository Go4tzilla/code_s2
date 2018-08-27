<?php
    /* Modification historique via AJAX côté vets */
    include('./db_connect.php');
    if($_GET['a'] !== ""){
        $a = explode(' ',$_GET['a']);
        $o = $_GET['o'];
        $query =
        "SELECT patients.history
        FROM patients JOIN appointment
        WHERE patients.ID = :pet_id
        AND appointment.vets_ID = (SELECT ID FROM vets WHERE users_ID = :owner_id)";
        $query_params = array(":pet_id" => $a[2],
                            ":owner_id" => $o);
                            try {
                                $stmt = $db->prepare($query);
                                $result = $stmt->execute($query_params);
                                $res = $stmt ->fetchAll();
                                
                            }catch(PDOException $ex){
                                die("Failed to run query: " . $ex->getMessage());
                            }
                            if(!empty($res)){
                                $history = "\n".strtr($res[0]['history'],array("."=>".\n\n",":"=>" : \n","-"=>"\n - "));
                                echo $history;
                            } else {
                                echo 'Aucun historique à afficher. Veulliez mettre en forme le texte avec ponctuation afin de le mettre en page';
                            }
        unset($a,$o,$db);
    }
?>