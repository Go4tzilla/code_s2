<?php
ini_set ('display_errors', 1);
error_reporting (E_ALL | E_STRICT);

function delete_rdv($id){
	
	$query = "delete from rdv
			where id =:id";
	$qp= array( ':id' => $id);

	if(!silent_query($query, $qp)){
		echo "failure";
	}
}

function get_all_pet(){
	$query = "select a.id, a.race, a.datebirth, a.immat, c.name from animal a 
			inner join belong b on b.animal = a.id 
			inner join client c on b.client = c.id";
	$qp = array();
	return fetch_query($query, $qp);
}

function get_perso($cid){
	
	$q = "select * from client";
	$qp = array();

	$res = fetch_query($q, $qp);
	return $res;
}

function register_rdv($time, $heal, $animal, $client, $ope = null, $len = 1){
	
	$time = date("Y-m-d G:i", $time);

	if(is_null($ope)){
		$q = "insert into rdv (time, lenght, heal, animal, client)
				value (:time, :len, :heal, :animal, :client);";

		$qp = array(':time' => $time, ':len' => $len, ':heal' => $heal,
				':animal' => $animal, ':client' => $client);
		}
	else{
		$q = "insert into rdv (time, lenght, ope, heal, animal, client)
		value (:time, :len, :ope, :heal, :animal, :client);";

		$qp = array(':time' => $time, ':len' => $len, ':ope' => $ope,
		':heal' => $heal,':animal' => $animal, ':client' => $client);

		if(!silent_query($q, $qp)){
			echo "error";
		}
	}
}

function get_file($cid){
	
	$query = "	select a.name, r.lifex, r.spec 
			from client c inner join belong b on c.id = b.client 
			inner join animal a on b.animal = a.id 
			inner join race r on a.race = r.id
			where c.id = :id";

	$query_param = array( ':id' => $cid);
	$result = fetch_query($query, $query_param);

	return $result;
}

function get_animal($cid){

	$q = "select a.id, a.name from animal a 
	inner join belong b on a.id = b.animal 
	inner join client c on b.client = c.id
	where c.id = :id";

	$qp = array(':id' => $cid);

	$result = fetch_query($q, $qp);

	if(!empty($result)){

		echo "<select name='animal'>";
		for($i=0; $i<count($result); $i++){
				echo "<option value=".$result[$i]['id'].">".$result[$i]['name']."</option>";
			
		}
	}	
	echo "</select>";

}

function pet_id($name){
	$q =" select id from animal where name = :name";
	$qp = array(':name' => $name);
	
	return fetch_one_query($q, $qp);
}

function add_pet($name, $race, $db, $sex, $immat, $cid){
	
	$query = "insert into `animal` (name, race, datebirth, sex, immat) 
			value (:name, :race, :db, :sex, :immat)";
	$query_param = array(	':name' => $name, ':race' => $race,
					':db' => $db, ':sex' => $sex, ':immat' => $immat);

	if(silent_query($query, $query_param)){
		
		$id = pet_id($name);

		$q = "insert into belong (client, animal)
			value (:client, :animal);";
		$qp = array(':animal' => $id['id'], ':client' => $cid);
		if(silent_query($q, $qp))
			echo "success";
	}
}

function update_user($cid, $field, $change, $type = 0){
		$table = 'client';
	if($type != 0)
		$table = 'heal';
	switch($field){
		case 1:
			$qp = array( ':pass' => $change, ':id' => $cid);
			$q = "update $table
				set pass = :pass
				where id = :id";
			break;
		case 2:
			$qp = array( ':mail' => $change, ':id' => $id);
			$q = "update $table
				set mail = :mail
				where id = :id";
			break;
	}
	if(silent_query($q, $qp))
		echo 'success';
		return 1;
}

function get_sex(){

	$q = "select id, value from sex";
	$qp = array();

	$result = fetch_query($q, $qp);

	if(!empty($result)){

		echo "<select name='sex'>";
		for($i=0; $i<count($result); $i++){
				echo "<option value=".$result[$i]['id'].">".$result[$i]['value']."</option>";
			
		}
	}	
	echo "</select>";
}
function get_race(){

	$q = "select id, name from race";
	$qp = array();

	$result = fetch_query($q, $qp);

	if(!empty($result)){

		echo "<select name='race'>";
		for($i=0; $i<count($result); $i++){
				echo "<option value=".$result[$i]['id'].">".$result[$i]['name']."</option>";
			
		}
	}	
	echo "</select>";
}

function recipient($mod = 0){
	$table = 'heal';
	if($mod == 1)
		$table = 'client';

	$q = "select name, mail from $table";
	$qp = array();

	$result = fetch_query($q,$qp);

	if(!empty($result)){

		echo "<select name='dest'>";
		for($i=0; $i<count($result); $i++){
				echo "<option value=".$result[$i]['mail'].">".$result[$i]['name']."</option>";
			
		}
	}	
	echo "</select>";


}

function get_id_name(){
	
	$query = "select id, name from heal";
	$query_param = array();
	return fetch_query($query, $query_param);
}

function is_dispo($id, $datime, $ref){
	include_once './c/function.php';
	
	$q1 = 'select day, begin, finish from planning where heal = :id';
	$q2 = 'select begin, finish from rtt where heal = :id';
	$q3 = 'select time, lenght from rdv where heal = :id';
	$qp = array(':id' => $id);

	$rdv = fetch_query($q3, $qp);
	$plan = fetch_query($q1, $qp);
	$rtt = fetch_query($q2, $qp);
	
	if(!empty($plan)){
		if(find_if_dispo($plan, $datime, $ref)){
			if(!empty($rdv)){
				if(!find_if_dispo($rdv, $datime, $ref)){
					if(!empty($rtt)){
						if(find_if_dispo($rtt, $datime, $ref)){
							return true;	
						}
						else{
							return false;
						}
					}
					else{
						return true;
					}
				}
				else{
					return false;
				}
			}
			else{
				return true;
			}
		}
		else{
			return false;
		}
	}

}

function find_if_dispo($array, $datime, $ref){


	for($i=0; $i<count($array); $i++){
		foreach($array[$i] as $key => $val){
			
			if(isset($array[$i]['day'])){
				if(date('N', $datime) == $array[$i]['day']){
					
					$begin = explode(":", $array[$i]['begin']);
					$finish = explode(":", $array[$i]['finish']);
					$day = date('j', $ref+(($array[$i]['day']-1) *86400 ));
					
					$s1 = mktime($begin[0], $begin[1], date('s'), date('n'), $day);
					$s2 = mktime($finish[0], $finish[1], date('s'), date('n'), $day);
				}
			}
			elseif(isset($array[$i]['time'])){
			
				$s1 = strtotime($array[$i]['time']);
				$s2 = $s1 + (3600 * $array[$i]['lenght']);
			}
			if(isset($s1) && isset($s2)){
				
				if($s1 <= $datime && $s2 >= $datime){
					return true;
				}elseif(($s1 - $datime) <=0){
				

				}
			}
			
		}
	}
	
	return false;

}

function fetch_one_query($query, $query_param){

	require('./c/config.php');
	
	$row = array();

	try {

		$stmt = $db->prepare($query);
		$result = $stmt->execute($query_param);

	}catch(PDOException $ex){

		die("Failed to run query: " . $ex->getMessage());

	}
	
	$row = $stmt->fetch();		


	return $row;
}

function fetch_query($query, $query_param){

	require('./c/config.php');
	
	$row = array();

	try {

		$stmt = $db->prepare($query);
		$result = $stmt->execute($query_param);

	}catch(PDOException $ex){

		die("Failed to run query: " . $ex->getMessage());

	}
	
	$row = $stmt->fetchAll();		


	return $row;
}

function silent_query($query, $query_param){

	require('./c/config.php');

	try {

		$stmt = $db->prepare($query);
		$result = $stmt->execute($query_param);

		return true;

	}catch(PDOException $ex){

		die("Failed to run query: " . $ex->getMessage());

	}
}

function get_rdv($id, $mod=0){
		$field = 'client';
		if($mod!=0)
			$field = 'heal';


		$query = "	select * from rdv
				where $field = :id;";
		
		$query_param = array( ':id' => $id);

		$row = fetch_query($query, $query_param);

		for($i=0; $i<count($row); $i++){
			echo "<table>
					<tr>
						<td>RDV n.$i</td><td>";

			echo $row[$i]['time']."<br>";
			echo $row[$i]['lenght']."<br>";
			echo $row[$i]['ope']."<br>";
			echo $row[$i]['heal']."<br>";
			echo $row[$i]['animal']."<br>";
			$rank = $row[$i]['id'];
			echo "	</td>
					<td>
						<form method='post'>
							<input type='hidden' name='id' value=$rank>
							<input type='submit' value='Erase'>

						</form>
				</tr>
				</table>";
	}		
	
			
}

function take_day($med, $day, $start = null, $finish = null){

	if(is_null($start) && is_null($finish)){

		$query = '	insert into rtt (heal, day)
				values (:heal, :day);';
		
		$query_param = array (	':heal' => $med, ':day' => $day);
	
	}elseif(!is_null($start) && !is_null($finish)){

		$query = '	insert into rtt (heal, day, start, finish)
				values (:heal, :day, :start, :finish);';
		
		$query_param = array (	':heal' => $med, ':day' => $day,
						':start' => $start, ':finish' => $finish);
	}
	
	run_query($query, $query_param);
}


function is_time($string){
	
	$array = explode(":", $string);
	$c=0;
	for($i=0; $i<count($array); $i++){
		if(is_numeric($array[0]))
			$c++;
	}
	if($c == count($array))
		return true;
	else
		return false;
}

function update_record($table, $id, $line, $mod){

	echo $table.'-'.$id.'-'.$line.'-'.$mod."<br>";

	if(is_time($mod))
		$mod = "'".$mod."'";
	$query = "	update :table
			set :line = :mod
			where id = :id";

	$query_param = array(':table' => $table, ':line' => $line, ':id' => $id, ':mod' => $mod);
	
	run_query($query, $query_param);
}

?>
