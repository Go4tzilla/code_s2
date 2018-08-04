<?php

    session_start();

    include("./Models/db_connect.php");
    include('./Controllers/Functions/PHP/messages.php');
    include('./Models/actual_date.php');
    $actual_date = get_date($db);

    switch(isset($_POST['login'])):  
        case 'Register':
        $email = htmlspecialchars(trim($_POST['em']), ENT_QUOTES, 'UTF-8');
        $password = htmlspecialchars(trim($_POST['pw']), ENT_QUOTES, 'UTF-8');
        
        // check if the combination fname/lname/email is already used
        include('./Models/log_check.php');
        unset($_SESSION['ID'],$_SESSION['role']);
        $_SESSION['ID'] = $row['ID'];
        $_SESSION['role'] = $row['role'];
        
        if(intval($row['ID']) > 0){
            include('./Models/status_update.php');
            $successmsg = "Connexion réussie! Redirection en cours";
            header('refresh:5;url=./index.php?page=Lobby');
            if($_SESSION['role'] === 'vet') {
                include './Views/html_top_vets.php'; 
            } else {
                include './Views/html_top_clients.php'; 
            }
            
            include('./Views/lobby.php');
        } else {
            $errormsg = "   
            <p>Vous n'avez pas de compte ou la combinaison est incorrecte!</p>";
            include('./Views/html_top_login.php');
            include('./Views/login.php');
        }
        break;
        default:
        include('./Views/html_top_login.php');
            include('./Views/login.php');
    endswitch;
?>