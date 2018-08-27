<?php
include_once './c/function.php';
include_once './c/sql_function.php';

		
	if($_SESSION['type'] == 0){
		if(isset($_POST['perso'])){
			if(!empty($_POST['pass'])){
				if($_POST['pass1'] == $_POST['pass2']){
					$pass = $_POST['pass'];
					$mod = 1;
					update_client($_SESSION['user_id'], $mod, $pass);
				}
			}
			elseif(!empty($_POST['mail'])){
				$mail = $_POST['mail'];
				$mod = 2;
				update_user($_SESSION['user_id'], $mod, $mail);
			}
		}
		
		if(isset($_POST['pet'])){
			add_pet($_POST['petname'], $_POST['race'], $_POST['birth'], $_POST['sex'], $_POST['immat'], $_SESSION['user_id']);
		}
		else{
			include './v/info.php';
		}
	}
	else{
		if(isset($_POST['perso'])){
			if(!empty($_POST['pass1'])){
				echo "oui";
				if($_POST['pass1'] == $_POST['pass2']){
					
					echo $_POST['pass1'].'   '.$_POST['pass2'];
					
					$pass = $_POST['pass1'];
					$mod = 1;
					update_user($_SESSION['user_id'], $mod, $pass, 1);
				}
			}
			elseif(!empty($_POST['mail'])){
				$mail = $_POST['mail'];
				$mod = 2;
				update_user($_SESSION['user_id'], $mod, $mail, 1);
			}
		}
		else{
			include './v/docinfo.php';
		}
	}
		
?>
