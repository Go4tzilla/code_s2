<?php
    /* J'initialise la session, la connexion à la db, les fonctions 
    dont j'aurai besoin dans TOUS les cas (récupération dare en français depuis Mysql notamment) */
    session_start();
    include('./Controllers/session_check.php');
    include './Models/db_connect.php';
    include('./Models/actual_date.php');
    $actual_date = get_date($db);
    include('./Controllers/Functions/PHP/messages.php');
    
    /* Tu ne t'inscriras pas dans MA db sans mon autorisation! Bon la contrainte unique et le HTML font tout en fait */

    $error = false;
    $flag_email_taken = false;
    $flag_name_taken = false;
    
    switch(isset($_POST['add_vet'])):  
        case 'add_vet':
                $email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8');
                $first_name = htmlspecialchars(trim($_POST['first_name']), ENT_QUOTES, 'UTF-8');
                $last_name = htmlspecialchars(trim($_POST['last_name']), ENT_QUOTES, 'UTF-8');
                $vet_init = htmlspecialchars(trim($_POST['vet_init']), ENT_QUOTES, 'UTF-8');
                $password = $_POST['password'];
                $cpassword = $_POST['cpassword'];
                $days_free = $_POST['days_free'];
                $phone = $_POST['phone_number'];
                if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                    $error = true;
                    $email_error = "Entrez une addresse email valide";
                }
                if($password != $cpassword) {
                    $error = true;
                    $cpassword_error = "Les mots de passe ne correspondent pas";
                }
                /* Elle est pas mal celle là aussi de fonction :3 */
                include('./Models/add_user_vet.php');
                include('./Controllers/Functions/PHP/backup_vets.php');
                        
                if($check == true){
                    include('./Models/add_vet.php');
                }
                include('./Views/html_top_vets.php');
                include('./Views/add_vet_form.php');
                
            break;
        default:
            include('./Views/html_top_vets.php');
            include('./Models/show_collaborators.php');
            $colls_rows = $stmt -> fetchAll();
    endswitch;
    
    if(isset($_POST['add'])){
        include('./Views/add_vet_form.php');
    } else {
        include('./Views/display_collaborators.php');

    }
?>