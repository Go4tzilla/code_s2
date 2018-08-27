<?php
    session_start();
    include("./Models/db_connect.php");
    include('./Controllers/Functions/PHP/messages.php');
    include('./Models/logout.php');
    header('refresh:10;url=./index.php?page=Login');
    include('./Views/templates/html_top_msg.php');
    $successmsg = "Déconnexion réussie, vous allez être redirigé vers l'accueil, à bientôt! :D";
    include('./Views/templates/logout.php');
    session_unset();
?>