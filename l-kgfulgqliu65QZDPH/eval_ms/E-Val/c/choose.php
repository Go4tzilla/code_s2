<?php

 $array = get_id_name();
	
	echo "<form method='POST'>
		<select name='med' size=1>";
	foreach ($array as $a){
			echo "<option value=".$a['id'].">".$a['name']."</option>";
		
	}
	echo "<input type='submit' value='Submit'></form>";
		
?>
	
