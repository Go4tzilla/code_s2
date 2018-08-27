<?php
    function days_availables($work_days){
        for($i=0;$i<count($work_days);$i++){
            $working_days[] = implode("",$work_days[$i]);
        }
        $working_days = implode("",$working_days);
        $days = array("Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi","Dimanche");
        for($i=0;$i<count($days);$i++){
            if(!strchr($working_days,$days[$i])){
                $days_available[] = $days[$i];
            }
        }
        return $days_available;
    }
?>