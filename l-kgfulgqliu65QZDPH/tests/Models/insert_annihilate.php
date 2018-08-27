<?php
    /* J'insère les données de la consultation, je supprimme le rdv (les stats sont toujours possibles et plus précises sur les
    consultations $$) pour éviter de surcharger la bdd .
    Je ne garde que les rendez-vous annulés et les prochains pour afficher les mauvais clients*/
    include('./db_connect.php');
    $a = explode(' ',$_GET['a']);
    $r = $_GET['r'];
    $e = $_GET['e'];
    $d = $_GET['d'];
    $t = $_GET['t'];
    $n = $_GET['n'];
    if(strpos($_GET['w'],',')){
        $w = strtr(array(","=>"."),$_GET['w']);
    } else {
        $w = $_GET['w'];
    }
    $ro = $_GET['ro'];
    $o = $_GET['o'];
    if(strlen($r) >= 5){
        $query =
        "INSERT INTO consultations
        (ID, date, vet, reason, exam, room, diagnosis, treatment, weight, notes, patients_ID,vets_ID)
        VALUES
        (NULL, CURRENT_TIMESTAMP(), (SELECT vet_init FROM vets WHERE users_ID = :o), :r, :e, :ro, :d, :t, :w,:n,:a,(SELECT ID FROM vets WHERE users_ID = :u))";

        $query_params = array(":o" => $o,
                            ":r" => $r,
                            ":e" => $e,
                            ":ro" => intval($ro),
                            ":d" => $d,
                            ":t" => $t,
                            ":w" => intval($w),
                            ":n" => $n,
                            ":a" => $a[4],
                            ":u" => intval($o));
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
            $successmsg = "Consultation enregistrée!";
            
        }catch(PDOException $ex){
            die("Failed to run query: " . $ex->getMessage());
        }
        $query = "SELECT ID
        FROM vets
        WHERE users_ID = :o";

        $query_params = array(":o" => $o);

        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
            $row = $stmt ->fetch();
            $id = $row['ID'];
        }catch(PDOException $ex){
            die("Failed to run query: " . $ex->getMessage());
        }

       $query =
        "DELETE FROM patients_has_appointment WHERE patients_ID = :o AND appointment_ID = (SELECT ID FROM appointment WHERE patients_ID = :patient AND vets_ID = :vet AND start = :s AND app_day = :days)";
            
            $query_params = array(':o' => $a[4],
                                  ':patient' => $a[4],
                                  ':vet' => $id,
                                  ':s' => $a[0],
                                  ':days' => $a[1]);
                                  try {
                                    $stmt = $db->prepare($query);
                                    $result = $stmt->execute($query_params);
                                    $successmsg = "Consultation enregistrée!";
                                }catch(PDOException $ex){
                                    die("Failed to run query: " . $ex->getMessage());
                                }
            $query =
        "DELETE FROM appointment WHERE vets_ID = (SELECT ID FROM vets WHERE users_ID = :o) AND start = :s AND app_day = :d";
            
            $query_params = array(':o' => $o,
                                  ':s' => $a[0],
                                  ':d' => $a[1]);
                                  try {
                                    $stmt = $db->prepare($query);
                                    $result = $stmt->execute($query_params);
                                    echo "<div class='alert alert-danger alert-dismissible fade show' style='background:#decba4;text-align:center;margin:auto;margin-top:60px;display:inline-block;font-size:13px;width:auto;height:auto;color:#FFFFFF;margin-top:40px;border:0.5px solid #decba4'>
                ".$successmsg."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button></div>";
                                }catch(PDOException $ex){
                                    die("Failed to run query: " . $ex->getMessage());
                                }
        
    } else {
        $successmsg ="Certains champs n'ont pas été remplis!";
            echo "<div class='alert alert-danger alert-dismissible fade show' style='background:#decba4;text-align:center;margin:auto;margin-top:60px;display:inline-block;font-size:13px;width:auto;height:auto;color:#FFFFFF;margin-top:40px;border:0.5px solid #decba4'>
                ".$successmsg."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button></div>";
    }
?>