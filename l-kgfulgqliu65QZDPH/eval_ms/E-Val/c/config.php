<?php
    $db_username = "root";
    $db_password = "";
    $db_host = "127.0.0.1";
    $db_name = "veto";

    $db_options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    try {
        $db = new PDO("mysql:host={$db_host};dbname={$db_name};charset=utf8", $db_username, $db_password, $db_options);
    } catch(PDOException $ex) {
        die("Failed to connect to the database: " . $ex->getMessage());
    }
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
?>
