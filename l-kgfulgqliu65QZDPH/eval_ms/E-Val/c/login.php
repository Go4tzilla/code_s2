<?php
	require_once('./c/sql_function.php');
	require_once('./c/function.php');
	login_check_session();

$login_flag = false;

if(isset($_POST['login'])){
	$name = $_POST['name'];
	$pass = $_POST['pass'];
	
	if(isset($_POST['client'])){
		$table = 'client';
		$t = 0;
	}
	else{
		$table = 'heal';
		$t = 1;
	}

	$query = "
			select id, name, pass, mail
			from $table
			where name = :name;";
	
	$query_param = array(':name' => $name);

	$row = fetch_one_query($query, $query_param);
		
	if($row['pass'] === $pass)
		$login_flag = true;
	
	if ($login_flag) {
		$_SESSION['type'] = $t;
		$_SESSION['user_id'] = $row['id'];
		$_SESSION['username'] = $row['name'];
		unset($row['password']);
		$_SESSION['success_login'] = 1;
		header("Location: index.php");
	} else 
	$errormsg = "Incorrect Email or Password !";
		
}
	include './v/login.php';?>
