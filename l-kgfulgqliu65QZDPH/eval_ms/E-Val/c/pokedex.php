<?php

/*function pokemon($id, $gen = null){
  include './c/config.php';
  if($id == 'gen' || $id == 'all'){
    if($id == 'all'){
      $range = generation($id);
    }
    else{
      $range = generation($gen);
    }
    $query = "
        SELECT
            *
        FROM pokemon
        WHERE
            id BETWEEN :start AND :end";
    $query_params = array(':start' => $range['start']);
    $query_params = array(':end' => $range['end']);
  }
  else{
    $query = "
        SELECT
            1
        FROM pokemon
        WHERE
            id = :id";
    if($id == 'first'){
      $query_params = array(':id' => generation($id)['start']);
    }
    else{
      $query_params = array(':id' => $id);
    }
  }

  try{
      $stmt = $db->prepare($query);
      $result = $stmt->execute($query_params);
      echo 'la';
  }catch(PDOException $ex){
      die("Failed to run query: " . $ex->getMessage());
  }
  return $result->fetchAll(PDO::FETCH_ASSOC);
}

print_r(pokemon('all'));*/
include './v/pokedex.php';

?>
