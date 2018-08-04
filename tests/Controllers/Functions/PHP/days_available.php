<?php
/* Je ne veux QUE les jours de disponibles. C'est MA fonction. Copyright */
    function days_available($work_days){
        if(!empty($work_days)){
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
        } else {
        $days = array("Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi","Dimanche");
        return $days;
        }
    }
?>