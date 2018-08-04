<?php
    include('../Models/db_connect.php');
    include('../Models/cancel_apps_vets.php');
    $datas= explode("/",$_GET['d']);
    $i = $_GET['i'];
    $query = 
    "UPDATE appointment SET canceled = 'y'
    WHERE start LIKE :start 
    AND app_day LIKE :app_day 
    AND vets_ID = (SELECT ID FROM vets WHERE users_ID = :owner)";
    cancel_apps($query,$datas,$i,$db);
?>