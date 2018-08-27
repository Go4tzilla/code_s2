<?php
include_once './c/function.php';
include_once './c/sql_function.php';

	if($_SESSION['type'] !=0){
		$file = get_all_pet();
		echo "<pre>";
		print_r($file);
		echo "</pre>";

	}
	else{
		$file = get_file($_SESSION['user_id']);

		echo "<pre>";
		print_r($file);
		echo "</pre>";
	}
