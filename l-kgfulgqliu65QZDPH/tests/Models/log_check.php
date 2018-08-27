<?php
    /* Petit select + union des familles pour vérifier si tu existes en te connectant, et ton nom pour un message de bonjour */
    $query = 
    "SELECT ID, role FROM users 
    WHERE email = :email 
    AND password = :password";
        $query_params = array(':email' => $email,
                              ':password' => $password);
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }catch(PDOException $ex){
            die("Failed to run query: " . $ex->getMessage());
        }
        echo '<br><br>';
        $row = $stmt->fetch();
    
        if(isset($row)){
            /* Il est malin ce con */
            $query =
            "SELECT last_name, first_name
            FROM  vets
            WHERE users_ID = :id
            UNION
            SELECT last_name, first_name
            FROM clients
            WHERE users_ID = :ID";

            $query_params = array(":id" => $row['ID'],
                                  ":ID" => $row['ID']);
                try {
                    $stmt = $db->prepare($query);
                    $result = $stmt->execute($query_params);
                }catch(PDOException $ex){
                    die("Failed to run query: " . $ex->getMessage());
                }

            $row1 = $stmt ->fetchAll();
            var_dump($row1);
                if(!empty($row1)){
                    $_SESSION['greeting_msg'] = "<p style='margin-bottom:-5px;text-align:center;margin-top:5px'>
                    <center>Bonjour ".$row1[0]['first_name']." ".$row1[0]['last_name']." =)</center>
                    <br>Bienvenue sur votre espace personnel</p>";
                }
        }
?>