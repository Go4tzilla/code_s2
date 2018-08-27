<?php
     /* J'initialise la session, la connexion à la db, les fonctions 
    dont j'aurai besoin dans TOUS les cas (récupération dare en français depuis Mysql notamment) */
    session_start();
    include("./Models/db_connect.php");
    include('./Models/actual_date.php');
    include('./Controllers/Functions/PHP/messages.php');
    $actual_date = get_date($db);

    if (isset($_SESSION['ID'])){
        include('./Models/logout.php');
        unset($_SESSION);
        $successmsg = "Déconnexion réussie, à bientôt! :D";
    }
    include('./Views/html_top_login.php');
    include('./Views/login.php');
?>