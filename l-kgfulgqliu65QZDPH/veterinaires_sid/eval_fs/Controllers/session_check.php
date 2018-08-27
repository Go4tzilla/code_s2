<?php
session_start();
        if(!isset($_SESSION['ID'])){
            header("refresh:2;url=./index.php?page=Login");
            die();
        } 
?>