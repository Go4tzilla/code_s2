<?php
session_start();
include('./Views/templates/html_top_msg.php');
include("./Models/db_connect.php");

if($_SESSION['role'] == 'vet'){
    include('./Views/templates/vets_navbar.php');
}else if($_SESSION['role'] == 'client') {
    include('./Views/templates/clients_navbar.php');
}
include('./Views/templates/messages_menu.php');

if(!empty($_POST['msg']))
switch($_POST['msg']):
    case($_POST['msg'] == 'Convos'):
        include('./Models/convos.php');
        $msg_rows = $stmt->fetchAll();
        include('./Views/templates/show_convos.php');
        unset($msg_rows);
    break;
    case($_POST['msg'] == 'Outbox'):
        include('./Models/sent_by.php');
        $outbox_rows = $stmt->fetchAll();
        include('./Views/templates/show_outbox.php');
        unset($outbox_rows);
    break;
    case($_POST['msg'] == 'Write'):
    if($_SESSION)
    switch($_SESSION['role']):
        case 'vet':
            include('./Models/contact_all.php');
            $contacts_rows = $stmt->fetchAll();
            include('./Views/templates/msg_form.php');
            unset($contacts_rows);
        break;
        case 'client':
            include('./Models/contacts.php');
            $contacts_rows = $stmt->fetchAll();
            include('./Views/templates/msg_form.php');
            unset($contacts_rows);
        break;
        default:
    endswitch;
    break; 
    default:
endswitch;

if(isset($_POST['target']))
    switch(isset($_POST['target'])):
        case(isset($_POST['target'])):
            include('./Models/insert_message.php');
            $successmsg = 'Message envoyé!';
            include('./Controllers/Functions/PHP/messages.php');
        break; 
        default:
endswitch;
include('./Views/templates/html_bottom.html');
?>