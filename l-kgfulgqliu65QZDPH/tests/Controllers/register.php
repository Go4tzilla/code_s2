<?php
    session_start();
    include("./Models/db_connect.php");
    include('./Controllers/Functions/PHP/messages.php');
    include('./Models/actual_date.php');
    $actual_date = get_date($db);

    $error = false;
    $flag_email_taken = false;
    $flag_name_taken = false;

        switch(isset($_POST['register'])):  
            case "S'inscrire":
                    $email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8');
                    $first_name = htmlspecialchars(trim($_POST['first_name']), ENT_QUOTES, 'UTF-8');
                    $last_name = htmlspecialchars(trim($_POST['last_name']), ENT_QUOTES, 'UTF-8');
                    $address = htmlspecialchars(trim($_POST['address']), ENT_QUOTES, 'UTF-8');
                    $postal_code = htmlspecialchars(trim($_POST['postal_code']), ENT_QUOTES, 'UTF-8');
                    $city = htmlspecialchars(trim($_POST['city']), ENT_QUOTES, 'UTF-8');
                    $phone_number = htmlspecialchars(trim($_POST['phone_number']), ENT_QUOTES, 'UTF-8');
                    $password = $_POST['password'];
                    $cpassword = $_POST['cpassword'];
                    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                        $error = true;
                        $email_error = "Entrez une addresse email valide";
                    }
                    if(strlen($password) < 6) {
                        $error = true;
                        $password_error = "6 caractères ou plus";
                    }
                    if($password != $cpassword) {
                        $error = true;
                        $cpassword_error = "Les mots de passe ne correspondent pas";
                    }
                    if (!$error) {
                        //  Pas vraiment besoin de vérifier si le mail existe déjà, 
                        // contrainte unique sur le mail user qui me facilite la vie. 
                        // TU PEUX TOUJOURS ESSAYER UNE INJECTION PAR REFRESH CORINNE, I'm a smartass
                            include('./Models/register_clients.php');
                            if(isset($check) && $check == true){
                                include('./Controllers/Functions/PHP/backup_clients.php');
                                $_SESSION['ID'] = $id;
                                $_SESSION['role'] = "client";
                                $successmsg = "Vous êtes bien inscrit et connecté, redirection en cours!";
                                header('refresh:3;url=./index.php?page=Lobby');
                            }
                        
                        }
                    
                break;
            default:
                include('./Views/html_top_login.php');
                include('./Views/register.php');
        endswitch;
?>
