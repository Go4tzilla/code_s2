<?php
ini_set ('display_errors', 1);
error_reporting (E_ALL | E_STRICT);
?>

<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
<title> insertion script </title>
<style>


</style>
</head>
<body>
<?php


build_insert('sex', 'sex.csv', 'insert.sql');
build_insert('job', 'job.csv', 'insert.sql');
build_insert('race', 'race.csv', 'insert.sql');
build_insert('heal', 'heal.csv', 'insert.sql');
build_insert('day', 'day.csv', 'insert.sql');
build_insert('planning', 'planning.csv', 'insert.sql');
build_insert('client', 'client.csv', 'insert.sql');
build_insert('animal', 'animal.csv', 'insert.sql');
build_insert('belong', 'belong.csv', 'insert.sql');


function build_insert($table, $in, $out){
#Build insert script from .csv to a *.sql file
#take table name, input file (CSV) and output file
#mode is set in fopen, a(ppend) by default


	$reading = fopen($in, 'r');
	$writing = fopen($out, 'a');

	do {
		$array = fgetcsv($reading, 0, ";");

		if(is_array($array)){

			$line = "INSERT INTO `".$table."` VALUES (";

			for($i=0; $i<count($array); $i++){

				if($i != 0 && $i != count($array) ){
					$line = $line.", ";
				}

				if(is_string($array[$i]) && !is_numeric($array[$i])){
					$array[$i] = "\"".addslashes($array[$i])."\"";
				}

				$line = $line.$array[$i];
				if($i == count($array) - 1){
					$line = $line.");".PHP_EOL;
				}
			}

			fputs($writing, $line);
		}
		unset($array);
	} while (!feof($reading));

	fclose($reading); fclose($writing);
}

function insert_pic($table, $path, $out){

	$writing = fopen($out, 'a');

	for($i=1; $i<=251; $i++){    

		$line = "INSERT INTO `".$table."` VALUES (".$i.", '".$path.$i.".svg', ".$i.", 1);".PHP_EOL;

		fputs($writing, $line);
	}
	fclose($writing);
}
?>
</body>
</html>
