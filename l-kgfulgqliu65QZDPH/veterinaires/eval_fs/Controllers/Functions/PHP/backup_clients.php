<?php
$tableau []= $_POST;
$nom= "clients.csv";
$tmp = fopen($nom,"a+");

    foreach($tableau as $line){
        fputcsv($tmp,$line);
    }
fclose($tmp);
?>