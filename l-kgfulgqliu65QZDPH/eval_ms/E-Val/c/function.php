<?php

function exp_date($string){
	
	$array = explode(' ', $string);

	$time = explode(':', $array[1]);
	$date = explode('-', $array[0]);
	
	$array = array_merge($time, $date);
	return $array;
}

function get_doc_rdv($id, $time){
	
	$time = date("Y-m-d G:i", $time);

	$query = "select r.time, c.name, a.id from animal a 
			inner join belong b on a.id = b.animal
			inner join client c on c.id = b.client
			inner join rdv r on a.id = r.animal
			where r.heal = :id";
	$query_param = array( ':id' => $time);

	$res = fetch_query($query, $query_param);
	return $res;
}

function calendar($medid, $mod = 0){
	
	include './c/script.php';

	$ref = mktime(0,0,0, date('n'), date('j', (time() - ((3600*24) * (date('N') - 1) ))));

	echo "<table>";

	for($i=6; $i<19; $i++){
			echo "<tr>";
			if($i == 6){
				echo "<th></th>
					<th>Monday</th>
					<th>Tuesday</th>
					<th>Wednesday</th>
					<th>Thursday</th>
					<th>Friday</th>
					<th>Saturday</th>
					<th>Sunday</th>
					</tr><tr>";
			}
		for($j=0; $j<=7; $j++){
			if($j == 0){
				echo "<td>".($i).":00</td>";
			}
			else{
				$daystamp =  ($ref + ($i*60*60) + (($j-2)*86400 ));
				if(is_dispo($medid, $daystamp, $ref) && $i != 12 && $mod != 0){
					echo "<td><button onclick='see_rdv()'>See</button></td>";
				}
				elseif(is_dispo($medid, $daystamp, $ref) && $i != 12 && $mod == 0){
					echo "<td>	<form method='post'>
							<input type='hidden' name='time' value =$daystamp>
							<input type='hidden' name='post' value=1>
							<input type='submit' value='Reserve'>
						</form>";
				
				}
				else{
					echo "<td style='background-color:rgb(40, 40, 40)'></td>";
				}
			}
		}
			echo "</tr>";
	}
}
/*
function calendar($medid){

	$ref = mktime(0,0,0, date('n'), date('j', (time() - ((3600*24) * (date('N') - 1) ))));

	echo "<table>";

	for($i=6; $i<19; $i++){
			echo "<tr>";
			if($i == 6){
				echo "<th></th>
					<th>Monday</th>
					<th>Tuesday</th>
					<th>Wednesday</th>
					<th>Thursday</th>
					<th>Friday</th>
					<th>Saturday</th>
					<th>Sunday</th>
					</tr><tr>";
			}
		for($j=0; $j<=7; $j++){
			if($j == 0){
				echo "<td>".($i).":00</td>";
			}
			else{
				$daystamp =  ($ref + ($i*60*60) + (($j-2)*86400 ));
				if(is_dispo($medid, $daystamp, $ref) && $i != 12){
					echo "<td>	<form method='post'>
							<input type='hidden' name='time' value =$daystamp>
							<input type='hidden' name='medid' value=$medid>
							<input type='hidden' name='post' value=1>
							<input type='submit' value='Reserve'>
						</form>";
				}
				else{
					echo "<td style='background-color:rgb(40, 40, 40)'></td>";
				}
			}
		}
			echo "</tr>";
	}
}*/

function is_timestamp($timestamp)
{
    return ((string) (int) $timestamp === $timestamp) 
        && ($timestamp <= PHP_INT_MAX)
        && ($timestamp >= ~PHP_INT_MAX);
}

function alert($string) {
echo "<div class='alert alert-danger alert-dismissible fade in'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>".$string."</div>";
}

function success($string) {
    echo "<div class='alert alert-success alert-dismissible fade in'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>".$string."</div>";
}

function success_login() {
    if (isset($_SESSION['success_login'])) {
            echo '<div class="container"><div class="row"><div class="col-md-4 col-md-offset-4 text-center">';
            success('successful login');
            echo '</div></div></div>';
            unset($_SESSION['success_login']);}
}

function is_login() {
    if(empty($_SESSION['user_id'])) {
        header("Location: index.php");
    }
}

function html_top($title){
    echo '<!DOCTYPE html>
            <html lang="EN">
            <head>
            <title>' . $title . '</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script src="./ressources/bootstrap/js/bootstrap.min.js"></script>
            <script>
                $(document).ready(function() {
                    $(window).on("load", function() {
                    preloaderFadeOutTime = 500;
                        function hidePreloader() {
                            var preloader = $(".spinner-wrapper");
                            preloader.fadeOut(preloaderFadeOutTime);
                            }
                            hidePreloader();});});
            </script>
            <link rel="stylesheet" href="./ressources/bootstrap/css/bootstrap.css"/>
		<link rel="stylesheet" href="./ressources/stylesheet.css"/>
            </head>
            <body>';
}

function register_check_session(){
    if(isset($_SESSION['user_id'])) {
        header("Location: index.php");
    }
}

function login_check_session() {
    if(isset($_SESSION['usr_id'])!="") {
        header("Location: index.php");
    }
}


?>
