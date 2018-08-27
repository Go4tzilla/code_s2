<?php

require_once('./c/function.php');
register_check_session();
include_once("./c/config.php");

// set validation error as false
$error = false;
$flag_name_taken = false;
$flag_email_taken = false;

// check if form is submitted
if (isset($_POST['register'])) {
   $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
   $email = htmlspecialchars($_POST['mail'], ENT_QUOTES, 'UTF-8');
   $password = $_POST['password'];
   $cpassword = $_POST['cpassword'];

	echo $username;
	echo $email;
	
    // check if user input is valid
    if (!preg_match("/^[a-zA-Z0-9]+$/", $username)) {
        $error = true;
        $name_error = "Please use alphanumeric characters only";
    }

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "Please enter a valid email";
    }

    if(strlen($password) < 6) {
        $error = true;
        $password_error = "Password must be 6 characters minimum";
    }

    if($password != $cpassword) {
        $error = true;
        $cpassword_error = "Passwords don't match";
    }

    if (!$error) {

        // Check if the username is already taken
        $query = "
            SELECT
                1
            FROM client 
            WHERE
                name = :name";

        $query_params = array(':name' => $_POST['username'] );

        try{
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        } catch(PDOException $ex){
            die("Failed to run query: " . $ex->getMessage());
        }

        $row = $stmt->fetch();

        if($row){
            $flag_name_taken = true;
            $name_taken = "This username is already in use";
        }

        // check if the email is already taken
        $query = "
            SELECT
                1
            FROM client
            WHERE
                mail = :mail";

        $query_params = array(':mail' => $_POST['mail']);

        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }catch(PDOException $ex){
            die("Failed to run query: " . $ex->getMessage());
        }

        $row = $stmt->fetch();

        if($row){
            $flag_email_taken = true;
            $email_taken = "This email address is already registered";
        }

        if(!$flag_name_taken && !$flag_email_taken) {
            // Add row to database
            $query = "
                INSERT INTO client (
                    name,
                    pass,
                    mail
                ) VALUES (
                    :username,
                    :pass,
                    :mail)";

            $query_params = array(
                ':username' => $_POST['username'],
                ':pass' => $password,
                ':mail' => $_POST['mail']);
            try {
                $stmt = $db->prepare($query);
                $result = $stmt->execute($query_params);
                $successmsg = "Successfully Registered! <a href='index.php?page=login' class='alert-link'></br>Click here to Login</a>";
            }catch(PDOException $ex){
                $errormsg = "Error in registering...Please try again later!";
            }
        }
    }
}

include "./v/register.php";

?>
