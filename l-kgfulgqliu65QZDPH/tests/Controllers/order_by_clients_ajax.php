<?php
/* On update l'historique côté vets; ici on controle et on dit KESSKONFAI*/
    include('../Models/db_connect.php');
    $a = explode('-',$_GET['a']);
    $o = $_GET['o'];

    switch($a):
        case($a[1] === 'breed'):
                if($a[0] === 'desc'){
                    $query = 
                    "SELECT pet_name, ID, breed, colour, sex, date_of_birth,microchip_tatoo, history
                    FROM patients
                    WHERE
                    owner_ID = :ID
                    ORDER BY breed DESC";
                } else if ($a[0] === 'asc'){
                    $query = 
                    "SELECT pet_name, ID, breed, colour, sex, date_of_birth,microchip_tatoo, history
                    FROM patients
                    WHERE
                    owner_ID = :ID
                    ORDER BY breed ASC";
                }
            break;
        case($a[1] === 'name'):
                if($a[0] === 'desc'){
                    $query = 
                    "SELECT pet_name, ID, breed, colour, sex, date_of_birth,microchip_tatoo, history
                    FROM patients
                    WHERE
                    owner_ID = :ID
                    ORDER BY pet_name DESC";
                } else if ($a[0] === 'asc'){
                    $query = 
                    "SELECT pet_name, ID, breed, colour, sex, date_of_birth,microchip_tatoo, history
                    FROM patients
                    WHERE
                    owner_ID = :ID
                    ORDER BY pet_name ASC";
                }
            break;
        case($a[1] === 'color'):
                if($a[0] === 'desc'){
                    $query = 
                    "SELECT pet_name, ID, breed, colour, sex, date_of_birth,microchip_tatoo, history
                    FROM patients
                    WHERE
                    owner_ID = :ID
                    ORDER BY colour DESC";
                } else if ($a[0] === 'asc'){
                    $query = 
                    "SELECT pet_name, ID, breed, colour, sex, date_of_birth,microchip_tatoo, history
                    FROM patients
                    WHERE
                    owner_ID = :ID
                    ORDER BY colour ASC";
                }
            break;
        case($a[1] === 'sex'):
                if($a[0] === 'desc'){
                    $query = 
                    "SELECT pet_name, ID, breed, colour, sex, date_of_birth,microchip_tatoo, history
                    FROM patients
                    WHERE
                    owner_ID = :ID
                    ORDER BY sex DESC";
                } else if ($a[0] === 'asc'){
                    $query = 
                    "SELECT pet_name, ID, breed, colour, sex, date_of_birth,microchip_tatoo, history
                    FROM patients
                    WHERE
                    owner_ID = :ID
                    ORDER BY sex ASC";
                }
                break;
        case($a[1] === 'date'):
                if($a[0] === 'desc'){
                    $query = 
                    "SELECT pet_name, ID, breed, colour, sex, date_of_birth,microchip_tatoo, history
                    FROM patients
                    WHERE
                    owner_ID = :ID
                    ORDER BY date_of_birth DESC";
                } else if ($a[0] === 'asc'){
                    $query = 
                    "SELECT pet_name, ID, breed, colour, sex, date_of_birth,microchip_tatoo, history
                    FROM patients
                    WHERE
                    owner_ID = :ID
                    ORDER BY date_of_birth ASC";
                }
            break;
        case($a[1] === 'chip'):
                if($a[0] === 'desc'){
                    $query = 
                    "SELECT pet_name, ID, breed, colour, sex, date_of_birth,microchip_tatoo, history
                    FROM patients
                    WHERE
                    owner_ID = :ID
                    ORDER BY microchip_tatoo DESC";
                } else if ($a[0] === 'asc'){
                    $query = 
                    "SELECT pet_name, ID, breed, colour, sex, date_of_birth,microchip_tatoo, history
                    FROM patients
                    WHERE
                    owner_ID = :ID
                    ORDER BY microchip_tatoo ASC";
                }
            break;
        case($a[1] === 'hist'):
            if($a[0] === 'desc'){
                $query = 
                "SELECT pet_name, ID, breed, colour, sex, date_of_birth,microchip_tatoo, history
                FROM patients
                WHERE
                owner_ID = :ID
                ORDER BY history DESC";
            } else if ($a[0] === 'asc'){
                $query = 
                "SELECT pet_name, ID, breed, colour, sex, date_of_birth,microchip_tatoo, history
                FROM patients
                WHERE
                owner_ID = :ID
                ORDER BY history ASC";
            }
            break;
        default:
    endswitch;

    if(isset($query)){
        include('../Models/order_by_vets.php');
        $patients_rows = order_by($query,$o,$db);
        include('../Views/order_by_vets.php');
    }
?>