<?php
ini_set ('display_errors', 1);
error_reporting (E_ALL | E_STRICT);
?>
<?php
session_start();
require_once("./c/function.php");

	if(isset($_GET['page']))
		switch($_GET['page']):
			case 'home':
				html_top("Home");
				include './v/navbar.php';
				include './c/home.php';
			break;
			
			case 'contact':
				html_top('Contact');
				include './v/navbar.php';
				include './c/contact.php';
			break;

			case 'rdv':
				html_top("Take RDV");
					include './v/navbar.php';
					include './c/rdv.php';
			break;
			
			case 'register':
				html_top("Register");
				include './v/navbar.php';
				include './c/register.php';
			break;
			
			case 'login':
				html_top("Login");
				include './v/navbar.php';
				include './c/login.php';
			break;
			
			case 'logout':
				include './c/logout.php';
			break;
			
			case 'file':
				html_top('file');
				include './v/navbar.php';
				include './c/file.php';
			break;

			case 'info':
				html_top('info');
				include './v/navbar.php';
				include './c/info.php';
			break;

			default:
				include './error/404/404.php';
		endswitch;
		else {
		html_top("Home");
		include './v/navbar.php';
		include './c/home.php';
}

include "./v/html_bottom.php";
?>
