<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
       <title> title </title>
<style>
table, th, td{
    border: 1px solid black;
}
td{
	height : 10px;
	width : 20px;
}
</style
</head>
<body>
<?php
	
	
	
	echo "<table style='width:100%; backgroud-color: rgb(230, 230, 230); border: 2px solid black;'>
		<tr>
			<th style='border:0px; align: center '>".date("F")."</th>
		</tr>
		<tr>
			<th>Sun</th>
			<th>Mon</th>
			<th>Tue</th>
			<th>Wed</th>
			<th>Thu</th>
			<th>Fri</th>
			<th>Sat</th>
		</tr>
		<tr>";
	

	for($i=1; $i<=date("t"); $i++){
		

		if($i == 1){
			for($j=0; $j<date("w", mktime(0,0,0, date("n"), $i, date("Y"))); $j++){
				echo "<td>  </td>";
			}
		}
		
		if(date("w", mktime(0,0,0, date("n"), $i, date("Y")))%7 == 0){
			echo "</tr><tr>";
		}

		if(date("j", mktime(0,0,0, date("n"), $i, date("Y"))) == date("j")){
			echo "<td style ='background-color:rgb(200, 200, 200);'>".date("j", mktime(0,0,0, date("n"), $i, date("Y")))."</td>";
		}else{
			echo "<td>".date("j", mktime(0,0,0, date("n"), $i, date("Y")))."</td>";
		}			


	}

	echo "</tr><table>";
			
	

?>
</body>
</html>
