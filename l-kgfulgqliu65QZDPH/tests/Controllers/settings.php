<?php
    /* J'initialise la session, la connexion à la db, les fonctions 
    dont j'aurai besoin dans TOUS les cas (récupération dare en français depuis Mysql notamment) */
    session_start();
    include('./Controllers/session_check.php');
    include("./Models/db_connect.php");
    include('./Controllers/Functions/PHP/messages.php');
    include('./Models/actual_date.php');
    $actual_date = get_date($db);
    
    switch(isset($_POST)):
        /* Update pw seul */
        case(isset($_POST['password']) && strlen($_POST['password']) > 5 && strlen($_POST['email']) < 5):
                $opassword = $_POST['password'];
                $password = $_POST['password'];
                $cpassword = $_POST['cpassword'];
                if($password != $cpassword) {
                    $cpassword_error = "Les mots de passe ne correspondent pas";
                } else {
                    $update_pw = true;
                }
                if($update_pw){
                    include('./Models/update_password.php');
                }
                include('./Views/manage_account.php');
                
            break;
        /* Update mail seul */
        case(isset($_POST['email']) && strlen($_POST['email']) > 5 && strlen($_POST['password']) < 5):
                $email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8');

                include('./Models/update_mail.php');
                include('./Views/manage_account.php');
            break;
        /* Update all */
        case(isset($_POST['email']) && strlen($_POST['email']) > 5 && isset($_POST['password']) && strlen($_POST['password']) > 5):
                $opassword = $_POST['password'];
                $password = $_POST['password'];
                $cpassword = $_POST['cpassword'];
                if($password != $cpassword) {
                    $cpassword_error = "Les mots de passe ne correspondent pas";
                } else {
                    $update_all = true;
                    echo 'lol';
                }

                if($update_all){
                    include('./Models/update_password.php');
                    $email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8');
                    include('./Models/update_mail.php');
                    include('./Views/manage_account.php');
                }
                include('./Views/manage_account.php');
            

            break;
            /* Here comes the slaughter */
        case(isset($_POST['suppress'])):
                if($_SESSION['role'] == 'vet'){
                    include('./Models/annihilate_vet_account.php');
                    include('./Views/success_failure.php');
                    include('./Controllers/session_check.php');
                } else if($_SESSION['role'] == 'client') {
                    include('./Models/annihilate_client_account.php');
                    include('./Views/success_failure.php');
                    include('./Controllers/session_check.php');
                }
            break;
        /* Formulaire */
        default:
            if($_SESSION['role'] == 'vet'){
                include('./Views/html_top_vets.php');
            } else if($_SESSION['role'] == 'client') {
                include('./Views/html_top_clients.php');
            }
            include('./Views/manage_account.php');
    endswitch;
    
    ?>