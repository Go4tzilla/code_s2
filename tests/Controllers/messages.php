<?php
     /* J'initialise la session, la connexion à la db, les fonctions 
    dont j'aurai besoin dans TOUS les cas (récupération dare en français depuis Mysql notamment) */
    session_start();
    include('./Controllers/session_check.php');
    include("./Models/db_connect.php");
    include('./Controllers/Functions/PHP/messages.php');
    include('./Models/actual_date.php');
    $actual_date = get_date($db);
    /* Je récupère les dernieres conversations */
    include('./Models/sent_by.php');
    $outbox_rows = $stmt->fetchAll();
    /* Navabar */
    if($_SESSION['role'] == 'vet'){
        include('./Views/html_top_vets.php');
    } else if($_SESSION['role'] == 'client') {
        include('./Views/html_top_clients.php');
    }

    /* Switch sur les $_POST */
    if(isset($_POST['msg'])) {
        switch($_POST['msg']):
            /* J'affiche les conversations */
            case($_POST['msg'] == 'convos'):
                    include('./Models/convos.php');
                    $msg_rows = $stmt->fetchAll();
                    include('./Views/show_convos.php');
                    unset($msg_rows);
                break;
            /* J'affiche les messages envoyés */
            case($_POST['msg'] == 'outbox'):
                    include('./Views/show_outbox.php');
                    unset($outbox_rows);
                break;
            /* Formulaire pour écrire un message, les contacts sont différents selon le role
            les vets peuvent contacter tout le monde sauf eux mêmes (UNION des familles)
            les clients ne peuvent contacter que les vets (bientôt que le vet réfèrent)
            la suite c'est ajax qui le gère */

            case($_POST['msg'] == 'write'):
                if($_SESSION)
                    switch($_SESSION['role']):
                        case 'vet':
                                include('./Models/contact_all.php');
                                $contacts_rows = $stmt->fetchAll();
                                include('./Views/msg_form.php');
                                unset($contacts_rows);
                            break;
                        case 'client':
                                include('./Models/contacts.php');
                                $contacts_rows = $stmt->fetchAll();
                                include('./Views/msg_form_clients.php');
                                unset($contacts_rows);
                            break;
                        default:
                endswitch;
            break; 
            default:
        endswitch;
        /* Ici au cas où AJAX fonctionne plus */
    } else if(isset($_POST['target'])) {
        switch(isset($_POST['target'])):
            case(isset($_POST['target'])):

                include('./Models/insert_message.php');
                $successmsg = 'Message envoyé!';
                include('./Models/sent_by.php');
                $outbox_rows = $stmt->fetchAll();
                include('./Views/show_outbox.php');

                break; 

            default:
        endswitch;

    } else {

        include('./Views/show_outbox.php');

    }
?>