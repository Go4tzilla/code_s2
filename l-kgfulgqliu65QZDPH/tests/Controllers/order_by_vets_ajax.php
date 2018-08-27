<?php
    /* On update l'historique côté vets*/
    require_once('../Models/db_connect.php');
    $a = explode('-',$_GET['a']);
    $o = $_GET['o'];
    /* Affiche les patients d'un vétérinaire (ceux ayant déjà assistés à une consultation avec différents tris */
    switch($a):
        case($a[1] === 'breed'):
                if($a[0] === 'desc'){
                    $query = 
                    "SELECT DISTINCT patients.pet_name,  patients.breed, patients.ID, patients.sex, patients.date_of_birth, consultations.weight, consultations.diagnosis, patients.history 
                    FROM 
                    patients, consultations
                    WHERE consultations.patients_ID = patients.ID AND consultations.vets_ID = (SELECT ID FROM vets WHERE users_ID =:ID)
                    GROUP BY patients.pet_name
                    ORDER BY patients.breed DESC";

                } else if ($a[0] === 'asc'){
                    $query = 
                    "SELECT DISTINCT patients.pet_name,  patients.breed, patients.ID, patients.sex, patients.date_of_birth, consultations.weight, consultations.diagnosis, patients.history 
                    FROM 
                    patients, consultations
                    WHERE consultations.patients_ID = patients.ID AND consultations.vets_ID = (SELECT ID FROM vets WHERE users_ID =:ID)
                    GROUP BY patients.pet_name
                    ORDER BY patients.breed ASC";
                }
            break;
        case($a[1] === 'name'):
                if($a[0] === 'desc'){
                    $query = 
                    "SELECT DISTINCT patients.pet_name,  patients.breed, patients.ID, patients.sex, patients.date_of_birth, consultations.weight, consultations.diagnosis, patients.history 
                    FROM 
                    patients, consultations
                    WHERE consultations.patients_ID = patients.ID AND consultations.vets_ID = (SELECT ID FROM vets WHERE users_ID =:ID)
                    GROUP BY patients.pet_name

                    ORDER BY patients.pet_name DESC";
                } else if ($a[0] === 'asc'){
                    $query = 
                    "SELECT DISTINCT patients.pet_name,  patients.breed, patients.ID, patients.sex, patients.date_of_birth, consultations.weight, consultations.diagnosis, patients.history 
                    FROM 
                    patients, consultations
                    WHERE consultations.patients_ID = patients.ID AND consultations.vets_ID = (SELECT ID FROM vets WHERE users_ID =:ID)
                    GROUP BY patients.pet_name
                    ORDER BY patients.pet_name ASC";
                }
            break;
        case($a[1] === 'weight'):
                if($a[0] === 'desc'){
                    $query = 
                    "SELECT DISTINCT patients.pet_name,  patients.breed, patients.ID, patients.sex, patients.date_of_birth, consultations.weight, consultations.diagnosis, patients.history 
                    FROM 
                    patients, consultations
                    WHERE consultations.patients_ID = patients.ID AND consultations.vets_ID = (SELECT ID FROM vets WHERE users_ID =:ID)
                    GROUP BY patients.pet_name
                    ORDER BY consultations.weight DESC";

                } else if ($a[0] === 'asc'){
                    $query = 
                    "SELECT DISTINCT patients.pet_name,  patients.breed, patients.ID, patients.sex, patients.date_of_birth, consultations.weight, consultations.diagnosis, patients.history 
                    FROM 
                    patients, consultations
                    WHERE consultations.patients_ID = patients.ID AND consultations.vets_ID = (SELECT ID FROM vets WHERE users_ID =:ID)
                    GROUP BY patients.pet_name
                    ORDER BY consultations.weight ASC";
                }
            break;
        case($a[1] === 'sex'):
                if($a[0] === 'desc'){
                    $query = 
                    "SELECT DISTINCT patients.pet_name,  patients.breed, patients.ID, patients.sex, patients.date_of_birth, consultations.weight, consultations.diagnosis, patients.history 
                    FROM 
                    patients, consultations
                    WHERE consultations.patients_ID = patients.ID AND consultations.vets_ID = (SELECT ID FROM vets WHERE users_ID =:ID)
                    GROUP BY patients.pet_name
                    ORDER BY patients.sex DESC";
                } else if ($a[0] === 'asc'){
                    $query = 
                    "SELECT DISTINCT patients.pet_name,  patients.breed, patients.ID, patients.sex, patients.date_of_birth, consultations.weight, consultations.diagnosis, patients.history 
                    FROM 
                    patients, consultations
                    WHERE consultations.patients_ID = patients.ID AND consultations.vets_ID = (SELECT ID FROM vets WHERE users_ID =:ID)
                    GROUP BY patients.pet_name
                    ORDER BY patients.sex ASC";
                }
                break;
        case($a[1] === 'date'):
                if($a[0] === 'desc'){
                    $query = 
                    "SELECT DISTINCT patients.pet_name,  patients.breed, patients.ID, patients.sex, patients.date_of_birth, consultations.weight, consultations.diagnosis, patients.history 
                    FROM 
                    patients, consultations
                    WHERE consultations.patients_ID = patients.ID AND consultations.vets_ID = (SELECT ID FROM vets WHERE users_ID =:ID)
                    GROUP BY patients.pet_name
                    ORDER BY patients.date_of_birth DESC";
                } else if ($a[0] === 'asc'){
                    $query = 
                    "SELECT DISTINCT patients.pet_name,  patients.breed, patients.ID, patients.sex, patients.date_of_birth, consultations.weight, consultations.diagnosis, patients.history 
                    FROM 
                    patients, consultations
                    WHERE consultations.patients_ID = patients.ID AND consultations.vets_ID = (SELECT ID FROM vets WHERE users_ID =:ID)
                    GROUP BY patients.pet_name
                    ORDER BY patients.date_of_birth ASC";
                }
            break;
        case($a[1] === 'chip'):
                if($a[0] === 'desc'){
                    $query = 
                    "SELECT DISTINCT patients.pet_name,  patients.breed, patients.ID, patients.sex, patients.date_of_birth, consultations.weight, consultations.diagnosis, patients.history 
                    FROM 
                    patients, consultations
                    WHERE consultations.patients_ID = patients.ID AND consultations.vets_ID = (SELECT ID FROM vets WHERE users_ID =:ID)
                    GROUP BY patients.pet_name
                    ORDER BY patients.microchip_tatoo DESC";
                } else if ($a[0] === 'asc'){
                    $query = 
                    "SELECT DISTINCT patients.pet_name,  patients.breed, patients.ID, patients.sex, patients.date_of_birth, consultations.weight, consultations.diagnosis, patients.history 
                    FROM 
                    patients, consultations
                    WHERE consultations.patients_ID = patients.ID AND consultations.vets_ID = (SELECT ID FROM vets WHERE users_ID =:ID)
                    GROUP BY patients.pet_name
                    ORDER BY patients.microchip_tatoo ASC";
                }
            break;
        case($a[1] === 'hist'):
                if($a[0] === 'desc'){
                    $query = 
                        "SELECT DISTINCT patients.pet_name,  patients.breed, patients.ID, patients.sex, patients.date_of_birth, consultations.weight, consultations.diagnosis, patients.history 
                        FROM 
                        patients, consultations
                        WHERE consultations.patients_ID = patients.ID AND consultations.vets_ID = (SELECT ID FROM vets WHERE users_ID =:ID)
                        GROUP BY patients.pet_name
                        ORDER BY patients.history ASC";
                } else if ($a[0] === 'asc'){
                    $query = 
                        "SELECT DISTINCT patients.pet_name,  patients.breed, patients.ID, patients.sex, patients.date_of_birth, consultations.weight, consultations.diagnosis, patients.history 
                        FROM 
                        patients, consultations
                        WHERE consultations.patients_ID = patients.ID AND consultations.vets_ID = (SELECT ID FROM vets WHERE users_ID =:ID)
                        GROUP BY patients.pet_name
                        ORDER BY patients.history ASC";
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