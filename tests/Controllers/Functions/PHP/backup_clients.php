<?php
/* Petit backup des familles en CSV */
unset($_POST['password'],$_POST['cpassword'],$_POST['register']);
$tableau []= $_POST;
$nom= "clients.csv";
$tmp = fopen($nom,"a+");

    foreach($tableau as $line){
        fputcsv($tmp,$line);
    }
fclose($tmp);
?>