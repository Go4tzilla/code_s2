<?php
session_start();
include('./Controllers/Functions/PHP/messages.php');
include('./Views/templates/html_top_msg.php');
include("./Models/db_connect.php");
if($_SESSION['role'] == 'vet'){
    include('./Views/templates/vets_navbar.php');
}else if($_SESSION['role'] == 'client') {
    include('./Views/templates/clients_navbar.php');
}
include('./Views/templates/lounge.php');
?>