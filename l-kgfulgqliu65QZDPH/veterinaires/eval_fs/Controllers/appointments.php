<?php
    session_start();
    include('./Controllers/session_check.php');
    include("./Models/db_connect.php");
    include('./Controllers/Functions/PHP/messages.php');

    if($_SESSION['role'] == 'vet'){
        include('./Views/templates/vets_navbar.php');
        include('./Views/templates/html_top.php');
    }else if($_SESSION['role'] == 'client') {
        include('./Views/templates/clients_navbar.php');
        include('./Views/templates/html_top_msg.php');
    }
    if($_SESSION['role'] == 'client'){
        include('./Models/get_appointments.php');
        $app_rows = $stmt->fetchAll();
        for($i=0;$i<count($app_rows);$i++){
            $app_list[] = implode(" ",$app_rows[$i]);
        }
    } else if($_SESSION['role'] == 'vet'){
        include('./Models/get_vets_apps.php');
        $app_rows = $stmt->fetchAll();
        for($i=0;$i<count($app_rows);$i++){
            $app_list[] = implode(" ",$app_rows[$i]);
        }
    }

    if(isset($_POST['cancel'])){
        include('./Models/cancel_app.php');
    }
    include('./Views/templates/cancel_app_form.php');

?>