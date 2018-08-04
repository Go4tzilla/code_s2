<?php
    include('../Models/db_connect.php');
    include('../Models/cancel_apps.php');
    $datas= explode("/",$_GET['d']);
    $i = $_GET['i'];
    $query = 
    "UPDATE appointment SET canceled = 'y'
    WHERE start LIKE :start 
    AND app_day LIKE :app_day 
    AND patients_ID = (SELECT ID FROM patients WHERE pet_name = :name AND owner_id = :owner)";
    cancel_apps($query,$datas,$i,$db);
?>