<?php
    /* J'initialise la session, la connexion à la db, les fonctions 
    dont j'aurai besoin dans TOUS les cas (récupération dare en français depuis Mysql notamment) */
    session_start();
    include('./Controllers/session_check.php');
    include("./Models/db_connect.php");
    include('./Controllers/Functions/PHP/messages.php');
    include('./Models/actual_date.php');
    $actual_date = get_date($db);
    /* Navbar + récupération et affichage des patients ou des pets */
    if($_SESSION['role'] == 'vet'){
        include('./Views/html_top_vets.php');
        include('./Models/show_patients_vets.php');
        $patients_rows = $stmt->fetchAll();
        
        for($i = 0;$i < count($patients_rows);$i++){
            $patients_rows[$i]['history'] = "\n".strtr($patients_rows[$i]['history'],array("."=>".\r\r",":"=>" :\r","-"=>" - "));
        } 
    } else if($_SESSION['role'] == 'client') {
        include('./Views/html_top_clients.php');
        include('./Models/show_patients.php');
        $patients_rows = $stmt->fetchAll();

        for($i = 0;$i < count($patients_rows);$i++){
            $patients_rows[$i]['history'] = "\n".strtr($patients_rows[$i]['history'],array("."=>".\r\r",":"=>" :\r","-"=>" - "));
        }
    }
    /* On affiche un petit formulaire pour modifier l'historique. Là encore AJAX va prendre le relais. parce qu'AJAX c'est cool */
    switch(isset($_POST)):
        case(isset($_POST['add_history'])):
                include('./Views/history_form.php');
            break;
        default:
                if($_SESSION['role'] == 'vet'){
                    include('./Views/order_by_vets.php');
                    include('./Views/show_patients_vets.php');
                } else if($_SESSION['role'] == 'client') {
                    include('./Views/order_by_clients.php');
                    include('./Views/show_patients.php');
                }
    endswitch;
?>