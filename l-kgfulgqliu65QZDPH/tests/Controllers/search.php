<?php
    /* J'initialise la session, la connexion à la db, les fonctions 
    dont j'aurai besoin dans TOUS les cas (récupération dare en français depuis Mysql notamment) */
    session_start();
    include('./Controllers/session_check.php');
    include("./Models/db_connect.php");
    include('./Controllers/Functions/PHP/date_to_mysql.php');
    include('./Controllers/Functions/PHP/messages.php');
    include('./Models/actual_date.php');
    $actual_date = get_date($db);

    switch(isset($_POST)):
        /* Affichage des résultats de la recherche */
        case(isset($_POST['Search'])):
                if($_SESSION['role'] === 'vet'){
                    $search = htmlspecialchars(trim($_POST['Search']));
                    include('./Models/my_patients.php');
                    include('./Views/search_patients.php');
                } else if ($_SESSION['role'] == 'client') {
                    $search = htmlspecialchars(trim($_POST['Search']));
                    include('./Models/my_pets.php');
                    include('./Views/order_by_clients.php');
                }
            break;
            /* Affichage des informations spécifiques d'un petient et de son propriétaire */
        case(isset($_POST['select_patient_infos'])):
                if($_SESSION['role'] === 'vet'){
                    $pet = intval(htmlspecialchars(trim($_POST['select_patient_infos'])));
                    include('./Models/patients_details.php');
                    include('./Views/show_pet_details_vets.php');
                } else if ($_SESSION['role'] == 'client') {
                    $pet = intval(htmlspecialchars(trim($_POST['select_patient_infos'])));
                    include('./Models/my_pets_details.php');
                    include('./Views/show_pet_details.php');
                }
            break;
        default:
    endswitch;
                    if($_SESSION['role'] === 'vet'){
                        include('./Views/html_top_vets.php');
                    } else if ($_SESSION['role'] == 'client') {
                        include('./Views/html_top_clients.php');
                        
                    }
    ?>