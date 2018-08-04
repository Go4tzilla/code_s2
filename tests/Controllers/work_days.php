<?php
    /* J'initialise la session, la connexion à la db, les fonctions 
    dont j'aurai besoin dans TOUS les cas (récupération dare en français depuis Mysql notamment) */
    session_start();
    include('./Controllers/session_check.php');
    include("./Models/db_connect.php");
    include('./Controllers/Functions/PHP/messages.php');
    include('./Models/actual_date.php');
    $actual_date = get_date($db);
    include('./Models/show_workdays.php');
    $work_rows = $stmt -> fetchAll();
    include('./Models/select_workdays.php');
    $work_days = $stmt -> fetchAll();
    include('./Controllers/Functions/PHP/days_available.php');
    $days_available = days_available($work_days);
    include('./Views/html_top_vets.php');

    switch(isset($_POST)):
        /* Formulaire ajout jour de travail */
        case(isset($_POST['add'])):

                include('./Views/add_new_workday.php');

            break;
        /* Formulaireodification amplitude horaire */
        case(isset($_POST['edit'])):

                include('./Views/edit_workday.php');

            break;
        /* Formulaire suppression jour (suite en AJAX) */
        case(isset($_POST['delete'])):

                include('./Views/suppress_workday_form.php');

            break;
        /* Ajout d'un jour */
        case(isset($_POST['add_day'])):

                $days_free = $_POST['days_add'];
                $from_time = $_POST['from_hour'].':'.$_POST['from_min'].':00';
                $to_time = $_POST['to_hour'].':'.$_POST['to_min'].':00';
                
                if((int)$_POST['from_hour'] >= (int)$_POST['to_hour']){
                    $errormsg = "L'heure de début doit être supérieure à celle de fin";
                } else {
                    include('./Models/add_working_day.php');
                    $successmsg = "Journée ajoutée";
                }
                include('./Models/show_workdays.php');
                $work_rows = $stmt -> fetchAll();
                include('./Views/rest.php');

            break;
        /* Inutile depuis Ajax */
        /**case(isset($_POST['optradio'])):

                include('./Models/delete_day.php');
                $successmsg ="Suppression confirmée";
                include('./Models/show_workdays.php');
                $work_rows = $stmt -> fetchAll();
                include('./Views/rest.php');

            break;*/
        /* Edition d'un jour de travail */
        case(isset($_POST['days_edit'])):

                $days_free = $_POST['days_edit'];
                $from_time = $_POST['from_hour'].':'.$_POST['from_min'].':00';
                $to_time = $_POST['to_hour'].':'.$_POST['to_min'].':00';
                
                if((int)$_POST['from_hour'] >= (int)$_POST['to_hour']){
                    $errormsg = "L'heure de début doit être supérieure à celle de fin";
                } else {
                    include('./Models/update_working_days.php');
                    $successmsg = "Mise à jour effectuée";
                }

                include('./Models/show_workdays.php');
                $work_rows = $stmt -> fetchAll();
                include('./Views/rest.php');

            break;
        /* Page de base */
        default:

            include('./Views/rest.php');

    endswitch;
?>