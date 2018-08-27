<?php
ini_set ('display_errors', 1);
error_reporting (E_ALL | E_STRICT);

require('./sql_function.php');

?>

<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
<title> hallo </title>
</head>
<body>
<?php


	get_rdv(1);
//	take_day(1, 2, '12:30', '14:30');
//	take_day(1,4);

//	update_record("rtt", 2, 'start', '12:45'); 
?>
</body>
</html>
