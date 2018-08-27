<?php
    session_start();
    include("./Models/db_connect.php");
    include('./Views/templates/vets_navbar.php');
    include('./Controllers/Functions/PHP/messages.php');

    switch(isset($_POST)):
        case(isset($_POST['add'])):
            include('./Models/show_workdays.php');
            $work_days = $stmt -> fetchAll();
            for($i=0;$i<count($work_days);$i++){
                $working_days[] = implode("",$work_days[$i]);
            }
            $working_days = implode("",$working_days);
            $days = array("Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi","Dimanche");
            for($i=0;$i<count($days);$i++){
                if(!strchr($working_days,$days[$i])){
                    $days_available[] = $days[$i];
                }
            }
            include('./Views/templates/add_new_workday.php');
        break;
        case(isset($_POST['edit'])):
            include('./Models/show_workdays.php');
            $work_days = $stmt -> fetchAll();
            for($i=0;$i<count($work_days);$i++){
                $working_days[] = implode("",$work_days[$i]);
            }
            $working_days = implode("",$working_days);
            $days = array("Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi","Dimanche");
            for($i=0;$i<count($days);$i++){
                if(!strchr($working_days,$days[$i])){
                    $days_available[] = $days[$i];
                }
            }
            include('./Views/templates/edit_workday.php');
        break;
        case(isset($_POST['delete'])):
            include('./Models/select_workdays.php');
            $work_days = $stmt -> fetchAll();
            include('./Views/templates/suppress_workday_form.php');
        break;
        case(isset($_POST['add_day'])):
            $days_free = $_POST['days_add'];
            $from_time = $_POST['from_hour'].':'.$_POST['from_min'].':00';
            $to_time = $_POST['to_hour'].':'.$_POST['to_min'].':00';
            if((int)$_POST['from_hour'] >= (int)$_POST['to_hour']){
                $error_add = "L'heure de début doit être supérieure à celle de fin";
            }
            include('./Models/add_working_day.php');
        break;
        case(isset($_POST['optradio'])):
            include('./Models/delete_day.php');
            $successmsg ="Suppression confirmée";
            break;
        case(isset($_POST['days_edit'])):
            $days_free = $_POST['days_edit'];
            $from_time = $_POST['from_hour'].':'.$_POST['from_min'].':00';
            $to_time = $_POST['to_hour'].':'.$_POST['to_min'].':00';
            if((int)$_POST['from_hour'] >= (int)$_POST['to_hour'])
                $error_add = "L'heure de début doit être supérieure à celle de fin";
            include('./Models/update_working_days.php');
        default:
    endswitch;

    if(!isset($_POST['add_workday'])){   
        include('./Views/templates/html_top.php');
        include('./Models/show_workdays.php');
        $work_rows = $stmt -> fetchAll();
        include('./Views/templates/add_workday_form.php');
    }
?>