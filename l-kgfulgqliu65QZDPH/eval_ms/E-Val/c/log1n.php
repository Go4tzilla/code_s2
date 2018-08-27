<?php

require_once('./c/function.php');
login_check_session();
include_once("./c/config.php");

$login_flag = false;

if (isset($_POST['login'])) {
    $name = $_POST['username'];
    $pass = $_POST['password'];

    $query = "
            SELECT
                id,
                name,
                pass,
                mail
            FROM :table
            WHERE
                name = :name";
	
    $query_params = array(
        ':name' => $name);

    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch (PDOException $ex) {
        die("Failed to run query: " . $ex->getMessage());
    }
    $row = $stmt->fetch();
    
    if ($row) {
            if($pass === $row['pass']){
            $login_flag = true;
        }
   }

    if ($login_flag) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user'] = $row['username'];
        unset($row['salt']);
        unset($row['password']);
        $_SESSION['success_login'] = 1;
        header("Location: index.php");
    } else {
        $errormsg = "Incorrect Email or Password !";
        $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
    }
}

include "./v/login.php";
?>
