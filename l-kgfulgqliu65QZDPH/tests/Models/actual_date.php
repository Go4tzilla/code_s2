<?php
    /* Juste pour le fun */
    function get_date(&$db){
        $query = 
            "SELECT 
            DAYNAME(CURRENT_TIMESTAMP()), 
            DAY(CURRENT_TIMESTAMP()), 
            MONTHNAME(CURRENT_TIMESTAMP()), 
            YEAR(CURRENT_TIMESTAMP())";
            $query_params = NULL;

            try {
                $stmt = $db->prepare($query);
                $result = $stmt->execute($query_params);
            }catch(PDOException $ex){   
                die("Failed to run query: " . $ex->getMessage());
            }

            $row = $stmt -> fetchAll();
            /* Pregu REPLACUUUUUUUUUUUUUUUUUUUU */
            function pregu_replacu_date_frog_sama_way($row){
                $pattern = array(array("/^l/","/^j/","/^f/","/^m/","/^a/","/^s/","/^o/","/^n/","/^d/","/^v/"),array("L","J","F","M","A","S","O","N","D","V"));
                $row[0]['MONTHNAME(CURRENT_TIMESTAMP())'] = preg_replace($pattern[0],$pattern[1],$row[0]['MONTHNAME(CURRENT_TIMESTAMP())']);
                $row[0]['DAYNAME(CURRENT_TIMESTAMP())'] =  preg_replace($pattern[0], $pattern[1], $row[0]['DAYNAME(CURRENT_TIMESTAMP())']); 
                return $row;
            }
            $row = pregu_replacu_date_frog_sama_way($row);
            $actual_date = implode(" ",$row[0]);
            unset($row,$pattern,$stmt,$db);
            return $actual_date;
    }
?>