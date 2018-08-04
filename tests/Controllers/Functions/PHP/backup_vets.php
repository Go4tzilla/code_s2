<?php
/* Petit backup des familles en CSV */

    unset($_POST['password'],$_POST['cpassword'],$_POST['register'],$_POST['add_vet'],$_POST['day_free']);
    $tableau []= $_POST;
    $nom= "vets.csv";
    $tmp = fopen($nom,"a+");

        foreach($tableau as $line){
            fputcsv($tmp,$line);
        }
    fclose($tmp);
?>