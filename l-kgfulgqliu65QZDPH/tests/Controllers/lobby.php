<?php
    /* J'initialise la session, la connexion à la db, les fonctions 
    dont j'aurai besoin dans TOUS les cas (récupération dare en français depuis Mysql notamment) */
    session_start();
    include('./Controllers/session_check.php');
    include './Models/db_connect.php';
    include('./Models/actual_date.php');
    $actual_date = get_date($db);
    /* La navbar, lala lalala */
    if($_SESSION['role'] === 'vet') {
        include './Views/html_top_vets.php'; 
    } else {
        include './Views/html_top_clients.php'; 
    }
    include('./Views/lobby.php');
?>