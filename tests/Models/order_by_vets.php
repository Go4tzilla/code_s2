<?php
    function order_by($query,$o,&$db){
        $query_params = array(':ID' => $o);

                try {
                    $stmt = $db->prepare($query);
                    $result = $stmt->execute($query_params);
                    $patients_rows = $stmt -> fetchAll();
                    for($i = 0;$i < count($patients_rows);$i++){
                        $patients_rows[$i]['history'] = "\n".strtr($patients_rows[$i]['history'],array("."=>".\r\r","\S:"=>" :\r","-"=>" - "));
                    }

                }catch(PDOException $ex){
                    die("Failed to run query: " . $ex->getMessage());
                }
        return $patients_rows;
    }
?>