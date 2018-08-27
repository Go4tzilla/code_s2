<?php
    include('./db_connect.php');
    
    $q = $_GET['q'];
    $vet = $_GET['vet'];
    /* Suppression asynchrone */
    $query = "DELETE FROM schedule
            WHERE working_day = :working_day
            AND vets_ID = (SELECT ID FROM vets WHERE users_ID LIKE :vets_ID)";
    $query_params = array(':working_day' => $q,
                          ':vets_ID' => $vet);
        try{
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
            $msg = "Requête executée";
        } catch (PDOException $ex) {
            die("Failed to run query: " . $ex->getMessage());
        }
    /* Je suis sneaky je sais. Affichage récupéré avec Ajax :p */
    $query = 
    "SELECT working_day, from_time, to_time 
    FROM  schedule 
    WHERE vets_ID = ANY (SELECT ID FROM vets WHERE users_ID = :users_ID) 
    ORDER BY working_day";
    $query_params = array(':users_ID' => $vet);
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch (PDOException $ex) {
        die("Failed to run query: " . $ex->getMessage());
    }
    $work_rows = $stmt -> fetchAll();
    echo "<div class='alert alert-danger alert-dismissible fade show'style='background:#decba4;text-align:center;margin-left:260px;max-height:80px;font-size:13px;width:180px;color:#FFFFFF;border:0.5px solid #decba4'>
    {$msg}<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button></div>";
  include '../Views/rest_ajax.php';
?>  