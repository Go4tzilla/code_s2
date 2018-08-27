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
    /* Tu ne t'inscriras pas dans MA db sans mon autorisation */
    $error_reg_animal = false;
    $flag_name_taken = false;
    /* Récupération des navbar correspondants aux rôles entre client et vét */
    if($_SESSION['role'] === 'vet'){
        include('./Views/html_top_vets.php');
        /* Récupération des rdv du vétérinaire */
        include('./Models/get_appointments_vets.php');
        $app_rows = $stmt->fetchAll();
        for($i=0;$i<count($app_rows);$i++){
            $app_list[] = implode(" ",$app_rows[$i]);
        }
    } else if($_SESSION['role'] == 'client') {
        include('./Views/html_top_clients.php');
        /* Récupération des rdv du client */
        include('./Models/get_appointments.php');
        $app_rows = $stmt->fetchAll();
        for($i=0;$i<count($app_rows);$i++){
            $app_list[] = implode(" ",$app_rows[$i]);
        }
    }
    /* Switch des familles */
    switch(isset($_POST)):

        /* Un client veut prendre RdV, je lui demande si son animal est déjà inscrit */
        case(isset($_POST['add_app'])):
            include('./Views/animal_choice.php');
            break;
        /* Récupération de la réponse */
        case(isset($_POST['animal_choice'])):
                include('./Views/day_choice');

            break;
        /* Le patient a déjà consulté, je lui propose un select avec ses animaux */
        case(isset($_POST['optradio']) && $_POST['optradio'] === 'no'):
                include('./Models/seek_animal.php');
                $animal_rows = $stmt ->fetchAll();
                include('./Views/choose_animal.php');
            break;
        /* Le patient n'a jamais consulter, je lui propose un formulaire d'inscription de l'animal */
        case(isset($_POST['optradio']) && $_POST['optradio'] === 'yes'):
                include('./Views/animal_form.php');
            break;
        
        /* Je vérifie les données du formulaire, si l'animal existe déjà (par rapport au propriétaire/nom/sexe/pelage). 
        Si il est déjà inscrit j'affiche une erreur. Le cas échéant, je confirme l'inscription */
        case(isset($_POST['register_animal'])):
            
            $pet_name = htmlspecialchars(trim($_POST['pet_name']), ENT_QUOTES, 'UTF-8');
            $breed = htmlspecialchars(trim($_POST['breed']), ENT_QUOTES, 'UTF-8');
            $colour = htmlspecialchars(trim($_POST['colour']), ENT_QUOTES, 'UTF-8');
            $sex = htmlspecialchars(trim($_POST['optradio2']), ENT_QUOTES, 'UTF-8');
            if(strlen($pet_name) > 20){
                $error_reg_animal = true;
                $pet_name_error = "Le nom est trop long";
            }
            
            if(!empty($_POST['date_of_birth'])){
                $date_of_birth = date_to_mysql($_POST['date_of_birth']);
            }else{
                $date_of_birth = NULL;
            }
            if(isset($_POST['microship_tatoo'])){
                $microchip_tatoo = htmlspecialchars(trim($_POST['microship_tatoo']), ENT_QUOTES, 'UTF-8');
                if(!preg_match('/^[a-zA-Z0-9]+$/',$microchip_tatoo)){
                    $error_reg_animal = true;
                    $microchip_tatoo_error = "Le code n'est pas au bon format";
                }
            }else{
                $microchip_tatoo =" ";
            }
            if(isset($_POST['comment'])){
                $comment = htmlspecialchars(trim($_POST['comment']), ENT_QUOTES, 'UTF-8');
            }else{
                $comment = "";
            }
            if(!isset($pet_name_error)){
                include('./Models/animal_reg_check.php');
                $reg_row = $stmt -> fetch();
                if(empty($reg_row)){
                    include('./Models/animal_reg.php');
                    $_POST['my_animal'] = $id.'/'.$pet_name;
                    $successmsg = 'Animal enregistré';
                    include('./Views/success_failure.php');
                    include('./Views/day_choice.php');
                    include('./Controllers/Functions/PHP/backup_patients.php');
                } else {
                    $errormsg = "Cet animal est déjà enregistré!";
                    include('./Views/success_failure.php');
                    include('./Views/animal_form.php');

                }
            } else {
                include('./Views/success_failure.php');
                $errormsg ="Une erreur a été détectée dans le formulaire d'inscription ou des informations sont manquantes";
            }
                break;

            /* Le client choisit le jour de la consultation, cela me servira à récupérer les vétérinaires disponibles */
            case(isset($_POST['select_animal'])):
                    include('./Views/day_choice.php');
                break;

            /* Je vérifie quels vétérinaires travaillent ce jour là et j'affiche un formulaire de choix d'heure*/
            case(isset($_POST['appointment_date'])):
                    include('./Models/get_working_vets.php');
                    $working_vets = $stmt ->fetch();
                    if(empty($working_vets)){
                        $errormsg = "Aucun rendez-vous n'est disponible ce jour là";
                        include('./Views/success_failure.php');
                        include('./Views/day_choice.php');
                    } else {
                        $successmsg = "Veuillez choisir une heure de rendez-vous";
                        include('./Views/success_failure.php');
                        include('./views/choose_hour.php');
                    }
                break;
            /* Je vérifie si : - L'heure choisie est dans la plage horaire
                               - Le vétérinaire qui prendra en main la consultation n'a pas de rendez-vous à cette heure là et au même jour
                               - Le patient n'a pas déjà un rendez-vous à la même heure
                Puis j'insert*/
            case(isset($_POST['choose_hour'])):
                    $datas = explode("/",$_POST['my_animal']);
                    
                    $h = intval($_POST['hour']);
                    if($h < 10){
                        $h = "0".$h;
                    }
                    $min = intval($_POST['min']);
                    if($min < 10){
                        $min = "0".$min;
                    }
                    $start_time = $h.':'.$min.':00';
                    if($min === "30"){
                        $check_mins = "00";
                        $check_time = $h.":".$check_mins.":00"; 
                    } else {
                        $check_hour = $h-1;
                        if($check_hour < 10){
                            $check_hour = "0".$check_hour;
                        }
                        $check_mins =  "30";
                        $check_time = $check_hour.':'.$check_mins.':00';
                    }
                    $details = htmlspecialchars(trim($_POST['details']), ENT_QUOTES, 'UTF-8');
                    include("./Models/appointment_check.php");
                    include('./Views/success_failure.php');
                    if(isset($errormsg)){
                        include('./Views/choose_hour_fail.php');
                    }
                break;
            /* Les véterinaires peuvent gérer le rendez-vous, la suite se passe avec un formulaire géré en JS/AJAX + 
            du PHP dans les models (insert_annihilate, parce qu'elle est <3) */
            case(isset($_POST['search_app'])):
                    include('./Views/seek_apps_form.php');
                break;
            case(isset($_POST['apps_select'])):
                    switch($_POST['apps_select']):
                        case 'all_day':
                                $date = $_POST['appointment_dates'];
                                include('./Models/all_day_apps.php');
                                $app_rows = $stmt -> fetchAll();
                                if(empty($app_rows)){
                                    $errormsg = "Aucun rendez-vous à afficher";
                                    include('./Views/success_failure.php');
                                } else {
                                    include('./Views/apps_vets.php');
                                }
                            break;
                        case 'hour':
                                if($_POST['hour'] === "" || $_POST['min'] === "" || !isset($_POST['shour'])){
                                    $errormsg = "Des informations sont manquantes, notamment l'heure recherchée ou la spécification";
                                    include('./views/success_failure.php');
                                    include('./Views/seek_apps_form.php');

                                }
                                $date = $_POST['appointment_dates'];
                                $time = $_POST['hour']." : ".$_POST['min']." : 00";
                                if($_POST['shour'] === "<"){
                                    $query = 
                                    "SELECT
                                    appointment.start,
                                    appointment.app_day,
                                    patients.pet_name,
                                    patients.breed,
                                    patients.ID,
                                    clients.last_name,
                                    clients.first_name,
                                    appointment.type,
                                    appointment.canceled
                                    FROM appointment
                                    JOIN patients
                                    JOIN clients
                                    WHERE clients.users_ID = patients.owner_ID
                                    AND patients.ID = appointment.patients_ID
                                    AND appointment.vets_ID = (SELECT ID FROM vets WHERE users_ID = :ID)
                                    AND appointment.canceled = 'n'
                                    AND appointment.app_day = :date
                                    AND appointment.start < :time";
                                } else if($_POST['shour'] === "="){
                                    $query = 
                                    "SELECT
                                    appointment.start,
                                    appointment.app_day,
                                    patients.pet_name,
                                    patients.breed,
                                    patients.ID,
                                    clients.last_name,
                                    clients.first_name,
                                    appointment.type,
                                    appointment.canceled
                                    FROM appointment
                                    JOIN patients
                                    JOIN clients
                                    WHERE clients.users_ID = patients.owner_ID
                                    AND patients.ID = appointment.patients_ID
                                    AND appointment.vets_ID = (SELECT ID FROM vets WHERE users_ID = :ID)
                                    AND appointment.canceled = 'n'
                                    AND appointment.app_day = :date
                                    AND appointment.start = :time";
                                } else if($_POST['shour'] === ">"){
                                    $query = 
                                    "SELECT
                                    appointment.start,
                                    appointment.app_day,
                                    patients.pet_name,
                                    patients.breed,
                                    patients.ID,
                                    clients.last_name,
                                    clients.first_name,
                                    appointment.type,
                                    appointment.canceled
                                    FROM appointment
                                    JOIN patients
                                    JOIN clients
                                    WHERE clients.users_ID = patients.owner_ID
                                    AND patients.ID = appointment.patients_ID
                                    AND appointment.vets_ID = (SELECT ID FROM vets WHERE users_ID = :ID)
                                    AND appointment.canceled = 'n'
                                    AND appointment.app_day = :date
                                    AND appointment.start > :time";
                                }
                                include('./Models/spec_app.php');
                                if(empty($app_rows)){
                                    $errormsg = "Aucun rendez-vous à afficher";
                                    include('./Views/success_failure.php');
                                } else {
                                    include('./Views/apps_vets.php');
                                }
                            break;
                        default:
                    endswitch;
                break;
            case(isset($_POST['manage_app'])):
                    include('./Models/select_patients_history.php');
                    $patients_rows = $stmt ->fetchAll();
                    include('./Views/consultation_form.php');
                break;
            default:
                    if($_SESSION['role'] === 'client'){
                        include('./Views/apps.php');
                    } else if($_SESSION['role'] === 'vet'){
                        include('./Views/apps_vets.php');
                    }
                break;
    endswitch;


?>
