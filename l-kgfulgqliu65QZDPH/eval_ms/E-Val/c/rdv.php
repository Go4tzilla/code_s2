<?php
require_once './c/function.php';
require_once './c/sql_function.php';


	if($_SESSION['type'] == 0){
	
		if(isset($_POST['id'])){
			delete_rdv($_POST['id']);
		}


		if(isset($_POST['post'])){
		

		include './v/reserve.php';
		}
		elseif(isset($_POST['animal'])){
			register_rdv($_POST['time'], $_POST['medid'], $_POST['animal'], $_SESSION['user_id'], $_POST['ope'], $_POST['lenght']);		
		}
		elseif(isset($_POST['med'])){
			calendar($_POST['med']);
			get_rdv($_SESSION['user_id']);
		}
		else{
			include './c/choose.php';
		}
	}
	else{
		get_rdv($_SESSION['user_id'], 1);
	}
include './v/html_bottom.php';
?>
