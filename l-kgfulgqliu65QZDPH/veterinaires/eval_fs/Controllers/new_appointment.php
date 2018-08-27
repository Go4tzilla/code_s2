<?php
session_start();
var_dump($_POST);
var_dump($_SESSION);
    include("./Models/db_connect.php");
    include('./Controllers/Functions/PHP/messages.php');
    include('./Controllers/Functions/PHP/date_to_mysql.php');
    include('./Views/templates/clients_navbar.php');
    include('./Views/templates/html_top.php');

    $error_reg_animal = false;
    $flag_name_taken = false;

    if(empty($_POST)){
        include('./Views/templates/animal_choice.php');
    }
    
    if(isset($_POST['register_animal'])){
        $pet_name = htmlspecialchars(trim($_POST['pet_name']), ENT_QUOTES, 'UTF-8');
        $breed = htmlspecialchars(trim($_POST['breed']), ENT_QUOTES, 'UTF-8');
        $colour = htmlspecialchars(trim($_POST['colour']), ENT_QUOTES, 'UTF-8');
        $sex = htmlspecialchars(trim($_POST['optradio2']), ENT_QUOTES, 'UTF-8');
        if(strlen($pet_name) > 20){
            $error_reg_animal = true;
            $pet_name_error = "Le nom est trop long";
        }
        if(!empty($_POST['date_of_birth']))
            $date_of_birth = date_to_mysql($_POST['date_of_birth']);
        else
            $date_of_birth = NULL;
        if(isset($_POST['microship_tatoo'])){
            $microship_tatoo = htmlspecialchars(trim($_POST['microship_tatoo']), ENT_QUOTES, 'UTF-8');
            if(!preg_match('/^[a-zA-Z0-9]+$/',$microship_tatoo)){
                $error_reg_animal = true;
                $microship_tatoo_error = "Le code n'est pas au bon format";
            }
        }else{
            $microship_tatoo ="";
        }
        if(isset($_POST['comment'])){
            $comment = htmlspecialchars(trim($_POST['comment']), ENT_QUOTES, 'UTF-8');
        }else{
            $comment = "";
        }
            if(!$error_reg_animal){
                include('./Models/animal_reg_check.php');
                $check_name_row = $stmt->fetch();
                if(!empty($check_name_row)){
                    $flag_name_taken = true;
                    $name_taken = "Vous avez déjà inscrit " . $pet_name;
                    include('./Views/templates/new_animal.php');
                    die();
                }
            }
            include('./Models/animal_reg.php');
            include('./Controllers/Functions/PHP/backup_patients.php');
            unset($_POST['register']);
        }         
        
        if(!isset($_POST['new_appointment']) && !isset($_POST['vet_choice']) && isset($_SESSION['animal'])){
            include('./Views/templates/app_datepick.php');
            $check_date = true;
        }
        if(!isset($_POST['new_appointment']) && !isset($_POST['vet_choice']) && isset($_POST['my_animal'])){
            include('./Views/templates/app_datepick.php');
        }


        if(isset($_POST['appointment_date'])){
            $_SESSION['type'] = $_POST['type'];
            $date = date_to_mysql($_POST['appointment_date']);
            $_SESSION['date'] = $date;
            include('./Models/vets_availibility.php');
            $availability_rows = $stmt->fetchAll();
            include('./Views/templates/vet_choice.php');
            }
        }
    
    if(isset($_POST['vet_choice'])){
        $_SESSION['vet'] = $_POST['vet'];
    }

    if(!empty($_POST) && !isset($_POST['register_animal']) && !isset($_POST['my_animal']) && !isset($_POST['new_appointment'])){
    switch(isset($_POST['new_animal'])):
        case($_POST['optradio']):
        switch($_POST['optradio']):
            case 'yes':
                switch(!empty($_POST['new_animal'])):
                    case(!empty($_POST['new_animal'])):
                        include('./Views/templates/new_animal.php');
                    break;
                    default:
                endswitch;
            break;
            case 'no':
                include('./Models/seek_animal.php');
                $animal_rows = $stmt->fetchAll();
                include('./Views/templates/existing_animal.php');
                unset($_POST['optradio']);
            break;
            default:
        endswitch;
        break;
        default:
    endswitch;
    }
?>