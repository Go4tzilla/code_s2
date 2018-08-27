<?php
    include('../maths/maths_views/html_top.html');
    include('./session_check.php');
    $table_rows = array(array('Jeudi',"Samedi","Mercredi"));
    $i=0;

    while($i<count($table_rows)){
        
        $working_days[] = implode("",$table_rows[$i]);
        $i++;

    }

    $working_days = implode("",$working_days);

    $days = array("Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi","Dimanche");
        
    for($i=0;$i<count($days);$i++){

        if(!strchr($working_days,$days[$i])){

            $days_available[] = $days[$i];

        }
    }

    echo "<br>";
    
    var_dump($days_available);
    include('../maths/maths_views/html_bottom.html');
?>