<?php
include_once './c/function.php';
include_once './c/sql_function.php';

if(isset($_POST['dest']) && isset($_POST['text'])){
	
	if(empty($_POST['subject'])){
		$subject = '(no subject)';
	}

	$txt = $_POST['text'];
	$dest = $_POST['dest'];

	if(mail($dest, $subject, $txt)){
		echo "succes";
	}
}
else{
	include './v/contact.php';
}
