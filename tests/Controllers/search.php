<?php
    session_start();
    include('./Controllers/session_check.php');
    include("./Models/db_connect.php");
    include('./Controllers/Functions/PHP/date_to_mysql.php');
    include('./Controllers/Functions/PHP/messages.php');
    include('./Models/actual_date.php');
    $actual_date = get_date($db);

    if($_SESSION['role'] === 'vet'){
        include('./Views/html_top_vets.php');
    } else if ($_SESSION['role'] == 'client') {
        include('./Views/html_top_clients.php');
        
    }
    switch(isset($_POST)):
        case(isset($_POST['Search'])):
                if($_SESSION['role'] === 'vet'){
                    $search = htmlspecialchars(trim($_POST['Search']));
                    include('./Models/my_patients.php');
                    include('./Views/search_patients.php');
                    include('./Views/order_by_vets.php');
                } else if ($_SESSION['role'] == 'client') {
                    $search = htmlspecialchars(trim($_POST['Search']));
                    include('./Models/my_pets.php');
                    include('./Views/order_by_clients.php');
                }
            break;
        case(isset($_POST['select_patient_infos'])):
                if($_SESSION['role'] === 'vet'){
                    $pet = intval(htmlspecialchars(trim($_POST['select_patient_infos'])));
                    include('./Models/patients_details.php');
                    include('./Views/show_pet_details.php');
                } else if ($_SESSION['role'] == 'client') {
                    $pet = intval(htmlspecialchars(trim($_POST['select_patient_infos'])));
                    include('./Models/my_pets_details.php');
                    include('./Views/show_pet_details.php');
                }
            break;
        default:
    endswitch;
?>